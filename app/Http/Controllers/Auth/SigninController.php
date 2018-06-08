<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
use App\Models\ForgetPasswordToken;
use App\Models\Order\Cart;
use App\Models\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Session;
use TranslatedResources;
use URL;
use Validator;

class SigninController extends Controller
{
    /* view of creator/eater login form */
    public function signIn()
    {
        /* check for private url session variables */
        if (Session::has('private_url')) {
            Session::forget('private_url');
            /* set the previous url in session */
            Session::put('url.intended', URL::previous());
        }
        return view('frontend.auth.sign-in');
    }

    /* login as eater or creator */
    public function authentication(Request $request)
    {
        $input = $request->input();
        $validator = $this->validator($input);
        $remember_me = '';

        /* codes for remember me section */
        if (isset($input['remember'])) {
            $remember_me = $request->get('_token');
        }

        /* check validation here */
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            /* only login as EATER or CREATOR if credentials are valid */
            if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
                $status = Auth::user()->status;
                if ($status == 1) {
                    // type 1 = CREATOR, 2 = EATER
                    if (Auth::User()->type == 1 || Auth::User()->type == 2) {
                        $user = User::where('user_id', Auth::User()->user_id)->first();
                        $user->update(['remember_token' => $remember_me]);
                        /* redirect to the previous url after login if user try to access private URLs */
                        if (Session::has('url.intended')) {
                            $intendedUrl = Session::get('url.intended');
                            Session::forget('url.intended');
                            return Redirect::to($intendedUrl);
                        } elseif (Session::has('buy_food')) {
                            $order_details = Session::get('buy_food');
                            Session::forget('buy_food');

                            //decrypt price and food_item_id here
                            $price = Crypt::decrypt($order_details['amount']);
                            $food_item_id = Crypt::decrypt($order_details['food_item_id']);
                            $food_details_url = route('food_details', ['food_item_id' => $food_item_id]);

                            $foodItem = FoodItem::where('food_item_id', $food_item_id)->first();
                            if ($foodItem->offered_by != Auth::User()->user_id) {
                                $foodStock = $foodItem->quantity;
                                /* add item in cart */
                                if ($order_details['quantity'] <= $foodStock) {
                                    $cart = Cart::create(['food_item_id' => $food_item_id,
                                        'cart_id' => uniqid(),
                                        'price' => $price,
                                        'time' => $order_details['slot'],
                                        'quantity' => $order_details['quantity'],
                                        'booked_by' => Auth::User()->user_id,
                                    ]);
                                    Session::forget('redirect_order_details');
                                    return redirect(url('/order/payment/make-paypal-payment', array($cart->cart_id)));
                                } else {
                                    return Redirect::to($food_details_url);
                                }
                            } else {
                                return Redirect::to($food_details_url);
                            }
                        } else {
                            if (Auth::User()->type == 1) {
                                return redirect()->route('profile_details', ['user_id' => Auth::user()->user_id]);
                            }
                            if (Auth::User()->type == 2) {
                                return redirect('/');
                            }
                        }
                    } else {
                        Auth::logout();
                    }
                } else {
                    Auth::logout();
                    Session::put('inactive_status', 'Your account is inactive.');
                    return redirect()->route('sign_in');
                }
            }
        }
        Session::put('login_status', 'Invalid Credentials.');
        return redirect()->route('sign_in');
    }

    /* validator for login form */
    protected function validator($request)
    {
        return Validator::make($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    /* function for signing out from the application */
    public function signOut()
    {
        Auth::logout();
        return redirect('/');
    }

    //RETURN VIEW OF FORGET PASSWORD PAGE
    public function forgetPassword()
    {
        return view('frontend.auth.forget-password');
    }

    //SEND LINK OF FORGET PASSWORD TO THE USER
    public function sendMail(Request $request)
    {
        $input = $request->input();
        $resetPasswordValidator = $this->resetPasswordValidator($input);

        if ($resetPasswordValidator->fails()) {
            Session::flash('error', TranslatedResources::translatedData()['password_validation_msg']);
            return redirect()->back()->withInput()->withErrors($resetPasswordValidator);
        } else {
            //CHECK THIS EMAIL EXIST IN DB OR NOT
            $user = User::where('email', $input['email'])->first();
            if (!empty($user)) {
                $email = $input['email'];
                $name = $user['name'];
                $uniqueid = uniqid();
                ForgetPasswordToken::create([
                    'email' => $email,
                    'token' => $uniqueid,
                ]);

                //SEND RESET PASSWORD MAIL
                Mail::send('frontend.email.forget_password_email', ['name' => $name, 'email' => $email, 'uniqueid' => $uniqueid], function ($message) use ($email, $name) {
                    $message->to($email, $name)->subject(TranslatedResources::translatedData()['reset_password_subject']);
                });
                Session::flash('success', TranslatedResources::translatedData()['mail_sent_msg']);
            } else {
                Session::flash('error', TranslatedResources::translatedData()['invalid_email_error_msg']);
            }
        }
        return redirect('/');
    }

    /* validator for reset password */
    protected function resetPasswordValidator($request)
    {
        return Validator::make($request, [
            'email' => 'required|email|max:255',
        ]);
    }

    //RETURN VIEW OF PASSWORD CHANGE PAGE
    public function changeForgetPassword($id, $email)
    {
        $check_token = ForgetPasswordToken::where('token', $id)->first();
        if (!empty($check_token)) {
            $decripted_email = Crypt::decrypt($email);
            $data = User::where('email', $decripted_email)->first();
            if (!empty($data)) {
                return view('frontend.auth.new_password', compact('decripted_email'));
            }
        } else {
            return view('frontend.auth.not_valid_link');
        }
    }

    //UPDATE PASSWORD
    public function updateForgetPassword(Request $request)
    {
        $input = $request->input();
        $validation = $this->forgetPasswordValidator($input);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }
        $user = User::where('email', Crypt::decrypt($input['email_id']))->first();
        if (!empty($user)) {
            $user->update(['password' => bcrypt($input['password'])]);
            $forget_password_token = ForgetPasswordToken::where('email', $user['email'])->first();
            if (!empty($forget_password_token)) {
                $forget_password_token->delete();
            }
            Session::flash('success', TranslatedResources::translatedData()['password_updation_success']);
            return redirect('/sign-in');
        } else {
            return back();
        }
    }

    //PASSWORD CHANGE VALIDATION
    protected function forgetPasswordValidator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6',
            'password_confirmation' => 'min:6|same:password',
        ]);
    }

}

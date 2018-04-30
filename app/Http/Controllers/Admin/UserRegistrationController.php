<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
use App\Models\Food\FoodItemCosting;
use App\Models\Order\Order;
use App\Models\Payment\Payments;
use App\Models\ProfileInformation;
use App\Models\Review\Review;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use Validator;

class UserRegistrationController extends Controller
{
    /* view page of creating buyers or sellers */
    public function create()
    {
        return view('admin.create-user', ['form_type' => 'create']);
    }

    /* save user information in db */
    public function save(Request $request)
    {
        $input = $request->input();
        $file = $request->file();
        // echo "<pre>";
        // print_r($input);die;

        $validator = $this->validator($input);
        $userUpdateValidator = $this->userUpdateValidator($input);
        $profileImageValidator = $this->profileImageValidator($file);
        $coverImageValidator = $this->coverImageValidator($file);

        /* update user */
        if (isset($input['user_id'])) {
            /* check validation for user updation */
            if ($userUpdateValidator->fails()) {
                // echo "string";die;
                // echo "<pre>";
                // print_r($userUpdateValidator->errors());die;
                Session::flash('error', trans('validation.form_error'));
                return redirect()->back()->withErrors($userUpdateValidator)->withInput();
            } else {
                /* get user and their profile details */
                $user = User::where('user_id', $input['user_id'])->first();
                $profile = ProfileInformation::where('user_id', $input['user_id'])->first();

                /********* Create lat long from given address ********/
                $address = stripslashes($input['address']); //Address
                // GET JSON RESULTS FROM THIS REQUEST
                $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address));
                $latitude = '';
                $longitude = '';
                $geo = json_decode($geo, true); // Convert the JSON to an array
                if ($geo['status'] == 'OK') {
                    // GET LAT & LONG
                    $latitude = $geo['results'][0]['geometry']['location']['lat'];
                    $longitude = $geo['results'][0]['geometry']['location']['lng'];
                }

                /******** update reason for registering ********/
                $reason = '';
                if (!empty($input['reason_for_registration_edit'])) {
                    $modified_array = array_unique($input['reason_for_registration_edit']);
                    $reason = implode(',', $modified_array);
                }

                /******** CODES FOR PASSWORD UPDATION STARTS HERE *********/
                if (!empty($input['password'])) {
                    $passwordValidator = $this->passwordValidator($input);
                    if ($passwordValidator->fails()) {
                        Session::flash('error', "Please enter a valid password.");
                        return redirect()->back()->withErrors($passwordValidator);
                    } else {
                        $user->update(['password' => bcrypt($input['password'])]);
                    }
                }

                /***** CODES FOR PHONE NUMBER UPDATION STARTS HERE *****/
                if ($profile->phone_number != $input['phone_number']) {
                    $phone_number_validator = $this->phone_number_validator($input);
                    if ($phone_number_validator->fails()) {
                        Session::flash('error', "Please enter a valid phone number.");
                        return redirect()->back()->withErrors($phone_number_validator);
                    } else {
                        $profile->update(['phone_number' => $input['phone_number']]);
                    }
                } else {
                    $profile->update(['phone_number' => $input['phone_number']]);
                }

                $user->update(['name' => $input['name'],
                    'type' => $input['type'],
                    'nick_name' => $input['nick_name'],
                    'status' => $input['status'],
                ]);

                $profile->update([
                    'user_id' => $user->user_id,
                    'address' => $input['address'],
                    'lat' => $latitude,
                    'long' => $longitude,
                    'description' => $input['description'],
                    'age' => $input['age'],
                    'zipcode' => $input['zipcode'],
                    'prefectures' => $input['prefectures'],
                    'municipality' => $input['municipality'],
                    'gender' => $input['gender'],
                    'profession' => $input['profession'],
                    'reason_for_registration' => $reason,
                    'user_introduction' => $input['user_introduction_edit'],
                    'profile_message' => $input['profile_message_edit'],
                    'video_link' => $input['video_link_edit'],
                    'deliverable_area' => $input['deliverable_area_edit'],
                ]);

                /***** CHECK VALIDATION FOR PROFILE PICTURE *****/
                if (!empty($file['image'])) {
                    $profileImageValidator = $this->profileImageValidator($file);

                    if ($profileImageValidator->fails()) {
                        $errors = $profileImageValidator->errors();

                        //WHEN PROFILE PICTURE IS MISSING
                        if ($errors->first('image')) {
                            if (!empty($profile->image)) {
                                $input['image'] = $profile->image;
                            }
                        } else {
                            $profile_image = 'user_picture' . time() . "." . $file['image']->getClientOriginalExtension();
                            $file['image']->move(public_path() . '/uploads/profile/picture/', $profile_image);
                        }
                        //CHECK VALIDATION AGAIN
                        $profileImageValidator = $this->profileImageValidator($input);
                        if ($profileImageValidator->fails()) {
                            return redirect()->back();
                        }
                    } else {
                        $profile_image = 'user_picture' . time() . "." . $file['image']->getClientOriginalExtension();
                        $file['image']->move(public_path() . '/uploads/profile/picture/', $profile_image);
                    }
                    $profile->update(
                        array('image' => $profile_image));
                }

                /***** CHECK VALIDATION FOR COVER PICTURE *****/
                if (!empty($file['cover_image'])) {
                    $coverImageValidator = $this->coverImageValidator($file);
                    if ($coverImageValidator->fails()) {
                        $errors = $coverImageValidator->errors();

                        //WHEN COVER PICTURE IS MISSING
                        if ($errors->first('cover_image')) {
                            if (!empty($profile->cover_image)) {
                                $input['cover_image'] = $profile->cover_image;
                            }
                        } else {
                            $cover_image = 'user_cover_picture' . time() . "." . $file['cover_image']->getClientOriginalExtension();
                            $file['cover_image']->move(public_path() . '/uploads/cover/picture/', $cover_image);
                        }
                        //CHECK VALIDATION AGAIN
                        $coverImageValidator = $this->coverImageValidator($input);
                        if ($coverImageValidator->fails()) {
                            return redirect()->back();
                        }
                    } else {
                        $cover_image = 'user_cover_picture' . time() . "." . $file['cover_image']->getClientOriginalExtension();
                        $file['cover_image']->move(public_path() . '/uploads/cover/picture/', $cover_image);
                    }
                    $profile->update(
                        array('cover_image' => $cover_image));
                }
                Session::flash('success', "User updated successfully");
                return back();
            }
        } else {
            if ($validator->fails() || $profileImageValidator->fails()) {

                $validator->messages()->merge($profileImageValidator->messages());
                Session::flash('error', trans('validation.form_error'));
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                if (!empty($file['image'])) {
                    $profile_image = 'user_picture' . time() . "." . $file['image']->getClientOriginalExtension();
                    $file['image']->move(public_path() . '/uploads/profile/picture/', $profile_image);
                }

                /* Create lat long from given address */
                $address = stripslashes($input['address']); //Address

                // GET JSON RESULTS FROM THIS REQUEST
                $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address));

                $latitude = '';
                $longitude = '';
                $geo = json_decode($geo, true); // Convert the JSON to an array
                if ($geo['status'] == 'OK') {
                    // GET LAT & LONG
                    $latitude = $geo['results'][0]['geometry']['location']['lat'];
                    $longitude = $geo['results'][0]['geometry']['location']['lng'];
                }

                $reason = '';
                if (!empty($input['reason_for_registration_edit'])) {
                    $modified_array = array_unique($input['reason_for_registration_edit']);
                    $reason = implode(',', $modified_array);
                }

                $user = User::create(['user_id' => uniqid(),
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => bcrypt($input['password']),
                    'type' => $input['type'],
                    'nick_name' => $input['nick_name'],
                    'status' => $input['status'],
                ]);
                $profile = ProfileInformation::create([
                    'user_id' => $user->user_id,
                    'phone_number' => $input['phone_number'],
                    'address' => $input['address'],
                    'lat' => $latitude,
                    'long' => $longitude,
                    'description' => $input['description'],
                    'image' => $profile_image,
                    'age' => $input['age'],
                    'created_by' => Auth::User()->user_id,
                    'zipcode' => $input['zipcode'],
                    'prefectures' => $input['prefectures'],
                    'municipality' => $input['municipality'],
                    'gender' => $input['gender'],
                    'profession' => $input['profession'],
                    'reason_for_registration' => $reason,
                    'total_dishes' => 0,
                    'user_introduction' => $input['user_introduction'],
                    'profile_message' => $input['profile_message'],
                    'video_link' => $input['video_link'],
                    'deliverable_area' => $input['deliverable_area'],
                ]);

                if (!empty($file['cover_image'])) {
                    $cover_image = 'user_cover_picture' . time() . "." . $file['cover_image']->getClientOriginalExtension();
                    $file['cover_image']->move(public_path() . '/uploads/cover/picture/', $cover_image);
                    $profile->update(
                        array('cover_image' => $cover_image));
                }
                Session::flash('success', "User registered successfully");
            }
        }
        return back();
    }

    //VALIDATOR FOR CREATE USER
    protected function validator($request)
    {
        return Validator::make($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'type' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password|min:6',
            'address' => 'required|max:255',
            'status' => 'required',
            'nick_name' => 'required',
            'phone_number' => 'required|unique:profile_information',
            'description' => 'required',
            'age' => 'required',
            'zipcode' => 'required|max:7',
            'prefectures' => 'required',
            'municipality' => 'required',
            'gender' => 'required',
            'profession' => 'required',
            'reason_for_registration_edit' => 'required',
        ]);
    }

    protected function userUpdateValidator($request)
    {
        return Validator::make($request, [
            'name' => 'required|max:255',
            'type' => 'required',
            'address' => 'required|max:255',
            'status' => 'required',
            'nick_name' => 'required',
            'phone_number' => 'required',
            'description' => 'required',
            'age' => 'required',
            'zipcode' => 'required|max:7',
            'prefectures' => 'required',
            'municipality' => 'required',
            'gender' => 'required',
            'profession' => 'required',
            'reason_for_registration_edit' => 'required',
            'user_introduction_edit' => 'required',
            'profile_message_edit' => 'required',
        ]);
    }

    protected function passwordValidator($request)
    {
        return Validator::make($request, [
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password|min:6',
        ]);
    }

    //VALIDATOR FOR PROFILE IMAGE
    protected function profileImageValidator($request)
    {
        return Validator::make($request, [
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
    }

    //VALIDATOR FOR COVER IMAGE
    protected function coverImageValidator($request)
    {
        return Validator::make($request, [
            'cover_image' => 'required|mimes:jpeg,png,jpg',
        ]);
    }

    protected function phone_number_validator($request)
    {
        return Validator::make($request, [
            'phone_number' => 'required|unique:profile_information',
        ]);
    }

    public function lists()
    {
        $users = User::whereIn('type', ['1', '2'])->get();
        return view('admin.user-list', ['users' => $users]);
    }

    /* view of user details updation form  */
    public function edit($user_id = null)
    {
        $user = User::where('user_id', $user_id)->first();
        $profile = ProfileInformation::where('user_id', $user_id)->first();
        if (!empty($profile)) {
            if (!empty($profile->reason_for_registration)) {
                $user->reason_for_registration_edit = explode(',', $profile->reason_for_registration);
                $user->reason_for_registration = explode(',', $profile->reason_for_registration);
            }

            if (!empty($profile->cover_image)) {
                $user->cover_image = $profile->cover_image;
            }

            $user->address = $profile->address;
            $user->phone_number = $profile->phone_number;
            $user->description = $profile->description;
            $user->age = $profile->age;
            $user->zipcode = $profile->zipcode;
            $user->prefectures = $profile->prefectures;
            $user->municipality = $profile->municipality;
            $user->gender = $profile->gender;
            $user->profession = $profile->profession;
            $user->image = $profile->image;
            $user->user_introduction_edit = $profile->user_introduction;
            $user->profile_message_edit = $profile->profile_message;
            $user->video_link_edit = $profile->video_link;
            $user->deliverable_area_edit = $profile->deliverable_area;
        }

        return view('admin.create-user', ['user' => $user, 'form_type' => 'edit']);
    }

    /* deleting users and other related informations */
    public function delete($user_id = null)
    {
        $user = User::where('user_id', $user_id)->first();
        if (!empty($user)) {
            $profile = ProfileInformation::where('user_id', $user_id)->first();
            $foodItem = FoodItem::where('offered_by', $user_id)->first();
            $review = Review::where('user_id', $user_id)->first();
            $reviewedBy = Review::where('reviewed_by', $user_id)->first();
            $order = Order::where('ordered_by', $user_id)->first();

            /* delete user */
            if (!empty($user)) {
                $user->delete();
            }

            /* check for all food items created by teh user */
            if (!empty($foodItem)) {
                $foodItemCosting = FoodItemCosting::where('food_item_id', $foodItem->food_item_id)->first();

                /* delete all food items costings related with the food items */
                if (!empty($foodItemCosting)) {
                    $foodItemCosting->delete();
                }
                /* delete all food items created by the user */
                $foodItem->delete();
            }

            /* delete profile details of the user */
            if (!empty($profile)) {
                $profile->delete();
            }

            /* delete reviews of the user */
            if (!empty($review)) {
                $review->delete();
            }

            /* delete all the reviews given by the user */
            if (!empty($reviewedBy)) {
                $reviewedBy->delete();
            }

            /* check for orders i.e. ordered by the user */
            if (!empty($order)) {
                $payment = Payments::where('order_id', $order->order_id)->first();
                /* delete payment details of the user */
                if (!empty($payment)) {
                    $payment->delete();
                }
                /* delete order details of the user */
                $order->delete();
            }

        }
        Session::flash('success', "Deleted successfully");
        return back();
    }
}

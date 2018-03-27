<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\User;
use Auth;
use Session;
use Mail;
use Crypt;
use App\Models\ForgetPasswordToken;

class SigninController extends Controller
{
    public function signIn() {
    	return view('frontend.auth.sign-in');
    }


    public function authentication(Request $request) {
    	$input = $request->input();
      $validator = $this->validator($input);
      $remember_me = '';

      if(isset($input['remember'])) {
        $remember_me = $request->get( '_token' );
      }
    	if($validator->fails()) {
        	return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
          	if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
              if(Auth::User()->type == 1 || Auth::User()->type == 2) {

                $user = User::where('user_id',Auth::User()->user_id);
                $user->update(['remember_token'=>$remember_me]);
                if(Auth::User()->type == 1) {
    	    		    return redirect()->route('profile_details', ['user_id' => Auth::user()->user_id]);
                }
                if(Auth::User()->type == 2) {
                  return redirect('/');
                }
            	}
              else {
                Auth::logout();
                Session::flash('error', "Invalid Credentials.");
              }
              return redirect()->route('sign_in');
          }
        }
       	return redirect()->route('sign_in');
    }

  	protected function validator($request) {
    	return Validator::make($request,[
                                      'email' => 'required',
                                      'password' => 'required'
                                    ]);
  	}

  	public function signOut() {           
        Auth::logout();
        return redirect('/');
    }


    //RETURN VIEW OF FORGET PASSWORD PAGE
    public function forgetPassword() {
      return view('frontend.auth.forget-password');
    }

    //SEND LINK OF FORGET PASSWORD TO THE USER
    public function sendMail(Request $request) {
      $input = $request->input();

        //CHECKING EMAIL IS EMPTY OR NOT
        if($input['email'] == ''){
            Session::flash('error', "Please enter your mail id");
            return redirect()->back();
        }

        //CHECKING EMAIL EXIST OR NOT
        $data = User::where('email',$input['email'])->first();

        if(!empty($data)){
            $email = $input['email'];
            $name = $data['name'];
            $uniqueid = uniqid();
            // Session::put('uniqueid',$uniqueid);

            ForgetPasswordToken::create([
              'email' => $email,
              'token' => $uniqueid
            ]);

            //SEND MAIL
            Mail::send('frontend.email.forget_password_email',['name'=>$name,'name' => 'Share Meshi','email' => $email,'uniqueid' => $uniqueid],function($message) use($email,$name){
                $message->from('vyrazulabs@gmail.com', $name = null)->to($email,$name)->subject('Your password reset link');
            });
            Session::flash('success', "Mail has been sent");
            return redirect()->back();
        }
        else{
            Session::flash('error', "The mail id is not valid");
            return redirect()->back();  
        }
    }

    //RETURN VIEW OF PASSWORD CHANGE PAGE
    public function changeForgetPassword($id,$email) {

      $check_token = ForgetPasswordToken::where('token', $id)->first();

      if(!empty($check_token)){
            $decripted_email = Crypt::decrypt($email);
            $data = User::where('email',$decripted_email)->first();
            if(!empty($data)){
                return view('frontend.auth.new_password',compact('decripted_email'));
            }
        }
        else{
            return view('frontend.auth.not_valid_link');
        }
    }

    //UPDATE PASSWORD
    public function updateForgetPassword(Request $request){
        $input = $request->input();

        $validation = $this->forgetPasswordValidator($input);
        if($validation->fails()){
                return redirect()->back()->withErrors($validation->errors())->withInput();
        }
        $data = User::where('email',Crypt::decrypt($input['email_id']))->first();
        $data->update([
            'password' => bcrypt($input['password'])
        ]);

        $forget_password_token = ForgetPasswordToken::where('email', $data['email'])->first();
        
        $forget_password_token->delete(); 

        Session::flash('success','Password has been changed');
        return redirect('/');
    } 

    //PASSWORD CHANGE VALIDATION 
    protected function forgetPasswordValidator(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6',
            'confirm_password' => 'min:6|same:password'
        ]); 
    }
}

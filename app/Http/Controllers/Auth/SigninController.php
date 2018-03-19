<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\User;
use Auth;
use Session;

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
}

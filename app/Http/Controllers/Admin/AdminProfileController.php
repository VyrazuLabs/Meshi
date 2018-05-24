<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use TranslatedResources;
use Validator;

class AdminProfileController extends Controller
{
    public function edit()
    {
        $user = User::where('user_id', Auth::User()->user_id)->first();
        return view('admin.edit-admin-profile', ['user' => $user, 'form_types' => 'dgdgdfg']);
    }

    public function update(Request $request)
    {
        $input = $request->input();
        $validator = $this->validator($input);

        if (!empty($input['user_id'])) {
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $user = User::where('user_id', $input['user_id'])->first();
                if (!empty($user)) {

                    /******** CODES FOR PASSWORD UPDATION STARTS HERE *********/
                    if (!empty($input['password'])) {
                        $passwordValidator = $this->passwordValidator($input);
                        if ($passwordValidator->fails()) {
                            $password_validation_error = TranslatedResources::translatedData()['password_validation_error'];
                            Session::flash('error', $password_validation_error);
                            return redirect()->back()->withErrors($password_validation_error)->withInput();
                        } else {
                            $user->update(['password' => bcrypt($input['password'])]);
                        }
                    }

                    /******** CODES FOR EMAIL UPDATION STARTS HERE *********/
                    if ($user->email != $input['email']) {
                        $email_validator = $this->updateEmailValidator($input);
                        if ($email_validator->fails()) {
                            $invalid_email_error_msg = TranslatedResources::translatedData()['invalid_email_error_msg'];
                            Session::flash('error', $invalid_email_error_msg);
                            return redirect()->back()->withErrors($email_validator)->withInput();
                        } else {
                            $user->update(['email' => $input['email']]);
                        }
                    } else {
                        $user->update(['email' => $input['email']]);
                    }

                    if (Auth::User()->user_id == $input['user_id'] && $input['status'] == 0) {
                        $inactive_error_msg = TranslatedResources::translatedData()['inactive_error_msg'];
                        Session::flash('error', $inactive_error_msg);
                        return back();
                    } else {
                        $user->update([
                            'name' => $input['name'],
                            'nick_name' => $input['nick_name'],
                        ]);
                    }
                }
            }
        }
        return redirect()->back();
    }

    //VALIDATOR FOR UPDATE ADMIN PROFILE
    protected function validator($request)
    {
        return Validator::make($request, [
            'name' => 'required|max:255',
            'nick_name' => 'required',
        ]);
    }

    protected function passwordValidator($request)
    {
        return Validator::make($request, [
            'password' => 'required|min:6',
        ]);
    }

    // VALIDATOR FOR EMAIL UPDATION
    protected function updateEmailValidator($request)
    {
        return Validator::make($request, [
            'email' => 'required|email|max:255|unique:users',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use TranslatedResources;
use Validator;

class AdminRegistrationController extends Controller
{
    /* view page of creating admin users */
    public function create()
    {
        return view('admin.create-admin', ['form_types' => 'create']);
    }

    /* save user information in db */
    public function save(Request $request)
    {
        $input = $request->input();
        $validator = $this->validator($input);
        $createValidator = $this->createValidator($input);
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
                            'status' => $input['status'],
                        ]);
                    }
                    $updation_success_msg = TranslatedResources::translatedData()['updation_success_msg'];
                    Session::flash('success', $updation_success_msg);
                }
            }
        } else {
            if ($createValidator->fails()) {
                return redirect()->back()->withErrors($createValidator)->withInput();
            } else {
                User::create(['user_id' => uniqid(),
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => bcrypt($input['password']),
                    'type' => 0, //admin
                    'nick_name' => $input['nick_name'],
                    'status' => $input['status'],
                ]);
                $successful_registration = TranslatedResources::translatedData()['successful_registration'];
                Session::flash('success', $successful_registration);
            }
        }

        return redirect()->back();

    }

    //VALIDATOR FOR UPDATE ADMIN PROFILE
    protected function createValidator($request)
    {
        return Validator::make($request, [

            'name' => 'required|max:255',
            'nick_name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'status' => 'required',

        ]);
    }

    //VALIDATOR FOR UPDATE ADMIN PROFILE
    protected function validator($request)
    {
        return Validator::make($request, [
            'name' => 'required|max:255',
            'status' => 'required',
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

    public function lists()
    {
        $users = User::where('type', 0)->get();
        return view('admin.admin-list', ['users' => $users]);
    }

    /* view of admin details updation form  */
    public function edit($user_id = null)
    {
        $user = User::where('user_id', $user_id)->first();
        return view('admin.create-admin', ['user' => $user, 'form_type' => 'edit']);
    }

}

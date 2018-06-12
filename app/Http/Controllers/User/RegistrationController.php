<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProfileInformation;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use TranslatedResources;
use Validator;

class RegistrationController extends Controller
{
    public function register()
    {
        return view('frontend.auth.user-register', ['form_type' => 'create']);
    }

    /* register creator and eater here */
    public function save(Request $request)
    {
        $input = $request->input();
        $file = $request->file();
        $validator = $this->validator($input);
        $userUpdateValidator = $this->userUpdateValidator($input);
        $profileImageValidator = $this->profileImageValidator($file);
        $coverImageValidator = $this->coverImageValidator($file);

        $document = '';

        if (isset($input['deliverable_area'])) {
            $deliverableArea = $input['deliverable_area'];
        } else {
            $deliverableArea = '';
        }

        /* update user */
        if (isset($input['user_id'])) {
            /* check validation for user updation */
            if ($userUpdateValidator->fails()) {
                Session::flash('error', trans('validation.form_error'));
                return redirect()->back()->withInput()->withErrors($userUpdateValidator);
            } else {

                /* get user and their profile details */
                $user = User::where('user_id', $input['user_id'])->first();
                $profile = ProfileInformation::where('user_id', $input['user_id'])->first();

                /********* Create lat long from given address ********/
                $address = stripslashes($input['address']); //Address
                // GET JSON RESULTS FROM THIS REQUEST
                $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&key=AIzaSyBlnFMM7LYrLdByQPJopWVNXq0mJRtqb38');
                $latitude = '';
                $longitude = '';
                $city_name = '';
                $geo = json_decode($geo, true); // Convert the JSON to an array
                if ($geo['status'] == 'OK') {
                    $addressArray = $geo['results'][0]['address_components'];
                    foreach ($addressArray as $key => $value) {
                        $addressTypeArray = $value['types'];
                        if (in_array("locality", $addressTypeArray)) {
                            $city_name = $value['short_name'];
                        }
                    }

                    // GET LAT & LONG
                    $latitude = $geo['results'][0]['geometry']['location']['lat'];
                    $longitude = $geo['results'][0]['geometry']['location']['lng'];
                }

                /******** update reason for registering ********/
                // $reason = '';
                // if (!empty($input['reason_for_registration_edit'])) {
                //     $modified_array = array_unique($input['reason_for_registration_edit']);
                //     $reason = implode(',', $modified_array);
                // }

                /******** CODES FOR PASSWORD UPDATION STARTS HERE *********/
                if (!empty($input['password'])) {
                    $passwordValidator = $this->passwordValidator($input);
                    if ($passwordValidator->fails()) {
                        $password_validation_error = TranslatedResources::translatedData()['password_validation_error'];
                        Session::flash('error', $password_validation_error);
                        return redirect()->back()->withErrors($passwordValidator)->withInput();
                    } else {
                        $user->update(['password' => bcrypt($input['password'])]);
                    }
                }

                /***** CODES FOR PHONE NUMBER UPDATION STARTS HERE *****/
                if ($profile->phone_number != $input['phone_number']) {
                    $phone_number_validator = $this->phone_number_validator($input);
                    if ($phone_number_validator->fails()) {
                        $phone_validation_error = TranslatedResources::translatedData()['phone_validation_error'];
                        Session::flash('error', $phone_validation_error);
                        return redirect()->back()->withErrors($phone_number_validator)->withInput();
                    } else {
                        $profile->update(['phone_number' => $input['phone_number']]);
                    }
                } else {
                    $profile->update(['phone_number' => $input['phone_number']]);
                }

                if (isset($input['video_link'])) {
                    $videoLink = $input['video_link'];
                } else {
                    $videoLink = '';
                }

                $user->update(['name' => $input['name'],
                    'type' => $input['type'],
                    'nick_name' => $input['nick_name'],
                    'status' => 1,
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
                    // 'reason_for_registration' => $reason,
                    'video_link' => $videoLink,
                    'city' => $city_name,
                    'deliverable_area' => $deliverableArea,
                ]);

                /****************crop image functionality starts****************/
                if (isset($input['profile_image']) && !empty($input['profile_image'])) {
                    //get the base64 value in a variable
                    $data = $input['profile_image'];
                    list($t, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);
                    $_img = base64_decode($data);

                    $profile_image = 'user_picture' . time() . ".jpeg";
                    file_put_contents(public_path() . '/uploads/profile/picture/' . $profile_image, $_img);
                }
                if (!empty($profile_image)) {
                    if (!empty($profile->image) && file_exists(public_path() . '/uploads/profile/picture/' . "/" . $profile->image)) {
                        unlink(public_path() . '/uploads/profile/picture/' . "/" . $profile->image);
                    }
                    $profile->update(["image" => $profile_image]);
                }
                /****************crop image functionality ends*********************/

                /***** CHECK VALIDATION FOR PROFILE PICTURE *****/
                // if (!empty($file['image'])) {
                //     $profileImageValidator = $this->profileImageValidator($file);
                //     if ($profileImageValidator->fails()) {
                //         $errors = $profileImageValidator->errors();

                //         //WHEN PROFILE PICTURE IS MISSING
                //         if ($errors->first('image')) {
                //             if (!empty($profile->image)) {
                //                 $input['image'] = $profile->image;
                //             }
                //         } else {
                //             $profile_image = 'user_picture' . time() . "." . $file['image']->getClientOriginalExtension();
                //             $file['image']->move(public_path() . '/uploads/profile/picture/', $profile_image);
                //         }
                //         //CHECK VALIDATION AGAIN
                //         $profileImageValidator = $this->profileImageValidator($input);
                //         if ($profileImageValidator->fails()) {
                //             return redirect()->back();
                //         }
                //     } else {
                //         $profile_image = 'user_picture' . time() . "." . $file['image']->getClientOriginalExtension();
                //         $file['image']->move(public_path() . '/uploads/profile/picture/', $profile_image);
                //     }
                //     $profile->update(
                //         array('image' => $profile_image));
                // }

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
                $updation_success_msg = TranslatedResources::translatedData()['updation_success_msg'];
                Session::flash('success', $updation_success_msg);
                return back();
            }
        } else {
            if ($validator->fails()) {
                // $validator->messages()->merge($profileImageValidator->messages());
                Session::flash('error', trans('validation.form_error'));
                return redirect()->back()->withErrors($validator)->withInput();
            } else {

                // $profile_image = 'user_picture' . time() . "." . $file['image']->getClientOriginalExtension();
                // $file['image']->move(public_path() . '/uploads/profile/picture/', $profile_image);

                /****************crop image functionality starts****************/
                if (isset($input['profile_image']) && !empty($input['profile_image'])) {
                    //get the base64 value in a variable
                    $data = $input['profile_image'];
                    list($t, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);
                    $_img = base64_decode($data);

                    $profile_image = 'user_picture' . time() . ".jpeg";
                    file_put_contents(public_path() . '/uploads/profile/picture/' . $profile_image, $_img);
                }
                /****************crop image functionality ends****************/

                /* Create lat long from given address */
                $address = stripslashes($input['address']); //Address
                // GET JSON RESULTS FROM THIS REQUEST
                $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&key=AIzaSyBlnFMM7LYrLdByQPJopWVNXq0mJRtqb38');

                $latitude = '';
                $longitude = '';
                $city_name = '';
                $geo = json_decode($geo, true); // Convert the JSON to an array
                if ($geo['status'] == 'OK') {
                    $addressArray = $geo['results'][0]['address_components'];
                    foreach ($addressArray as $key => $value) {
                        $addressTypeArray = $value['types'];
                        if (in_array("locality", $addressTypeArray)) {
                            $city_name = $value['short_name'];
                        }
                    }
                    // GET LAT & LONG
                    $latitude = $geo['results'][0]['geometry']['location']['lat'];
                    $longitude = $geo['results'][0]['geometry']['location']['lng'];
                }

                // $reason = '';
                // if (!empty($input['reason_for_registration_edit'])) {
                //     $modified_array = array_unique($input['reason_for_registration_edit']);
                //     $reason = implode(',', $modified_array);
                // }
                // $reason = substr($reason, 0, -1);

                $user = User::create(['user_id' => uniqid(),
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => bcrypt($input['password']),
                    'type' => $input['type'],
                    'nick_name' => $input['nick_name'],
                    'status' => 1,
                ]);
                ProfileInformation::create([
                    'user_id' => $user->user_id,
                    'phone_number' => $input['phone_number'],
                    'address' => $input['address'],
                    'lat' => $latitude,
                    'long' => $longitude,
                    'description' => $input['description'],
                    'image' => $profile_image,
                    'age' => $input['age'],
                    'zipcode' => $input['zipcode'],
                    'prefectures' => $input['prefectures'],
                    'municipality' => $input['municipality'],
                    'gender' => $input['gender'],
                    'profession' => $input['profession'],
                    // 'reason_for_registration' => $reason,
                    'total_dishes' => 0,
                    'video_link' => $input['video_link'],
                    'city' => $city_name,
                    'deliverable_area' => $deliverableArea,
                ]);
                $successful_registration = TranslatedResources::translatedData()['successful_registration'];
                Session::flash('success', $successful_registration);
                if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
                    return redirect('/');
                }
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
            'nick_name' => 'required',
            'phone_number' => 'required|unique:profile_information',
            'description' => 'required',
            'age' => 'required',
            'zipcode' => 'required|max:7',
            'prefectures' => 'required',
            'municipality' => 'required',
            'gender' => 'required',
            'profession' => 'required',
            'profile_image' => 'required',
            // 'reason_for_registration_edit' => 'required',
        ]);
        // ->setAttributeNames(['reason_for_registration_edit' => 'reason_for_registration']);
    }

    protected function userUpdateValidator($request)
    {
        return Validator::make($request, [
            'name' => 'required|max:255',
            'type' => 'required',
            'address' => 'required|max:255',
            'nick_name' => 'required',
            'description' => 'required',
            'phone_number' => 'required',
            'age' => 'required',
            'zipcode' => 'required|max:7',
            'prefectures' => 'required',
            'municipality' => 'required',
            'gender' => 'required',
            'profession' => 'required',
            // 'reason_for_registration_edit' => 'required',
        ]);
        // ->setAttributeNames(['reason_for_registration_edit' => 'reason_for_registration']);
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
            'profile_image' => 'required|mimes:jpeg,png,jpg',
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

}

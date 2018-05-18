<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
use App\Models\Order\Order;
use App\Models\Payment\Payments;
use App\Models\ProfileInformation;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use TranslatedResources;
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
        // echo "<pre>";
        // print_r($input);die;
        $file = $request->file();
        $validator = $this->validator($input);
        $userUpdateValidator = $this->userUpdateValidator($input);
        $profileImageValidator = $this->profileImageValidator($file);
        $coverImageValidator = $this->coverImageValidator($file);
        $document = '';

        /* update user */
        if (isset($input['user_id'])) {
            /* check validation for user updation */
            if ($userUpdateValidator->fails()) {
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
                        return redirect()->back()->withErrors($passwordValidator);
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
                        return redirect()->back()->withErrors($phone_number_validator);
                    } else {
                        $profile->update(['phone_number' => $input['phone_number']]);
                    }
                } else {
                    $profile->update(['phone_number' => $input['phone_number']]);
                }

                if (isset($input['profile_message_edit'])) {
                    $profile_message = $input['profile_message_edit'];
                } else {
                    $profile_message = null;
                }

                if (isset($input['video_link_edit'])) {
                    $video_link = $input['video_link_edit'];
                } else {
                    $video_link = null;
                }

                if (isset($input['deliverable_area_edit'])) {
                    $deliverable_area = $input['deliverable_area_edit'];
                } else {
                    $deliverable_area = null;
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
                    // 'reason_for_registration' => $reason,
                    'profile_message' => $profile_message,
                    'video_link' => $video_link,
                    'deliverable_area' => $deliverable_area,
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
                Session::flash('error', trans('validation.form_error'));
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                // if (!empty($file['image'])) {
                //     $profile_image = 'user_picture' . time() . "." . $file['image']->getClientOriginalExtension();
                //     $file['image']->move(public_path() . '/uploads/profile/picture/', $profile_image);
                // }

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
                $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address));

                $latitude = '';
                $longitude = '';
                $geo = json_decode($geo, true); // Convert the JSON to an array
                if ($geo['status'] == 'OK') {
                    // GET LAT & LONG
                    $latitude = $geo['results'][0]['geometry']['location']['lat'];
                    $longitude = $geo['results'][0]['geometry']['location']['lng'];
                }

                // $reason = '';
                // if (!empty($input['reason_for_registration_edit'])) {
                //     $modified_array = array_unique($input['reason_for_registration_edit']);
                //     $reason = implode(',', $modified_array);
                // }

                if (isset($input['profile_message'])) {
                    $profile_message = $input['profile_message'];
                } else {
                    $profile_message = null;
                }

                if (isset($input['video_link'])) {
                    $video_link = $input['video_link'];
                } else {
                    $video_link = null;
                }

                if (isset($input['deliverable_area'])) {
                    $deliverable_area = $input['deliverable_area'];
                } else {
                    $deliverable_area = null;
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
                    // 'reason_for_registration' => $reason,
                    'total_dishes' => 0,
                    'profile_message' => $profile_message,
                    'video_link' => $video_link,
                    'deliverable_area' => $deliverable_area,
                ]);

                if (!empty($file['cover_image'])) {
                    $cover_image = 'user_cover_picture' . time() . "." . $file['cover_image']->getClientOriginalExtension();
                    $file['cover_image']->move(public_path() . '/uploads/cover/picture/', $cover_image);
                    $profile->update(
                        array('cover_image' => $cover_image));
                }
                $successful_registration = TranslatedResources::translatedData()['successful_registration'];
                Session::flash('success', $successful_registration);
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
            // 'reason_for_registration_edit' => 'required',
            'profile_image' => 'required',
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
            // 'reason_for_registration_edit' => 'required',
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
            $foodItems = FoodItem::where('offered_by', $user_id)->get();
            $orders = Order::where('ordered_by', $user_id)->get();

            /* delete user */
            if (!empty($user)) {
                $user->delete();
            }

            /* delete all food items created by the user */
            if (!empty($foodItems)) {
                foreach ($foodItems as $key => $food) {
                    $food->delete();
                }
            }

            /* delete profile details of the user */
            if (!empty($profile)) {
                $profile->delete();
            }

            /* check for orders i.e. ordered by the user */
            if (!empty($orders)) {
                foreach ($orders as $key => $order) {
                    $payment = Payments::where('order_id', $order->order_id)->first();
                    /* delete payment details of the user */
                    if (!empty($payment)) {
                        $payment->delete();
                    }
                    /* delete order details of the user */
                    $order->delete();
                }
            }

        }
        $deletion_success_msg = TranslatedResources::translatedData()['deletion_success_msg'];
        Session::flash('success', $deletion_success_msg);
        return back();
    }
}

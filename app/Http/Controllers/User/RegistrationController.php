<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use Session;
use App\Models\User;
use App\Models\ProfileInformation;

class RegistrationController extends Controller
{
    public function register() {
    	return view('frontend.auth.user-register',['form_type' => 'create']);
    }

    public function save(Request $request) {
    	$input = $request->input();

    	// echo"<pre>";print_r($input);die;

    	$file = $request->file();
        $validator = $this->validator($input);
        $userUpdateValidator = $this->userUpdateValidator($input);
        $profileImageValidator = $this->profileImageValidator($file);
        
        /* update user */
	    if(isset($input['user_id'])) {

	    	/* check validation for user updation */
	    	if($userUpdateValidator->fails()) {
	        	Session::flash('error', "Please Fill The Form Properly.");
        		return redirect()->back()->withInput()->withErrors($userUpdateValidator);

	        }
	        else {

	        	
	        	/* get user and their profile details */
	        	$user = User::where('user_id',$input['user_id'])->first();
				$profile = ProfileInformation::where('user_id',$input['user_id'])->first();


		        /********* Create lat long from given address ********/
		        $address = stripslashes($input['address']); //Address
		        // GET JSON RESULTS FROM THIS REQUEST
		        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&key=AIzaSyBlnFMM7LYrLdByQPJopWVNXq0mJRtqb38');


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
		        if( !empty($input['reason_for_registration']) ) {
		            foreach ( $input['reason_for_registration'] as $value ) {
		                $reason .= $value.',';
		            }
		        }
		        $reason = substr($reason, 0, -1);





				/******** CODES FOR PASSWORD UPDATION STARTS HERE *********/
		        if(!empty($input['password']) ) {
		          	$passwordValidator = $this->passwordValidator($input);
		          	if($passwordValidator->fails()) {
		            	Session::flash('error', "Please enter a valid password.");
		            	return redirect()->back()->withErrors($passwordValidator)->withInput();
		          	}
		          	else {
		            	$user->update([ 'password' => bcrypt($input['password'])]);
		          	}
		        }

		        /***** CODES FOR PHONE NUMBER UPDATION STARTS HERE *****/
		        if($profile->phone_number != $input['phone_number']) {
		          	$phone_number_validator = $this->phone_number_validator($input);
		          	if($phone_number_validator->fails()) {
		            	Session::flash('error', "Please enter a valid phone number.");
		            	return redirect()->back()->withErrors($phone_number_validator)->withInput();
		          	}
		          	else {
		            	$profile->update([ 'phone_number' => $input['phone_number']]);
		          	}
		        }
		        else {
		          $profile->update([ 'phone_number' => $input['phone_number']]);
		        }

		        if(isset($input['video_link'])) {
		        	$videoLink = $input['video_link'];
		        }
		        else {
		        	$videoLink = '';
		        }


		    	$user->update([	'name' => $input['name'],
					        	'type' => $input['type'],
					        	'nick_name' => $input['nick_name'],
					        	'status' => 1
							 ]);

		        $profile->update([
									'user_id'  => $user->user_id,
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
						            'job' => $input['job'],
						            'video_link' => $videoLink
					          	]);

		     //    if ($request->hasFile('cover_image')) {
		     //        	// echo"bb";die;

	    		// 	$coverImageFile = $request->file('cover_image');
		     //    	$coverImageValidator = $this->coverImageValidator($coverImageFile);
		     //    	if( $coverImageValidator->fails()) {
		     //          return redirect()->back()->withErrors($coverImageValidator)->withInput();
		     //        }
		     //        else {
		     //        	$coverImage = 'user_picture'.time().".".$file['image']->getClientOriginalExtension();
		     //        	$file['cover_image']->move(public_path().'/uploads/profile/cover-image/', $coverImage);
		     //        	$profile->update(
       //                      array('cover_image' => $coverImage));
		     //        }
	    		// }

 
		        /***** CHECK VALIDATION FOR PROFILE PICTURE *****/
		        $profileImageValidator = $this->profileImageValidator($file);
		        if( $profileImageValidator->fails()) {
		            $errors = $profileImageValidator->errors();

		            //WHEN PROFILE PICTURE IS MISSING
		            if($errors->first('image')) {
		              if( !empty($profile->image) ) {
		                $input['image'] = $profile->image;
		              }
		            }
		            else {
		              $profile_image = 'user_picture'.time().".".$file['image']->getClientOriginalExtension();
		              $file['image']->move(public_path().'/uploads/profile/picture/', $profile_image);
		            }
		            //CHECK VALIDATION AGAIN
		            $profileImageValidator = $this->profileImageValidator($input);
		            if( $profileImageValidator->fails()) {
		              return redirect()->back();
		            }
		        }
		        else {
		            $profile_image = 'user_picture'.time().".".$file['image']->getClientOriginalExtension();
		            $file['image']->move(public_path().'/uploads/profile/picture/', $profile_image);
		        }
		        $profile->update(
                            array('image' => $profile_image));


		        



		    	Session::flash('success', "User updated successfully");
				return back();
		    }
	    }
	    else {
	    	if($validator->fails() || $profileImageValidator->fails()) {
	        	$validator->messages()->merge($profileImageValidator->messages());
	        	Session::flash('error', "Please Fill The Form Properly.");
	        	return redirect()->back()->withErrors($validator)->withInput();
	        }
	        else {

	        	$profile_image = 'user_picture'.time().".".$file['image']->getClientOriginalExtension();
		        $file['image']->move(public_path().'/uploads/profile/picture/', $profile_image);

		        /* Create lat long from given address */
	            $address = stripslashes($input['address']); //Address
	                
	            // GET JSON RESULTS FROM THIS REQUEST
	            $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address));

	            $latitude = '';
	            $longitude = '';
	            $geo = json_decode($geo, true); // Convert the JSON to an array
	            if ($geo['status'] == 'OK') {

	                // GET LAT & LONG
	                $latitude = $geo['results'][0]['geometry']['location']['lat'];
	                $longitude = $geo['results'][0]['geometry']['location']['lng'];
	            }

	            $reason = '';
		        if( !empty($input['reason_for_registration']) ) {
		            foreach ( $input['reason_for_registration'] as $value ) {
		                $reason .= $value.',';
		            }
		        }
		        $reason = substr($reason, 0, -1);


		        $user = User::create([	'user_id' => uniqid(),
				        				'name' => $input['name'],
							        	'email' => $input['email'],
							        	'password' => bcrypt($input['password']),
							        	'type' => $input['type'],
							        	'nick_name' => $input['nick_name'],
							        	'status' => 1
							        ]);
		        ProfileInformation::create([
			        							'user_id'  => $user->user_id,
									            'phone_number'  => $input['phone_number'],
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
									            'reason_for_registration' => $reason,
									            'job' => $input['job'],
									            'total_dishes' => 0,
									            'video_link' => $input['video_link'],

								          	]);
	        	Session::flash('success', "User registered successfully");

	        	if (Auth::attempt(['email'=>$input['email'],'password'=>$input['password']])) {
                        return redirect('/');
                }
	        }
	    }
		return back();
    }


    //VALIDATOR FOR CREATE USER
  	protected function validator($request) {
    	return Validator::make($request,[
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
                                      'reason_for_registration' => 'required',
                                      'job' => 'required',
                                    ]);
  	}

  	protected function userUpdateValidator($request) {
    	return Validator::make($request,[
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
                                      'reason_for_registration' => 'required',
                                      'job' => 'required',
                                    ]);
  	}

  	protected function passwordValidator($request) {
    	return Validator::make($request,[
                                      'password' => 'required|min:6',
                                      'password_confirmation' => 'required|same:password|min:6'
                                    ]);
  	}

  	//VALIDATOR FOR PROFILE IMAGE
  	protected function profileImageValidator($request){
    	return Validator::make($request,[
                                      'image' => 'required|mimes:jpeg,png,jpg',
                                    ]);
  	}

  	//VALIDATOR FOR COVER IMAGE
  	protected function coverImageValidator($request){
    	return Validator::make($request,[
                                      'cover_image' => 'required|mimes:jpeg,png,jpg',
                                    ]);
  	}

  	protected function phone_number_validator($request) {
    	return Validator::make($request,[
                                      'phone_number' => 'required|unique:profile_information'
                                    ]);
  	}




}

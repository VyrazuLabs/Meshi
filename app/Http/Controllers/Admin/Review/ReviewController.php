<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use App\Models\Review\Review;

class ReviewController extends Controller
{
    // public function create()
    // {
    //     $user_id = User::where('type', 1)->pluck('name', 'user_id');
    //     $reviewed_by = User::where('type', 2)->pluck('name', 'user_id');
    //     return view('review.create-review', ['user_id' => $user_id, 'reviewed_by' => $reviewed_by, 'form_type' => 'create']);
    // }

    // public function save(Request $request)
    // {
    //     $input = $request->input();
    //     $validator = $this->validator($input);

    //     /* check validation */
    //     if ($validator->fails()) {
    //         Session::flash('error', trans('validation.form_error'));
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     } else {
    //         /* create review */
    //         Review::create(['review_id' => uniqid(),
    //             'user_id' => $input['user_id'],
    //             'reviewed_by' => $input['reviewed_by'],
    //             'review' => $input['review'],
    //         ]);
    //         Session::flash('success', "Created successfully.");
    //         return back();
    //     }
    // }

    // //VALIDATOR FOR CREATE REVIEW
    // protected function validator($request)
    // {
    //     return Validator::make($request, [
    //         'review' => 'required',
    //         'user_id' => 'required',
    //         'reviewed_by' => 'required',
    //     ]);
    // }

    // public function lists()
    // {
    //     $reviews = Review::get();

    //     foreach ($reviews as $key => $review) {
    //         $user = User::where('user_id', $review->user_id)->first();
    //         $review->user = $user->name;

    //         $profile = ProfileInformation::where('user_id', $review->reviewed_by)->first();
    //         if (!empty($profile->image)) {
    //             $review->reviewed_by_image = $profile->image;
    //         }
    //     }
    //     return view('review.list-review', ['reviews' => $reviews]);
    // }

    // public function view($review_id = null)
    // {
    //     $user_id = User::where('type', 1)->pluck('name', 'user_id');
    //     $review = Review::where('review_id', $review_id)->first();
    //     $reviewed_by = User::where('type', 2)->pluck('name', 'user_id');

    //     return view('review.create-review', ['review' => $review, 'user_id' => $user_id, 'reviewed_by' => $reviewed_by, 'form_type' => 'edit']);
    // }
}

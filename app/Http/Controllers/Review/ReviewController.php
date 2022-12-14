<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Review\CreatorReview;
use App\Models\Review\EaterReview;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class ReviewController extends Controller
{
    /**
     * [store eater reviews]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function eaterReview(Request $request)
    {
        $input = $request->input();
        $eaterReviewValidator = $this->eaterReviewValidator($input);
        $reviews = [];
        $order = Order::where('order_id', $input['order_id'])->first();

        if ($eaterReviewValidator->fails()) {
            $reviews = [
                "success" => 0,
                "error" => $eaterReviewValidator->errors(),
            ];
        } else {
            if (!empty($order)) {
                /* store reviews in DB */
                EaterReview::create([
                    'review_id' => uniqid(),
                    'reviewed_by' => Auth::User()->user_id,
                    'food_item_id' => $order->food_item_id,
                    'order_id' => $input['order_id'],
                    'quality_ratings' => $input['quality_ratings'],
                    'delivery_ratings' => $input['delivery_ratings'],
                    'communication_ratings' => $input['communication_ratings'],
                    'review_description' => $input['review_description']]);

                $reviews = [
                    "success" => 1,
                    "error" => 0,
                ];
            } else {
                $reviews = [
                    "success" => 0,
                    "error" => 1,
                ];
            }
        }
        echo json_encode($reviews);
    }

    /**
     * [store creator reviews]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function creatorReview(Request $request)
    {
        $input = $request->input();
        $creatorReviewValidator = $this->creatorReviewValidator($input);
        $reviews = [];
        $order = Order::where('order_id', $input['order_id'])->first();

        if ($creatorReviewValidator->fails()) {
            $reviews = [
                "success" => 0,
                "error" => $creatorReviewValidator->errors(),
            ];
        } else {
            if (!empty($order)) {
                /* store reviews in DB */
                CreatorReview::create([
                    'review_id' => uniqid(),
                    'reviewed_by' => Auth::User()->user_id,
                    'food_item_id' => $order->food_item_id,
                    'order_id' => $input['order_id'],
                    'communication_ratings' => $input['communication_ratings'],
                    'communication_description' => $input['communication_description']]);
                $reviews = [
                    "success" => 1,
                    "error" => 0,
                ];
            } else {
                $reviews = [
                    "success" => 0,
                    "error" => 1,
                ];
            }
        }
        echo json_encode($reviews);
    }

    /**
     * [validation rules for creator reviews]
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    protected function creatorReviewValidator($request)
    {
        return Validator::make($request, [
            'communication_ratings' => 'required',
            'communication_description' => 'required',
        ]);
    }

    /**
     * [validation rules for eater reviews]
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    protected function eaterReviewValidator($request)
    {
        return Validator::make($request, [
            'quality_ratings' => 'required',
            'delivery_ratings' => 'required',
            'communication_ratings' => 'required',
            'review_description' => 'required',
        ]);
    }

    public function viewCreatorReview(Request $request)
    {
        $input = Input::all();
        $creator_review = [];
        $creatorReview = CreatorReview::where('order_id', $input['order_id'])->first();

        if (!empty($creatorReview)) {
            $creator_review['review'] = $creatorReview->communication_description;

            $user = User::where('user_id', $creatorReview->reviewed_by)->first();
            if (!empty($user)) {
                $creator_review['name'] = $user->name;
            }
        }
        echo json_encode($creator_review);
    }

    public function viewEaterReview(Request $request)
    {
        $input = Input::all();
        $eater_review = [];
        $eaterReview = EaterReview::where('order_id', $input['order_id'])->first();
        if (!empty($eaterReview)) {
            $eater_review['review'] = $eaterReview->review_description;
            $user = User::where('user_id', $eaterReview->reviewed_by)->first();
            if (!empty($user)) {
                $eater_review['name'] = $user->name;
            }
        }
        echo json_encode($eater_review);
    }

}

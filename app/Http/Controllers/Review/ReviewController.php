<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Review\CreatorReview;
use App\Models\Review\Reviews;
use Auth;
use Illuminate\Http\Request;
use Validator;

class ReviewController extends Controller
{
    public function eaterReview(Request $request)
    {
        $input = $request->input();
        $reviews = [];
        $order = Order::where('order_id', $input['order_id'])->first();

        if (!empty($order)) {
            /* store reviews in DB */
            $reviews = Reviews::create([
                'review_id' => uniqid(),
                'reviewed_by' => Auth::User()->user_id,
                'food_item_id' => $order->food_item_id,
                'order_id' => $input['order_id'],
                'quality_ratings' => $input['quality_ratings'],
                'quality_description' => $input['quality_description'],
                'delivery_ratings' => $input['delivery_ratings'],
                'delivery_description' => $input['delivery_description'],
                'communication_ratings' => $input['communication_ratings'],
                'communication_description' => $input['communication_description']]);
        }
        echo json_encode($reviews);
    }

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

}

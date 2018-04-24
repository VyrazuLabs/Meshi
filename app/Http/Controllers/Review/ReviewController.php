<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Review\Reviews;
use Auth;
use Illuminate\Http\Request;

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
}

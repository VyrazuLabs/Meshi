<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Review\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function eaterReview(Request $request)
    {
        $input = $request->input();

        // print_r($input);die;
    }
}

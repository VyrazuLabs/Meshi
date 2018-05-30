<?php

namespace App\Console\Commands;

use App\Models\Food\FoodItem;
use App\Models\Order\Order;
use App\Models\User;
use Illuminate\Console\Command;
use Mail;

class ReviewNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReviewNotification:sendReviewReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to eater/creator after 3hours of delivery time.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $jst_time_zone = date_default_timezone_set('Asia/Tokyo');
        $jst_current_date = date("Y-m-d");

        $orders = Order::whereDate('date_of_delivery', $jst_current_date)->get();
        if (count($orders) > 0) {
            foreach ($orders as $key => $order) {
                $delivery_time = strtotime(date($order->time));
                $time_limit = date("H:i", strtotime('+3 hours', $delivery_time));
                $jst_current_date_time = strtotime(date("H:i"));

                $order_details = [];
                $order_details['order_number'] = $order->order_number;
                /* get eater details */
                $eater = User::where('user_id', $order->ordered_by)->first();
                if (!empty($eater)) {
                    $eater_email = $eater->email;
                    $order_details['eater_nickname'] = $eater->nick_name;
                }

                /* get creator details */
                $fooditem = FoodItem::where('food_item_id', $order->food_item_id)->first();
                if (!empty($fooditem)) {
                    $creator = User::where('user_id', $fooditem->offered_by)->first();
                    if (!empty($creator)) {
                        $creator_email = $creator->email;
                        $order_details['creator_nickname'] = $creator->nick_name;
                    }
                }

                if ($jst_current_date_time > $time_limit) {
                    if ($order->reviewed_by_eater == 0 && $order->eater_review_notification == 0) {
                        Mail::send('frontend.email.eater-review-reminder-mail', ['order' => $order_details], function ($message) use ($eater_email) {
                            $message->to($eater_email)->subject('シェアメシ');
                        });
                        $order->update(['eater_review_notification' => 1]);
                    }
                    if ($order->reviewed_by_creator == 0 && $order->creator_review_notification == 0) {
                        Mail::send('frontend.email.creator-review-reminder-mail', ['order' => $order_details], function ($message) use ($creator_email) {
                            $message->to($creator_email)->subject('シェアメシ');
                        });

                        $order->update(['creator_review_notification' => 1]);
                    }
                }
            }
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /* RUN THE TASK DAILY */
        $schedule->command('ReviewNotification:sendReviewReminder')->hourly();
    }
}

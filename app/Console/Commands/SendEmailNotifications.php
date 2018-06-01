<?php

namespace App\Console\Commands;

use App\Models\Food\FoodItem;
use App\Models\Order\Order;
use App\Models\ProfileInformation;
use App\Models\User;
use Illuminate\Console\Command;
use Mail;

class SendEmailNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'EmailNotification:sendMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to eater/creator day before delivery date.';

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
        $tomorrow = date('Y-m-d', strtotime($jst_current_date . ' +1 day'));
        $order = Order::whereDate('date_of_delivery', $tomorrow)->where('email_notification', 0)->get();

        if (!empty($order)) {
            foreach ($order as $key => $value) {
                $fooditem = FoodItem::where('food_item_id', $value->food_item_id)->first();
                $order_details = [];
                if (!empty($fooditem)) {
                    $order_details['item_name'] = $fooditem->item_name;
                    $order_details['order_number'] = $value->order_number;
                    $order_details['date_of_delivery'] = $value->date_of_delivery;
                    $order_details['time'] = $value->time;
                    $order_details['food_item_id'] = $fooditem->food_item_id;
                    $order_details['quantity'] = $value->quantity;
                    $order_details['price'] = $value->total_price;

                    /* send mail to eater */
                    $eater = User::where('user_id', $value->ordered_by)->first();
                    if (!empty($eater)) {
                        $profileDetails = ProfileInformation::where('user_id', $value->ordered_by)->first();
                        if (!empty($profileDetails)) {
                            $order_details['address'] = $profileDetails->address;
                            $order_details['phone_number'] = $profileDetails->phone_number;
                            $order_details['description'] = $profileDetails->description;
                        }
                        $eaterEmail = $eater->email;
                        $order_details['eater_nick_name'] = $eater->nick_name;
                        if ($value->email_notification == 0) {
                            Mail::send('frontend.email.eater-delivery-reminder-mail', ['order_details' => $order_details], function ($message) use ($eaterEmail) {
                                $message->to($eaterEmail)->subject('シェアメシ');
                            });
                        }
                    }
                    /* send mail to creator */
                    $creator = User::where('user_id', $fooditem->offered_by)->first();
                    if (!empty($creator)) {
                        $profileDetails = ProfileInformation::where('user_id', $fooditem->offered_by)->first();
                        if (!empty($profileDetails)) {
                            $order_details['address'] = $profileDetails->address;
                            $order_details['phone_number'] = $profileDetails->phone_number;
                            $order_details['description'] = $profileDetails->description;
                        }
                        $creatorEmail = $creator->email;
                        $order_details['creator_nick_name'] = $creator->nick_name;
                        if ($value->email_notification == 0) {
                            Mail::send('frontend.email.creator-delivery-reminder-mail', ['order_details' => $order_details], function ($message) use ($creatorEmail) {
                                $message->to($creatorEmail)->subject('シェアメシ');
                            });
                        }
                    }
                    $value->update(['email_notification' => 1]);
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
        $schedule->command('EmailNotification:sendMail')->everyMinute();
    }
}

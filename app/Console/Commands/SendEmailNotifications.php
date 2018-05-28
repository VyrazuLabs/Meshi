<?php

namespace App\Console\Commands;

use App\Models\Food\FoodItem;
use App\Models\Order\Order;
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
        $order = Order::whereDate('date_of_delivery', $tomorrow)->get();

        if (!empty($order)) {
            foreach ($order as $key => $value) {
                $fooditem = FoodItem::where('food_item_id', $value->food_item_id)->first();
                if (!empty($fooditem)) {
                    $value->item_name = $fooditem->item_name;
                    $value->food_item_id = $fooditem->food_item_id;
                    /* send mail to eater */
                    $eater = User::where('user_id', $value->ordered_by)->first();
                    if (!empty($eater)) {
                        $eaterEmail = $eater->email;
                        $value->eater_nick_name = $eater->nick_name;
                        Mail::send('frontend.email.eater-delivery-reminder-mail', ['order_details' => $value], function ($message) use ($eaterEmail) {
                            $message->to($eaterEmail)->subject('シェアメシ');
                        });
                    }
                    /* send mail to creator */
                    $creator = User::where('user_id', $fooditem->offered_by)->first();
                    if (!empty($creator)) {
                        $creatorEmail = $creator->email;
                        $value->creator_nick_name = $eater->nick_name;
                        Mail::send('frontend.email.creator-delivery-reminder-mail', ['order_details' => $value], function ($message) use ($creatorEmail) {
                            $message->to($creatorEmail)->subject('シェアメシ');
                        });
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
        $schedule->command('EmailNotification:sendMail')->daily();
    }
}

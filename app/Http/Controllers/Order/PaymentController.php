<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
use App\Models\Order\Cart;
use App\Models\Order\Order;
use App\Models\Payment\Payments;
use App\Models\ProfileInformation;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use PayPal\Api\Amount;

/** All Paypal Details class **/
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use TranslatedResources;
use URL;

class PaymentController extends Controller
{
    private $_api_context;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //parent::__construct();

        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal($cart_id = null)
    {
        error_reporting(E_ALL);
        $cart = Cart::where('cart_id', $cart_id)->first();
        if (!empty($cart)) {
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
            $item_1 = new Item();
            $item_1->setName('Item 1') /** item name **/
                ->setCurrency('JPY')
                ->setQuantity(1)
                ->setPrice($cart['price']); /** unit price **/
            $item_list = new ItemList();
            $item_list->setItems(array($item_1));
            $amount = new Amount();
            $amount->setCurrency('JPY')
                ->setTotal($cart['price']);
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Your transaction description');
            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('paypal_status')) /** Specify return URL **/
                ->setCancelUrl(URL::route('paypal_status'));
            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
            try {
                /** add amount to session */
                Session::put('paypal_payment_amount', $cart['price']);

                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    \Session::put('error', 'Connection timeout');
                    return Redirect::route('food_details', [$cart['food_item_id']]);
                    /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                    /** $err_data = json_decode($ex->getData(), true); **/
                    /** exit; **/
                } else {
                    \Session::put('error', 'Some error occur, sorry for inconvenient');
                    return Redirect::route('food_details', [$cart['food_item_id']]);
                    /** die('Some error occur, sorry for inconvenient'); **/
                }
            }
            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }
            /** add food item ID to session **/
            Session::put('food_item_ID', $cart['food_item_id']);

            /** add payment ID to session **/
            Session::put('paypal_payment_id', $payment->getId());

            Session::put('purchased_cart_id', $cart_id);
            if (isset($redirect_url)) {
                /** redirect to paypal **/
                return Redirect::away($redirect_url);
            }
        }
        // \Session::put('error','Unknown error occurred');
        return Redirect::route('food_details', [$cart['food_item_id']]);

    }

    public function getPaymentStatus()
    {
        /** Get the food item ID before session clear **/
        $foodItemId = Session::get('food_item_ID');

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        $cart_id = Session::get('purchased_cart_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            // \Session::put('error','Payment failed');
            // return Redirect::route('addmoney.paywithpaypal');
            $payment_failed_msg = TranslatedResources::translatedData()['payment_failed_msg'];
            Session::flash('error', $payment_failed_msg);
            return redirect('food/details/' . $foodItemId);

        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {

            /** get paypal_payment_amount from session */
            $amount = '';
            if (Session::has('paypal_payment_amount')) {
                $amount = Session::get('paypal_payment_amount');
                Session::forget('paypal_payment_amount');
            }

            /** Here Write your database logic like that insert record or value in database if you want **/
            if (!empty($amount)) {
                $cart = Cart::where('cart_id', $cart_id)->first();
                $food = FoodItem::where('food_item_id', $foodItemId)->first();

                //CREATE RANDOM NUMBER
                $random_num = strtoupper(uniqid(mt_rand(1, 999)));
                $order = Order::create([
                    'food_item_id' => $foodItemId,
                    'order_id' => uniqid(),
                    'order_number' => 'OD' . $random_num,
                    'ordered_by' => Auth::User()->user_id,
                    'date_of_delivery' => $food->date_of_availability,
                    'total_price' => $amount,
                    'time' => $cart->time,
                    'quantity' => $cart->quantity,
                    'status' => 1, //paid
                ]);

                $available_stock = $food->quantity - $cart->quantity;
                $food->update(['quantity' => $available_stock]);

                Payments::create(['order_id' => $order->order_id,
                    'amount' => $order->total_price,
                    'payment_date' => date('Y-m-d H:i:s'),
                ]);

                $cart->delete();
            }
            $payment_success_msg = TranslatedResources::translatedData()['payment_success_msg'];

            \Session::put('success', 'Payment success');
            Session::flash('success', $payment_success_msg);

            //****** CODE FOR MAIL SENDING ******//
            $buyerUserId = Auth::User()->user_id;
            $buyer = User::where('user_id', $buyerUserId)->first();
            $buyerProfile = ProfileInformation::where('user_id', $buyerUserId)->first();
            $orderNumber = $order->order_number;
            $price = $order->total_price;
            $bookingDate = $order->date_of_order;
            $creator = User::where('user_id', $food->offered_by)->first();

            // $email = 'purchased@sharemeshi.com'; //this email is for purchase section
            $email = $creator->email; //this email is for testing purpose
            Mail::send('frontend.order.puchase-item-mail', [
                'orderNumber' => $orderNumber, 'order' => $order, 'buyer' => $buyer, 'buyerProfile' => $buyerProfile,
                'creator' => $creator, 'food' => $food, 'price' => $price, 'bookingDate' => $bookingDate,
            ], function ($message) use ($email) {
                $message->to($email)
                    ->bcc(env('MAIL_PURCHASED_NOTIFICATION', 'purchased@sharemeshi.com'))
                    ->subject('【シェアメシ】新規のご注文のお知らせ');
            });

            $email = $buyer->email; //this email is for purchase section
            //$email = 'contact@sharemeshi.com'; //this email is for testing purpose
            Mail::send('frontend.order.payment-succesful', [
                'orderNumber' => $orderNumber, 'order' => $order, 'buyer' => $buyer, 'creator' => $creator,
                'food' => $food, 'price' => $price, 'bookingDate' => $bookingDate,
            ], function ($message) use ($email) {
                $message->to($email)
                    ->subject('【シェアメシ】ご購入いただきありがとうございます');
            });

            return redirect('/');
        }
        $payment_failed_msg = TranslatedResources::translatedData()['payment_failed_msg'];
        Session::flash('error', $payment_failed_msg);
        return redirect('food/details/' . $foodItemId);
    }

}

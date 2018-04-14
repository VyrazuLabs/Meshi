<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;
use App\Models\Order\Cart;
use App\Models\Order\Order;
use App\Models\Payment\Payments;
use Session;
use Auth;

/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use URL;
use Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use Mail;


class PaymentController extends Controller
{
    // public function makePayment(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'card_no' => 'required',
    //         'ccExpiryMonth' => 'required',
    //         'ccExpiryYear' => 'required',
    //         'cvvNumber' => 'required',
    //         'amount' => 'required',
    //     ]);
        
    //     $input = $request->all();
    //     if ($validator->passes()) {
    //     	$cart = Cart::where('food_item_id',$input['food_item_id'])->first();
    //         if(!empty($cart)) {   
	   //          $input = array_except($input,array('_token'));

	   //          //get stripe secret key from env file
	   //          $stripe_secret_key = env('STRIPE_SECRET');
	   //          $stripe = Stripe::make($stripe_secret_key);

	   //          try {
	   //              $token = $stripe->tokens()->create([
	   //                  'card' => [
	   //                      'number'    => $request->get('card_no'),
	   //                      'exp_month' => $request->get('ccExpiryMonth'),
	   //                      'exp_year'  => $request->get('ccExpiryYear'),
	   //                      'cvc'       => $request->get('cvvNumber'),
	   //                  ],
	   //              ]);

	   //              if (!isset($token['id'])) {
	   //                  // \Session::put('error','The Stripe Token was not generated correctly');
	   //                  $result = [
				//                     "success" => 0,
				//                     "error" => 1,
				//                     "msg" => 'The Stripe Token was not generated correctly'
				//                 ];
	   //                  /**********failed***********/
    //   					echo json_encode($result);
	                    
	   //              }
	   //              $charge = $stripe->charges()->create([
	   //                  'card' => $token['id'],
	   //                  'currency' => 'USD',
	   //                  'amount'   => $cart->price,
	   //                  'description' => 'Add in wallet',
	   //              ]);
	   //              if($charge['status'] == 'succeeded') {
	   //                  /** Here Write your database logic like that insert record or value in database if you want **/
	   //                  //CREATE RANDOM NUMBER
	   //          		$random_num = strtoupper(uniqid(mt_rand(1,999))); 
    //                		$order = Order::create([    
    //                						   'food_item_id' => $input['food_item_id'],
				// 				           'order_id' => uniqid(),
				// 				           'order_number' => 'OD'.$random_num,
				// 				           'ordered_by' => Auth::User()->user_id,
				// 				           'date_of_order' => date("Y-m-d"),
				// 				           'total_price' => $cart->price,
				// 				           'time' => $cart->time,
				// 				           'status' => 1 //paid
				// 				       ]);

    //                		Payments::create([  'order_id' => $order->order_id,
				//     					   'amount' => $order->total_price,
				// 				           'payment_date' => $order->date_of_order
				// 				        ]);

	   //                  // \Session::put('success','Money add successfully in wallet');
	   //                  $result = [
				//                     "success" => 1,
				//                     "error" => 0,
				//                     "msg" => 'Money add successfully in wallet'
				//                 ];

	   //                  /********successful***********/
    //   					echo json_encode($result);
	                       
	   //              } 
	   //              else {
	   //                  // \Session::put('error','Money not add in wallet!!');
	   //                  $result = [
				//                     "success" => 0,
				//                     "error" => 1,
				//                     "msg" => 'Money not add in wallet!!'
				//                 ];
    //   					echo json_encode($result);
	   //              }
	   //          } 
	   //          catch (Exception $e) {
	   //              // \Session::put('error',$e->getMessage());
	   //              $result = [
				//                     "success" => 0,
				//                     "error" => 1,
				//                     "msg" => $e->getMessage()
				//                 ];
    //   				echo json_encode($result);
	                
	   //              /*************failed*******************/
	   //              // return redirect()->route('addmoney.paywithstripe');
	   //          } 
	   //          catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
	   //              /*************failed*******************/
	   //              // \Session::put('error',$e->getMessage());
	   //              $result = [
				//                     "success" => 0,
				//                     "error" => 1,
				//                     "msg" => $e->getMessage()
				//                 ];
    //   				echo json_encode($result);
	                

	   //              // return redirect()->route('addmoney.paywithstripe');
	   //          } 
	   //          catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
	   //              // \Session::put('error',$e->getMessage());
	   //              $result = [
				//                     "success" => 0,
				//                     "error" => 1,
				//                     "msg" => $e->getMessage()
				//                 ];
    //   				echo json_encode($result);
	                
	   //              /*************failed*******************/
	   //              // return redirect()->route('addmoney.paywithstripe');
	   //          }
	   //      }
	   //      else {
    //     		// \Session::put('error','Invalid Order!!');
    //     		$result = [
		  //                   "success" => 0,
		  //                   "error" => 1,
		  //                   "msg" => 'Invalid Order!!'
		  //               ];
    //   			echo json_encode($result);
    //     		/***********failed***************/

	   //      }
    //     }
    //     // \Session::put('error','All fields are required!!');
    //     /***********failed***************/
    //     // return redirect('/');
    //    //  $result = [
    //    //              "success" => 0,
    //    //              "error" => 1,
    //    //              "msg" => 'All fields are required!!'
    //    //          ];
    //   	// echo json_encode($result);
	    
    // } 

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
    	$card = Cart::where('cart_id',$cart_id)->first();
        if(!empty($card)) {   
	        $payer = new Payer();
	        $payer->setPaymentMethod('paypal');
	        $item_1 = new Item();
	        $item_1->setName('Item 1') /** item name **/
	            ->setCurrency('JPY')
	            ->setQuantity(1)
	            ->setPrice($card['price']); /** unit price **/
	        $item_list = new ItemList();
	        $item_list->setItems(array($item_1));
	        $amount = new Amount();
	        $amount->setCurrency('JPY')
	            ->setTotal($card['price']);
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
	        	Session::put('paypal_payment_amount', $card['price']);

	            $payment->create($this->_api_context);
	        } 
	        catch (\PayPal\Exception\PPConnectionException $ex) {
	            if (\Config::get('app.debug')) {
	                \Session::put('error','Connection timeout');
	                return Redirect::route('food_details',[$card['food_item_id']]);


	                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
	                /** $err_data = json_decode($ex->getData(), true); **/
	                /** exit; **/
	            } else {
	                \Session::put('error','Some error occur, sorry for inconvenient');
	                return Redirect::route('food_details',[$card['food_item_id']]);
	                // return Redirect::route('addmoney.paywithpaypal');
	                /** die('Some error occur, sorry for inconvenient'); **/
	            }
	        }
	        foreach($payment->getLinks() as $link) {
	            if($link->getRel() == 'approval_url') {
	                $redirect_url = $link->getHref();
	                break;
	            }
	        }
	        /** add food item ID to session **/
	        Session::put('food_item_ID', $card['food_item_id']);

	        /** add payment ID to session **/
	        Session::put('paypal_payment_id', $payment->getId());
	        if(isset($redirect_url)) {
	            /** redirect to paypal **/
	            return Redirect::away($redirect_url);
	        }
    	}
        // \Session::put('error','Unknown error occurred');
        // return Redirect::route('addmoney.paywithpaypal');
	    return Redirect::route('food_details',[$card['food_item_id']]);

    }

    public function getPaymentStatus()
    {	
    	/** Get the food item ID before session clear **/
        $foodItemId = Session::get('food_item_ID');

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            // \Session::put('error','Payment failed');
            // return Redirect::route('addmoney.paywithpaypal');
            Session::flash('error','Payment failed');
            return redirect('food/details/'.$foodItemId);
            
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
            if(Session::has('paypal_payment_amount')) {
            	$amount = Session::get('paypal_payment_amount');
            	Session::forget('paypal_payment_amount');
            }

            /** Here Write your database logic like that insert record or value in database if you want **/
            if(!empty($amount)) {
            	$cart = Cart::where('food_item_id',$foodItemId)->first();
            	
                //CREATE RANDOM NUMBER
        		$random_num = strtoupper(uniqid(mt_rand(1,999))); 
           		$order = Order::create([    
           						   'food_item_id' => $foodItemId,
						           'order_id' => uniqid(),
						           'order_number' => 'OD'.$random_num,
						           'ordered_by' => Auth::User()->user_id,
						           'date_of_order' => date("Y-m-d"),
						           'total_price' => $amount,
						           'time' => $cart->time,
						           'status' => 1 //paid
						       ]);

           		Payments::create([  'order_id' => $order->order_id,
		    					    'amount' => $order->total_price,
						            'payment_date' => $order->date_of_order
						        ]);

           		$cart->delete();
            }

            \Session::put('success','Payment success');
            Session::flash('success','Payment success');

            //****** CODE FOR MAIL SENDING ******//
            $buyer = User::where('user_id',Auth::User()->user_id)->first()->name;
            $buyerEmail = User::where('user_id',Auth::User()->user_id)->first()->email;
            $orderNumber = $order->order_number;
            $price = $order->total_price;
            $bookingDate = $order->date_of_order;

	        // $email = 'purchased@sharemeshi.com'; //this email is for purchase section
	        $email = 'contact@sharemeshi.com'; //this email is for testing purpose
	        Mail::send('order.puchase-item-mail',['buyer'=>$buyer,'orderNumber' => $orderNumber, 'price' => $price, 'bookingDate' => $bookingDate], function($message) use ($email) {
	          $message->to($email)
	                  ->subject('Payment Successful');
	        });

	        // $email = $buyerEmail; //this email is for purchase section
	        $email = 'contact@sharemeshi.com'; //this email is for testing purpose
	        Mail::send('order.payment-succesful',['orderNumber' => $orderNumber, 'price' => $price, 'bookingDate' => $bookingDate], function($message) use ($email) {
	          $message->to($email)
	                  ->subject('Payment Successful');
	        });

            return redirect('/');
            //return Redirect::route('driver_bidding_list', ['move_id' => $move_id]);
        }
        // \Session::put('error','Payment failed');
        // return Redirect::route('make_order',[$foodItemId]);

        Session::flash('error','Payment failed');
        return redirect('food/details/'.$foodItemId);
    }

}

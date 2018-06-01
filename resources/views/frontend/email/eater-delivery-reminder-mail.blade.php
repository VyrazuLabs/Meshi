<p style="margin-bottom: 0;">Hi, <b>{{ $order_details['eater_nick_name'] }}</b>
Thanks for ordering food online on ShareMeshi</p>
<p style="margin-bottom: 0;"><b>ORDER SUMMARY</b></p>
<p style="margin-bottom: 0;">Order ID: {{$order_details['order_number']}}</p>
<p style="margin-bottom: 0;">ご注文内容: {{ $order_details['item_name'] }} (https://sharemeshi.com/food/details/{{ $order_details['food_item_id'] }})</p>
<p style="margin-bottom: 0;">Quantity: {{$order_details['quantity']}}</p>
<p style="margin-bottom: 0;">お届け希望日: {{ $order_details['date_of_delivery'] }} {{ $order_details['time'] }}</p>
<p style="margin-bottom: 0;"><b>PAYMENT SUMMARY</b></p>
<p style="margin-bottom: 0;">Total Amount: ¥{{$order_details['price']}}</p>
<p style="margin-bottom: 0;"><b>SHIPPING ADDRESS</b></p>
<p style="margin-bottom: 0;">{{ $order_details['address'] }}</p>
<p style="margin-bottom: 0;">Tel: {{$order_details['phone_number']}}</p>
<p style="margin-bottom: 0;">Description: {{$order_details['description']}}</p>

<p>Thanks forordering food online on ShareMeshi, {{ $order_details->eater_nick_name }}</p>
<p><b>PAYMENT SUMMARY</b></p>
<p>Order ID: {{$order_details->order_number}}</p>
<p> ご注文内容: {{ $order_details->item_name }} (https://sharemeshi.com/food/details/{{ $order_details->food_item_id }})</p>
<p>お届け希望日: {{ $order_details->date_of_delivery }} {{ $order_details->time }}</p>

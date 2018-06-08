<p style="margin-bottom: 0;">{{ $order_details['creator_nick_name'] }}さん</p>
<p style="margin-bottom: 0;">シェアメシ運営事務局です。お料理のお届けが明日になりましたのでご連絡いたします。</p>
<br/>
<p style="margin-bottom: 0;"><b>お料理情報</b></p>
<p style="margin-bottom: 0;">オーダーID: {{$order_details['order_number']}}</p>
<p style="margin-bottom: 0;">ご注文内容: {{ $order_details['item_name'] }} ({{env('APP_URL', 'https://sharemeshi.com')}}/food/details/{{ $order_details['food_item_id'] }})</p>
<p style="margin-bottom: 0;">数量: {{$order_details['quantity']}}</p>
<p style="margin-bottom: 0;">お届け希望日: {{ $order_details['date_of_delivery'] }} {{ $order_details['time'] }}</p>
<br/>
<p style="margin-bottom: 0;"><b>お届け先情報</b></p>
<p style="margin-bottom: 0;">ニックネーム: {{ $order_details['eater_nick_name'] }}</p>
<p style="margin-bottom: 0;">住所: {{ $order_details['address'] }}</p>
<p style="margin-bottom: 0;">電話番号: {{$order_details['phone_number']}}</p>
<p style="margin-bottom: 0;">自己紹介: {{$order_details['description']}}</p>
<p>
    --<br/>
    シェアメシ<br/>
    人と人を食でつなぐ、全く新しいシェアリングエコノミーサービス<br/>
    https://sharemeshi.com<br/>
</p>
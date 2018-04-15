<p>{{$buyer->nick_name}}様</p>
<br/>
<p>
    シェアメシ運営事務局です。<br/>
    ご注文いただきありがとうございます。
</p>
<br/>
<p>ご注文詳細:</p>
<br/>
<p>
    {{ $food->item_name }} (クリエータ: {{ $creator->nick_name }}さん)<br/>
    (https://sharemeshi.com/food/details/{{ $food->food_item_id }})
</p>
<p>
    お届け予定: {{ $food->date_of_availability }} {{ $order->time }}
</p>
<p>
    ※ お届けは交通の事情などによって若干のずれが出るかもしれませんがご了承ください。<br/>
    ※ お届け場所が不明な場合などは電話番号にお電話させていただく場合もございます。</p>
<br/>
<p>
    それでは、お届けまでお待ちくださいませ。<br/>
    またのご利用をお待ちしております。</p>
<p>
    --<br/>
    シェアメシ<br/>
    人と人を食でつなぐ、全く新しいシェアリングエコノミーサービス<br/>
    https://sharemeshi.com<br/>
</p>
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
    (https://sharemeshi.com/food/details/{{ $food->food_item_id }})<br/>
    お料理詳細: {{ $food->food_description }}<br/>
    クリエーターさん自己紹介: {{ $creatorProfile->description }}<br/>
    クリエーターさん電話番号: {{ $creatorProfile->phone_number }}<br/>
</p>
<p>
    お届け予定: {{ $food->date_of_availability }} {{ $order->time }}
</p>
<p>
    ※ お届けは交通の事情などによって若干のずれが出るかもしれませんがご了承ください。<br/>
    ※ お届け場所が不明な場合などは電話番号にお電話させていただく場合もございます。</p>
<br/>
<p>
    お手間ではございますが、お料理を楽しんで頂いた後、レビューをご登録頂ければ幸いです。イーターさんからのレビューはクリエーターさんの励みになります。レビューはログイン後購入後「購入したお料理」からご登録できます。<br />
    それでは、お届けまでお待ちくださいませ。<br/>
    またのご利用をお待ちしております。</p>
<p>
    --<br/>
    シェアメシ<br/>
    人と人を食でつなぐ、全く新しいシェアリングエコノミーサービス<br/>
    https://sharemeshi.com<br/>
</p>
<p> {{ $creator->nick_name }} 様</p>
<br/>
<p> 新規のご注文が入りましたので、ご連絡いたします。</p>
<p> ご注文内容: {{ $food->item_name }} (https://sharemeshi.com/food/details/{{ $food->food_item_id }})</p>
<p>お届け希望日: {{ $food->date_of_availability }} {{ $order->time }}</p>
<br/>
<p>
    メシイーター名：{{ $buyer->nick_name }} ({{ $buyer->name }} 様)<br/>
    住所: {{ $buyerProfile->prefectures }}{{ $buyerProfile->municipality }}{{ $buyerProfile->address }}<br/>
    ご連絡先: {{ $buyerProfile->phone_number }}</p>
<br/>
<p>
    お時間に遅れそうな場合や、道が不明な場合は直接ご連絡いただければと思います。<br/>
    また、お手数ですが、よりクリエーターの方を身近に感じてもらえますよう、クリエーターの方に簡単な手書きのお手紙を書いていただくことをお願いしております。お手数ですが、お手紙を書いて頂き、お料理のお渡しの際にお渡し頂けますでしょうか？<br/>
    <br />
    お手紙は試験版でも非常に好評を頂いており、書いて頂くことでクリエーターさんのリピーターが増えるという効果もございます。<br/>
    <br/>
    ご不明な点がございましたらお気軽にご連絡ください。<br/>
    よろしくお願いいたします。
</p>
<p>
    --<br/>
    シェアメシ<br/>
    人と人を食でつなぐ、全く新しいシェアリングエコノミーサービス<br/>
    https://sharemeshi.com<br/>
</p>

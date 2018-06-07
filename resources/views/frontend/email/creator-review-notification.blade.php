<p>{{$eater_review->creator_nick_name}}さん</p>
<P>{{$eater_review->eater_nick_name}}さんが{{$eater_review->item_name}}についてのレビューを登録しました。</P>
<p>シェアメシにログイン後、以下のURLから確認ができます。</p>
<p>{{env('APP_URL', 'https://sharemeshi.com')}}/user/order-list</p>

<p>
    次のお料理のアップもお待ちしております！<br/>
    お料理のアップはこちらから↓↓<br/>
    <a href="{{env('APP_URL', 'https://sharemeshi.com')}}/food/create">{{env('APP_URL', 'https://sharemeshi.com')}}/food/create</a>
</p>
<p>
    --<br/>
    シェアメシ<br/>
    人と人を食でつなぐ、全く新しいシェアリングエコノミーサービス<br/>
    https://sharemeshi.com<br/>
</p>

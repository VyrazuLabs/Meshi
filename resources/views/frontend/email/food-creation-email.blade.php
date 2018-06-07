<p style="margin-bottom: 0;margin-top: 0;">メシクリエーターさんのお料理が新しく登録されました。</p>
<br/>
<p style="margin-bottom: 0;margin-top: 0;">メシクリエーター名: {{$foodDetails->creatorName}}</p>
<p style="margin-bottom: 0;margin-top: 0;">お料理名: <b>{{$foodDetails->item_name}}</b></p>
<p style="margin-bottom: 0;margin-top: 0;">提供エリア: {{$foodDetails->deliverable_area}}</p>
<p style="margin-bottom: 0;margin-top: 0;">提供日: {{$foodDetails->date_of_availability}}</p>
<p style="margin-bottom: 0;margin-top: 0;">料金: ¥{{$foodDetails->price}}</p>
<p style="margin-bottom: 0;margin-top: 0;">お料理詳細: {{$foodDetails->food_description}}</p>
<p>
    {{env('APP_URL', 'https://sharemeshi.com')}}/food/details/{{$foodDetails->food_item_id}}
</p>
<p>
    --<br/>
    シェアメシ<br/>
    人と人を食でつなぐ、全く新しいシェアリングエコノミーサービス<br/>
    https://sharemeshi.com<br/>
</p>

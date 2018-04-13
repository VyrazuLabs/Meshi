@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.sharemeshi') }}
@endsection

@section('add-meta')
@endsection

@section('content')

<!-- signin-page -->
	<section id="" class="clearfix user-page sign-back">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->			
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account boxes-card signin-box">
						@if ($form_type == 'edit')
							<h2>{{ trans('app.Profile Edit') }}</h2>
						@else
							<h2>{{ trans('app.User Register') }}</h2>
						@endif
						<!-- form -->
						{!! Form::open(array('url' => route('registration'),'files' => true)) !!}
			            	@if(!empty($user))
			                	{{ Form::model($user) }}
			              	@endif
			                {{Form::hidden('user_id',null)}}

			                @php 
			                	$selectPlaceholder = trans('app.Please Select'); 
			                	$prefecturesPlaceholder = trans('app.prefectures placeholder'); 
			                	$municipalityPlaceholder = trans('app.municipality placeholder');
			                	$addressPlaceholder = trans('app.address placeholder'); 
			                	$age10 = trans('app.age 10'); 
			                	$age20 = trans('app.age 20'); 
			                	$age30 = trans('app.age 30'); 
			                	$age40 = trans('app.age 40'); 
			                	$age50 = trans('app.age 50'); 
			                	$age60 = trans('app.age 60'); 
			                	$age70 = trans('app.age 70'); 
			                	$age80 = trans('app.age 80'); 
			                	$male_sex = trans('app.male_sex'); 
			                	$female_sex = trans('app.female_sex'); 
			                	$other_sex = trans('app.other_sex'); 
			                	$profession_present = trans('app.profession_present'); 
			                	$profession_currently = trans('app.profession_currently'); 
			                	$profession_employee = trans('app.profession_employee'); 
			                	$profession_other = trans('app.profession_other'); 
			                	$type_messiator = trans('app.type_messiator');
			                	$type_mesh_creator = trans('app.type_mesh_creator');
			                @endphp
			              	<div class="box-body">
				              	
				                <div class="form-group form-custom-group">
				                  	<label>{{ trans('app.Name') }} <span>*</span></label>
									{!! Form::text('name', null, 
									    array(
									          'class'=>'form-control')) !!}
									@if ($errors->has('name'))
									  	<span class="help-block">
									      <strong class="strong t-red">{{ $errors->first('name') }}</strong>
									  	</span>
									@endif
				                </div>
				                <div class="form-group form-custom-group">
				                  	<label>{{ trans('app.Nickname') }} <span>*</span></label>
									{!! Form::text('nick_name', null, 
									    array(
									          'class'=>'form-control')) !!}
									@if ($errors->has('nick_name'))
									  	<span class="help-block">
									      <strong class="strong t-red">{{ $errors->first('nick_name') }}</strong>
									  	</span>
									@endif
				                </div>
				                <div class="form-group form-custom-group">
				                  <label>{{ trans('app.Email')}} <span>*</span></label>
				                	@if($form_type == 'edit')
				                    	{!! Form::email('email', null, 
				                          		array('class'=>'form-control','readonly')) !!}
				                    @else
				                    	{!! Form::email('email', null, 
				                          		array('class'=>'form-control')) !!}
				                    @endif
				                  @if ($errors->has('email'))
				                    <span class="help-block">
				                      <strong class="strong t-red">{{ $errors->first('email') }}</strong>
				                    </span>
				                  @endif
				                </div>
				                <div class="form-group form-custom-group">
				                  <label>{{ trans('app.Password') }} <span>*</span></label>
				                    {!! Form::password('password',
						              						array( 'class'=>'form-control')) !!}
				                  @if ($errors->has('password'))
				                    <span class="help-block">
				                      <strong class="strong t-red">{{ $errors->first('password') }}</strong>
				                    </span>
				                  @endif
				                </div>
				                <div class="form-group form-custom-group">
				                  <label>{{ trans('app.Password Confirmation') }} <span>*</span></label>
				                    {!! Form::password('password_confirmation',
						              						array( 'class'=>'form-control')) !!}
				                  @if ($errors->has('password_confirmation'))
				                    <span class="help-block">
				                      <strong class="strong t-red">{{ $errors->first('password_confirmation') }}</strong>
				                    </span>
				                  @endif
				                </div>
				                <div class="form-group form-custom-group">
				                  <label>{{ trans('app.User Type') }}<span>*</span></label>

				                  <br/>
									<span>※ メシクリエーターとして登録しても、他のメシクリエーターからの購入が可能です。</span>
				                  	{{ Form::select('type', ['1' => $type_mesh_creator, '2' => $type_messiator], null, ['placeholder' => $selectPlaceholder, 'class' => 'form-control col-md-7 col-xs-12','onchange'=>'types()','id'=>'select-type']) }}
				                  	@if ($errors->has('type'))
					                    <span class="help-block">
					                      <strong class="strong t-red">{{ $errors->first('type') }}</strong>
					                    </span>
				                  	@endif
				                  @if ($errors->has('reason_for_registration_edit'))
				                    <span class="help-block">
				                      <strong class="strong t-red">{{ $errors->first('reason_for_registration_edit') }}</strong>
				                    </span>
				                  @endif
				                </div>
				                @if($form_type == 'edit')
					                <div class="form-group form-custom-group reason edit-reason">
					                	<label for="reason2" class="col-md-4 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Reason why you want to use share map (multiple selections possible)</font></font></label>
					                	@if($user->type == 2)
						                	<div class="col-md-8 buyer">
						                		<label>
						                			{{ Form::checkbox('reason_for_registration_edit[]', 'busy_with_working', null, ['class' => 'check']) }}
						                			 Busy with working
					                           	</label> 
					                           	<label>
					                           		{{ Form::checkbox('reason_for_registration_edit[]', 'live_alone', null, ['class' => 'check']) }}
					                           		I got bored with convenience stores, medium meals, and other lunches because I live alone.
					                            </label> 
					                            <label>
					                           		{{ Form::checkbox('reason_for_registration_edit[]', 'few_restaurants', null, ['class' => 'check']) }}
					                            	There are few restaurants around the office
					                            </label> 
					                            <label>
					                            	{{ Form::checkbox('reason_for_registration_edit[]', 'no_time', null, ['class' => 'check']) }}
					                            	I am busy raising children and have no time to make rice
					                            </label> 
					                            <label> 
					                            	{{ Form::checkbox('reason_for_registration_edit[]', 'like_to_eat', null, ['class' => 'check']) }}
					                            	I would like to eat a variety of nationalities and people's cooking.
					                            </label> 
					                            <label> 
					                            	{{ Form::checkbox('reason_for_registration_edit[]', 'no_reason', null, ['class' => 'check']) }}
					                            	There is no big reason, but it seems interesting, so I would like to use it
					                            </label> 
					                            <label>
					                            	{{ Form::checkbox('reason_for_registration_edit[]', 'other', null, ['class' => 'check']) }}
					                            	Other
					                            </label>
					                       	</div>
					                	@elseif($user->type == 1)
						                	<div class="col-md-8 seller">
						                		<label>
						                			{{ Form::checkbox('reason_for_registration_edit[]', 'help_someone', null, ['class' => 'check']) }} 
						                			 I would like to use someone's help through my cooking
					                           	</label> 
					                           	<label>
					                           		{{ Form::checkbox('reason_for_registration_edit[]', 'earn_rewards_free_time', null, ['class' => 'check']) }}
					                           		 I want to earn rewards using free time  
					                            </label> 
					                            <label>
					                           		{{ Form::checkbox('reason_for_registration_edit[]', 'earn_rewards_bytes_parts', null, ['class' => 'check']) }}
					                            	I want to earn more rewards than bytes and parts  
					                            </label> 
					                            <label>
					                            	{{ Form::checkbox('reason_for_registration_edit[]', 'hobby', null, ['class' => 'check']) }}
					                            	I would like to use dishes of my hobbies
					                            </label> 
					                            <label> 
					                            	{{ Form::checkbox('reason_for_registration_edit[]', 'cooking_class', null, ['class' => 'check']) }}
					                            	I am opening a cooking class and I want to increase my students by increasing my name
					                            </label> 
					                            <label> 
					                            	{{ Form::checkbox('reason_for_registration_edit[]', 'SNS_followers', null, ['class' => 'check']) }}
					                            	I would like to increase my boss name and increase my cook blog and SNS followers
					                            </label> 
					                            <label>
					                            	{{ Form::checkbox('reason_for_registration_edit[]', 'other', null, ['class' => 'check']) }}
					                            	Other
					                            </label>
					                       	</div>
					                    @endif
					                </div>
				                @endif
				                <div class="form-group form-custom-group create-reason" style="display: none;">
				                	<label for="reason2" class="col-md-4 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ trans('app.Reason why you want to use share map (multiple selections possible)') }}</font></font></label>
				                	<div class="col-md-8 buyer" style="display: none;">
				                		<label>
				                			{{ Form::checkbox('reason_for_registration[]', 'busy_with_working', null, ['class' => 'check']) }} 
				                			 <span class="register-checktext">{{ trans('app.Busy with working') }}</span>
			                           	</label> 
			                           	<label>
			                           		{{ Form::checkbox('reason_for_registration[]', 'live_alone', null, ['class' => 'check']) }}
			                           		<span class="register-checktext">{{ trans('app.I got bored with convenience stores, medium meals, and other lunches because I live alone') }}</span>
			                            </label> 
			                            <label>
			                           		{{ Form::checkbox('reason_for_registration[]', 'few_restaurants', null, ['class' => 'check']) }}
			                            	<span class="register-checktext">{{ trans('app.There are few restaurants around the office')}}</span>
			                            </label> 
			                            <label>
			                            	{{ Form::checkbox('reason_for_registration[]', 'no_time', null, ['class' => 'check']) }}
			                            	<span class="register-checktext">{{ trans('app.I am busy raising children and have no time to make rice') }}</span>
			                            </label> 
			                            <label> 
			                            	{{ Form::checkbox('reason_for_registration[]', 'like_to_eat', null, ['class' => 'check']) }}
			                            	<span class="register-checktext">{{ trans('app.I would like to eat a variety of nationalities and peoples cooking') }}</span>
			                            </label> 
			                            <label> 
			                            	{{ Form::checkbox('reason_for_registration[]', 'no_reason', null, ['class' => 'check']) }}
			                            	<span class="register-checktext">{{ trans('app.There is no big reason, but it seems interesting, so I would like to use it') }}</span>
			                            </label> 
			                            <label>
			                            	{{ Form::checkbox('reason_for_registration[]', 'other', null, ['class' => 'check']) }}
			                            	<span class="register-checktext">{{ trans('app.Other') }}</span>
			                            </label>
			                       	</div>
			                       	<div class="col-md-8 seller" style="display: none;">
				                		<label>
				                			{{ Form::checkbox('reason_for_registration[]', 'help_someone', null, ['class' => 'check']) }} 
				                			 {{ trans("app.I would like to use someone's help through my cooking") }}
			                           	</label> 
			                           	<label>
			                           		{{ Form::checkbox('reason_for_registration[]', 'earn_rewards_free_time', null, ['class' => 'check']) }}
			                           		 {{ trans('app.I want to earn rewards using free time') }}  
			                            </label> 
			                            <label>
			                           		{{ Form::checkbox('reason_for_registration[]', 'earn_rewards_bytes_parts', null, ['class' => 'check']) }}
			                            	{{ trans('app.I want to earn more rewards than bytes and parts') }}  
			                            </label> 
			                            <label>
			                            	{{ Form::checkbox('reason_for_registration[]', 'hobby', null, ['class' => 'check']) }}
			                            	{{ trans('app.I would like to use dishes of my hobbies') }}
			                            </label> 
			                            <label> 
			                            	{{ Form::checkbox('reason_for_registration[]', 'cooking_class', null, ['class' => 'check']) }}
			                            	{{ trans('app.I am opening a cooking class and I want to increase my students by increasing my name') }}
			                            </label> 
			                            <label> 
			                            	{{ Form::checkbox('reason_for_registration[]', 'SNS_followers', null, ['class' => 'check']) }}
			                            	{{ trans('app.I would like to increase my boss name and increase my cook blog and SNS followers') }}
			                            </label> 
			                            <label>
			                            	{{ Form::checkbox('reason_for_registration[]', 'other', null, ['class' => 'check']) }}
			                            	{{ trans('app.Other') }}
			                            </label>
			                       	</div>
				                </div>

			
				                <input type="hidden" id="creatorDescriptionID" value="・自己紹介
はじめまして、大田区西馬込に住む主婦です趣味の料理をいかして、地域の方と仲良くなりたいと思い、シェアメシに登録しました^ ^
・得意な料理
煮物や、手の込んだ揚げ物などの和食から、グリーンカレーなどのエスニック料理まで得意です！・衛生面について注意していること
包丁やまな板などを使用後アルコールで拭いています。
料理前に、必ず手の消毒を行なっています。
・イーターさんへのメッセージ・届けたい想い
旬のものを積極的に取り入れたいと思っており、お料理で季節を感じていただければ幸いです^ ^ お料理を通じて、地域の方と仲良くなれればと思っています！よろしくお願い致します。">

				                <input type="hidden" id="eaterDescriptionID" value="・自己紹介
はじめまして、大田区在住で、妻と子供2人の4人暮らしをしております。
夫婦共働きで忙しく、栄養が偏りがちになっており、素敵なメシクリエーターさんの手料理を楽しみたいと思い、登録しました！
・お好きなお料理のジャンルや味付け
家庭料理らしい薄い味付けが好みです
一般的な和食から、変わったジャンルの料理まで色々試して見たいと思っています
・メシクリエーターさんへのメッセージ、その他地域の方との関わり方についての思い
シェアメシを通じて、ご近所さんと友人のような関係性を気づいていけたらと思っています。慣れてきたら自分もクリエーターになってみたいと思ってますので、ぜひ色々と教えてください^ ^">

				                <div class="form-group form-custom-group creator-description">
				                  	<label>{{ trans('app.Description') }}<span>*</span></label>
									<span id="typeCreator" class="t-orange" data-toggle="tooltip" data-html="true" data-trigger="click" title="・自己紹介<br/>はじめまして、大田区西馬込に住む主婦です。<br/>・得意な料理<br/>煮物や、手の込んだ揚げ物などの和食から、グリーンカレーなどのエスニック料理まで得意です！<br/>・衛生面について注意していること<br/>包丁やまな板などを使用後アルコールで拭いています。
料理前に、必ず手の消毒を行なっています。<br/>・イーターさんへのメッセージ・届けたい想い<br/>旬のものを積極的に取り入れたいと思っており、お料理で季節を感じていただければ幸いです^ ^ お料理を通じて、地域の方と仲良くなれればと思っています！よろしくお願い致します。" style="display: none; width: 300px">
				                  		<i class="fa fa-question-circle" aria-hidden="false"></i>
				                  	</span>
				                  	<span id="typeEater" class="t-orange" data-toggle="tooltip" data-html="true" data-trigger="click" title="・自己紹介<br/>はじめまして、大田区西馬込に住む主婦です。<br/>・得意な料理<br/>煮物や、手の込んだ揚げ物などの和食から、グリーンカレーなどのエスニック料理まで得意です！<br/>・衛生面について注意していること<br/>包丁やまな板などを使用後アルコールで拭いています。
料理前に、必ず手の消毒を行なっています。<br/>・イーターさんへのメッセージ・届けたい想い<br/>旬のものを積極的に取り入れたいと思っており、お料理で季節を感じていただければ幸いです^ ^ お料理を通じて、地域の方と仲良くなれればと思っています！よろしくお願い致します。" style="display: none; width: 300px">
				                  		<i class="fa fa-question-circle" aria-hidden="false"></i>
				                  	</span>
				                  	{!! Form::textarea('description', null,
				                          array('class'=>'form-control','rows'=>'7','id' => 'descriptionID'
				                          )) !!}
				                  	@if ($errors->has('description'))
				                    	<span class="help-block">
				                      		<strong class="strong t-red">{{ $errors->first('description') }}</strong>
				                    	</span>
				                  	@endif
				                </div>
				                <div class="form-group form-custom-group">
				                  	<label>{{ trans('app.Age') }}<span>*</span></label>
				                    {{ Form::select('age', ['10' => $age10, '20' => $age20, '30' => $age30, '40' => $age40, '50' => $age50, '60' => $age60, '70' => $age70, '80' => $age80 ], null, ['placeholder' => $selectPlaceholder, 'class' => 'form-control col-md-7 col-xs-12']) }}
									@if ($errors->has('age'))
										<span class="help-block">
										  <strong class="strong t-red">{{ $errors->first('age') }}</strong>
										</span>
									@endif
				                </div>
				                <div class="form-group form-custom-group">
				                  <label>{{ trans('app.Cellphone number') }}<span>*</span></label>
				                  	{!! Form::text('phone_number', null, 
				                          array('class'=>'form-control', 
				                                'placeholder'=>'09012345678',
				                                'id' => 'phone')) !!}
				                  @if ($errors->has('phone_number'))
				                    <span class="help-block">
				                      <strong class="strong t-red">{{ $errors->first('phone_number') }}</strong>
				                    </span>
				                  @endif
				                </div>
				                <div class="form-group form-custom-group">
				                  	<label>{{ trans('app.Zip code (7 digits)') }}<span>*</span></label>
				                  	{!! Form::text('zipcode', null, 
				                          array('class'=>'form-control', 
				                                'placeholder'=>'104-0061')) !!}
									@if ($errors->has('zipcode'))
										<span class="help-block">
										  <strong class="strong t-red">{{ $errors->first('zipcode') }}</strong>
										</span>
									@endif
				                </div>
				                <div class="form-group form-custom-group">
				                  	<label>{{ trans('app.Prefectures') }}<span>*</span></label>
				                  	{!! Form::text('prefectures', null, 
				                          array('class'=>'form-control', 
				                                'placeholder'=>$prefecturesPlaceholder)) !!}
									@if ($errors->has('prefectures'))
										<span class="help-block">
										  <strong class="strong t-red">{{ $errors->first('prefectures') }}</strong>
										</span>
									@endif
				                </div>
				                <div class="form-group form-custom-group">
				                  	<label>{{ trans('app.Municipality') }}<span>*</span></label>
				                  	{!! Form::text('municipality', null, 
				                          array('class'=>'form-control', 
				                                'placeholder'=>$municipalityPlaceholder)) !!}
									@if ($errors->has('municipality'))
										<span class="help-block">
										  <strong class="strong t-red">{{ $errors->first('municipality') }}</strong>
										</span>
									@endif
				                </div>
				                <div class="form-group form-custom-group">
				                  <label>{{ trans('app.Subsequent address') }}<span>*</span></label>
				                  	{!! Form::textarea('address', null, 
				                          array('class'=>'form-control', 
				                          		'id' => 'addressbox',
				                                'placeholder'=>$addressPlaceholder,'rows'=>'2')) !!}
									@if ($errors->has('address'))
										<span class="help-block">
											<strong class="strong t-red">{{ $errors->first('address') }}</strong>
										</span>
									@endif
				                </div>
				                <div class="form-group form-custom-group">
				                  	<label>{{ trans('app.sex') }}<span>*</span></label>
				                    {{ Form::select('gender', ['male' => $male_sex, 'female' => $female_sex, 'other' => $other_sex], null, ['placeholder' => $selectPlaceholder, 'class' => 'form-control col-md-7 col-xs-12']) }}
									@if ($errors->has('gender'))
										<span class="help-block">
										  <strong class="strong t-red">{{ $errors->first('gender') }}</strong>
										</span>
									@endif
				                </div>
				                <div class="form-group form-custom-group">
				                  	<label>{{ trans('app.Job') }}<span>*</span></label>
				                    {{ Form::select('profession', [
				                    	'1' => $profession_present, 
				                    	'2' => $profession_currently, 
				                    	'3' => $profession_employee, 
				                    	'4' => $profession_other],
				                    	null, ['placeholder' => $selectPlaceholder, 'class' => 'form-control col-md-7 col-xs-12']) }}
									@if ($errors->has('profession'))
										<span class="help-block">
										  <strong class="strong t-red">{{ $errors->first('profession') }}</strong>
										</span>
									@endif
				                </div>
				                @if($form_type == 'edit' && Auth::User()->type == 1)
					                <div class="form-group form-custom-group deliverable-area">
					                  	<label>{{ trans('app.Deliverable Area') }}</label>
					                  	{!! Form::text('deliverable_area', null, 
					                          array('class'=>'form-control')) !!}
					                </div>
				                @endif
				                @if($form_type == 'create')
					                <div class="form-group form-custom-group deliverable-area">
				                  		<label>{{ trans('app.Deliverable Area') }}</label>
				                  		{!! Form::text('deliverable_area', null, 
				                          array('class'=>'form-control')) !!}
				                	</div>
				                @endif
				                @if($form_type == 'create')
					                <div class="form-group form-custom-group food-video-link" style="display: none;">
					                  <label>Video Link(Embed Code)</label>
					                  	{!! Form::textarea('video_link', null, 
					                          array('class'=>'form-control','rows'=>'5')) !!}
					                </div>
				                @endif
				                @if(!empty($user->video_link) && $form_type == 'edit' && Auth::User()->type == 1)
					                <div class="form-group form-custom-group food-video-link">
					                  <label>Video Link(Embed Code)</label>
					                  	{!! Form::textarea('video_link', null, 
					                          array('class'=>'form-control','rows'=>'5')) !!}
					                </div>
				                @endif
			              		@if ( $form_type == 'create' )
					                <div class="form-group form-custom-group">
					                  	<label> {{ trans('app.Upload Image') }}<span>*</span></label><br/>
										<p>プロフィール画像には、アイコンなどではなく、顔写真を登録して下さい。
											シェアメシTOP画面の地図への表示の際には、位置情報は域内でランダムに表示され、住所が特定されることはございませんのでご安心ください。<br/>
											※ 地図にご登録頂いた写真が表示されるまでには少し時間をいただいております。</p>
					                  	{!! Form::file('image', array( 'class' => 'custom-file-input') ) !!}
					                  	@if ($errors->has('image'))
					                    	<span class="help-block">
					                      		<strong class="strong t-red">{{ $errors->first('image') }}</strong>
					                    	</span>
					                  	@endif
					                </div>
					            @endif
					            @if ( $form_type == 'edit' )
				              		<div class="form-group form-custom-group profile-edit-field">
					                  	<label> Image<span>*</span></label>
					                  	@if( !empty($user->image) )
						                    <img src="{{ url('/uploads/profile/picture/'.$user->image) }}" style="height: 100px;float: right;" />
						                @endif
					                  	{!! Form::file('image', array( 'class' => 'custom-file-input') ) !!}
					                  	@if ($errors->has('image'))
					                    	<span class="help-block">
					                      		<strong class="strong t-red">{{ $errors->first('image') }}</strong>
					                    	</span>
					                  	@endif
					                </div>

					                @if(Auth::User()->type == 1 )
						                <div class="form-group form-custom-group profile-edit-field">
						                  	<label>Cover Image<span>*</span></label>
						                  	@if( !empty($user->cover_image) )
							                    <img src="{{ url('/uploads/cover/picture/'.$user->cover_image) }}" style="height: 100px;width: 100px;float: right;" />
							                @endif
						                  	{!! Form::file('cover_image', array( 'class' => 'custom-file-input') ) !!}
						                  	@if ($errors->has('cover_image'))
						                    	<span class="help-block">
						                      		<strong class="strong t-red">{{ $errors->first('cover_image') }}</strong>
						                    	</span>
						                  	@endif
						                </div>
					              	@endif
					            @endif
				                <!-- /.box-body -->
				            </div>
			                <div class="box-footer text-center">
			                  <button type="submit" class="btn btn-booking">{{ trans('app.Submit') }}</button>
			                </div>
            			{!! Form::close() !!}
					</div>
					<!-- <a href="#" class="btn-primary">Create a New Account</a> -->
				</div><!-- user-login -->			
			</div><!-- row -->	
		</div><!-- container -->
	</section><!-- signin-page -->
	

@endsection

@section('add-js')	
<script type="text/javascript">
	
	$('#phone').keypress(function (e) {
	    var regex = new RegExp("^[0-9-]+$");
	    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
	    if (regex.test(str)) {
	      return true;
	    }
	    e.preventDefault();
	    return false;
	});


	//calling a function onchange of user type option
	function types() {
	  	var userType = $('#select-type').val();
		var creatorPlaceholder = $('#creatorDescriptionID').val();
		var eaterPlaceholder = $('#eaterDescriptionID').val();

	  	$('.create-reason').show();
	  	$('.edit-reason').hide();
		$('.seller').children().children().prop('checked', false);	  	
		$('.buyer').children().children().prop('checked', false);
	  	$('.edit-reason .buyer').remove();
	  	$('.edit-reason .seller').remove();

	  	if(userType == 1) {
	  		$('.seller').show();
	    	$('.buyer').hide();
	    	$('.food-video-link').show();
	    	$('.deliverable-area').show();
	    	$('.seller').children().children().attr('name','reason_for_registration_edit[]');
	    	$('#typeCreator').show();
	    	$('#typeEater').hide();
    		$('#descriptionID').prop('placeholder',creatorPlaceholder);

	  	}
	  	if(userType == 2) {
	    	$('.buyer').show();
	  		$('.seller').hide();
	    	$('.food-video-link').hide();
	    	$('.deliverable-area').hide();
	    	$('.buyer').children().children().attr('name','reason_for_registration_edit[]');
	    	$('#typeCreator').hide();
	    	$('#typeEater').show();
    		$('#descriptionID').prop('placeholder',eaterPlaceholder);

	  	}

	}
	$(document).ready(function(){		
		initAutocomplete('addressbox');

		if ($('.help-block').length > 0) {
            types();
		}
	});
	function initAutocomplete(selector) {	  
		var indexMoveFrom = new google.maps.places.Autocomplete(	      
			(document.getElementById(selector)),	      
			{types: ['geocode']});	
	}


	// code for tool tip
	$(document).ready(function(){
  		$('[data-toggle="tooltip"]').tooltip();
	});

	

	
</script>
@endsection
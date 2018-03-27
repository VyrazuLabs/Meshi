@extends('frontend.layouts.master')

@section('title')
  ShareMeshi
@endsection

@section('add-meta')
@endsection

@section('content')

<!-- signin-page -->
	<section id="" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->			
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account boxes-card">
						<h2>{{ trans('app.User Register') }}</h2>
						<!-- form -->
						
						{!! Form::open(array('url' => route('registration'),'files' => true)) !!}
            	@if(!empty($user))
                	{{ Form::model($user) }}
              	@endif
                {{Form::hidden('user_id',null)}}
                <?php 
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

                ?>
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
	                <?php $type = trans('app.Messiator');  ?>
	                <div class="form-group form-custom-group">
	                  <label>{{ trans('app.User Type') }}<span>*</span></label>
	                  {{ Form::select('type', ['2' => $type], null, ['class' => 'form-control col-md-7 col-xs-12','onchange'=>'types()','id'=>'select-type']) }}
	                  @if ($errors->has('type'))
	                    <span class="help-block">
	                      <strong class="strong t-red">{{ $errors->first('type') }}</strong>
	                    </span>
	                  @endif
	                </div>
	                
	                <div class="form-group form-custom-group create-reason">
	                	<label for="reason2" class="col-md-4 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ trans('app.Reason why you want to use share map (multiple selections possible)') }}</font></font></label>
	                	<div class="col-md-8 buyer">
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
	                  <label>{{ trans('app.Subsequent address') }}<span>*</span></label>
	                  	{!! Form::textarea('address', null, 
	                          array('class'=>'form-control', 
	                                'placeholder'=>$addressPlaceholder,'rows'=>'2')) !!}
						@if ($errors->has('address'))
							<span class="help-block">
								<strong class="strong t-red">{{ $errors->first('address') }}</strong>
							</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>{{ trans('app.Description') }}<span>*</span></label>
	                  	{!! Form::textarea('description', null, 
	                          array('class'=>'form-control','rows'=>'3')) !!}
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
	                  	<label>{{ trans('app.sex') }}<span>*</span></label>
	                    {{ Form::select('gender', ['male' => $male_sex, 'female' => $female_sex, 'other' => $other_sex], null, ['placeholder' => $selectPlaceholder, 'class' => 'form-control col-md-7 col-xs-12']) }}
						@if ($errors->has('gender'))
							<span class="help-block">
							  <strong class="strong t-red">{{ $errors->first('gender') }}</strong>
							</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>{{ trans('app.Profession') }}<span>*</span></label>
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
	                <div class="form-group form-custom-group">
	                  	<label>{{ trans('app.Job') }}<span>*</span></label>
	                  	{!! Form::text('job', null, 
	                          array('class'=>'form-control')) !!}
						@if ($errors->has('job'))
							<span class="help-block">
							  <strong class="strong t-red">{{ $errors->first('job') }}</strong>
							</span>
						@endif
	                </div>
              		@if ( $form_type == 'create' )
		                <div class="form-group form-custom-group">
		                  	<label> {{ trans('app.Upload Image') }}<span>*</span></label>
		                  	{!! Form::file('image', array( 'class' => 'custom-file-input') ) !!}
		                  	@if ($errors->has('image'))
		                    	<span class="help-block">
		                      		<strong class="strong t-red">{{ $errors->first('image') }}</strong>
		                    	</span>
		                  	@endif
		                </div>
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
	  	$('.create-reason').show();
	  	$('.edit-reason').hide();

	  	//when citizen is selected then hide department select box
	  	// if(userType == 1) {
	  	// 	$('.seller').show();
	   //  	$('.buyer').hide();
	  	// }
	  	// if(userType == 2) {
	   //  	$('.buyer').show();
	  	// 	$('.seller').hide();
	  	// }
	}
</script>
@endsection
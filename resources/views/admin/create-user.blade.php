@extends('layouts.master')

@section('title')
  Create User
@endsection

@section('add-meta')
@endsection

@section('content')
    <div class="col-md-8">
      	<div class="box box-custom-main">
        	<!-- form start -->
            {!! Form::open(array('url' => route('save_user'),'files' => true)) !!}
            	@if(!empty($user))
                	{{ Form::model($user) }}
              	@endif
                {{Form::hidden('user_id',null)}}

              	<div class="box-body">
              		@if ( $form_type == 'edit' )

              		<div class="form-group form-custom-group">
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
	              	@endif
	                <div class="form-group form-custom-group">
	                  	<label>Name <span>*</span></label>
						{!! Form::text('name', null, 
						    array(
						          'class'=>'form-control', 
						          'placeholder'=>'Enter Full Name')) !!}
						@if ($errors->has('name'))
						  	<span class="help-block">
						      <strong class="strong t-red">{{ $errors->first('name') }}</strong>
						  	</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Nick Name <span>*</span></label>
						{!! Form::text('nick_name', null, 
						    array(
						          'class'=>'form-control', 
						          'placeholder'=>'Enter Nick Name')) !!}
						@if ($errors->has('nick_name'))
						  	<span class="help-block">
						      <strong class="strong t-red">{{ $errors->first('nick_name') }}</strong>
						  	</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  <label>Email <span>*</span></label>
	                	@if($form_type == 'edit')
	                    	{!! Form::text('email', null, 
	                          		array('class'=>'form-control','readonly')) !!}
	                    @else
	                    	{!! Form::text('email', null, 
	                          		array('class'=>'form-control', 
	                                'placeholder'=>'Enter Email')) !!}
	                    @endif
	                  @if ($errors->has('email'))
	                    <span class="help-block">
	                      <strong class="strong t-red">{{ $errors->first('email') }}</strong>
	                    </span>
	                  @endif
	                </div>
	                <div class="form-group form-custom-group">
	                  <label>Password <span>*</span></label>
	                    {!! Form::password('password',
			              						array( 'class'=>'form-control', 
			              								'placeholder'=>'Enter Password')) !!}
	                  @if ($errors->has('password'))
	                    <span class="help-block">
	                      <strong class="strong t-red">{{ $errors->first('password') }}</strong>
	                    </span>
	                  @endif
	                </div>
	                <div class="form-group form-custom-group">
	                  <label>Password Confirmation <span>*</span></label>
	                    {!! Form::password('password_confirmation',
			              						array( 'class'=>'form-control', 
			              								'placeholder'=>'Enter Password')) !!}
	                  @if ($errors->has('password_confirmation'))
	                    <span class="help-block">
	                      <strong class="strong t-red">{{ $errors->first('password_confirmation') }}</strong>
	                    </span>
	                  @endif
	                </div>
	                <div class="form-group form-custom-group">
	                  <label> User Type<span>*</span></label>
	                  {{ Form::select('type', ['1' => 'Mesh creator (those who want to offer home cooking)', '2' => 'Messiator (who wants to eat home cooking)'], null, ['placeholder' => '-- Choose Type --', 'class' => 'form-control col-md-7 col-xs-12','onchange'=>'types()','id'=>'select-type']) }}
	                  @if ($errors->has('type'))
	                    <span class="help-block">
	                      <strong class="strong t-red">{{ $errors->first('type') }}</strong>
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
	                	<label for="reason2" class="col-md-4 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Reason why you want to use share map (multiple selections possible)</font></font></label>
	                	<div class="col-md-8 buyer" style="display: none;">
	                		<label>
	                			{{ Form::checkbox('reason_for_registration[]', 'busy_with_working', null, ['class' => 'check']) }} 
	                			 Busy with working
                           	</label> 
                           	<label>
                           		{{ Form::checkbox('reason_for_registration[]', 'live_alone', null, ['class' => 'check']) }}
                           		I got bored with convenience stores, medium meals, and other lunches because I live alone.
                            </label> 
                            <label>
                           		{{ Form::checkbox('reason_for_registration[]', 'few_restaurants', null, ['class' => 'check']) }}
                            	There are few restaurants around the office
                            </label> 
                            <label>
                            	{{ Form::checkbox('reason_for_registration[]', 'no_time', null, ['class' => 'check']) }}
                            	I am busy raising children and have no time to make rice
                            </label> 
                            <label> 
                            	{{ Form::checkbox('reason_for_registration[]', 'like_to_eat', null, ['class' => 'check']) }}
                            	I would like to eat a variety of nationalities and people's cooking.
                            </label> 
                            <label> 
                            	{{ Form::checkbox('reason_for_registration[]', 'no_reason', null, ['class' => 'check']) }}
                            	There is no big reason, but it seems interesting, so I would like to use it
                            </label> 
                            <label>
                            	{{ Form::checkbox('reason_for_registration[]', 'other', null, ['class' => 'check']) }}
                            	Other
                            </label>
                       	</div>
	                	<div class="col-md-8 seller" style="display: none;">
	                		<label>
	                			{{ Form::checkbox('reason_for_registration[]', 'help_someone', null, ['class' => 'check']) }} 
	                			 I would like to use someone's help through my cooking
                           	</label> 
                           	<label>
                           		{{ Form::checkbox('reason_for_registration[]', 'earn_rewards_free_time', null, ['class' => 'check']) }}
                           		 I want to earn rewards using free time  
                            </label> 
                            <label>
                           		{{ Form::checkbox('reason_for_registration[]', 'earn_rewards_bytes_parts', null, ['class' => 'check']) }}
                            	I want to earn more rewards than bytes and parts  
                            </label> 
                            <label>
                            	{{ Form::checkbox('reason_for_registration[]', 'hobby', null, ['class' => 'check']) }}
                            	I would like to use dishes of my hobbies
                            </label> 
                            <label> 
                            	{{ Form::checkbox('reason_for_registration[]', 'cooking_class', null, ['class' => 'check']) }}
                            	I am opening a cooking class and I want to increase my students by increasing my name
                            </label> 
                            <label> 
                            	{{ Form::checkbox('reason_for_registration[]', 'SNS_followers', null, ['class' => 'check']) }}
                            	I would like to increase my boss name and increase my cook blog and SNS followers
                            </label> 
                            <label>
                            	{{ Form::checkbox('reason_for_registration[]', 'other', null, ['class' => 'check']) }}
                            	Other
                            </label>
                       	</div>
	                </div>
	                
	                <div class="form-group form-custom-group">
	                  <label>Phone Number<span>*</span></label>
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
	                  <label>Video Link(Embed Code)</label>
	                  	{!! Form::textarea('video_link', null, 
	                          array('class'=>'form-control','rows'=>'3')) !!}
	                 
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Description<span>*</span></label>
	                  	{!! Form::textarea('description', null, 
	                          array('class'=>'form-control', 
	                                'placeholder'=>'Tell us something about the user','rows'=>'3')) !!}
	                  	@if ($errors->has('description'))
	                    	<span class="help-block">
	                      		<strong class="strong t-red">{{ $errors->first('description') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>User Introduction<span>*</span></label>
	                  	{!! Form::textarea('user_introduction', null, 
	                          array('class'=>'form-control', 
	                                'placeholder'=>'User Introduction','rows'=>'4')) !!}
	                  	@if ($errors->has('user_introduction'))
	                    	<span class="help-block">
	                      		<strong class="strong t-red">{{ $errors->first('user_introduction') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Profile Message<span>*</span></label>
	                  	{!! Form::textarea('profile_message', null, 
	                          array('class'=>'form-control', 
	                                'placeholder'=>'Enter Message From ShareMeshi','rows'=>'4')) !!}
	                  	@if ($errors->has('profile_message'))
	                    	<span class="help-block">
	                      		<strong class="strong t-red">{{ $errors->first('profile_message') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Age<span>*</span></label>
	                    {{ Form::select('age', ['10' => "10's", '20' => "20's", '30' => "Thirties", '40' => 'Forties', '50' => 'Fifties', '60' => "60's", '70' => "70's", '80' => "Age 80" ], null, ['placeholder' => '-- Please Select Age --', 'class' => 'form-control col-md-7 col-xs-12']) }}
						@if ($errors->has('age'))
							<span class="help-block">
							  <strong class="strong t-red">{{ $errors->first('age') }}</strong>
							</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Zipcode(7 digits)<span>*</span></label>
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
	                  	<label>Prefectures<span>*</span></label>
	                  	{!! Form::text('prefectures', null, 
	                          array('class'=>'form-control', 
	                                'placeholder'=>'Enter Prefectures')) !!}
						@if ($errors->has('prefectures'))
							<span class="help-block">
							  <strong class="strong t-red">{{ $errors->first('prefectures') }}</strong>
							</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Municipality<span>*</span></label>
	                  	{!! Form::text('municipality', null, 
	                          array('class'=>'form-control', 
	                                'placeholder'=>'Enter Municipality')) !!}
						@if ($errors->has('municipality'))
							<span class="help-block">
							  <strong class="strong t-red">{{ $errors->first('municipality') }}</strong>
							</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  <label>Address<span>*</span></label>
	                  	{!! Form::textarea('address', null, 
	                          array('class'=>'form-control','id' => 'addressbox',
	                                'placeholder'=>'Enter Address','rows'=>'2')) !!}
						@if ($errors->has('address'))
							<span class="help-block">
								<strong class="strong t-red">{{ $errors->first('address') }}</strong>
							</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Gender<span>*</span></label>
	                    {{ Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], null, ['placeholder' => '-- Select A Status --', 'class' => 'form-control col-md-7 col-xs-12']) }}
						@if ($errors->has('gender'))
							<span class="help-block">
							  <strong class="strong t-red">{{ $errors->first('gender') }}</strong>
							</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Job<span>*</span></label>
	                    {{ Form::select('profession', [
	                    	'1' => 'Housewives(byte part and others,present)', 
	                    	'2' => 'Housewives(byte,part other,currently none)', 
	                    	'3' => 'Employee', 
	                    	'4' => 'None'],
	                    	null, ['placeholder' => '-- Please Select Profession --', 'class' => 'form-control col-md-7 col-xs-12']) }}
						@if ($errors->has('profession'))
							<span class="help-block">
							  <strong class="strong t-red">{{ $errors->first('profession') }}</strong>
							</span>
						@endif
	                </div>
              		@if ( $form_type == 'create' )
		                <div class="form-group form-custom-group">
		                  	<label> Image<span>*</span></label>
		                  	{!! Form::file('image', array( 'class' => 'custom-file-input') ) !!}
		                  	@if ($errors->has('image'))
		                    	<span class="help-block">
		                      		<strong class="strong t-red">{{ $errors->first('image') }}</strong>
		                    	</span>
		                  	@endif
		                </div>
		            @endif

	                <div class="form-group form-custom-group">
	                  <label> Status<span>*</span></label>
	                  {{ Form::select('status', ['0' => 'Inactive', '1' => 'Active'], null, ['placeholder' => '-- Select A Status --', 'class' => 'form-control col-md-7 col-xs-12']) }}
	                  @if ($errors->has('status'))
	                    <span class="help-block">
	                      <strong class="strong t-red">{{ $errors->first('status') }}</strong>
	                    </span>
	                  @endif
	                </div>
	                
	                <!-- /.box-body -->
	            </div>
                <div class="box-footer text-center">
                  <button type="submit" class="btn btn-success btn-booking">Submit</button>
                </div>
            {!! Form::close() !!}
      	</div>
    </div>
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

	  	$('.edit-reason .buyer').remove();
	  	$('.edit-reason .seller').remove();

	  	if(userType == 1) {
	  		$('.seller').show();
	    	$('.buyer').hide();
	    	$('.seller').children().children().attr('name','reason_for_registration_edit[]');
	  	}
	  	if(userType == 2) {
	    	$('.buyer').show();
	  		$('.seller').hide();
	    	$('.buyer').children().children().attr('name','reason_for_registration_edit[]');
	  	}
	}

	$(document).ready(function(){		
		initAutocomplete('addressbox');	
	})
	function initAutocomplete(selector) {	  
		var indexMoveFrom = new google.maps.places.Autocomplete(	      
			(document.getElementById(selector)),	      
			{types: ['geocode']});	
	}
</script>
@endsection
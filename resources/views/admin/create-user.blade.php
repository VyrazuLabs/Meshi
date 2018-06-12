@extends('layouts.master')

@section('title')
  Create User
@endsection

@section('add-meta')
    <link href="{{ url('admin_panel/cropper/dist/cropper.min.css') }}" rel="stylesheet">
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
	                  {{ Form::select('type', ['1' => 'Mesh creator (those who want to offer home cooking)', '2' => 'Meshi eater (who wants to eat home cooking)'], null, ['placeholder' => '-- Choose Type --', 'class' => 'form-control','onchange'=>'types()','id'=>'select-type']) }}
	                  @if ($errors->has('type'))
	                    <span class="help-block">
	                      <strong class="strong t-red">{{ $errors->first('type') }}</strong>
	                    </span>
	                  @endif
	                </div>
	                <!-- @if($form_type == 'edit')
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
	                @endif -->

	                <!-- <div class="form-group form-custom-group create-reason" style="display: none;">
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
	                </div> -->
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
	                  	<label>Age<span>*</span></label>
	                    {{ Form::select('age', ['10' => "10's", '20' => "20's", '30' => "Thirties", '40' => 'Forties', '50' => 'Fifties', '60' => "60's", '70' => "70's", '80' => "Age 80" ], null, ['placeholder' => '-- Please Select Age --', 'class' => 'form-control']) }}
						@if ($errors->has('age'))
							<span class="help-block">
							  <strong class="strong t-red">{{ $errors->first('age') }}</strong>
							</span>
						@endif
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
	                  	<label>Area<span>*</span></label>
	                  	{!! Form::text('area', null,
	                          array('class'=>'form-control',
	                                'placeholder'=>'Enter Area')) !!}
						@if ($errors->has('area'))
							<span class="help-block">
							  <strong class="strong t-red">{{ $errors->first('area') }}</strong>
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
	                  	<label>Sex<span>*</span></label>
	                    {{ Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], null, ['placeholder' => '-- Select A Status --', 'class' => 'form-control']) }}
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
	                    	null, ['placeholder' => '-- Please Select Profession --', 'class' => 'form-control']) }}
						@if ($errors->has('profession'))
							<span class="help-block">
							  <strong class="strong t-red">{{ $errors->first('profession') }}</strong>
							</span>
						@endif
	                </div>
	                @if(($form_type == 'edit') && $user->type == 1)
		                <div class="form-group form-custom-group creator-video-link" >
		                  <label>Video Link(Embed Code)</label>
		                  	{!! Form::textarea('video_link_edit', null,
		                          array('class'=>'form-control','rows'=>'3')) !!}
		                </div>
		                <div class="form-group form-custom-group creator-profile-message" >
		                  	<label>Profile Message</label>
		                  	{!! Form::textarea('profile_message_edit', null,
		                          array('class'=>'form-control',
		                                'placeholder'=>'Enter Message From ShareMeshi','rows'=>'4')) !!}
		                  	@if ($errors->has('profile_message_edit'))
		                    	<span class="help-block">
		                      		<strong class="strong t-red">{{ $errors->first('profile_message_edit') }}</strong>
		                    	</span>
		                  	@endif
		                </div>
		                <div class="form-group form-custom-group creator-deliverable-area" >
		                  	<label>Deliverable Area</label>
							{!! Form::text('deliverable_area_edit', null,
						                          array('class'=>'form-control')) !!}
							@if ($errors->has('deliverable_area_edit'))
							  	<span class="help-block error">
							      <strong class="strong">{{ $errors->first('deliverable_area_edit') }}</strong>
							  	</span>
							@endif
		                </div>
	                @endif
	                <div class="form-group form-custom-group creator-video-link" style="display: none;">
	                  <label>Video Link(Embed Code)</label>
	                  	{!! Form::textarea('video_link', null,
	                          array('class'=>'form-control','rows'=>'3')) !!}
	                </div>

	                <div class="form-group form-custom-group creator-profile-message" style="display: none;">
	                  	<label>Profile Message</label>
	                  	{!! Form::textarea('profile_message', null,
	                          array('class'=>'form-control',
	                                'placeholder'=>'Enter Message From ShareMeshi','rows'=>'4')) !!}
	                  	@if ($errors->has('profile_message'))
	                    	<span class="help-block">
	                      		<strong class="strong t-red">{{ $errors->first('profile_message') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group creator-deliverable-area" style="display: none;">
	                  	<label>Deliverable Area</label>
						{!! Form::text('deliverable_area', null,
					                          array('class'=>'form-control')) !!}
						@if ($errors->has('deliverable_area'))
						  	<span class="help-block error">
						      <strong class="strong">{{ $errors->first('deliverable_area') }}</strong>
						  	</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  <label> Status<span>*</span></label>
	                  {{ Form::select('status', ['0' => 'Inactive', '1' => 'Active'], null, ['placeholder' => '-- Select A Status --', 'class' => 'form-control']) }}
	                  @if ($errors->has('status'))
	                    <span class="help-block">
	                      <strong class="strong t-red">{{ $errors->first('status') }}</strong>
	                    </span>
	                  @endif
	                </div>

	                @if(($form_type == 'edit') && $user->type == 1)
	                	<div class="form-group form-custom-group creator-cover-image d-inline-block user-editcoverimg">
					@else($form_type == 'create')
	                	<div class="form-group form-custom-group creator-cover-image" style="display: none;">
	                @endif
		                  	<label>Cover Image</label>
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



	                @if ( $form_type == 'edit' )
		             	<div class="form-group form-custom-group d-inline-block user-editcoverimg item form-group position-relatv">
		            @else
		            	<div class="form-group form-custom-group d-inline-block user-editcoverimg profile-edit-field item form-group position-relatv">
		            @endif
				            <label> Image<span>*</span></label>
                  			<span id="closeCrop" class="create-user-close-crop" title="Cancel" onclick="cancel_crop()">&times;</span>
	                       	<div class="" id="defaultUploadImage" style="">
	                        	<div class="col-md-12 p-0">
	                          		<input type="file" id="uploadFile" name="" class="custom-file-input position-absolute custm-input" onchange="readURL(this);">
	                        	</div>
	                       	</div>
	                       	@if ($errors->has('profile_image'))
		                    	<span class="help-block">
		                      		<strong class="strong t-red">{{ $errors->first('profile_image') }}</strong>
		                    	</span>
		                  	@endif
                   			<div class="" id="alreadyExistImage">
                      			<div class="col-md-12 p-0 preview-step1">
                        			<div class="img-preview">
                      					@if($form_type == 'edit' && !empty($user->image))
		                                	<img src="{{ url('/uploads/profile/picture/'.$user->image) }}" id="profile-img" style="height: 100px;float: right;"/>
                        				@endif
                        			</div>
                      			</div>
                   			</div>
	                       	<div class="testclass img-responsive" id="cropWrapper">
	                        	<div class="col-md-12 p-0">
	                          		<div id="cropImage" style="">
	                            		<img src="" alt="" style="" class="img-responsive">
	                          		</div>
	                        	</div>
	                       	</div>
              			</div>
              			{!! Form::hidden('profile_image', null, [ 'id' => 'profile_img_data' ])!!}
	            	</div>

	            <!-- /.box-body -->
                <div class="box-footer text-center">
                	<button type="submit" id="create_user_submit" class="btn btn-success btn-block btn-booking">Submit</button>
                </div>
            {!! Form::close() !!}
      	</div>
    </div>
@endsection

@section('add-js')
<script src="{{ url('admin_panel/cropper/dist/cropper.min.js') }}"></script>

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
	  	$('.seller').children().children().prop('checked', false);
		$('.buyer').children().children().prop('checked', false);

	  	$('.edit-reason .buyer').remove();
	  	$('.edit-reason .seller').remove();

	  	if(userType == 1) {
	  		$('.seller').show();
	    	$('.buyer').hide();
	    	$('.seller').children().children().attr('name','reason_for_registration_edit[]');
	    	$('.creator-cover-image').show();
	    	$('.creator-deliverable-area').show();
	    	$('.creator-video-link').show();
	    	$('.creator-profile-message').show();
	  	}
	  	if(userType == 2) {
	    	$('.buyer').show();
	  		$('.seller').hide();
	    	$('.buyer').children().children().attr('name','reason_for_registration_edit[]');
	    	$('.creator-cover-image').hide();
	    	$('.creator-deliverable-area').hide();
	    	$('.creator-video-link').hide();
	    	$('.creator-profile-message').hide();

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

<script type="text/javascript">

	var img_src = $('#alreadyExistImage .preview-step1 .img-preview img').attr('src');
    var field_name = 'profile_img_data';
    var cropper_aspectRatio = 1/1;
    var canvas_width = 100;
    var canvas_height = 200;

    //preview of the selected image
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
          	$('.testclass').append('<div class="col-md-12 p-0 crop-btn-box"><button id="imgCrop" type="button" class="btn btn-success btn-block mrgnTop10 create-user-crop-btn" onclick="img_crop()">Crop</button></div>');
              var _html = '<img id="crop-wrapper" src="'+e.target.result+'" alt="" style="width:428px;">';
              $('#cropImage').html(_html);

          };

          reader.readAsDataURL(input.files[0]);

          //hide default crop image
          // $('#defaultUploadImage').hide();
          // hide input type file
          $('#uploadFile').hide();
          //crop wrapper show
          $('#cropWrapper').show();
          //clears the existing image
          $('.custm-input').val('');

          //make the image cropable after 1 sec
          setInterval(function() {
            //crop function call
            makeCropable();
          }, 500);

      }
    }


    //hide the close button
    $('#closeCrop').hide();
    //hide the default image
    // $('#defaultUploadImage').hide();
    //hide the crop div
    $('#cropWrapper').hide();

    //click on upload button
    $('#uploadButton').on('click', function() {
      $('#alreadyExistImage').hide();
      $('#defaultUploadImage').show();
      $('#closeCrop').show();
      // $('.defaultImage').show();
    });
    $('#uploadFile').on('click', function() {
    	$('#closeCrop').show();
    	$('.preview-step1').hide();
    	$('#create_user_submit').attr('disabled', true);
    });

    //click on close button
    // $('#closeCrop').on('click', function() {
    //   $(this).hide();
    //   $('#defaultUploadImage').hide();
    //   $('#cropImage').hide();
    //   $('#alreadyExistImage').show();
    // });



    //make croppable function
    var $image;
    // for add employee step 2 page
    function makeCropable() {
      $image = $('#crop-wrapper');
      var $download = $('#download');
      var $dataX = $('#dataX');
      var $dataY = $('#dataY');
      var $dataHeight = $('#dataHeight');
      var $dataWidth = $('#dataWidth');
      var $dataRotate = $('#dataRotate');
      var $dataScaleX = $('#dataScaleX');
      var $dataScaleY = $('#dataScaleY');
      var options = {
            aspectRatio: cropper_aspectRatio,
            preview: '.img-preview',
            zoomable: true,
            crop: function (e) {
              $dataX.val(Math.round(e.x));
              $dataY.val(Math.round(e.y));
              $dataHeight.val(Math.round(e.height));
              $dataWidth.val(Math.round(e.width));
              $dataRotate.val(e.rotate);
              $dataScaleX.val(e.scaleX);
              $dataScaleY.val(e.scaleY);
            }
          };


      // Tooltip
      $('[data-toggle="tooltip"]').tooltip();

      // Cropper
      $image.cropper(options);
    }

    //function image crop
    function img_crop() {
      var _canvas = $image.cropper('getCroppedCanvas', {width: canvas_width, height: canvas_height});
      $('#alreadyExistImage .preview-step1 .img-preview').html(_canvas);
      $('.format-buttons').append('<div><button type="button" class="btn btn-success cancelCrop" onclick="cancel_crop()">Cancel</button></div>');
      $('#cropImage').hide();
      $('#alreadyExistImage').show();
      $('.img-preview').css({
        'width': '100px',
        'height': '100px'
      });
      $('#uploadButton').hide();
      $('.preview-step1').show();
      $('#imgCrop').remove();
      $('#create_user_submit').attr('disabled', false);
      //save the values in a field
      $('#'+field_name).val(_canvas.toDataURL("image/jpeg", 0.8))
    }



    //function cancel crop
    function cancel_crop() {
      //clear the cropper
      $(this).hide();
      $('#crop-wrapper').cropper("clear");
      $('#imgCrop').remove();
      $('#closeCrop').hide();
      $('.cancelCrop').hide();
      $('#cropImage').show();
      $('#alreadyExistImage').show();
      $('#uploadFile').show();
      $('#cropImage').html('');
      // $('.defaultImage').hide();
      $('#uploadButton').show();
      // console.log('this is a text');
      $('#create_user_submit').attr('disabled', false);
      //$('#cropImage').html('');
      // $('.postion-abs').show();
      // $('.organization-logo').show();

      var _html = '<div class="img-preview"><img src="'+img_src+'" id="profile-img" /></div>';
      $('#alreadyExistImage .preview-step1').html(_html);
      // $('#crop-container').hide();
      // $('#uploadButton').show();
      // // $('#profile-img-container').show();
      // $('#cancelCrop').hide();
      // $('#uploadFile').show();
      // $('#closeCrop').hide();
    }
</script>
@endsection

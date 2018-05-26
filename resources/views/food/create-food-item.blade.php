@extends('layouts.master')

@section('title')
  Create Food Item
@endsection

@section('add-meta')
	<!-- cropper css -->
	<link href="{{ url('frontend/css/cropper/cropper.min.css') }}" rel="stylesheet">
@endsection

@section('content')
	@php
		$crop_button = TranslatedResources::translatedData()['crop_button'];
	@endphp
    <div class="col-md-8">
      	<div class="box box-custom-main">
        	<!-- form start -->
            {!! Form::open(array('url' => route('save_food_item'),'files' => true)) !!}
            	@if(!empty($food_items))
                	{{ Form::model($food_items) }}
              	@endif
                {{Form::hidden('food_item_id',null)}}

              	<div class="box-body">
	                <div class="form-group form-custom-group">
	                  <label> Category<span>*</span></label>
	                  {!! Form::select('category_id', $category_id,null,['class' => 'form-control', 'placeholder' => 'Select Category']) !!}
	                  @if ($errors->has('category_id'))
	                    <span class="help-block error">
	                      <strong class="strong">{{ $errors->first('category_id') }}</strong>
	                    </span>
	                  @endif
	                </div>

	                <div class="form-group form-custom-group">
	                  	<label>Name <span>*</span></label>
						{!! Form::text('item_name', null,
						    array(
						          'class'=>'form-control',
						          'placeholder'=>'Enter Food Item Name')) !!}
						@if ($errors->has('item_name'))
						  	<span class="help-block error">
						      <strong class="strong">{{ $errors->first('item_name') }}</strong>
						  	</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Description<span>*</span></label>
	                  	{!! Form::textarea('food_description', null,
	                          array('class'=>'form-control',
	                                'placeholder'=>'Food Description','rows'=>'4')) !!}
	                  	@if ($errors->has('food_description'))
	                    	<span class="help-block error">
	                      		<strong class="strong">{{ $errors->first('food_description') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Short Info</label>
	                  	{!! Form::textarea('short_info', null,
	                          array('class'=>'form-control',
	                                'placeholder'=>'Short Information','rows'=>'3')) !!}
	                  	@if ($errors->has('short_info'))
	                    	<span class="help-block error">
	                      		<strong class="strong">{{ $errors->first('short_info') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  <label> Offered By<span>*</span></label>
	                  {!! Form::select('offered_by', $offered_by,null,['class' => 'form-control', 'placeholder' => 'Select User']) !!}
	                  @if ($errors->has('offered_by'))
	                    <span class="help-block error">
	                      <strong class="strong">{{ $errors->first('offered_by') }}</strong>
	                    </span>
	                  @endif
	                </div>
	              <!--   <div class="form-group form-custom-group">
		                <label for="exampleInputFile">Upload Food Images <span>*</span></label>
		                {!! Form::file('food_images[]', array('multiple'=>true,'class' => 'custom-file-input' ,'id' => 'food_images') ) !!}
		                  @if( !empty($food_images) )
		                    <div class="form-group">
		                      <div class="col-sm-8" style="width: 100%;">
		                        @foreach( $food_images as $images )
		                          <li  class="gallery-images" style="float: left; list-style: none; margin: 6px;">
		                          <a href="{{route('delete_food_image',[$images,$food_items->food_item_id])}}">X</a>

		                          <img src="{{ url('/uploads/food/'.$images) }}" style="width: 62px; height: 42px;margin-top: 6px;" />
		                          </li>
		                        @endforeach
		                      </div>
		                    </div>
		                  @endif
		                  @if ($errors->has('food_images'))
		                  <span class="help-block error">
		                     <strong class="strong">{{ $errors->first('food_images') }}</strong>
		                  </span>
		                  @endif
		            </div> -->
		            <div class="form-group form-custom-group">
		                <label for="exampleInputFile">Upload Food Images <span>*</span></label>
		                {!! Form::file('food_images[]', array('multiple'=>true,'class' => 'custom-file-input mb-0 custom-food-image-register' ,'id' => 'food_images','accept' => '.jpg,.jpeg,.png', 'onchange' => 'imagesPreview(this)') ) !!}
		                <div class="form-group d-inline-block gallery-images" id="galleryImages">
		                </div>
		                <div id="cropImages" class="col-lg-12 col-xs-12 p-0 float-left"></div>
		                <!-- crop image div generated here -->
		                <div id="cropper">
						  	<canvas id="cropperImg" class="cropper-image-box" width="0" height="0"></canvas>
						</div>
		                <!-- <div class="user-crop-image" id="cropWrapper">
                        	<div class="col-md-12 p-0">
                          		<div id="cropImage" style="">
                            		<img src="" alt="" style="" class="">
                          		</div>
                        	</div>
                        	<div class="crooper-images-crop-btn-block"></div>
                       	</div> -->
                       	{!! Form::hidden('food_item_images', null, [ 'id' => 'food_image_data' ])!!}
		                <!-- code for showing uploded images starts here-->
		                  @if( !empty($food_images) )
		                    <div class="form-group d-inline-block">
		                      <div class="col-sm-8 p-0" style="width: 100%;">
		                        @foreach( $food_images as $images )
		                          	<li  class="gallery-images" style="float: left; list-style: none; margin: 6px;">
		                          		<img src="{{ url('/uploads/food/'.$images) }}" style="width: 62px; height: 42px;margin-top: 6px;" />
		                          		<a href="{{route('delete_food_image',[$images,$food_items->food_item_id])}}"><i class="fa fa-times" aria-hidden="true"></i></a>
									</li>
		                        @endforeach
		                      </div>
		                    </div>
		                  @endif
		                <!-- code for showing uploded images ends here-->

		                  @if ($errors->has('food_images'))
		                  <span class="help-block">
		                     <strong class="strong t-red">{{ $errors->first('food_images') }}</strong>
		                  </span>
		                  @endif
		            </div>
		            <div class="form-group form-custom-group">
		                <label>Date of Delivery <span>*</span></label>
		                {!! Form::text('date_of_availability', null, [
		                                    'class' => 'form-control', 'id' => 'datePicker']) !!}
		                @if ($errors->has('date_of_availability'))
		                  <span class="help-block error">
		                    <strong class="strong">{{ $errors->first('date_of_availability') }}</strong>
		                  </span>
		                @endif
		            </div>
		            <div class="col-sm-12 col-md-12 col-xs-12 p-0  input_fields_wrap">
		            	<div class="col-lg-12 col-xs-12 form-group p-0">
	                		<button class="ad-mre-btn add_field_button pull-right">Add Time Slot</button>
	                	</div>
	                	<div class="clearfix"></div>
	                	@if(!empty($time_of_availability))
		                  	@foreach($time_of_availability as $key => $slot)
		                  		<div class="col-lg-12 col-xs-12 p-0">
		                  			<i class="fa fa-times float-right time-cross" aria-hidden="true"></i>
		                    		<div class="start-time-id">
				                      	<div class="form-group form-custom-group  col-sm-6 col-md-6 col-xs-12 create-food-timestart" >
				                       	 	<label>Start Time <span>*</span></label>
				                        	{!! Form::text('time_of_availability[0][start_time][]', $key, array('class'=>'form-control timepickerid')) !!}
					                        @if ($errors->has('time_of_availability'))
					                          <span class="help-block error">
					                            <strong class="strong">{{ $errors->first('time_of_availability') }}</strong>
					                          </span>
					                        @endif
				                      	</div>
				                      	<div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 create-food-timeend" >
				                        	<div class="ad-mre-btn pull-right"></div>
				                        	<label>End Time <span>*</span></label>
				                        	{!! Form::text('time_of_availability[0][end_time][]', $slot, array('class'=>'form-control seat timepickerid')) !!}
				                      	</div>
		                    		</div>
		                    	</div>
	                  		@endforeach
	                	@else
	                		<div class="col-lg-12 col-xs-12 p-0">
		                  		<div class="start-time-id">
		                    		<div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 create-food-timestart" >
		                      			<label>Start Time <span>*</span></label>
		                      			{{ Form::text('time_of_availability[0][start_time][]', null, ['class' => 'form-control timepickerid']) }}

					                    @if ($errors->has('time_of_availability'))
					                        <span class="help-block error error">
					                         	<strong class="strong">{{ $errors->first('time_of_availability') }}</strong>
					                        </span>
					                    @endif
		                    		</div>
				                    <div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 create-food-timeend" >
				                      <div class="ad-mre-btn pull-right"></div>
				                      <label>End Time <span>*</span></label>
				                      {{ Form::text('time_of_availability[0][end_time][]', null, ['class' => 'form-control seat timepickerid','id' =>'seat_id' ]) }}
				                    </div>
		                  		</div>
		                  	</div>
	                	@endif
	              	</div>
              		<div class="clearfix"></div>

	                <!-- <div class="form-group form-custom-group">
	                  	<label>Shipping Fee</label>
						{!! Form::text('shipping_fee', null,
						    array(
						          'class'=>'form-control',
						          'placeholder'=>'Enter Shipping Charge')) !!}
						@if ($errors->has('shipping_fee'))
						  	<span class="help-block error">
						      <strong class="strong">{{ $errors->first('shipping_fee') }}</strong>
						  	</span>
						@endif
	                </div> -->
	                <div class="form-group form-custom-group">
	                  	<label>Price <span>*</span></label>
						{!! Form::text('price', null,
						    array(
						          'class'=>'form-control',
						          'id' => 'foodPrice',
						          'placeholder'=>'Enter Base Amount')) !!}
						@if ($errors->has('price'))
						  	<span class="help-block error">
						      <strong class="strong">{{ $errors->first('price') }}</strong>
						  	</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Quantity <span>*</span></label>
						{!! Form::text('quantity', null,
						    array(
						          'class'=>'form-control',
						          'id' => 'quantityId',
						          'placeholder'=>'Enter Quantity')) !!}
						@if ($errors->has('quantity'))
						  	<span class="help-block error">
						      <strong class="strong">{{ $errors->first('quantity') }}</strong>
						  	</span>
						@endif
	                </div>
	                <div class="col-lg-12 col-xs-12 p-0 d-inline-block">
                  		<div class="start-time-id float-left">
                  			<div class="form-group form-custom-group create-food-timestart col-sm-6 col-md-6 col-xs-12 pl-0 " >
                      			<label>Start Publication Date<span>*</span></label>
                      			<!-- <input type="text" class="form-control food-item-date" name=""> -->
                      			{!! Form::text('start_publication_date', null,
						    array(
						          'class'=>'form-control food-item-date')) !!}
                    		</div>
		                    <div class="form-group form-custom-group create-food-timestart col-sm-6 col-md-6 col-xs-12 pr-0" >
		                      <div class="ad-mre-btn pull-right"></div>
		                      <label>End Publication Date<span>*</span></label>
		                      <!-- {{ Form::text('time_of_availability[0][end_time][]', null, ['class' => 'form-control seat timepickerid','id' =>'seat_id' ]) }} -->
		                      <!-- <input type="text" class="form-control food-item-date"> -->
		                      {!! Form::text('end_publication_date', null,
						    array(
						          'class'=>'form-control food-item-date')) !!}
		                    </div>
		                    @if ($errors->has('time_of_availability'))
	                          <span class="help-block">
	                            <strong class="strong t-red">{{ $errors->first('time_of_availability') }}</strong>
	                          </span>
	                        @endif
                  		</div>
                  	</div>
	                <div class="form-group form-custom-group">
	                  <label> Status<span>*</span></label>
	                  {{ Form::select('status', ['0' => 'Inactive', '1' => 'Active'], null, ['placeholder' => '-- Select A Status --', 'class' => 'form-control']) }}
	                  @if ($errors->has('status'))
	                    <span class="help-block error">
	                      <strong class="strong">{{ $errors->first('status') }}</strong>
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
<!-- cropper js -->
<script src="{{ url('frontend/js/cropper/cropper.min.js') }}"></script>
<script type="text/javascript">

	// crop button
	var translatedData = '{{$crop_button}}';

	//Date picker
  	$('#datePicker').datepicker({
    	format: 'yyyy-mm-dd',
    	autoclose: true,
    	todayHighlight: true,
  	});


  	//FOOD PRICE FIELD SHOULD BE NUMERIC
	$('#foodPrice').keypress(function (e) {
	    var regex = new RegExp("^[0-9-]+$");
	    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
	    if (regex.test(str)) {
	      return true;
	    }
	    e.preventDefault();
	    return false;
	});

  	//QUANTITY SHOULD BE NUMERIC
  	$('#quantityId').keypress(function (e) {
    	var regex = new RegExp("^[0-9-]+$");
    	var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    	if (regex.test(str)) {
      		return true;
    	}
    	e.preventDefault();
    	return false;
  	});


	// append time slots starts here
  	$(document).ready(function() {
	    var max_fields      = 10; //maximum input boxes allowed
	    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	    var add_button      = $(".add_field_button"); //Add button ID
	    var count = 0;

	    var x = 1; //initlal text box count
	    $(add_button).on('click',function(e){ //on add input button click
	      count ++;
	      e.preventDefault();
	      if(x < max_fields){ //max input box allowed
	        x++; //text box increment

	        $(wrapper).append('<div class="col-lg-12 col-xs-12 p-0 float-left"><i class="fa fa-times float-right time-cross" onclick="closetimeslot(this)" aria-hidden="true"></i><div class="start-time-id float-left"><div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 create-food-timestart"><label>Start Time <span>*</span></label><input class="form-control blink-cursor timepickerid " name="time_of_availability[0][start_time][]" type="text" value=""></div><div class="form-group form-custom-group col-sm-6 col-md-6 col-xs-12 create-food-timeend"><div class="ad-mre-btn pull-right"></div><label>End Time <span>*</span></label><input class="form-control timepickerid " name="time_of_availability[0][end_time][]" type="text" value=""></div></div></div>');

	        $('.timepickerid').timepicker({
		      showMeridian: false,
		      disableMousewheel: true
		    });
	      }
	    });
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	      e.preventDefault(); $(this).parent('div').remove(); x--;
	    });
	});

	//Time picker
  	$('.timepickerid').timepicker({
      showMeridian: false,
      disableMousewheel: true
    });
    $('.time-cross').click(function(){
    	closetimeslot(this);
	});

    function closetimeslot(selector) {
		$(selector).parent().remove();
    }

    $(function () {
	    $('.food-item-date').datetimepicker({
	        format: 'YYYY-MM-DD HH:mm',
	        locale: 'ja'
	    });
	});

	// multiple food images upload
	// Multiple images preview in browser
	var c;
	function imagesPreview(input) {
		var j= 0;
	  	var cropper;
	  	var _html = "";
	  	document.getElementById('galleryImages').innerHTML = "";
	  	var img = [];
	  	if(document.getElementById('cropperImg').cropper){
	    	document.getElementById('cropperImg').cropper.destroy();
	    	document.getElementById('cropImageBtn').remove();
	  	}
	  	if (input.files) {
	    	var index = 0;
	    	for (singleFile of input.files) {
	      		var reader = new FileReader();
	      		reader.onload = function(event) {
	        		var blobUrl = event.target.result;
	        		img.push(new Image());
	        		img[j].onload = function(e) {
		        		// Canvas Container
			          	var singleCanvasImageContainer = document.createElement("div");
			          	singleCanvasImageContainer.id = 'singleImageCanvasContainer'+index;
			          	singleCanvasImageContainer.className = 'singleImageCanvasContainer';
		        		// Canvas Close Btn
			          	var singleCanvasImageCloseBtn = document.createElement("button");
			          	var singleCanvasImageCloseBtnText = document.createElement("i");
			          	singleCanvasImageCloseBtnText.className = "fa fa-times";
			          	singleCanvasImageCloseBtn.id = 'singleImageCanvasCloseBtn'+index;
			          	singleCanvasImageCloseBtn.className = 'singleImageCanvasCloseBtn';
			          	singleCanvasImageCloseBtn.onclick = function() { removeSingleCanvas(this) };
			          	singleCanvasImageCloseBtn.appendChild(singleCanvasImageCloseBtnText);
			          	singleCanvasImageContainer.appendChild(singleCanvasImageCloseBtn)
		        		// Image Canvas
			        	var canvas = document.createElement("canvas");
			        	canvas.id = 'imageCanvas'+index;
			        	canvas.className = 'imageCanvas singleImageCanvas';
			        	canvas.width = e.currentTarget.width;
			        	canvas.height = e.currentTarget.height;
			        	canvas.onclick = function() { cropInitOnClick(canvas.id); };
			        	singleCanvasImageContainer.appendChild(canvas)
	          			// Canvas Context
			        	var ctx = canvas.getContext("2d");
			        	ctx.drawImage(e.currentTarget,0,0);
			        	document.getElementById('galleryImages').appendChild(singleCanvasImageContainer);
			        	urlConversion();
			        	cropInit('imageCanvas0');
			        	index++;
		        	};
	        		img[j].src = blobUrl;
	        		j++;
	      		}
	      		reader.readAsDataURL(singleFile);
	    	}
	  	}
	  	addCropButton();
	}
	function cropInit(selector) {
		c=document.getElementById(selector);
		var allCloseButtons = document.querySelectorAll('.singleImageCanvasCloseBtn');
		for (let element of allCloseButtons) {
			element.style.display = 'block';
		}
		c.previousSibling.style.display = 'none';
		// c.id = croppedImg;
		var ctx=c.getContext("2d");
		var imgData=ctx.getImageData(0, 0, c.width, c.height);
		var image = document.getElementById('cropperImg');
		image.width = c.width;
		image.height = c.height;
		var ctx = image.getContext("2d");
		ctx.putImageData(imgData,0,0);
		cropper = new Cropper(image, {
			aspectRatio: 1 / 1,
		});
	}
	function cropInitOnClick(selector) {
		if(document.getElementById('cropperImg').cropper){
		    document.getElementById('cropperImg').cropper.destroy();
	    	document.getElementById('cropImageBtn').remove();
		    cropInit(selector);
	    	addCropButton();
		} else {
		    cropInit(selector);
	    	addCropButton();
		}
	}
	function image_crop() {
      	var cropcanvas = document.getElementById("cropperImg").cropper.getCroppedCanvas({width: 250, height: 250});
		// document.getElementById('cropImages').appendChild(cropcanvas);
		var ctx=cropcanvas.getContext("2d");
		var imgData=ctx.getImageData(0, 0, cropcanvas.width, cropcanvas.height);
		// var image = document.getElementById(c);
		c.width = cropcanvas.width;
		c.height = cropcanvas.height;
		var ctx = c.getContext("2d");
		ctx.putImageData(imgData,0,0);
		document.getElementById('cropperImg').cropper.destroy();
		document.getElementById('cropImageBtn').remove();
		urlConversion();
		document.getElementById('cropperImg').width = 0;
		document.getElementById('cropperImg').height = 0;
    }
	function removeSingleCanvas(selector) {
	  	selector.parentNode.remove();
	  	urlConversion();
	}
	function addCropButton() {
		// add crop button
	   	var cropBtn = document.createElement("button");
	   	cropBtn.setAttribute('type', 'button');
	   	cropBtn.id = 'cropImageBtn';
	   	cropBtn.className = "btn btn-block crop-button";
	    var cropBtntext = document.createTextNode(translatedData);
	    cropBtn.appendChild(cropBtntext);
	    document.getElementById("cropper").appendChild(cropBtn);
	    cropBtn.onclick = function() { image_crop(cropBtn.id); };
	}
	function urlConversion() {
	  	var allImageCanvas = document.querySelectorAll('.singleImageCanvas');
	  	var convertedUrl = "";
	  	for (let element of allImageCanvas) {
	    	convertedUrl += element.toDataURL("image/jpeg");
	  		convertedUrl += "img_url";
	  	}
	  	document.getElementById('food_image_data').value = convertedUrl;
	}
</script>
@endsection

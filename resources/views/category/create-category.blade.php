@extends('layouts.master')

@section('title')
  Create Category
@endsection

@section('add-meta')
@endsection

@section('content')
    <div class="col-md-8">
      	<div class="box box-custom-main">
        	<!-- form start -->
            {!! Form::open(array('url' => route('save_category'))) !!}
            	@if(!empty($category))
                	{{ Form::model($category) }}
                	{{Form::hidden('category_id',null)}}
              	@endif

              	<div class="box-body">
              		<div class="form-group form-custom-group">
	                  	<label> Choose Parent Category<span>*</span></label>
	                  	{{ Form::select('parent_id', $parent_id, null, ['placeholder' => 'Default','class' => 'form-control form-complain-box','id' => 'select-category']) }}
	                  	@if ($errors->has('parent_id'))
	                    	<span class="help-block">
	                      		<strong class="strong">{{ $errors->first('parent_id') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
                  		<label>Name <span>*</span>
                  			<span id="show-count-span" style="display: none;">(<span id="c-count-val">15</span> Chracters Left)</span>
                  			<span id="show-default-span" style="display: none;">(Total 15 Chracters)</span>
                  		</label>
						{!! Form::text('category_name', null,
						    array(
						          'class'=>'form-control c-counter',
						          'placeholder'=>'Enter Category Name','maxlength'=>'15')) !!}
						@if ($errors->has('category_name'))
						  	<span class="help-block">
						      <strong class="strong">{{ $errors->first('category_name') }}</strong>
						  	</span>
						@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  	<label>Description<span>*</span></label>
	                  	{!! Form::textarea('description', null,
	                          array('class'=>'form-control',
	                                'placeholder'=>'Category Description','rows'=>'3')) !!}
	                  	@if ($errors->has('description'))
	                    	<span class="help-block">
	                      		<strong class="strong">{{ $errors->first('description') }}</strong>
	                    	</span>
	                  	@endif
	                </div>
	                <div class="form-group form-custom-group">
	                  <label> Status<span>*</span></label>
	                  {{ Form::select('status', ['0' => 'Inactive', '1' => 'Active'], null, ['placeholder' => '-- Select A Status --', 'class' => 'form-control']) }}
	                  @if ($errors->has('status'))
	                    <span class="help-block">
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
<script type="text/javascript">
	$('#show-count-span').hide();
	$('#show-default-span').show();
	$('.c-counter').keyup(function() {
	$('#show-default-span').hide();
	$('#show-count-span').show();
	    var max_length = 15;
	    var input_length_left = max_length - $(this).val().length;
	    if( input_length_left < 0 ) {
	      input_length_left = 0;
	      $("#").text("Characters left: " + (15 - $(this).val().length));
	    }
	    $('#c-count-val').html(input_length_left);
  	});
</script>
@endsection

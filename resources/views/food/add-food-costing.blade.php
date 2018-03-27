@extends('layouts.master')

@section('title')
  Create Food Item
@endsection

@section('add-meta')
@endsection

@section('content')
     <section class="services-wrapper content container-fluid text-center">
      <div class="services-table col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p class="maid-table-header">Food Item Costing List</p>
        <div class="table-box box box-theme text-left">
          <!-- /.box-header -->
          <div class="box-body text-left table-responsive">
            <table id="servicesTable" class="services-table table-text-right table table-bordered table-striped">
              	<thead>
	                <tr>
						<th>Tax</th>
						<th>Amount</th>
						<th>Action</th>
	                </tr>
              	</thead>
              	<tbody>
					@if($foodCosting->isNotEmpty())
	                	@foreach($foodCosting as $costing)
						<tr>
	                		<td>{{$costing->tax_name}}</td>
	                		<td>{{$costing->tax_amount}}</td>
	                		<td>
								<a href="{{route('edit_food_item_costing',['food_item_id' => $costing->food_item_id,'tax_id' => $costing->tax_id])}}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							</td>
	                	</tr>
	                	@endforeach
	                @endif
              	</tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- <button class="table-more-btn btn btn-theme">More</button> -->
      </div>
    </section>
    

    <section class="add-service-wrapper content container-fluid text-center">
      	<div class="add-service d-inline-block float-none col-lg-12 col-md-12 col-sm-10 col-xs-12 text-center">
      		<p class="maid-admin-header d-inline-block">
	      	@if($form_type == 'edit')
			    Edit Tax Attributes
			@else
			    Add Tax Attributes
			@endif
          	</p>
          	
          	<div class="content-box box box-theme text-left">
	            <div class="box-header">
	            	<h3 class="box-title">
					</h3>
					@if($form_type == 'edit')
			          	<a href="{{route('add_food_item_costing',['food_item_id' => $food_item_id])}}" class="float-right d-inline-block">
			    			<button class="table-more-btn btn btn-theme add-emp-addnowbtn" style="padding: 7px;">Add New</button>
						</a>
					@endif
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body add-service-box-body text-left">
	            	{{ Form::open([
			              "url" => route('save_food_item_costing'), 
			              "method" => "POST", 
			            ])
			        }}

				        @if(!empty($tax))
					    	{{ Form::model($tax) }}
			            @endif			
			        	{{Form::hidden('tax_id',null)}}
			        	{{Form::hidden('food_item_id',$food_item_id)}}


	        			<div class="form-group form-custom-group">
		                  	<label>Tax Name <span>*</span></label>
							{!! Form::text('tax_name', null, 
							    array(
							          'class'=>'form-control', 
							          'placeholder'=>'Enter Tax Name')) !!}
							@if ($errors->has('tax_name'))
							  	<span class="help-block">
							      <strong class="strong">{{ $errors->first('tax_name') }}</strong>
							  	</span>
							@endif
		                </div>

		                <div class="form-group form-custom-group">
		                  	<label>Tax Amount <span>*</span></label>
							{!! Form::text('tax_amount', null, 
							    array(
							          'class'=>'form-control', 
							          'placeholder'=>'Enter Tax Amount')) !!}
							@if ($errors->has('tax_amount'))
							  	<span class="help-block">
							      <strong class="strong">{{ $errors->first('tax_amount') }}</strong>
							  	</span>
							@endif
		                </div>

		                <div class="form-group form-custom-group">
		                  	<label>Tax Percentage(%) <span>*</span></label>
							{!! Form::text('tax_percentage', null, 
							    array(
							          'class'=>'form-control', 
							          'placeholder'=>'Enter Tax Percentage')) !!}
							@if ($errors->has('tax_percentage'))
							  	<span class="help-block">
							      <strong class="strong">{{ $errors->first('tax_percentage') }}</strong>
							  	</span>
							@endif
		                </div>
			            <div class="box-footer text-center">
	                  		<button type="submit" class="btn btn-success btn-booking">Submit</button>
	                	</div>
	            	{{Form::close()}}
	            </div>
            	<!-- /.box-footer -->
          	</div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('add-js')

@endsection
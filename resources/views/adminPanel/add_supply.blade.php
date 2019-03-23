
@extends('adminPanel.layout')
@section('content')
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Add New product</h2>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="{{url('/admin/products/'.$product->id.'/addsupply')}}" method="post" enctype = "multipart/form-data">
					{{csrf_field()}}
					<fieldset>
						<div class="control-group">
							<div class="controls">
								{{-- <img src="/upload/{{$product->image}}"> --}}
								<img src="/upload/1553235736.jpg" style="width:400px;height:300px;">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead"></label>
							<div class="controls">
								<h3 style="color:green">
									<?php
										$supply_success = Session::get('supply_success');
										if($supply_success){
											echo($supply_success);
											Session::put('supply_success',null);
										}
									?>
								</h3>
							</div>
						</div> 
						
						<div class="control-group">
							<label class="control-label" for="typeahead">product Name</label>
							<div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  name = "product_name" value={{$product->name}} disabled>
							</div>
						</div> 
						<div class="control-group">
							<label class="control-label" for="typeahead">Category</label>
							<div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"   value={{$product->sub_category_id}} disabled>
							</div>
						</div>            
						<div class="control-group">
							<label class="control-label" for="typeahead">Price</label>
							<div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"   value={{$product->price}} disabled>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">Available</label>
							<div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"   value={{$product->stock}} disabled>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="typeahead">New Supply</label>
							<div class="controls">
									<input type="text" class="span6 typeahead" id="typeahead"  name = "add_stock"}}>
							</div>
						</div>        
						<div class="form-actions">
							<button type="submit" class="btn btn-primary" name = "submit" value= "publish">Add New Supply</button>
						</div>
					</fieldset>
				</form>   
			</div>
		</div>
	</div>
@endsection
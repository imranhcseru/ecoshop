
@extends('adminPanel.layout')
@section('content')
	<div class="row-fluid">	
		<a class="quick-button metro green span2" href="{{url('/admin/categories')}}">
			<i class="icon-barcode"></i>
			<p>Categories</p>
		</a>
		<a class="quick-button metro yellow span2" href="{{url('/admin/users')}}">
			<i class="icon-group"></i>
			<p>Users</p>
		</a>
		<a class="quick-button metro red span2" href="{{url('/admin/reviews')}}">
			<i class="icon-comments-alt"></i>
			<p>Reviews</p>
		</a>
		<a class="quick-button metro blue span2" href="{{url('/admin/allorders')}}">
			<i class="icon-shopping-cart"></i>
			<p>All Orders</p>
		</a>
		<a class="quick-button metro green span2" href="{{url('/admin/products')}}">
			<i class="icon-barcode"></i>
			<p>All Products</p>
		</a>
		<a class="quick-button metro yellow span2" href="{{url('/admin/admins')}}">
			<i class="icon-group"></i>
			<p>Admins</p>
		</a>
		<div class="clearfix"></div>		
	</div>
	<br><br>
	<div class="clearfix"></div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Products Published Recently</h2>
			</div>
			<div class="box-content">
			<h3 style="color:green">
				<?php
					$change_message = Session::get('change_message');
					if($change_message){
						echo($change_message);
						Session::put('change_message',null);
					}
				?>
			</h3>
			<table class="table ">
				<thead>
					<tr>
						<th>Product</th>
						<th>Sub Category</th>
						<th>Stock</th>
						<th>Published at</th>
						<th>Added By</th>
					</tr>
				</thead>   
				<tbody>
					@foreach($data['products'] as $product)
						<tr>
							<td>{{$product->name}}</td>
							<td>{{$product->sub_category_id}}</td>
							<td>{{$product->stock}}</td>
							<td>{{$product->created_at}}</td>
							<td>{{$product->admin_id}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>            
		</div>
	</div>
	<div class="clearfix"></div>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon edit"></i><span class="break"></span>Unserved Orders</h2>
				</div>
				<div class="box-content">
				<h3 style="color:green">
					<?php
						$serve_success = Session::get('serve_success');
						if($serve_success){
							echo($serve_success);
							Session::put('serve_success',null);
						}
					?>
				</h3>
				<h3 style="color:red">
					<?php
						$serve_failed = Session::get('serve_failed');
						if($serve_failed){
							echo($serve_failed);
							Session::put('serve_failed',null);
						}
					?>
				</h3>
				<table class="table ">
					<thead>
						<tr>
							<th>Item</th>
							<th>Quantity</th>
							<th>Name</th>
							<th>Email</th>
							<th>Contact Number</th>
							<th>Address</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						</tr>
					</tbody>
				</table>            
			</div>
		</div>
	</div>
@endsection
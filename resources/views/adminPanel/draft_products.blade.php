
@extends('adminPanel.layout')
@section('content')
	<div class="row-fluid sortable">
        <div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Draft products</h2>
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
							<th>Item</th>
							<th>Category</th>
							<th>Stock</th>
							<th>Created At</th>
							<th>Added By</th>
							<th>Actions</th>
						</tr>
					</thead>   
					<tbody>
					@foreach($products as $product)
					<tr>
						<td>
							<a class="btn btn-info" href="{{url('/admin/products/'.$product->id.'/details')}}">
								{{$product->name}}
							</a>
						</td>
						<td>{{$product->subCategory->name}}</td>
						<td>{{$product->stock}}</td>
						<td>{{$product->created_at}}</td>
						<td>{{$product->admin->first_name}} &nbsp;&nbsp;{{$product->admin->last_name}}</td>
						<td class="center">
							<a class="btn btn-info" href="{{url('/admin/addsupply/'.$product->id)}}">
								<i>Add Supply</i>  
							</a>
							<a class="btn btn-danger" href="{{url('/admin/products/'.$product->id.'/changetype')}}" onclick="return confirm('Are you sure you want to Publish this product?');">
								<i>Publish</i> 
							</a>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>            
			</div>
		</div>
	</div>
@endsection
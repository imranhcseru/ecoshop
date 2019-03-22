
@extends('adminPanel.layout')
@section('content')
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>All Admins</h2>
			</div>
			<div class="box-content">
				<h3 style="color:green">
					<?php
						$admin_success = Session::get('admin_success');
						$admin_delete = Session::get('admin_delete');
						if($admin_success){
							echo($admin_success);
							Session::put('admin_success',null);
						}
						if($admin_delete){
							echo($admin_delete);
							Session::put('admin_delete',null);
						}
					?>
				</h3>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Added Date</th>
							<th>Action</th>
						</tr>
					</thead>   
					<tbody>
						@foreach($admins as $admin)
							<tr>
								<td>{{$admin->first_name}}&nbsp;&nbsp;{{$admin->last_name}}</td>
								<td>{{$admin->email}}</td>
								<td>{{$admin->created_at}}</td>
								<td class="center">
									<a class="btn btn-danger" href="{{url('/admin/admins/'.$admin->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this Item?');">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>           
			{{-- <div id = "admins">
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Added Date</th>
							<th>Action</th>
						</tr>
					</thead>   
					<tbody>
						<div v-for = "admin in admins">
							<tr>
								<td>@{{admin.first_name}}&nbsp;&nbsp;@{{admin.last_name}}</td>
								<td>@{{admin.email}}</td>
								<td>@{{admin.created_at}}</td>
								<td class="center">
									<a class="btn btn-info" href="#">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						</div>
					</tbody>
				</table>--}}
			</div>             
		</div>
	</div>
	<script>
		new Vue({
			el: '#admins',
			data () {
			return {
				admins: null
			}
			},
			mounted () {
			axios
				.get('http://127.0.0.1:8000/api/admins')
				.then(response => (this.admins = response.data.data))
			}
		});
	</script>
@endsection
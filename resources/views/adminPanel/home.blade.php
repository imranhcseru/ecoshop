
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
				<a class="quick-button metro green span2" href="{{url('/admin/allitems')}}">
					<i class="icon-barcode"></i>
					<p>All Items</p>
				</a>
				<a class="quick-button metro yellow span2" href="{{url('/admin/alladmins')}}">
					<i class="icon-group"></i>
					<p>Admins</p>
					
				</a>
				
				<div class="clearfix"></div>
								
			</div><!--/row-->
            <div class="clearfix"></div>
            <div class="row-fluid sortable">
        <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Published Items</h2>
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
								  <th>Available Product</th>
                                  <th>Create Date</th>
                                  <th>Added By</th>
								  <th>Actions</th>
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
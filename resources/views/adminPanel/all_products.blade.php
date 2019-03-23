
@extends('adminPanel.layout')
@section('content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>All Items</h2>
            </div>
            <div class="box-content">
            <h3 style="color:green">
                <?php
                    $product_update = Session::get('product_update');
                    $product_delete = Session::get('product_delete');
                    $add_product = Session::get('add_product');
                    if($product_delete){
                        echo($product_delete);
                        Session::put('product_delete',null);
                    }
                    if($product_update){
                        echo($product_update);
                        Session::put('product_update',null);
                    }
                    if($add_product){
                        echo($add_product);
                        Session::put('add_product',null);
                    }
                ?>
            </h3>
            <table class="table ">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Published/Draft</th>
                        <th>Create Date</th>
                        <th>Updated date</th>
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
                        <td>{{$product->price}}</td>
                        <td>{{$product->type}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->admin->first_name}} &nbsp;&nbsp;{{$product->admin->last_name}}</td>
                        <td class="center">
                            <a class="btn btn-info" href="{{url('/admin/products/'.$product->id.'/edit')}}">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="{{url('/admin/products/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this Item?');">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div>
@endsection
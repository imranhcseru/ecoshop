
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
                    $update_item = Session::get('update_item');
                    $delete_item = Session::get('delete_item');
                    if($delete_item){
                        echo($delete_item);
                        Session::put('delete_item',null);
                    }
                    if($update_item){
                        echo($update_item);
                        Session::put('update_item',null);
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
                        <td>{{$product->name}}</td>
                        <td>{{$product->sub_category_id}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->type}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->updated_at}}</td>
                        <td>{{$product->admin_id}}</td>
                        <td class="center">
                            <a class="btn btn-info" href="{{url('/admin/editproduct/'.$product->id)}}">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="{{url('/admin/deleteproduct/'.$product->id)}}" onclick="return confirm('Are you sure you want to delete this Item?');">
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
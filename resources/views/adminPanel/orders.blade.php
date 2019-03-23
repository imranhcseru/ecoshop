
@extends('adminPanel.layout')
@section('content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>All Orders</h2>
            </div>
            <div class="box-content">
            <div class="box-content">
                <h3 style="color:green">
                    <?php
                        $order_delete = Session::get('order_delete');
                        if($order_delete){
                            echo($order_delete);
                            Session::put('order_delete',null);
                        }
                    ?>
                </h3>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Total Fee</th>
                            <th>Served/Unserved</th>
                            <th>Ordered at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{$order->name}}
                                </td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->phonenumber}}</td>
                                <td>{{$order->totalfee}}</td>
                                <td>{{$order->serve}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{url('/admin/orders/'.$order->id.'/details')}}">
                                        <i class="halflings-icon white eye-open"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="{{url('/admin/orders/'.$order->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this Order?');">
                                        <i class="halflings-icon white trash"></i> 
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
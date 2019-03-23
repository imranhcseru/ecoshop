
@extends('adminPanel.layout')
@section('content')
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
                <table class="table ">
                    <thead>
                        <tr>   
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Total Fee</th>
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
                            <td>{{$order->totalfee}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->served_at}}</td>
                            <td>{{Session::get('user_name')}}</td>
                            <td>
                                <a class="btn btn-info" href="{{url('/admin/orders/'.$order->id.'/details')}}">
                                    <i class="halflings-icon white eye-open"></i>  
                                </a>
                                <a class="btn btn-danger" href="{{url('/admin/orders/'.$order->id.'/serve')}}" onclick="return confirm('Are you sure you want to Serve this Order?');">
                                    <i class="halflings-icon white ok"></i> 
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
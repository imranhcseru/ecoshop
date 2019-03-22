
@extends('back_end.layout')
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
                            <th>Order Number</th>
                            <th>Customer</th>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>    
            </div>         
        </div>
    </div>		
@endsection
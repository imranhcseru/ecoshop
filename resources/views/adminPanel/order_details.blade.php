@extends('adminPanel.layout')
@section('content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Order Details</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal">
                    <fieldset>      
                        <br><br>
                        <div class="box-header" data-original-title style="background-color:lightblue">
                            <h2></span>Products Ordered</h2>
                        </div>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Available</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['orderproduct'] as $orderproduct)
                                    <tr>
                                        <td>
                                            <a class="btn btn-info" href="{{url('/admin/products/'.$orderproduct->product->id.'/details')}}">
                                                {{$orderproduct->product->name}}
                                            </a>
                                        </td>
                                        <td>{{$orderproduct->product->stock}}</td>
                                        <td>{{$orderproduct->product->price}}</td>
                                        <td>{{$orderproduct->quantity}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>  
                        <div class="box-header" data-original-title style="background-color:lightblue">
                            <h2></span>Other Information</h2>
                        </div>      
                        <br><br>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Customer Name</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$data['order']->name}} disabled>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Customer Email</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$data['order']->email}} disabled>
                            </div>
                        </div>  
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Customer Phone Number</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$data['order']->phonenumber}} disabled>
                            </div>
                        </div>   
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Address</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$data['order']->address}} disabled>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Total Fee</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$data['order']->totalfee}} disabled>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Card Name</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$data['order']->cardname}} disabled>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Card Number</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$data['order']->cardnumber}} disabled>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Order Date</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$data['order']->created_at}} disabled>
                            </div>
                        </div>       
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Serve Status</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$data['order']->serve}} disabled>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
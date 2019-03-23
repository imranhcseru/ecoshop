
@extends('userPanel.layout')
@section('checkoutContent')
<div class="container">
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 ">
                    <div class="box span12 bg-light">
                        <div class="box-header" data-original-title>
                            <h2><i class="halflings-icon edit"></i><span class="break"></span>Billing Information</h2>
                        </div>
                        <div class="box-content">
                <form class="form-horizontal" action="{{url('/checkout')}}" method="post" enctype = "multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Name</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name = "name" required>
                            </div>
                        </div>           
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Email</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name = "email" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Address</label>
                            <div class="controls">
                                <input type="address" class="span6 typeahead" id="typeahead"  name = "address" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Phone Number</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name = "phonenumber" required>
                            </div>
                        </div>
                        <div class="box-header" data-original-title>
                            <h2><i class="halflings-icon edit"></i><span class="break"></span>Payment Information</h2>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Card Name</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name = "cardname" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Card Number</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name = "cardnumber" required>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary" name = "submit" >Order Now</button>
                        </div>
                    </fieldset>
                 
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
        <div class="box span12 bg-light">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Your Order</h2>
            </div>
            <hr>
            <div class="box-content">
                <table class="table ">
                    <thead>
                        <tr>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                        </tr>
                    </thead>   
                    <tbody>
                        @for($id = 0;$id < $data['length'];$id++)
                        <tr>
                            <td><img src = "/images/0a09d8530691a1c23a4e4f4ec3eeff2a.jpg" style = "height:80px;width:80px;"></td>
                            <td>{{$data[$id]->name}}</td>
                            <td>{{$data[$id]->price}}</td>
                            <td>1</td>
                        </tr>
                        @endfor
                    </tbody>
                </table> 
                <hr>   
            </div>
        </div>
        <div class="box span12 bg-light">
            <div class="box-content">
                <?php
                    $price = 0;$sheepFee = 100;$totalPrice = 0;
                    for($id = 0;$id < $data['length'];$id++)
                        $price = $data[$id]->price + $price;
                    $totalPrice = $price + $sheepFee;
                ?>
                <input type = "hidden" name = "totalfee" value = "<?php echo $totalPrice?>">
                <h3 style = "color:green;">Subtotal Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;{{$price}}</h3>
                <h3>Shipping Fee&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;{{$sheepFee}}</h3>
                <h3 style = "color:red;">Total Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;{{$totalPrice}}</h3>
                <br>
            </div>
        </div>
    </div>
</form>
</div>
</div>
@endsection

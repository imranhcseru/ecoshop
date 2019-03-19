@extends('userPanel.layout')
@section('cartContent')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 ">
                <div class="box span12 bg-light">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Products on Cart</h2>
                    </div>
                    <div class="box-content">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th ></th>
                                    <th >Product</th>
                                    <th >Price</th>
                                    <th >Quantity</th>
                                    <th >Actions</th>
                                </tr>
                            </thead>   
                            <tbody>
                                
                            </tbody>
                        </table>            
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
                <div class="box span12 bg-light">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Order Summary</h2>
                    </div>
                    <hr>
                    <div class="box-content">
                        <?php
                        // $price = 0;$sheepFee = 100;$totalPrice = 0;
                        // for($id = 0;$id < $data['length'];$id++)
                        //     $price = $data[$id]->price + $price;
                        // $totalPrice = $price + $sheepFee;
                        ?>
                        <h3 style = "color:green;">Subtotal Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;</h3>
                        <h3>Shipping Fee&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;</h3>
                        <h3 style = "color:red;">Total Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;</h3>
                        <br>
                        <a class = "btn btn-warning" style = "width:100%;font-size: 20px;">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
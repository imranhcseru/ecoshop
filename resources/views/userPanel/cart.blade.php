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
                                    <th>#</th>
                                    <th ></th>
                                    <th >Product</th>
                                    <th >Price</th>
                                    <th >Quantity</th>
                                    <th >Actions</th>
                                </tr>
                            </thead>   
                            <tbody>
                                @if(gettype($data) != "string")
                                    @for($id = 0;$id < $data['length'];$id++)
                                    <tr>
                                        <td>{{$id + 1}}</td>
                                        <td><img src = "/images/0a09d8530691a1c23a4e4f4ec3eeff2a.jpg" style = "height:80px;width:80px;"></td>
                                        <td>{{$data[$id]->name}}</td>
                                        <td>{{$data[$id]->price}}</td>
                                        <td>Quantity</td>
                                        <td>
                                            <form action="/removefromcart" method = "POST">
                                                <input name = 'prodOnCart' type = "hidden" id = "prodOnCart" value = <?php echo Session::get('prodOnCart');?>>
                                                <input name = "_token" type = "hidden" id="prodToken"   value="{{csrf_token()}}">
                                                <input name = "cart_index" type="hidden" id = "cart_index" value={{$id}}>
                                                <button class="btn btn-warning removeButton" id = "removeButton"> Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endfor
                                @else
                                    <tr><td><h2 style="color:lightsalmon">No Product of Cart</h2></td></tr>
                                @endif
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
                        @if(gettype($data) != "string")
                            <?php
                                $price = 0;$sheepFee = 100;$totalPrice = 0;
                                for($id = 0;$id < $data['length'];$id++)
                                    $price = $data[$id]->price + $price;
                                $totalPrice = $price + $sheepFee;
                            ?>
                            <h3 style = "color:green;">Subtotal Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;{{$price}}</h3>
                            <h3>Shipping Fee&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;{{$sheepFee}}</h3>
                            <h3 style = "color:red;">Total Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;{{$totalPrice}}</h3>
                            <br>
                            <a href = "/checkout" class = "btn btn-warning" style = "width:100%;font-size: 20px;">Check Out</a>
                        @else
                            <h3 style = "color:green;">Subtotal Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;</h3>
                            <h3>Shipping Fee&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;</h3>
                            <h3 style = "color:red;">Total Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;৳&nbsp;</h3>
                            <br>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
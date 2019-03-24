@extends('userPanel.layout')
@section('cartContent')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 ">
                <div class="box span12 bg-light">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Products on Cart</h2>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-6 ">
                        <div>
                            <span>
                                <img id = "product_image"  src="/images/0a09d8530691a1c23a4e4f4ec3eeff2a.jpg" alt="Card image cap" style="height:280px;width:350px">
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-6 ">
                        <div>
                            <span>
                                <h3>{{$data['detail']->name}}</h3>
                            </span>
                            <hr>
                            <span>
                                <h1 style="color:#f57224;">৳ {{$data['detail']->price}}</h1>
                            </span>
                            <span>
                                <h3>No Promotion Coupon available</h3>
                            </span>
                            <span>
                                <form action="/addtocart" method = "POST">
                                    <input name = 'prodOnCart' type = "hidden" id = "prodOnCart" value = <?php echo Session::get('prodOnCart');?>>
                                    <input name = "_token" type = "hidden" id="prodToken"   value="{{csrf_token()}}">
                                    <input name = 'prodId'  type = "hidden" id = "{{$data['detail']->id}}" :value="product.id">
                                    <button class="btn btn-warning addCart" id = "addCart"> Add to Cart</button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
                <div class="box span12 bg-light">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Provided Services</h2>
                    </div>
                    <hr>
                    <div class="box-content">
                        <div>
                            <label>Delivery From: </label><br>
                            <span>Dhaka</span>
                        </div>
                        <div>
                            <label>Home Delivery: </label><br>
                            <span>4-5 days</span>
                        </div>
                        <div>
                            <label>Cash on Delivery Available: </label><br>
                            <span>Yes</span>
                        </div>
                        <div>
                            <label>Return and Warrenty: </label><br>
                            <span>7 Days Returns</span><br>
                            <span>Warranty not available</span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 ">
                <div class="box span12 bg-light">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Products Description:</h2>
                    </div>
                    <div class="box-content ">
                        <div>
                            <span>
                                <h3 style="color:yellowgreen">Rating: 5</h3>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="box span12 bg-light">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Reviews From User:</h2>
                    </div>
                    
                    <div class="box-content ">
                        @foreach($data['reviews'] as $review)
                            <div>
                                <span style="font-size:20px;color:teal">{{$review->customer->first_name}}&nbsp;&nbsp;{{$review->customer->first_name}}</span><br>
                                <span >
                                    <h5>{{$review->review}}</h5>
                                </span>
                            </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
                <div class="box span12 bg-light">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Same Category Products</h2>
                    </div>
                    <hr>
                    <div class="box-content">
                        @foreach($data['subcategory'] as $product)
                            <div class="card" style="width: 22rem;">
                                <a href="{{url('/products/'.$product->id.'/details')}}"><img id = "product_image" class="card-img-top" src="/images/0a09d8530691a1c23a4e4f4ec3eeff2a.jpg" alt="Card image cap" style="height:170px;"></a> 
                                <div class="card-body" align = "center">
                                    <h5 class="card-title" id = "product_name" >{{$product->name}}</h5>
                                    <p class="card-text" id = "product_price"  >Price: ৳ <span style = "text-decoration: line-through;">{{$product->price}}</span></p>
                                    <p class="card-text" id = "product_discount" >-%{{$product->discount}}</p>
                                    <p class="card-text" id = "product_totalPrice">Current Price: ৳ {{$product->totalPrice}}</p>
                                    <form action="/addtocart" method = "POST">
                                        <input name = 'prodOnCart' type = "hidden" id = "prodOnCart" value = <?php echo Session::get('prodOnCart');?>>
                                        <input name = "_token" type = "hidden" id="prodToken"   value="{{csrf_token()}}">
                                        <input name = 'prodId'  type = "hidden" id = "product_id" value="{{$product->id}}">
                                        <button class="btn btn-warning addCart" id = "addCart"> Add to Cart</button>
                                    </form>
                                </div>
                            </div>  
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
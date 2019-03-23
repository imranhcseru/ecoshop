@extends('userPanel.layout')
@section('content')
<div class="container" align = "center">
        <div class = "row"> 
            <div class = "row" align = "center" style="background-color:crimson;margin-left:43%">
                <span class = "row-title" >
                    <h3 >Flash Sale</h3>
                </span>
            </div>
            <br><br>
            <div class = "row" align = "center">
                @foreach($products as $product)
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
@endsection
@extends('userPanel.layout')
@section('homeContent')
    <!-- Slider -->
    <div class = "container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" id = "slider_div">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{url('/userStatic/img/image1.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{url('/userStatic/img/image2.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{url('/userStatic/img/image3.jpg')}}" alt="Third slide">
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class = "row"> 
            <div class = "row">
                <span class = "row-title">
                {{-- <h3 id = "category">@{{product.sub_category}}</h3> --}}
                </span>
                <span class = "row-title"   style = "margin-left:1020px; margin-top:13px;">
                    <a href = "#" class = "btn btn-info">Show More</a>
                </span>
            </div>
            <div class = "row" align = "center" id = "app">
                    <div v-for = "product in allProducts">
                        <div v-if = "product.sub_category == 'Dogs'">
                            <div class="card" style="width: 22rem;">
                                <a href ="@{{product.href.detail}}"><img id = "product_image" class="card-img-top" src="/images/0a09d8530691a1c23a4e4f4ec3eeff2a.jpg" alt="Card image cap" style="height:170px;"></a> 
                                <div class="card-body" align = "center">
                                    <h5 class="card-title" id = "product_name" >@{{product.name}}</h5>
                                    <p class="card-text" id = "product_price"  style = "text-decoration: line-through;">৳@{{product.price}}</p>
                                    <p class="card-text" id = "product_discount" >-%@{{product.discount}}</p>
                                    <p class="card-text" id = "product_totalPrice">৳ @{{product.totalPricel}}</p>
                                    <button class="btn btn-warning addCart">
                                            <input name = 'prodOnCart' type = "hidden" id = "prodOnCart" value = <?php echo Session::get('prodOnCart');?>>
                                            <input name = "_token" type = "hidden" id="prodToken"   value="{{csrf_token()}}">
                                            <input name = 'prodId' type = "hidden" id = "product_id">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>  
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <script>
        new Vue({
			  el: '#app',
			  data () {
			    return {
                    allProducts: null
			    }
			  },
			  mounted () {
			    axios
			      .get('http://127.0.0.1:8000/api/products')
			      .then(response => (this.allProducts = response.data.data))
			  }
			})
    </script>
@endsection
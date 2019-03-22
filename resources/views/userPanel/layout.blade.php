<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{{ asset('adminStatic/img/favicon.png') }}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ecoshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::asset('userStatic/css/style.css')}}">
    <style>
        #dvContainer {
            position: relative;
            display: inline-block;
        }
        
        #category {
            position: absolute;
            left: 0;
            top: 0;
            width: 250px;
            height: 100%;
            margin-left: 20px;
            background-color: white;
        }
        .card:hover{
            border-top: 3px solid green;
            border-bottom: 3px solid green;
        }
        #category_list:hover{
            border-left: 3px solid red;
            border-right: 3px solid red;
        }
        .active{
            border: 3px solid lightblue;
        }
        .active a {
            background-color: lightblue !important;
        }

        hr{
            display: block; 
            content: ""; 
            height: 30px; 
            margin-top: -31px; 
            border-style: solid; 
            border-color: darkblue; 
            border-width: 0 0 1px 0; 
            border-radius: 20px; 
        }
    </style>
</head>
<body>
    <header class = "bg-light">
    <div class = "container-fluid">
        <nav class="navbar navbar-expand-md navbar-light ">
        <a class="navbar-brand pb-2 " href="{{url('/')}}"><img class = "cart_logo"src = "{{url('/userStatic/img/logo.png')}}"></a>
        <button class="navbar-toggler btn btn-secondary" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        </div>
        <div class="wrap">
            <div class="search" style= "width:130%;">
                <input type="text" class="searchTerm" placeholder="What are you looking for?" >
                <button type="submit" class="searchButton">
                <i class="fa fa-search">Search</i>
            </button>
            </div>
        </div>
        <div id = "campaign">
            <a class="navbar-brand pb-2 " id = "cartLink" href="{{route('cart.index')}}">
                <img id = "cart_icon" class = "cart_logo"src = "{{url('/userStatic/img/cart.png')}}">
                <p id = "cart-number">
                    <?php 
                        if(Session::has('prodOnCart')){
                            //session()->flush();
                            echo Session::get('prodOnCart');
                        }
                        else{
                            Session::put('prodOnCart',0);
                            echo Session::get('prodOnCart');
                        }
                    ?>
                </p>
            </a>
        </div>
        <a class = "btn btn-success">Login</a><span>  &nbsp;&nbsp;&nbsp;  </span>
        <a class = "btn btn-secondary">Register</a>
        </nav>
    </div>
    </header>
    <!-- Slider -->
    <div class = "container-fluid" id="dvContainer">
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
        </div>
        <div id="category">   
            <br>     
            <ul v-for = "category in categories ">
            <li style = "list-style: none"><a :href="'/category/' + category.id">@{{category.name}}</a></li>
            </div>       
        </div>
    </div>
    @yield('homeContent')
    @yield('cartContent')
    @yield('categoryContent')
    <br>
    <br>
    <br>
    <div class = "container-fluid">
        <section id="footer">
            <div class="container">
                <div class="row text-center text-xs-center text-sm-left text-md-left">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h5>Shopping Cart</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Electronics</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Beauty & Health</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Babies & Toys</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Sports & Outdoor</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Mens Fashion</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Womens Fashion</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h5>Customer Service</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Help Center</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Contact Us</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Report Abuse</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <h5>About Us</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href=""><i class="fa fa-angle-double-right"></i>About Shopping Cart</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Blog</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i>Policies & Rules</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                        <ul class="list-unstyled list-inline social text-center">
                            <li class="list-inline-item"><a href="https://www.facebook.com/mih133" target="_blank"><img class = "acnt_logo"src = "{{url('/userStatic/img/facebook.png')}}"></a></li>
                            <li class="list-inline-item"><a href="https://github.com/imranhcseru" target="_blank"><img class = "acnt_logo"src = "{{url('/userStatic/img/github.png')}}"></a></li>
                            <li class="list-inline-item"><a href="https://www.instagram.com/iammimranh/" target="_blank"><img class = "acnt_logo"src = "{{url('/userStatic/img/instagram.png')}}"></a></li>
                            <li class="list-inline-item"><a href="https://plus.google.com/u/0/100176714962618354106?tab=wX" target="_blank"><img class = "acnt_logo"src = "{{url('/userStatic/img/google.png')}}"></a></li>
                        </ul>
                    </div>
                    <hr>
                </div>	
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                        <p class="h6">All right Reversed &copy Shopping Cart</p>
                        <p class="h6">Developed By Imran</p>
                    </div>
                    <hr>
                </div>	
            </div>
        </section>
    </div>
    <script>
    
//Vue js
        new Vue({
			  el: '#category',
			  data () {
			    return {
                    categories: null
			    }
			  },
			  mounted () {
			    axios
			      .get('http://127.0.0.1:8000/api/categories')
			      .then(response => (this.categories = response.data.data))
			  }
			});
            $("#addCart").on("click", function (e) { 
                setTimeout(function(){
                    //location.reload();
                }, 5000)            
            });
    </script>
</body>
</html>
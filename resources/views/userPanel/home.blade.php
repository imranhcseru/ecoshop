@extends('userPanel.layout')
@section('homeContent')
    <hr>
    <div class="container" align = "center">
        <div class = "row"> 
            <div class = "row">
                <span class = "row-title">
                <h3 >Flash Sale</h3>
                </span>
                <span class = "row-title"   style = "margin-left:1150px; margin-top:13px;">
                    <a href = "#" class = "btn btn-info">Show More</a>
                </span>
            </div>
            <div class = "row" align = "center" id = "flash">
                <div v-for = "(product,index) in allProducts" v-if="index <= 200">
                    <div v-if = "product.sub_category == 'Dogs'">
                        <div class="card" style="width: 22rem;">
                            <a :href="'/products/' + product.id"><img id = "product_image" class="card-img-top" src="/images/0a09d8530691a1c23a4e4f4ec3eeff2a.jpg" alt="Card image cap" style="height:170px;"></a> 
                            <div class="card-body" align = "center">
                                <h5 class="card-title" id = "product_name" >@{{product.name}}</h5>
                                <p class="card-text" id = "product_price"  >Price: ৳ <span style = "text-decoration: line-through;">@{{product.price}}</span></p>
                                <p class="card-text" id = "product_discount" >-%@{{product.discount}}</p>
                                <p class="card-text" id = "product_totalPrice">Current Price: ৳ @{{product.totalPrice}}</p>
                                <form action="/addtocart" method = "POST">
                                    <input name = 'prodOnCart' type = "hidden" id = "prodOnCart" value = <?php echo Session::get('prodOnCart');?>>
                                    <input name = "_token" type = "hidden" id="prodToken"   value="{{csrf_token()}}">
                                    <input name = 'prodId'  type = "hidden" id = "product_id" :value="product.id">
                                    <button class="btn btn-warning addCart" id = "addCart"> Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class = "row"> 
            <div class = "row">
                <span class = "row-title">
                <h3 >Categories</h3>
                </span>
                <span class = "row-title"   style = "margin-left:1150px; margin-top:13px;">
                    <a href = "#" class = "btn btn-info">Show More</a>
                </span>
            </div>
            <div class = "row" align = "center" id = "subcategory">
                <div v-for = "(subcategory,index) in subcategories" v-if="index <=11">
                    {{-- <div v-if = "product.sub_category == 'Dogs'"> --}}
                        <div class="card" id = "category_list" style="width: 17rem;">
                            <a :href="'/category/' + subcategory.id"><img id = "product_image" class="card-img-top" src="/images/0a09d8530691a1c23a4e4f4ec3eeff2a.jpg" alt="Card image cap" style="height:170px;"></a> 
                            <div class="card-body" align = "center">
                                <h5 class="card-title" id = "product_name" >@{{subcategory.name}}</h5>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class = "row" style="margin-left:100px;"> 
            <div class = "row">
                <span class = "row-title">
                <h3 >Product For You</h3>
                </span>
                <span class = "row-title"   style = "margin-left:980px; margin-top:13px;">
                    <a href = "#" class = "btn btn-info">Show More</a>
                </span>
            </div>
            <div class = "row" align = "center" id = "prod4u">
                <div v-for = "(product,index) in allProducts" v-if="index <= 200">
                    <div v-if = "product.sub_category == 'Dogs'">
                        <div class="card"  style="width: 22rem;">
                            <a :href="'/products/' + product.id"><img id = "product_image" class="card-img-top" src="/images/0a09d8530691a1c23a4e4f4ec3eeff2a.jpg" alt="Card image cap" style="height:170px;"></a> 
                            <div class="card-body" align = "center">
                                <h5 class="card-title" id = "product_name" >@{{product.name}}</h5>
                                <p class="card-text" id = "product_price"  >Price: ৳ <span style = "text-decoration: line-through;">@{{product.price}}</span></p>
                                <p class="card-text" id = "product_discount" >-%@{{product.discount}}</p>
                                <p class="card-text" id = "product_totalPrice">Current Price: ৳ @{{product.totalPrice}}</p>
                                <form action="/addtocart" method = "POST">
                                    <input name = 'prodOnCart' type = "hidden" id = "prodOnCart" value = <?php echo Session::get('prodOnCart');?>>
                                    <input name = "_token" type = "hidden" id="prodToken"   value="{{csrf_token()}}">
                                    <input name = 'prodId'  type = "hidden" id = "product_id" :value="product.id">
                                    <button class="btn btn-warning addCart" id = "addCart"> Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <script>
        new Vue({
            el: '#flash',
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
        });
        new Vue({
            el: '#subcategory',
            data () {
            return {
                subcategories: null
            }
            },
            mounted () {
            axios
                .get('http://127.0.0.1:8000/api/categories')
                .then(response => (this.subcategories = response.data.data))
            }
        });
        new Vue({
            el: '#prod4u',
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
        });
        $(document).on('click','#addCart',function(){
            setTimeout(
                function(){
                    location.reload();
            }, 3000);
            swal({
                title:"Add to Cart",
                text: "1 Product added to Cart",
                icon: "success",
                timer:3000
            });       
        });
    </script>
@endsection
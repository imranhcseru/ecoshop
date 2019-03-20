@extends('userPanel.layout')
@section('categoryContent')        
    <div class="container">
        <div class = "row"  align = "center"> 
            <div class = "row">
                <div class="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($data['subcategories'] as $count => $subcategory)
                            <li role="presentation" @if($count == 0) class="active" @endif>
                                <a href="#tab-{{ $subcategory->id }}" aria-controls="#tab-{{ $subcategory->id }}" role="tab" data-toggle="tab">
                                    <div class="card" id = "category_list" style="width: 17rem;"><img id = "product_image" class="card-img-top" src="/images/0a09d8530691a1c23a4e4f4ec3eeff2a.jpg" alt="Card image cap" style="height:170px;">
                                        <div class="card-body" >
                                            <h5 class="card-title" id = "product_name" >{{$subcategory->name}}</h5>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach 
                    </ul>
                </div>
            </div>
            <div class = "row" id = "showProd">
                <div class="tab-content">
                    @foreach($data['subcategories'] as $count => $subcategory)
                        <div role="tabpanel" @if($count == 0) class="tab-pane active" @else class="tab-pane" @endif id="tab-{{ $subcategory->id }}">
                            <h2>{{ $subcategory->name }}</h2>
                            <div class = "row" style="margin-left:20px">
                                <div v-for = "(product,index) in allProducts">
                                    <div v-if = "product.sub_category == '{{$subcategory->name}}'">
                                        <div class="card"  style="width: 22rem;">
                                            <a :href="'/products/' + product.id"><img id = "product_image" class="card-img-top" src="/images/0a09d8530691a1c23a4e4f4ec3eeff2a.jpg" alt="Card image cap" style="height:170px;"></a> 
                                            <div class="card-body">
                                                <h5 class="card-title" id = "product_name" >@{{product.name}}</h5>
                                                <p class="card-text" id = "product_price"  >Price: ৳ <span style = "text-decoration: line-through;">@{{product.price}}</span></p>
                                                <p class="card-text" id = "product_discount" >-%@{{product.discount}}</p>
                                                <p class="card-text" id = "product_totalPrice">Current Price: ৳ @{{product.totalPrice}}</p>
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
                            </div>
                        </div>
                    @endforeach 
                </div> 
            </div>
        </div> 
    </div>
    <script>
        new Vue({
			  el: '#showProd',
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
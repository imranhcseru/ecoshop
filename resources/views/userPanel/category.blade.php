@extends('userPanel.layout')
@section('categoryContent')
    <div class="container">
        <div class = "row"> 
            <div class = "row" align = "center" id = "flash">
                @foreach($data['subcategories'] as $subcategory)
                    <div class="card" id = "category_list" style="width: 22rem;">
                    <a href="#"><img id = "product_image" class="card-img-top" src="/images/0a09d8530691a1c23a4e4f4ec3eeff2a.jpg" alt="Card image cap" style="height:170px;"></a> 
                        <div class="card-body" >
                            <h5 class="card-title" id = "product_name" >{{$subcategory->name}}</h5>
                        </div>
                    </div>
                @endforeach        
            </div>
        </div>
    </div>
    <div class="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                @foreach($data['subcategories'] as $count => $subcategory)
                    <li role="presentation" @if($count == 0) class="active" @endif>
                        <a href="#tab-{{ $subcategory->id }}" aria-controls="#tab-{{ $subcategory->id }}" role="tab" data-toggle="tab">{{ $subcategory->name }}</a>
                    </li>
                @endforeach 
            </ul>
            <div class="tab-content">
                @foreach($data['subcategories'] as $count => $subcategory)
                    <div role="tabpanel" @if($count == 0) class="tab-pane active" @else class="tab-pane" @endif id="tab-{{ $subcategory->id }}">
                        <h2>{{ $subcategory->name }}</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias enim obcaecati praesentium repellat. Est explicabo facilis fuga illum iusto, obcaecati saepe voluptates! Dolores eaque porro quaerat sunt totam ut, voluptas.</p>
                    </div>
                @endforeach 
            </div>
        </div>
@endsection
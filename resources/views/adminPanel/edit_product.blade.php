

@extends('adminPanel.layout')
@section('content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('/admin/products/'.$data['product']->id.'/edit')}}" method="post" enctype = "multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <div class="controls">
                                {{-- <img src="/upload/{{$product->image}}"> --}}
                                <img src="/upload/1553235736.jpg" style="width:400px;height:300px;">
                            </div>
						</div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Product Image</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="fileInput" type="file" name = "image">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Name</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name = "name" value = {{$data['product']->name}} >
                            </div>
                        </div>     
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Sub Category</label>
                            <div class="controls">
                                <span> {{$data['product']->sub_category_id}}</span>
                            </div>
                        </div>        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Price</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name = "price" value = {{$data['product']->price}} >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Discount</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name = "discount" value = {{$data['product']->discount}} >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Stock</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name = "stock" value = {{$data['product']->stock}} >
                            </div>
                        </div>          
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" rows="3" name = "detail">{{$data['product']->detail}}</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Category</label>
                            <div class="controls">
                                <select id="selectError3" name = "category" name = "category">
                                    @foreach($data['categories'] as $category)
                                        <option>{{$category->name}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Sub Category</label>
                            <div class="controls">
                                <select id="selectError3" name = "subcategory" name = "subcategory">
                                    @foreach($data['subcategories'] as $subcategory)
                                        <option>{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary" name = "submit" value = "draft">Save Changes</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
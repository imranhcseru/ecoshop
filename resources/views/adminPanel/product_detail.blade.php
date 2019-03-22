

@extends('adminPanel.layout')
@section('content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Product Detail</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal">
                    <fieldset>
                        <div class="control-group">
                            <div class="controls">
                                {{-- <img src="/upload/{{$product->image}}"> --}}
                                <img src="/upload/1553235736.jpg" style="width:400px;height:300px;">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Rating</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = '5' disabled>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Name</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$product->name}} disabled>
                            </div>
                        </div>     
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Sub Category</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$product->sub_category_id}} disabled>
                            </div>
                        </div>        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Price</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$product->price}} disabled>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Discount</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$product->discount}} disabled>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Stock</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"   value = {{$product->stock}} disabled>
                            </div>
                        </div>          
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product Description</label>
                            <div class="controls">
                                <span>{{$product->detail}}</span>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
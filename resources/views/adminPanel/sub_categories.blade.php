
@extends('adminPanel.layout')
@section('content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Sub Categories</h2>
            </div>
            <div class="box-content">
            <h3 style="color:green">
                <?php
                    $delete_category = Session::get('delete_category');
                    if($delete_category){
                        echo($delete_category);
                        Session::put('delete_category',null);
                    }
                ?>
            </h3>
            <h2 style="text-align:center;">Add New Sub Category</h2>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('/admin/addcategory')}}" method="post" enctype = "multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Sub Category Name</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name = "category">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Category</label>
                            <div class="controls">
                                <select id="selectError3" name = "category">
                                    @foreach($data['categories'] as $category)
                                        <option>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Sub Category Image</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="fileInput" type="file" name = "category_img">
                            </div>
                        </div>
                        <div class="form-actions" style="text-align:center;">
                        <button  type="submit" class="btn btn-primary" name = "submit" value= "publish" style="text-align:center;">Add Sub Category</button>
                        </div>
                    </fieldset>
                </form> 
            </div>
            <h2 style="text-align:center;">All Sub Categories</h2>
            <table class="table ">
                <thead>
                    <tr>
                        <th>Sub Category</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                @foreach($data['subcategories'] as $subcategory)
                <tr>
                    <td><a href="{{url('/admin/'.$subcategory->name)}}">{{$subcategory->name}}</a></td>
                    <td><a href="{{url('/admin/'.$subcategory->category_id)}}">{{$subcategory->category_id}}</a></td>
                    <td class="center">
                        <a class="btn btn-info" href="">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');" href="{{url('/admin/delete/'.$subcategory->id)}}">
                            <i class="halflings-icon white trash"></i> 
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>            
        </div>
    </div>			
@endsection
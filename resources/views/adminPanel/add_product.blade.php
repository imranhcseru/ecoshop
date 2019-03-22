

@extends('adminPanel.layout')
@section('content')
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Product</h2>
				</div>
				<div class="box-content">
					<form class="form-horizontal" action="{{url('/admin/addproduct')}}" method="post" enctype = "multipart/form-data">
						{{csrf_field()}}
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="typeahead">Product Name</label>
								<div class="controls">
									<input type="text" class="span6 typeahead" id="typeahead"  name = "name">
								</div>
							</div>             
							<div class="control-group">
								<label class="control-label" for="typeahead">Price</label>
								<div class="controls">
									<input type="text" class="span6 typeahead" id="typeahead"  name = "price">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="typeahead">Discount</label>
								<div class="controls">
									<input type="text" class="span6 typeahead" id="typeahead"  name = "discount">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="typeahead">Stock</label>
								<div class="controls">
									<input type="text" class="span6 typeahead" id="typeahead"  name = "stock">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="fileInput">Product Image</label>
								<div class="controls">
									<input class="input-file uniform_on" id="fileInput" type="file" name = "image">
								</div>
							</div>          
							<div class="control-group hidden-phone">
								<label class="control-label" for="textarea2">Product Description</label>
								<div class="controls">
									<textarea class="cleditor" id="textarea2" rows="3" name = "detail"></textarea>
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
								<label class="control-label" for="selectError3">Sub Category</label>
								<div class="controls">
									<select id="selectError3" name = "subcategory">
										@foreach($data['subcategories'] as $subcategory)
											<option>{{$subcategory->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" name = "submit" value= "published">Publish Product</button>
								<button type="submit" class="btn btn-primary" name = "submit" value = "draft">Save as Draft</button>
							</div>
						</fieldset>
					</form> 
				</div>
			</div>
		</div>
@endsection
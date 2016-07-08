@extends('cms::admin.template.main')
@section('cms::content')
	<!-- Default box -->
    @include('cms::messages')
	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Edit category</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
		    <form action="{{route('admin.category.update', $category->id)}}" role="form" class="form" method="post">
		    	<input type="hidden" name="_method" value="put" />
		    	<input type="hidden" name="_token" value="{{csrf_token()}}" />
		        <!-- text input -->
		        <div class="form-group">
		          <label for="name">Name<span class="text text-danger">*</span></label>
		          <input id="name" name="name" type="text" class="form-control" placeholder="category name" value="{{$category->name?$category->name:old('name')}}" />
		        </div>
		        <div class="form-group">
		          <label for="description">description</label>
		          <textarea name="description" id="description" rows="7" class="form-control" placeholder="category description">{{$category->description?$category->description:old('description')}}</textarea>
		        </div>		        
		        <div class="form-group">
		        	<label for="status">Status</label>
		            <select name="status" id="status" class="form-control">
		            	<option @if($category->status == 0) selected="selected" @endif value="0">Disable</option>
		            	<option @if($category->status == 1) selected="selected" @endif value="1">Enable</option>
		            </select>                        	
		        </div>
		        <a href="{{route('admin.category.index')}}" class="btn btn-default">Back</a>
		        <button type="submit" class="btn btn-sml btn-primary">Submit</button>
		    </form>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
@endsection
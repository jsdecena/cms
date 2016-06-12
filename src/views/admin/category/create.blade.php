@extends('blog::admin.template.main')
@section('blog::content')
	<!-- Default box -->
    @include('blog::messages')
	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Add a category</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
		    <form action="{{route('admin.category.store')}}" role="form" class="form" method="post">
		    	<input type="hidden" name="_token" value="{{csrf_token()}}">
		        <!-- text input -->
		        <div class="form-group">
		          <label for="name">Name<span class="text text-danger">*</span></label>
		          <input id="name" name="name" type="text" class="form-control" placeholder="category name" value="{{old('name')}}" />
		        </div>
		        <div class="form-group">
		          <label for="description">Description</label>
		          <textarea name="description" id="description" rows="7" class="form-control" placeholder="category description">{{old('description')}}</textarea>
		        </div>		        
		        <div class="form-group">
		        	<label for="status">Status</label>
		            <select name="status" id="status" class="form-control">
		            	<option value="0">Disable</option>
		            	<option value="1">Enable</option>
		            </select>                        	
		        </div>
		        <a href="{{route('admin.category.index')}}" class="btn btn-default">Back</a>
		        <button type="submit" class="btn btn-sml btn-primary">Submit</button>
		    </form>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
@endsection
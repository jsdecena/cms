@extends('cms::admin.template.main')
@section('cms::content')
	<!-- Default box -->
    @include('cms::messages')
	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Add a page</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
		    <form action="{{route('admin.page.store')}}" role="form" class="form" method="post">
		    	<input type="hidden" name="_token" value="{{csrf_token()}}">
		        <!-- text input -->
		        <div class="form-group">
		          <label for="title">Title<span class="text text-danger">*</span></label>
		          <input id="title" name="title" type="text" class="form-control" placeholder="page title" value="{{old('title')}}" />
		        </div>
		        <div class="form-group">
		          <label for="content">Content</label>
		          <textarea name="content" id="content" rows="7" class="form-control" placeholder="page content">{{old('content')}}</textarea>
		        </div>		        
		        <div class="form-group">
		        	<label for="status">Status</label>
		            <select name="status" id="status" class="form-control">
		            	<option value="0">Disable</option>
		            	<option value="1">Enable</option>
		            </select>                        	
		        </div>
		        <a href="{{route('admin.page.index')}}" class="btn btn-default">Back</a>
		        <button type="submit" class="btn btn-sml btn-primary">Submit</button>
		    </form>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
@endsection
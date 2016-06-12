@extends('blog::admin.template.main')
@section('blog::content')
	<!-- Default box -->
    @include('blog::messages')
	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Add a post</h3>
		</div><!-- /.box-header -->
		<form action="{{route('admin.post.store')}}" role="form" class="form" method="post">
		<div class="box-body row">
			<div class="col-md-8">
		    	<input type="hidden" name="_token" value="{{csrf_token()}}">
		        <!-- text input -->
		        <div class="form-group">
		          <label for="title">Title<span class="text text-danger">*</span></label>
		          <input id="title" name="title" type="text" class="form-control" placeholder="Post title" value="{{old('title')}}" />
		        </div>
		        <div class="form-group">
		          <label for="content">Content</label>
		          <textarea name="content" id="content" rows="7" class="form-control" placeholder="Post content">{{old('content')}}</textarea>
		        </div>		        
		        <div class="form-group">
		        	<label for="status">Status</label>
		            <select name="status" id="status" class="form-control">
		            	<option value="0">Disable</option>
		            	<option value="1">Enable</option>
		            </select>                        	
		        </div>
		        <a href="{{route('admin.post.index')}}" class="btn btn-default">Back</a>
		        <button type="submit" class="btn btn-sml btn-primary">Submit</button>
			</div>
			<div class="col-md-4">
				@if(!$categories->isEmpty())
					<div class="form-group">
						@foreach($categories as $category)
							<label class="checkbox">
								<input type="checkbox" name="category[]" value="{{$category->id}}"> {{$category->name}}
							</label>
						@endforeach
					</div>
				@endif
			</div>
		</div><!-- /.box-body -->
		</form>
	</div><!-- /.box -->
@endsection
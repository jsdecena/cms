@extends('blog::admin.template.main')
@section('blog::content')
	<!-- Default box -->
    @include('blog::messages')
	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Add a post</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
		    <form action="{{route('admin.post.update', $post->id)}}" role="form" class="form" method="post">
		    	<input type="hidden" name="_method" value="put" />
		    	<input type="hidden" name="_token" value="{{csrf_token()}}" />
		        <!-- text input -->
		        <div class="form-group">
		          <label for="title">Title<span class="text text-danger">*</span></label>
		          <input id="title" name="title" type="text" class="form-control" placeholder="Post title" value="{{$post->title?$post->title:old('title')}}" />
		        </div>
		        <div class="form-group">
		          <label for="content">Content</label>
		          <textarea name="content" id="content" rows="7" class="form-control" placeholder="Post content">{{$post->content?$post->content:old('content')}}</textarea>
		        </div>		        
		        <div class="form-group">
		        	<label for="status">Status</label>
		            <select name="status" id="status" class="form-control">
		            	<option @if($post->status == 0) selected="selected" @endif value="0">Disable</option>
		            	<option @if($post->status == 1) selected="selected" @endif value="1">Enable</option>
		            </select>                        	
		        </div>
		        <a href="{{route('admin.post.index')}}" class="btn btn-default">Back</a>
		        <button type="submit" class="btn btn-sml btn-primary">Submit</button>
		    </form>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
@endsection
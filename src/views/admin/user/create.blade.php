@extends('cms::admin.template.main')
@section('cms::content')
	<!-- Default box -->
    @include('cms::messages')
	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Add a user</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
		    <form action="{{route('admin.user.store')}}" role="form" class="form" method="post">
		    	<input type="hidden" name="_token" value="{{csrf_token()}}">
		        <!-- text input -->
		        <div class="form-group">
		          <label for="name">Name<span class="text text-danger">*</span></label>
		          <input id="name" name="name" type="text" class="form-control" placeholder="user name" value="{{old('name')}}" />
		        </div>
		        <div class="form-group">
		          <label for="email">Email<span class="text text-danger">*</span></label>
		          <input id="email" name="email" type="email" class="form-control" placeholder="user email" value="{{old('email')}}" />
		        </div>
		        <div class="form-group">
		          <label for="password">Password<span class="text text-danger">*</span></label>
		          <input id="password" name="password" type="password" class="form-control" placeholder="user password" value="" />
		        </div>
		        <a href="{{route('admin.user.index')}}" class="btn btn-default">Back</a>
		        <button type="submit" class="btn btn-sml btn-primary">Submit</button>
		    </form>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
@endsection
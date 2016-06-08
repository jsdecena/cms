@extends('blog::admin.template.main')
@section('blog::content')
	<!-- Default box -->
    @include('blog::messages')
	<div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Add a user</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
		    <form action="{{route('admin.user.update', $user->id)}}" role="form" class="form" method="post">
		    	<input type="hidden" name="_method" value="put" />
		    	<input type="hidden" name="_token" value="{{csrf_token()}}" />
		        <!-- text input -->
		        <div class="form-group">
		          <label for="name">Name<span class="text text-danger">*</span></label>
		          <input id="name" name="name" type="text" class="form-control" placeholder="user name" value="{{$user->name?$user->name:old('name')}}" />
		        </div>
		        <div class="form-group">
		          <label for="email">Email<span class="text text-danger">*</span></label>
		          <div class="input-group">
		          <span class="input-group-addon">@</span>
		          	<input id="email" name="email" type="email" class="form-control" placeholder="user email" value="{{$user->email?$user->email:old('email')}}" />
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="password">Password</label>
		          <input id="password" name="password" type="password" class="form-control" placeholder="user password" value="" />
		          <span class="help-inline">Leave blank if not updating password</span>
		        </div>
		        <a href="{{route('admin.user.index')}}" class="btn btn-default">Back</a>
		        <button type="submit" class="btn btn-sml btn-primary">Submit</button>
		    </form>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
@endsection
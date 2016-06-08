@extends('blog::admin.template.main')
@section('blog::content')
	<!-- Default box -->
    @include('blog::messages')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Blog page</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            @if(!$users->isEmpty())
                <table class="table">
                    <tr>
                      <th class="col-md-2">#</th>
                      <th class="col-md-2">Name</th>
                      <th class="col-md-4">Email</th>
                      <th class="col-md-4">Actions</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                          <td>{{$user->id}}</td>
                          <td><a href="{{route('admin.user.edit', $user->id)}}">{{$user->name}}</a></td>
                          <td>{{$user->email}}</td>
                          <td>
                                <form action="{{route('admin.user.destroy', $user->id)}}" method="post">
                                	<input type="hidden" name="_method" value="delete" />
                                	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-sml btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                    <button type="submit" class="btn btn-sml btn-danger" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-timex"></i> Delete</button>
                                </form>
                          	</td>
                        </tr>
                    @endforeach
                </table>
            @else
                <div class="col-md-12"><p class="alert alert-warning">No page to show</p></div>
            @endif
        </div><!-- /.box-body -->
        @include('blog::admin.template.pagination', ['pages' => $users])
    </div><!-- /.box -->
@endsection
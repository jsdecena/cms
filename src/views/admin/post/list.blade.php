@extends('blog::admin.template.main')
@section('blog::content')
	<!-- Default box -->
    @include('blog::messages')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Blog posts</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            @if(!$posts->isEmpty())
                <table class="table">
                    <tr>
                      <th class="col-md-1">#</th>
                      <th class="col-md-2">Name</th>
                      <th class="col-md-2">Content</th>
                      <th class="col-md-2">Categories</th>
                      <th class="col-md-2">Status</th>
                      <th class="col-md-3">Actions</th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                          <td>{{$post->id}}</td>
                          <td><a href="{{route('admin.post.edit', $post->id)}}">{{$post->title}}</a></td>
                          <td>{!!nl2br(str_limit($post->content, 100))!!}</td>
                          <td>
                          	<?php $categories = Jsdecena\Blog\Models\Post::find($post->id)->categories ?>
                          	@if(!$categories->isEmpty())
                          		@foreach($categories as $category)
                          			<span class="label label-warning">{{$category->name}}</span>
                          		@endforeach
                          	@else
                          		-
                          	@endif
                          </td>
                          <td>
                          	@if($post->status == 1)
                          		<button class="btn btn-success" type="button"><i class="fa fa-check"></i></button>
                          	@else
                          		<button class="btn btn-danger" type="button"><i class="fa fa-times"></i></button>
                          	@endif                          	
                          </td>
                          <td>
                                <form action="{{route('admin.post.destroy', $post->id)}}" method="post">
                                	<input type="hidden" name="_method" value="delete" />
                                	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <a href="{{route('admin.post.edit', $post->id)}}" class="btn btn-sml btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                    <button type="submit" class="btn btn-sml btn-danger" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-timex"></i> Delete</button>
                                </form>
                          	</td>
                        </tr>
                    @endforeach
                </table>
            @else
                <div class="col-md-12"><p class="alert alert-warning">No post to show</p></div>
            @endif
        </div><!-- /.box-body -->
        @include('blog::admin.template.pagination', ['pages' => $posts])
    </div><!-- /.box -->
@endsection
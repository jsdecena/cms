@extends('cms::admin.template.main')
@section('cms::content')
	<!-- Default box -->
    @include('cms::messages')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Blog categories</h3>
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            @if(!$categories->isEmpty())
                <table class="table">
                    <tr>
                      <th class="col-md-1">#</th>
                      <th class="col-md-3">Name</th>
                      <th class="col-md-3">Content</th>
                      <th class="col-md-2">Status</th>
                      <th class="col-md-3">Actions</th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                          <td>{{$category->id}}</td>
                          <td><a href="{{route('admin.category.edit', $category->id)}}">{{$category->name}}</a></td>
                          <td>{!!nl2br(Str::limit($category->description, 100))!!}</td>
                          <td>
                          	@if($category->status == 1)
                          		<button class="btn btn-success" type="button"><i class="fa fa-check"></i></button>
                          	@else
                          		<button class="btn btn-danger" type="button"><i class="fa fa-times"></i></button>
                          	@endif
                          </td>
                          <td>
                                <form action="{{route('admin.category.destroy', $category->id)}}" method="post">
                                	<input type="hidden" name="_method" value="delete" />
                                	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-sml btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                    <button type="submit" class="btn btn-sml btn-danger" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-timex"></i> Delete</button>
                                </form>
                          	</td>
                        </tr>
                    @endforeach
                </table>
                @include('cms::admin.template.pagination', ['pages' => $categories])
            @else
                <div class="col-md-12"><p class="alert alert-warning">No category to show</p></div>
            @endif
        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

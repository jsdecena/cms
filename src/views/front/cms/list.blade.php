@extends('cms::front.template.main')
@section('cms::content')
	@if(!$posts->isEmpty())
		@foreach($posts as $post)
			<section class="post">
                <!-- Blog Post -->

                <!-- Title -->
                <h1><a href="{{route('blog.show', $post->slug)}}">{{$post->title}}</a></h1>

				<?php $user = App\User::find($post->user_id) ?>
                <!-- Author -->
                <p class="lead">by <a href="#">{{$user->name}}</a></p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{date('M d, Y', strtotime($post->created_at))}} at {{date('h:i a', strtotime($post->created_at))}}</p>

                <hr>

                <!-- Post Content -->
                {!!nl2br($post->content)!!}

                <hr>
			</section>
		@endforeach

		{!! $posts->render() !!}
	@else
		<p class="alert alert-warning">Sorry, no post yet.</p>
	@endif
@endsection
@extends('layouts.admin')

@section('title')

@section('content')
<div>
	<h1>Tên bài viết: {{$post->title}}</h1>
	<img width="300" src="{{asset($post->featured)}}" alt="">
	<p>{!!$post->content!!}</p>
	<p>
		@foreach ($post->tags as $tag)
			<span class="label label-default"><a href="{{ route('tags.show', $tag->id) }}">{{$tag->name}}</a></span>
		@endforeach
	</p>
</div>
<hr>
<h4><i class="fa fa-comment"></i> Tổng: {{count($post->comments)}} Comment: </h4>
@foreach ($post->comments as $comment)
<div class="row">
	

	<div class="col-md-2">
		<img width="70" src="{{asset('avatar.png')}}" alt="">
	</div>
	<div class="col-md-10"></div>
		<p class="user-comment">{{$comment->name}}</p>
		<p>Noi dung: {{$comment->content}}</p>
		<small class="pull-right user-comment-text">Thoi gian: {{$comment->created_at->diffForHumans()}}</small>
		<br>
		<hr>
</div>
@endforeach
<h2>Leave your Comment: </h2>
<div class="col-md-6 col-md-offset-3">
	<form action="{{ route('comments.store', $post->id) }}" method="post">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-6 form-group">
				<input type="text" name="name" class="form-control input-comment1" placeholder="Ten ban">
			</div>
			
			<div class="col-md-6 form-group">
				<input style="margin-right: 0px;" type="text" name="email" class="form-control input-comment2" placeholder="Email cua ban">
			</div>
			
		</div>
		<div class="row form-group">
			<textarea name="content" id="" cols="6" rows="3" class="form-control comment-text"></textarea>
			
		</div>
		<button type="submit" class="btn btn-primary">Gui comment</button>
		@if ($errors)
			@foreach ($errors->all() as $error)
				<div class="text-danger">{{$error}}</div>
			@endforeach
		@endif
	</form>
</div>
@endsection

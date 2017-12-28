@extends('layouts.admin')

@section('title', "$post->title")

@section('content')
<div>
	<h1>Tên bài viết: {{$post->title}}</h1>
	<img width="300" src="{{asset($post->featured)}}" alt="">
	<p>{!!$post->content!!}</p>
	<p>
		@foreach ($post->tags as $tag)
			<span class="label label-default">{{$tag->name}}</span>
		@endforeach
	</p>
</div>
@endsection

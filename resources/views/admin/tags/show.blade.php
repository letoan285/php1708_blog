@extends('layouts.admin')

@section('title', "$tag->title")

@section('content')
<div>
	<h1>Tên Tag: {{$tag->name}}</h1>
	<p>{!!$tag->slug!!}</p>
	<hr>
	<h1>Danh sách bài viết thuộc tag : <span class="label-primary">{{$tag->name}}</span>  </h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Tên bài viết</th>
				<th>Tag thuoc vai viet</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tag->posts as $post)
				<tr>
					<td>{{$post->id}}</td>
					<td><a href="{{ route('posts.show', $post->id) }}">{{str_limit($post->title, 30)}}</a></td>
					<td>@foreach ($post->tags as $tag)
							<span class="label-default">{{$tag->name}}</span>
						@endforeach
					</td>
				</tr>
			@endforeach
		</tbody>
		
	</table>
</div>
@endsection

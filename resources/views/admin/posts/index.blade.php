@extends('layouts.admin')
@section('content')
<h2>Danh sách bài viết</h2>
<table class="table table-bordered table-condensed">
	<thead>
		<tr>
			<th>#</th>
			<th>Ảnh</th>
			<th>Title</th>
			<th>Danh mục</th>
			<th><a class="btn btn-success btn-sm" href="{{ route('posts.create') }}"><i class="fa fa-plus">Add</i></a></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($posts as $post)
			<tr>
				<td>{{$post->id}}</td>
				<td><img width="120" src="{{asset($post->featured)}}" alt=""></td>
				<td>{{str_limit($post->title, 60)}}</td>
				<td>{{$post->category->name}}</td>
				<td>
					<a class="btn btn-sm btn-info" href="{{ route('posts.edit', $post->id) }}"><i class="fa fa-pencil"></i></a>
					<a class="btn btn-sm btn-danger" onclick="confirmRemove('{{ route('posts.destroy', $post->id) }}')" href="javascript:;"><i class="fa fa-times"></i></a>
				</td>
			</tr>
		@endforeach
	</tbody>
	
</table>
<div class="col-md-8 col-md-offset-2">
	{{$posts->links()}}
</div>
@stop

@section('js')
<script>
	function confirmRemove(url){
		bootbox.confirm({
		    message: "Cậu muốn xóa chứ?",
		    buttons: {
		        confirm: {
		            label: 'Đúng thế',
		            className: 'btn-success'
		        },
		        cancel: {
		            label: 'Không xóa',
		            className: 'btn-danger'
		        }
		    },
		    callback: function (result) {
		        if(result){
		        	window.location.href= url;
		        };
		    }
		});
	}
	
</script>
@endsection
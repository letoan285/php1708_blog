@extends('layouts.admin')
@section('header')
<h1>Categories List</h1>
@endsection
@section('content')
@if (session()->has('notif'))
	<div class="alert alert-warning col-sm-4 pull-right">
		<span>{{session()->get('notif')}}</span>
	</div>
@endif
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Danh mục cha</th>
			<th>Slug</th>
			<th><a class="btn btn-success" href="{{ route('categories.create') }}"><i class="fa fa-plus"></i>&nbsp; Thêm</a></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($categories as $category)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$category->name}}</td>
				<td>{{$category->getParentName()}}</td>
				<td>{{$category->slug}}</td>
				<td>
					<a class="btn btn-info" href="{{ route('categories.edit', ['id'=>$category->id]) }}"><i class="fa fa-pencil"></i></a>
					<a class="btn btn-danger" onclick="confirmRemove('{{ route('categories.destroy', ['id'=>$category->id]) }}');" href="javascript:;"><i class="fa fa-times"></i></a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
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
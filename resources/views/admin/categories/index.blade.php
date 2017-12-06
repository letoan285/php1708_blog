@extends('layouts.admin')
@section('header')
<h1>Categories List</h1>
@endsection
@section('content')
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Slug</th>
			<th><a class="btn btn-success" href="{{ route('categories.create') }}"><i class="fa fa-plus"></i>&nbsp; Thêm</a></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($categories as $category)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$category->name}}</td>
				<td>{{$category->slug}}</td>
				<td>
					<a class="btn btn-info" href=""><i class="fa fa-pencil"></i></a>
					<a class="btn btn-danger" href=""><i class="fa fa-times"></i></a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
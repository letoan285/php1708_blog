@extends('layouts.admin')
@section('title', "Danh sách thẻ tag")

@section('content')
<div class="col-md-4">
	<form action="{{ route('tags.store') }}" method="post">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Tên tag</label>
			<input type="text" name="name" class="form-control" placeholder="Tên tag...">
			@if (count($errors->has('name')) > 0)
				<span style="color: red;">{{$errors->first('name')}}</span>
			@endif
		</div>
		<button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Thêm tag</button>
	</form>
</div>
<div class="col-md-8">
	<table class="table table-condensed table-bordered">
		<strong>Danh sách tags</strong><br>
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên Tag</th>
				<th>Đường dẫn</th>
				<th>Lựa chọn</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tags as $tag)
				<tr>
					<td>{{$tag->id}}</td>
					<td><a href="{{ route('tags.show', $tag->id) }}">{{$tag->name}}</a></td>
					<td>{{$tag->slug}}</td>
					<td>
						<a class="btn btn-sm btn-info" href="{{ route('tags.edit', $tag->id) }}"><i class="fa fa-pencil"></i></a>
						<a class="btn btn-sm btn-danger" href="{{ route('tags.destroy', $tag->id) }}"><i class="fa fa-times"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
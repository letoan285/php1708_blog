@extends('layouts.admin')

@section('header')
<h3>Thêm mới danh mục</h3>
@endsection

@section('content')
<form action="{{ route('categories.store') }}" method="post">
	{{csrf_field()}}
	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		<label for="">Tên danh mục</label>
		<input type="text" name="name" class="form-control" placeholder="Nhập tên...">
		@if (count($errors) > 0)
			<span style="color: red">{{$errors->first('name')}}</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
		<label for="">Đường dẫn</label>
		<input type="text" name="slug" class="form-control" placeholder="Nhập đường dẫn...">
		@if (count($errors) > 0)
			<span style="color: red">{{$errors->first('slug')}}</span>
		@endif
	</div>

	<div class="form-group">
		<button class="btn btn-success" type="submit">Thêm mới</button>
	</div>
</form>
@endsection
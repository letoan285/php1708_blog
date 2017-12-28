@extends('layouts.admin')

@section('header')
<h3 id="demo">Thêm mới danh mục</h3>
@endsection

@section('content')
<form action="{{ route('categories.update', ['id'=>$category->id]) }}" method="post" id="cate-form">
	{{csrf_field()}}
	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		<label for="">Tên danh mục</label>
		<input type="text" name="name" class="form-control" placeholder="Nhập tên..." value="{{ $category->name }}">
		@if (count($errors) > 0)
	        <span style="color: red">{{ $errors->first('name') }}</span>
	    @endif
		
	</div>
	<div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
		<label for="">Đường dẫn</label>
		<input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
		@if (count($errors) > 0)
	        <span style="color: red">{{ $errors->first('slug') }}</span>
	    @endif
		
	</div>

	<div class="form-group">
		<button class="btn btn-success" type="submit">Thêm mới</button>
	</div>
</form>
@endsection
@section('js')
<script>
	$(document).ready(function(){
		$('#cate-form').validate({
			rules: {
				name: {
					required: true,
					minlength: 6
				}
			},
			messages: {
				name: {
					required: "vui long nhap ten danh muc",
					minlength: "Nhap toi thieu 6 ky tu"
				}
			}
		});
	});
</script>
@endsection
@extends('layouts.admin')

@section('content')
<h3>Thêm mới quản trị viên</h3>
<div class="col-md-6">
	<form action="{{ route('users.store') }}" method="post" id="user-form">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Tên: </label>
			<input type="text" name="name" value="{{old('name')}}" class="form-control">
			@if (count($errors) > 0)
				<span style="color: red">{{$errors->first('name')}}</span>
			@endif
		</div>
		<div class="form-group">
			<label for="">Email: </label>
			<input type="text" name="email" value="{{old('email')}}" class="form-control">
			@if (count($errors) > 0)
				<span style="color: red">{{$errors->first('email')}}</span>
			@endif
		</div>
		<div class="form-group">
			<label for="">Password: </label>
			<input type="password" name="password" class="form-control" id="password">
			@if (count($errors) > 0)
				<span style="color: red">{{$errors->first('password')}}</span>
			@endif
		</div>
		<div class="form-group">
			<label for="">Confirm Password: </label>
			<input type="password" name="password_confirm" class="form-control">
			@if (count($errors) > 0)
				<span style="color: red">{{$errors->first('password_confirm')}}</span>
			@endif
		</div>
		<div class="form-group">
			<label for="">Quyền: </label>
			<select name="role" id="" class="form-control">
				<option value="10">Author</option>
				<option value="20">Admin</option>
				@if (Auth::user()->role == 50)
					<option value="50">Super Admin</option>
				@endif
			</select>
		</div>
		<button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Thêm người dùng</button>
	</form>
</div>
@endsection
@section('js')
<script>
	$(document).ready(function(){
		$('#user-form').validate({
			rules: {
				name: {
					required: true,
					minlength: 6
				},
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 6
				},
				password_confirm: {
					required: true,
					equalTo: "#password"
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
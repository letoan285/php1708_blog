@extends('layouts.admin')

@section('content')
<h3>Thêm mới quản trị viên</h3>
<div class="col-md-6">
	<form action="{{ route('users.update', $user->id) }}" method="post" id="user-form">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Tên: </label>
			<input type="text" name="name" value="{{$user->name}}" class="form-control">
			@if (count($errors) > 0)
				<span style="color: red">{{$errors->first('name')}}</span>
			@endif
		</div>
		<div class="form-group">
			<label for="">Email: </label>
			<input type="text" name="email" value="{{$user->email}}" class="form-control">
			@if (count($errors) > 0)
				<span style="color: red">{{$errors->first('email')}}</span>
			@endif
		</div>
		
		<div class="form-group">
			<label for="">Quyền: </label>
			<select name="role" id="" class="form-control">
				<option {{$user->role == 10 ? 'selected':''}} value="10">Author</option>
				<option {{$user->role == 20? 'selected':''}} value="20">Admin</option>
				@if (Auth::user()->role == 50)
					<option {{$user->role >= 50?'selected':''}} value="50">Super Admin</option>
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
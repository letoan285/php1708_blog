@extends('layouts.admin')
@section('title', "Danh sách thẻ tag")

@section('content')
<div class="col-md-4">
	<form action="{{ route('tags.update', $tag->id) }}" method="post">
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Tên tag</label>
			<input type="text" name="name" class="form-control" value="{{old('name', $tag->name)}}">
			@if (count($errors->has('name')) > 0)
				<span style="color: red;">{{$errors->first('name')}}</span>
			@endif
		</div>
		<div class="form-group">
			<label for="">Đường dẫn</label>
			<input type="text" name="slug" class="form-control" value="{{old('slug', $tag->slug)}}">
			@if (count($errors->has('slug')) > 0)
				<span style="color: red;">{{$errors->first('slug')}}</span>
			@endif
		</div>
		<button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Lưu thay đổi</button>
	</form>
</div>

@endsection
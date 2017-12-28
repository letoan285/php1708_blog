@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
@endsection

@section('content')
<h2>Thêm mới bài viết</h2>
<div class="col-md-8">
	<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" id="posts-form">
	{{csrf_field()}}
	<div class="form-group">
		<label for="title">Tên bài viết</label>
		<input type="text" onkeyup="generateSlug();" name="title" class="form-control" id="title" placeholder="Tên bài viết...">
		@if (count($errors->has('title')) > 0)
			<span style="color: red;">{{$errors->first('title')}}</span>
		@endif
	</div>
		
	<div class="form-group">
		<label for="slug">Đường dẫn</label>
		<input type="text" name="slug" class="form-control" id="slug" placeholder="URL...">
		@if (count($errors->has('slug')) > 0)
			<span style="color: red;">{{$errors->first('slug')}}</span>
		@endif
	</div>
	<div class="form-group">
		<label for="featured">Ảnh đại diện</label>
		<input type="file" name="featured" class="form-control">
		@if (count($errors->has('featured')) > 0)
			<span style="color: red;">{{$errors->first('featured')}}</span>
		@endif
	</div>
	<div class="form-group">
		<label for="content">Nội dung bài viết</label>
		<textarea name="content" id="" cols="30" rows="6" class="form-control"></textarea>
		@if (count($errors->has('content')) > 0)
			<span style="color: red;">{{$errors->first('content')}}</span>
		@endif
	</div>
	<div class="form-group">
		<label for="category_id">Danh mục</label>
		<select name="category_id" id="" class="form-control">
		@foreach ($categories as $category)
			<option value="{{$category->id}}">{{$category->name}}</option>
		@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="tags">Thẻ tags</label>
		<select name="tags[]" class="form-control select2-multi" multiple>
		@foreach ($tags as $tag)
			<option value="{{$tag->id}}">{{$tag->name}}</option>
		@endforeach
		</select>
	</div>
	<button class="btn btn-success" type="submit">Thêm mới</button>
		
	</form>
</div>
@endsection

@section('js')
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script>
	$(document).ready(function(){
		$('.select2-multi').select2();
	});
</script>

<script>
	$(document).ready(function(){
		$('#posts-form').validate({
			rules: {
				title: {
					required: true,
					minlength: 6
				},

				slug: {
					required: true,
					minlength: 6
				},
				content: {
					required: true,
					minlength: 6
				}
			},
			messages: {
				title: {
					required: "vui long nhap ten danh muc",
					minlength: "Nhap toi thieu 6 ky tu"
				},
				slug: {
					required: "vui long nhap ten danh muc",
					minlength: "Nhap toi thieu 6 ky tu"
				},
				content: {
					required: "vui long nhap ten danh muc",
					minlength: "Nhap toi thieu 6 ky tu"
				}
			}
		});
	});
</script>
<script>
	function generateSlug(){
		var title;
	    var slug;
	 
	    //Lấy text từ thẻ input title 
	    title = document.getElementById("title").value;
	 
	    //Đổi chữ hoa thành chữ thường
	    slug = title.toLowerCase();
	 
	    //Đổi ký tự có dấu thành không dấu
	    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
	    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
	    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
	    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
	    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
	    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
	    slug = slug.replace(/đ/gi, 'd');
	    //Xóa các ký tự đặt biệt
	    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
	    //Đổi khoảng trắng thành ký tự gạch ngang
	    slug = slug.replace(/ /gi, "-");
	    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
	    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
	    slug = slug.replace(/\-\-\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-/gi, '-');
	    //Xóa các ký tự gạch ngang ở đầu và cuối
	    slug = '@' + slug + '@';
	    slug = slug.replace(/\@\-|\-\@|\@/gi, '')+'.html';
	    //In slug ra textbox có id “slug”
	    document.getElementById('slug').value = slug;
	}
</script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        // CKEDITOR.replace('description');
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html') !!}',
            filebrowserImageBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html?type=Images') !!}',
            filebrowserFlashBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html?type=Flash') !!}',
            filebrowserUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') !!}',
            filebrowserImageUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') !!}',
            filebrowserFlashUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') !!}'
        });
    });
</script>

@endsection
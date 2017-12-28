@extends('layouts.admin')

@section('content')
<h3>Danh sách quản trị viên</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Tên</th>
			<th>Email</th>
			<th>Quyền</th>
			<th><a class="btn btn-success btn-sm" href="{{ route('users.create') }}"><i class="fa fa-plus"></i>&nbsp;Them</a></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td><a href="{{ route('users.getProfile', $user->id) }}">{{$user->name}}</a></td>
			<td>{{$user->email}}</td>
			<td>{{$user->getRoleName()}}</td>
			<td>
				<a class="btn btn-warning btn-sm" href="{{ route('users.edit', $user->id) }}"><i class="fa fa-pencil"></i></a>
				<a class="btn btn-danger btn-sm" onclick="confirmRemove('{{ route('users.destroy', $user->id) }}')" href="javascript:;"><i class="fa fa-times"></i></a>
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
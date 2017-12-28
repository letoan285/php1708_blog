@extends('layouts.admin')
@section('header')
<h1>Categories List</h1>
@endsection
@section('content')
<h1>Bạn không có quyền, xin mời liên hệ với Admin</h1>
<a href="{{ route('dashboard') }}">Quay lại:</a>
@endsection

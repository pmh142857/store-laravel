@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
           <ol class="breadcrumb">
                <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
                <li><a href="{{route('admin.get.list.article')}}" title="Sản phẩm">Bài viết</a></li>
                <li class="active">Thêm mới</li>   
            </ol>
    </div>
    <div class="">
     {{-- goi view tu form.blade.php --}}
        @include('admin::article.form')
    </div>  
@stop
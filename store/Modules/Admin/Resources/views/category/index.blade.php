@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
           <ol class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Danh mục</a></li>
                <li class="active">Danh sách</li>   
            </ol>
    </div>
    <div class="table-responsive">
            <h2 class="page-header">Quản lý danh mục <a href="{{route('admin.get.create.category')}}"class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên danh mục</th>
                        <th>Title seo</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{dd($categories)}} --}}
                    @if(isset($categories))
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->c_name}}</td>
                                <td>{{$category->c_title_seo}}</td>
                                <td>
                                    {{-- Thay đổi trạng thái --}}
                                    {{-- <a href="">{{$category->getStatus($category->c_active)['name']}}</a> --}}
                                    <a href="" class="label {{$category->getStatus($category->c_active)['class']}}">{{$category->getStatus($category->c_active)['name']}}</a>
                                </td>
                                <td>
                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px" href="{{route('admin.get.edit.category',$category->id)}}"><i class="fas fa-edit"></i></a>
                                <a style="padding: 5px 10px; border: 1px solid #eee; font-size: 12px" href="{{route('admin.get.action.category',['delete',$category->id])}}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    
                </tbody>
            </table>
    </div>
@stop
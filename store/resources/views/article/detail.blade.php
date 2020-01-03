@extends('layouts.app')
@section('content')
<style>
    /* .article_content h2 {
        font-weight: 1.4 rem;

    }
    .article_content {s
        font-family: Roboto,sans-serif;
        
    } */
</style>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                        <a href="{{route('home')}}">Trang chủ</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="home">
                        <a href="{{route('get.list.article')}}" title="Bài viết">Bài viết</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                    <li class="category3"><span>{{$articleDetail->a_name}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-contact-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="article_content" style="margin-bottom: 20px;">
                    <h1>{{$articleDetail->a_name}}</h1>
                    <img src="{{pare_url_file($articleDetail->a_avatar_seo)}}" alt="">
                    <p style="font-weight: 500; color: darkcyan;">{{$articleDetail->a_description}}</p>
                    <div>
                        {{-- html --}}
                        {!!$articleDetail->a_content!!}
                    </div>
                </div>     
            </div>
            <div class="col-sm-8">
                {{-- show bài viết --}}
                <h4>Bài viết khác</h4>
                 @include('components.article') 
             </div>
            <div class="col-sm-4">
                
                
            </div>
        </div>
    </div>	
</div>

@stop
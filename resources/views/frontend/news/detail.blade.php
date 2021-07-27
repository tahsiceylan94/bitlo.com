@extends('frontend.layout')

@if(isset($data->seo_title) && $data->seo_title != "")
    @section('title_seo',$data->seo_title)
@elseif(isset($news_settings_seo_title) && $news_settings_seo_title != "")
    @section('title_seo',$news_settings_seo_title)
@endif

@if(isset($data->seo_description) && $data->seo_description != "")
    @section('description_seo',$data->seo_description)
@elseif(isset($news_settings_seo_description) && $news_settings_seo_description != "")
    @section('description_seo',$news_settings_seo_description)
@endif


@section('newsSelect','active')

@section('container')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$data->title}}</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('frontend.news.index')}}">Haberler</a>
            </li>

            <li class="breadcrumb-item active">{{$data->title}}</li>
        </ol>

        <div class="row">

            <!-- Post Content Column -->
            <div class="@if(isset($news_settings_rightbar) && $news_settings_rightbar == 1) col-12 col-sm-12 col-md-12 col-lg-9 @else col-12 @endif">

                @if($data->file != "")
                    <!-- Preview Image -->
                    <img class="img-fluid rounded blogPicture" src="/images/news/{{$data->file}}" alt="">
                @endif

                <!-- Post Content -->
                <div class="containerTextBlog">
                    {!! $data->content !!}
                </div>

                @if($data->created_at != "")
                    <hr>
                    <p class="createdTime"><b>Oluşturulma Zamanı:</b> {{$data->created_at->format('d.m.Y')}}</p>
                @endif
            </div>


            @if(isset($news_settings_rightbar) && $news_settings_rightbar == 1)
            <!-- Sidebar Widgets Column -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                <div class="allCards">
                    <!-- Categories Widget -->
                    <div class="card ">
                        <h5 class="card-header">Son Haberler</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="list-unstyled categoriesList mb-0">

                                        @foreach($lastNewsList as $keyLast)
                                            <li>
                                                <a href="{{route('frontend.news.detail',$keyLast->slug)}}">{{$keyLast->title}}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($news_settings_aciklama) && $news_settings_aciklama != "")
                    <div class="card my-4">
                        <div class="card-body">
                            {{$news_settings_aciklama}}
                        </div>
                    </div>
                @endif

            </div>
            @endif
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection

@section('css') @endsection

@section('js') @endsection
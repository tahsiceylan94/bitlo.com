@extends('frontend.layout')

@if(isset($news_settings_seo_title) && $news_settings_seo_title != "")
    @section('title_seo',$news_settings_seo_title)
@elseif(isset($settings_title) && $settings_title != "")
    @section('title_seo',$settings_title)
@endif

@if(isset($news_settings_seo_description) && $news_settings_seo_description != "")
    @section('description_seo',$news_settings_seo_description)
@elseif(isset($settings_description) && $settings_description != "")
    @section('description_seo',$settings_description)
@endif


@section('newsSelect','active')

@section('container')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Haberler</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('frontend.index')}}" title="Anasayfa">Anasayfa</a>
            </li>
            <li class="breadcrumb-item active">Haberler</li>

        </ol>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-12">
                <div class="row">

                    @foreach($data['news'] as $keyBlog)
                        <div class="col-md-{{$news_settings_column}}">
                            <a href="{{route('frontend.news.detail',$keyBlog->slug)}}" title="{{$keyBlog->title}}" class="listItemContainer">
                                <div class="card mb-4">
                                    @if($keyBlog->file != "")
                                        <img class="card-img-top" src="/images/news/{{$keyBlog->file}}" alt="{{$keyBlog->title}}">
                                    @endif
                                    <div class="card-body">
                                        <h4 class="card-title listTitleIn">{{$keyBlog->title}}</h4>
                                        <p class="card-text">{{$keyBlog->short_content}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
                    </li>
                </ul>-->

            </div>


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection

@section('css') @endsection

@section('js') @endsection
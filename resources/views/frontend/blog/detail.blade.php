@extends('frontend.layout')

@if(isset($data->seo_title) && $data->seo_title != "")
    @section('title_seo',$data->seo_title)
@elseif(isset($blog_settings_seo_title) && $blog_settings_seo_title != "")
        @section('title_seo',$blog_settings_seo_title)
    @else
        @section('title_seo',$settings_title)
@endif

@if(isset($data->seo_description) && $data->seo_description != "")
    @section('description_seo',$data->seo_description)
@elseif(isset($blog_settings_seo_description) && $blog_settings_seo_description != "")
        @section('description_seo',$blog_settings_seo_description)
    @else
        @section('description_seo',$settings_description)
@endif

@section('blogSelect','active')

@section('container')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$data->title}}</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('frontend.blog.index')}}">Blog</a>
            </li>

            <li class="breadcrumb-item active">{{$data->title}}</li>
        </ol>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-9">

                @if($data->file != "")
                    <!-- Preview Image -->
                    <img class="img-fluid rounded blogPicture" src="/images/blogs/{{$data->file}}" alt="">
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


            <!-- Sidebar Widgets Column -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                <div class="allCards">
                @if(\App\Models\Blogcats::where('status','1')->count() > 0)
                    <!-- Categories Widget -->
                    <div class="card mb-4">
                        <h5 class="card-header">Kategoriler</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled categoriesList mb-0">
                                        @foreach(\App\Models\Blogcats::all()->where('status','1') as $bgkt)
                                            <li><a href="{{route('frontend.blogcat.index',$bgkt->slug)}}" title="{{$bgkt->title}}">{{$bgkt->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                <!-- Categories Widget -->
                <div class="card ">
                    <h5 class="card-header">Son Bloglar</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-unstyled categoriesList mb-0">

                                    @foreach($lastBlogList as $keyLast)
                                        <li>
                                            <a href="{{route('frontend.blog.detail',$keyLast->slug)}}">{{$keyLast->title}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @if(isset($blog_settings_aciklama) && $blog_settings_aciklama != "")
                    <div class="card my-4">
                        <div class="card-body">
                            {{$blog_settings_aciklama}}
                        </div>
                    </div>
                @endif
                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection

@section('css') @endsection

@section('js') @endsection
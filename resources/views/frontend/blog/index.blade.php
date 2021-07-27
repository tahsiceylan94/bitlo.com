@extends('frontend.layout')


@if(isset($data['blogcat']) && $data['blogcat']->seo_title != "")
    @section('title_seo',$data['blogcat']->seo_title)
@elseif(isset($blog_settings_seo_title) && $blog_settings_seo_title != "")
        @section('title_seo',$blog_settings_seo_title)
    @else
        @section('title_seo',$settings_title)
@endif

@if(isset($data['blogcat']) && $data['blogcat']->seo_description != "")
    @section('description_seo',$data['blogcat']->seo_description)
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
        <h1 class="mt-4 mb-3">@if(isset($data['blogcat']) && $data['blogcat']->title != "") {{$data['blogcat']->title}} @else Blog @endif</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('frontend.index')}}" title="Anasayfa">Anasayfa</a>
            </li>
            @if(isset($data['blogcat']) && $data['blogcat']->title != "")
                <li class="breadcrumb-item">
                    <a href="{{route('frontend.blog.index')}}" title="Blog">Blog</a>
                </li>
                <li class="breadcrumb-item active">{{$data['blogcat']->title}}</li>
            @else <li class="breadcrumb-item active">Blog</li> @endif

        </ol>

        @if(isset($data['blogcat']) && $data['blogcat']->title != "")

                <div class="row mb-4">
                    @if($data['blogcat']->file != "")
                        <div class="col-12">
                            <img class="card-img-top" src="/images/blogcats/{{$data['blogcat']->file}}" alt="{{$data['blogcat']->title}}">
                        </div>
                    @endif
                    <div class="col-12 categoryContent">
                        {!! $data['blogcat']->content !!}
                    </div>
                </div>

        @endif

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="@if(isset($blog_settings_rightbar) && $blog_settings_rightbar == 1) col-12 col-sm-12 col-md-12 col-lg-9 @else col-12 @endif">
                <div class="row">

                    @foreach($data['blog'] as $keyBlog)
                        <div class="col-md-{{$blog_settings_column}}">
                            <a href="{{route('frontend.blog.detail',$keyBlog->slug)}}" title="{{$keyBlog->title}}" class="listItemContainer">
                                <div class="card mb-4">
                                    @if($keyBlog->file != "")
                                        <div class="listImg"><img class="card-img-top" src="/images/blogs/{{$keyBlog->file}}" alt="{{$keyBlog->title}}" /></div>
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

            @if(isset($blog_settings_rightbar) && $blog_settings_rightbar == 1)
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
                <div class="card mb-4">
                    <h5 class="card-header">Son Bloglar</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-unstyled categoriesList mb-0">

                                    @foreach(\App\Models\Blogs::where('status','1')->orderBy('must')->take(6)->get() as $keyLast)
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
                    <div class="card">
                        <div class="card-body">
                            {{$blog_settings_aciklama}}
                        </div>
                    </div>
                @endif
                </div>
            </div>
            @endif
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection

@section('css') @endsection

@section('js') @endsection
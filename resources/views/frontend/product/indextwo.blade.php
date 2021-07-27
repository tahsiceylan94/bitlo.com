@extends('frontend.layout')


@if(isset($cat) && $cat->seo_title != "")
    @section('title_seo',$cat->seo_title)
@elseif(isset($product_settings_seo_title) && $product_settings_seo_title != "")
        @section('title_seo',$product_settings_seo_title)
    @else
        @section('title_seo',$settings_title)
@endif

@if(isset($cat) && $cat->seo_description != "")
    @section('description_seo',$cat->seo_description)
@elseif(isset($product_settings_seo_description) && $product_settings_seo_description != "")
        @section('description_seo',$product_settings_seo_description)
    @else
        @section('description_seo',$settings_description)
@endif

@section('productSelect','active')

@section('container')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">@if(isset($cat->title) && $cat->title != "") {{$cat->title}} @else Ürünler @endif</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('frontend.index')}}" title="Anasayfa">Anasayfa</a>
            </li>
            @if(isset($cat->title) && $cat->title != "")
                <li class="breadcrumb-item">
                    <a href="{{route('frontend.product.index')}}" title="Ürünler">Ürünler</a>
                </li>
                <li class="breadcrumb-item active">{{$cat->title}}</li>
            @else
                <li class="breadcrumb-item active">Ürünler</li>
            @endif

        </ol>

        @if(isset($cat) && $cat->title != "")

            <div class="row mb-4">
                @if($cat->file != "")
                    <div class="col-12">
                        <img class="card-img-top" src="/images/productcategories/{{$cat->file}}" alt="{{$cat->title}}">
                    </div>
                @endif
                <div class="col-12 categoryContent">
                    {!! $cat->content !!}
                </div>
            </div>

        @endif

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-12">
                <div class="row">
                    @if(count($cats)>0)
                        @foreach($cats as $keyBlog)
                            <div class="col-md-4">
                                <a href="{{route('frontend.procat.index',[$keyBlog->id,$keyBlog->slug])}}" title="{{$keyBlog->title}}" class="listItemContainer">
                                    <div class="card mb-4">
                                        @if($keyBlog->file != "")
                                            <div class="listImg"><img class="card-img-top" src="/images/productcategories/{{$keyBlog->file}}" alt="{{$keyBlog->title}}" /></div>
                                        @endif
                                        <div class="card-body">
                                            <h4 class="card-title listTitleIn">{{$keyBlog->title}}</h4>
                                            <p class="card-text">{{$keyBlog->short_content}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        @else
                        <div class="col-12">Bu kategoride içerik bulunamadı.</div>
                    @endif
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
@extends('frontend.layout')

{{--@if(isset($product->seo_title) && $product->seo_title != "")--}}
    {{--@section('title_seo',$product->seo_title)--}}
{{--@elseif(isset($blog_settings_seo_title) && $blog_settings_seo_title != "")--}}
        {{--@section('title_seo',$blog_settings_seo_title)--}}
    {{--@else--}}
        {{--@section('title_seo',$settings_title)--}}
{{--@endif--}}

{{--@if(isset($product->seo_description) && $product->seo_description != "")--}}
    {{--@section('description_seo',$product->seo_description)--}}
{{--@elseif(isset($blog_settings_seo_description) && $blog_settings_seo_description != "")--}}
        {{--@section('description_seo',$blog_settings_seo_description)--}}
    {{--@else--}}
        {{--@section('description_seo',$settings_description)--}}
{{--@endif--}}

@section('productSelect','active')

@section('container')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$product->title}}</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('frontend.index')}}" title="Anasayfa">Anasayfa</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('frontend.product.index')}}">Ürünler</a>
            </li>

            <li class="breadcrumb-item active">{{$product->title}}</li>
        </ol>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-9">

                @if($product->file != "")
                    <!-- Preview Image -->
                    <img class="img-fluid rounded blogPicture" src="/images/products/{{$product->file}}" alt="">
                @endif

                <!-- Post Content -->
                <div class="containerTextBlog">
                    {!! $product->content !!}
                </div>

                <div class="containerTags">
                    <ul>
                        @foreach($cats as $ct)
                            <li><a href="{{route('frontend.procat.index',[$ct->id,$ct->slug])}}" title="{{$ct->title}}">{{$ct->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <!-- Sidebar Widgets Column -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                <div class="allCards">
                    @if(\App\Models\Productcategories::where('status','1')->count() > 0)
                        <!-- Categories Widget -->
                            <div class="card  mb-4">
                                <h5 class="card-header">Kategoriler</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="categoriesList">
                                                <?php
                                                function getCategoryTree($parent_id=null) {
                                                    $categories = \App\Models\Productcategories::select('id', 'title', 'slug', 'parent_id')->where('parent_id' ,'=', $parent_id)->where('status','1')->orderBy('parent_id')->get();

                                                    foreach ($categories as $item){
                                                        if($item->parent_id != null){echo '<ul>';}
                                                        echo '<li><a href="'.route('frontend.procat.index',[$item->id,$item->slug]).'">' . $item->title;
                                                        getCategoryTree($item->id);
                                                        echo '</li>';
                                                        if($item->parent_id != null){echo '</ul>';}
                                                    }
                                                }
                                                getCategoryTree();
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

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
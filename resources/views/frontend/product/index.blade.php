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
            <div class="@if(isset($product_settings_rightbar) && $product_settings_rightbar == 1) col-12 col-sm-12 col-md-12 col-lg-9 @else col-12 @endif">
                <div class="row">
                    @if(count($product)>0)
                        @foreach($product as $keyBlog)
                            <div class="col-md-{{$product_settings_column}}">
                                <a href="{{route('frontend.product.detail',[$keyBlog->id,$keyBlog->slug])}}" title="{{$keyBlog->title}}" class="listItemContainer">
                                    <div class="card mb-4">
                                        @if($keyBlog->file != "")
                                            <div class="listImg"><img class="card-img-top" src="/images/products/{{$keyBlog->file}}" alt="{{$keyBlog->title}}" /></div>
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

            @if(isset($product_settings_rightbar) && $product_settings_rightbar == 1)

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
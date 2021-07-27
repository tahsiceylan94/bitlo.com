@extends('frontend.layout')


@if(isset($data->seo_title) && $data->seo_title != "")
    @section('title_seo',$data->seo_title)
@elseif(isset($settings_title) && $settings_title != "")
    @section('title_seo',$settings_title)
@endif

@if(isset($data->seo_description) && $data->seo_description != "")
    @section('description_seo',$data->seo_description)
@elseif(isset($settings_description) && $settings_description != "")
    @section('description_seo',$settings_description)
@endif

@section('page_url',$data->slug)

@section('container')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$data->title}}</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('frontend.index')}}">Anasayfa</a>
            </li>
            <li class="breadcrumb-item active">{{$data->title}}</li>
        </ol>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">

                @if($data->file != "")
                    <!-- Preview Image -->
                    <img class="img-fluid rounded blogPicture" src="/images/pages/{{$data->file}}" alt="{{$data->title}}" />
                @endif

                <!-- Post Content -->
                <div class="containerTextBlog">
                    {!! $data->content !!}
                </div>


            </div>


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection

@section('css') @endsection

@section('js') @endsection
@extends('frontend.layout')

@section('title_seo','Anasayfa Bölümü')

@section('container')

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">404
        <small>Sayfa Bulunamadı</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('frontend.index')}}" title="Anasayfa">Anasayfa</a>
        </li>
        <li class="breadcrumb-item active">404</li>
    </ol>

    <div class="jumbotron">
        <h1 class="display-1">404</h1>
        <h2>Sayfa silinmiş veya yanlış bir adres girmiş olabilirsiniz.</h2>
        <p>Yukarıdaki menülerimizden ilgili sayfa ulaşabilirsiniz.</p>

    </div>
    <!-- /.jumbotron -->

</div>
<!-- /.container -->


@endsection

@section('css') @endsection

@section('js') @endsection
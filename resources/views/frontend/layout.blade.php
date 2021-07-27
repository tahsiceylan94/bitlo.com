@if($settings_site_status == 1 || Auth::user() !== null)
{{--@if() {{Auth::user()->id}} @endif--}}
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">

    <title>@yield('title_seo')</title>
    <meta name="description" content="@yield('description_seo')"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS -->
    <link href="/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/frontend/css/modern-business.css" rel="stylesheet">

    <!-- Theme Custom -->
    <link href="/frontend/css/master.css" rel="stylesheet">
    <link rel="stylesheet" href="/frontend/fontawesome/css/font-awesome.min.css">

    @if($settings_ico != "")
        <link rel="icon" type="image/png" href="/images/settings/{{$settings_ico}}">
    @endif

    @yield('css')

    {!! $settings_headercode !!}
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('frontend.index')}}">
            @if($settings_logo != "")
                    <img src="/images/settings/{{$settings_logo}}" alt="{{$settings_site_name}}" width="{{$settings_logo_width}}" class="img-fluid" />
                @else
                {{$settings_site_name}}
            @endif
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @yield('homeSelect')">
                    <a class="nav-link" href="{{route('frontend.index')}}" title="Anasayfa">Anasayfa</a>
                </li>

                @foreach($pages as $pgs)
                    <li class="nav-item @if (trim($__env->yieldContent('page_url')) == $pgs->slug) active @endif">
                        <a class="nav-link" href="{{route('frontend.page.detail',$pgs->slug)}}" title="{{$pgs->title}}">{{$pgs->title}}</a>
                    </li>
                @endforeach

                @if(isset($product_settings_menu) && $product_settings_menu == 1)
                    <li class="nav-item @yield('productSelect')">
                        <a class="nav-link" href="{{route('frontend.product.index')}}" title="Ürünler">Ürünler</a>
                    </li>
                @endif

                @if(isset($blog_settings_menu) && $blog_settings_menu == 1)
                    <li class="nav-item @yield('blogSelect')">
                        <a class="nav-link" href="{{route('frontend.blog.index')}}" title="Blog">Blog</a>
                    </li>
                @endif

                @if(isset($news_settings_menu) && $news_settings_menu == 1)
                    <li class="nav-item @yield('newsSelect')">
                        <a class="nav-link" href="{{route('frontend.news.index')}}" title="Haberler">Haberler</a>
                    </li>
                @endif

                @if(isset($contact_menu_has) && $contact_menu_has == 1)
                    <li class="nav-item @yield('contactSelect')">
                        <a class="nav-link" href="{{route('frontend.default.iletisim')}}" title="İletişim">İletişim</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="mainContainer">
    @yield('container')
</div>
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
       <div class="row">
            {!! $footerHtml !!}
       </div>
    </div>
    <!-- /.container -->
</footer>
<footer class="lastFooter">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <p class="copyrightArea">{!! $settings_footer !!}</p>
            </div>
            <div class="col-6">
                <div class="socialMedia">
                    <ul>{!! $socialHtml !!}</ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Bootstrap core JavaScript -->
<script src="/frontend/vendor/jquery/jquery.min.js"></script>
<script src="/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

@yield('js')

{!! $settings_footercode !!}
</body>

</html>
@else
    Sitemiz geçici olarak servis dışıdır. İlginiz için teşekkür ederiz.
@endif
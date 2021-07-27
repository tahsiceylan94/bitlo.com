@extends('frontend.layout')


@if(isset($data['homesettings']['home_settings_seo_title']) && $data['homesettings']['home_settings_seo_title'] != "")
    @section('title_seo',$data['homesettings']['home_settings_seo_title'])
@elseif(isset($settings_title) && $settings_title != "")
    @section('title_seo',$settings_title)
@endif

@if(isset($data['homesettings']['home_settings_seo_description']) && $data['homesettings']['home_settings_seo_description'] != "")
    @section('description_seo',$data['homesettings']['home_settings_seo_description'])
@elseif(isset($settings_description) && $settings_description != "")
    @section('description_seo',$settings_description)
@endif

@section('homeSelect','active')

@section('container')

@if($data['homesettings']['home_settings_slider'] == 1)
    <header class="homeSliderHeader">
        <div class="owl-carousel owl-theme">
            @foreach($data['slider'] as $keySlider)
                <div class="item">
                    <img src="/images/sliders/{{$keySlider->file}}" class="img-fluid" alt="{{$keySlider->title}}" />
                    <div class="sliderContent">
                        <div class="sliderContentIn">
                            @if($keySlider->slug != "") <a href="{{$keySlider->slug}}" title="{{$keySlider->title}}"> @endif
                                <h3 class="sliderTitle">{{$keySlider->title}}</h3>
                                <div class="sliderDescription">{!! $keySlider->content !!}</div>
                                @if($keySlider->slug != "") </a> @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </header>
    @elseif($data['homesettings']['home_settings_slider'] == 2)
        <header class="homeSliderHeader singlePhoto">
            <div class="item">
                <img src="/images/sliders/{!! $data['slider'][0]['file'] !!}" class="img-fluid" alt="{{$data['slider'][0]['title']}}" />
                <div class="sliderContent">
                    <div class="sliderContentIn">
                        @if($data['slider'][0]['slug'] != "") <a href="{{$data['slider'][0]['slug']}}" title="{{$data['slider'][0]['title']}}"> @endif
                            <h3 class="sliderTitle">{{$data['slider'][0]['title']}}</h3>
                            <div class="sliderDescription">{!! $data['slider'][0]['content'] !!}</div>
                        @if($data['slider'][0]['title'] != "") </a> @endif
                    </div>
                </div>
            </div>
        </header>
    @else
        <div class="container noSlider"></div>
@endif

<!-- Page Content -->
<div class="container">

    @if(isset($data['homesettings']['home_settings_manset_bir_durum']) && $data['homesettings']['home_settings_manset_bir_durum'] == 1)
        <div class="container callToActionArea">
            <div class="row">
                <div class="col-md-9 callToActionContainer">
                    @if(isset($data['homesettings']['home_settings_manset_bir_baslik']) && $data['homesettings']['home_settings_manset_bir_baslik'] != "")
                        <h2>{{$data['homesettings']['home_settings_manset_bir_baslik']}}</h2>
                    @endif
                    @if(isset($data['homesettings']['home_settings_manset_bir_aciklama']) && $data['homesettings']['home_settings_manset_bir_aciklama'] != "")
                        <p>{{$data['homesettings']['home_settings_manset_bir_aciklama']}}</p>
                    @endif
                </div>
                <div class="col-md-3">
                    @if(isset($data['homesettings']['home_settings_manset_bir_buton_link']) && $data['homesettings']['home_settings_manset_bir_buton_link'] != "")
                        <a class="btn btn-lg btn-new btn-block" href="{{$data['homesettings']['home_settings_manset_bir_buton_link']}}" @if(isset($data['homesettings']['home_settings_manset_bir_buton_metin']) && $data['homesettings']['home_settings_manset_bir_buton_metin'] != "")title="{{$data['homesettings']['home_settings_manset_bir_buton_metin']}}"@endif>

                        @if(isset($data['homesettings']['home_settings_manset_bir_buton_metin']) && $data['homesettings']['home_settings_manset_bir_buton_metin'] != "")
                            {{$data['homesettings']['home_settings_manset_bir_buton_metin']}}
                        @endif
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <!-- Portfolio Section -->
    <h2 class="my-4 homeTitle">{{$settings_welcome_text}}</h2>

    <div class="row">
        @foreach($data['homes'] as $keyBox)
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <a href="{{$keyBox->slug}}" title="{{$keyBox->title}}" class="listItemContainer">
                    <div class="card h-100">
                        <img class="card-img-top" src="/images/homes/{{$keyBox->file}}" alt="{{$keyBox->title}}">
                        <div class="card-body">
                            <h4 class="card-title listTitleIn">
                                {{$keyBox->title}}
                            </h4>
                            <div class="card-text">{!! substr($keyBox->content,0,100) !!}</div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <!-- /.row -->

    @if(isset($data['homesettings']['home_settings_kisa_durum']) && $data['homesettings']['home_settings_kisa_durum'] == 1)
        <!-- Features Section -->
        <div class="row middleDesc">
            <div class="col-lg-6">
                @if(isset($data['homesettings']['home_settings_kisa_baslik']) && $data['homesettings']['home_settings_kisa_baslik'] != "")<h2>{{$data['homesettings']['home_settings_kisa_baslik']}}</h2>@endif
                @if(isset($data['homesettings']['home_settings_kisa_yazisi']) && $data['homesettings']['home_settings_kisa_yazisi'] != ""){!! $data['homesettings']['home_settings_kisa_yazisi'] !!}@endif
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="/images/homesetting/{{$data['homesettings']['home_settings_kisa_fotograf']}}" alt="">
            </div>
        </div>
        <!-- /.row -->
    @endif

    @if(isset($data['homesettings']['home_settings_manset_iki_durum']) && $data['homesettings']['home_settings_manset_iki_durum'] == 1)
        <div class="container callToActionArea">
            <div class="row">
                <div class="col-md-9 callToActionContainer">
                    @if(isset($data['homesettings']['home_settings_manset_iki_baslik']) && $data['homesettings']['home_settings_manset_iki_baslik'] != "")
                        <h2>{{$data['homesettings']['home_settings_manset_iki_baslik']}}</h2>
                    @endif
                    @if(isset($data['homesettings']['home_settings_manset_iki_aciklama']) && $data['homesettings']['home_settings_manset_iki_aciklama'] != "")
                        <p>{{$data['homesettings']['home_settings_manset_iki_aciklama']}}</p>
                    @endif
                </div>
                <div class="col-md-3">
                    @if(isset($data['homesettings']['home_settings_manset_iki_buton_link']) && $data['homesettings']['home_settings_manset_iki_buton_link'] != "")
                        <a class="btn btn-lg btn-new btn-block" href="{{$data['homesettings']['home_settings_manset_iki_buton_link']}}" @if(isset($data['homesettings']['home_settings_manset_iki_buton_metin']) && $data['homesettings']['home_settings_manset_iki_buton_metin'] != "")title="{{$data['homesettings']['home_settings_manset_iki_buton_metin']}}"@endif>
                            @if(isset($data['homesettings']['home_settings_manset_iki_buton_metin']) && $data['homesettings']['home_settings_manset_iki_buton_metin'] != "")
                                {{$data['homesettings']['home_settings_manset_iki_buton_metin']}}
                            @endif
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif

</div>
<!-- /.container -->
@endsection

@section('css')
    @if(isset($data['homesettings']['home_settings_slider']) && $data['homesettings']['home_settings_slider'] == 1)
        <!-- Owl Stylesheets -->
        <link rel="stylesheet" href="/frontend/owl/css/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="/frontend/owl/css/assets/owl.theme.default.min.css">
    @endif
@endsection

@section('js')
    @if(isset($data['homesettings']['home_settings_slider']) && $data['homesettings']['home_settings_slider'] == 1)
        <script src="/frontend/owl/js/owl.carousel.min.js"></script>
        <script>
            $(document).ready(function() {
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    margin: 10,
                    nav: false,
                    autoplay:false,
                    loop: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        1000: {
                            items: 1
                        }
                    }
                })
            })
        </script>
    @endif
@endsection
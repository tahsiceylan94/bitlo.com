@extends('backend.layout')

@section('activeIndex') active @endsection

@section('pagetitle') Kontrol Paneli <small>Anasayfa</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('zeplin.settings')}}"><i class="fa fa-dashboard"></i> Kontrol Paneli Anasayfa</a></li>
    </ol>
@endsection

@section('content')
    <div class="box-body">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <a href="{{route('home.index')}}" class="homeLinks">
                        <div class="bannerTitle">Anasayfa Kutuları</div>
                        <div class="activeLineAdd">{{count(App\Models\Homes::where('status','1')->get())}} Adet aktif içerik</div>
                        <div class="passiveLineAdd">{{count(App\Models\Homes::where('status','0')->get())}} Adet pasif içerik</div>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <a href="{{route('home.index')}}" class="small-box-footer">
                        Anasayfa <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <a href="{{route('slider.index')}}" class="homeLinks">
                        <div class="bannerTitle">Slider</div>
                        <div class="activeLineAdd">{{count(App\Models\Sliders::where('status','1')->get())}} Adet aktif içerik</div>
                        <div class="passiveLineAdd">{{count(App\Models\Sliders::where('status','0')->get())}} Adet pasif içerik</div>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="fa fa-picture-o"></i>
                    </div>
                    <a href="{{route('slider.index')}}" class="small-box-footer">
                        Slider <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <a href="{{route('page.index')}}" class="homeLinks">
                        <div class="bannerTitle">Sayfalar</div>
                        <div class="activeLineAdd">{{count(App\Models\Pages::where('status','1')->get())}} Adet aktif içerik</div>
                        <div class="passiveLineAdd">{{count(App\Models\Pages::where('status','0')->get())}} Adet pasif içerik</div>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <a href="{{route('page.index')}}" class="small-box-footer">
                        Sayfalar <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <a href="{{route('blog.index')}}" class="homeLinks">
                        <div class="bannerTitle">Bloglar</div>
                        <div class="activeLineAdd">{{count(App\Models\Blogs::where('status','1')->get())}} Adet aktif içerik</div>
                        <div class="passiveLineAdd">{{count(App\Models\Blogs::where('status','0')->get())}} Adet pasif içerik</div>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="fa fa-paper-plane"></i>
                    </div>
                    <a href="{{route('blog.index')}}" class="small-box-footer">
                        Bloglar <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->


            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <a href="{{route('product.index')}}" class="homeLinks">
                        <div class="bannerTitle">Ürünler</div>
                        <div class="activeLineAdd">{{count(App\Models\Products::where('status','1')->get())}} Adet aktif içerik</div>
                        <div class="passiveLineAdd">{{count(App\Models\Products::where('status','0')->get())}} Adet pasif içerik</div>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="fa fa fa-tags"></i>
                    </div>
                    <a href="{{route('product.index')}}" class="small-box-footer">
                        Ürünler <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <a href="{{route('new.index')}}" class="homeLinks">
                        <div class="bannerTitle">Haberler</div>
                        <div class="activeLineAdd">{{count(App\Models\News::where('status','1')->get())}} Adet aktif içerik</div>
                        <div class="passiveLineAdd">{{count(App\Models\News::where('status','0')->get())}} Adet pasif içerik</div>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="fa fa-newspaper-o"></i>
                    </div>
                    <a href="{{route('new.index')}}" class="small-box-footer">
                        Haberler <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <a href="{{route('footer.index')}}" class="homeLinks">
                            <div class="bannerTitle">Footer</div>
                            <div class="activeLineAdd">{{count(App\Models\Footers::where('status','1')->get())}} Adet aktif içerik</div>
                            <div class="passiveLineAdd">{{count(App\Models\Footers::where('status','0')->get())}} Adet pasif içerik</div>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <a href="{{route('footer.index')}}" class="small-box-footer">
                        Footer <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <a href="{{route('contact.index')}}" class="homeLinks">
                        <div class="bannerTitle">İletişim</div>
                        <div class="activeLineAdd">{{count(App\Models\Contacts::where('status','1')->get())}} Adet aktif içerik</div>
                        <div class="passiveLineAdd">{{count(App\Models\Contacts::where('status','0')->get())}} Adet pasif içerik</div>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <a href="{{route('contact.index')}}" class="small-box-footer">
                        İletişim <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
@endsection

<!-- CSS -->
@section('css')@endsection

<!-- JS -->
@section('js')@endsection
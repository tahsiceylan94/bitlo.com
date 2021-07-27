@extends('backend.layout')

@section('activeFooter') active @endsection

@section('pagetitle')Footer
<small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('footer.index')}}"><i class="fa fa-bars"></i> Footer</a></li>
        <li class="active">Düzenle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('footer.update',$footer->id)}}" method="POST" name="createfooter" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="description" class="form-control" value="{{$footer->description}}" placeholder="Başlık" >
            </div>

            <div class="form-group">
                <label>İçerik Tipi</label>
                <select name="type" id="type" class="form-control type_control">
                    <option value="blok" @if($footer->type == "blok") selected @endif>Link Listesi</option>
                    <option value="ckeditor" @if($footer->type == "ckeditor") selected @endif>Yazı Alanı</option>
                </select>
            </div>

            @if($footer->type == "blok")
                <div class="form-group">
                <label>İçerik</label>
                    <select name="value" class="form-control" id="value">
                        <option value="iletisim" @if($footer->value == "iletisim") selected @endif>İletişim Bloğu</option>
                        <option value="blog" @if($footer->value == "blog") selected @endif>Son Bloglar</option>
                        <option value="sayfalar" @if($footer->value == "sayfalar") selected @endif>Sayfalar</option>
                        <option value="haberler" @if($footer->value == "haberler") selected @endif>Son Haberler</option>
                        <option value="urunler" @if($footer->value == "urunler") selected @endif>Ürünler</option>
                    </select>
                </div>

                @elseif($footer->type == "ckeditor")
                <div class="form-group">
                    <label>İçerik</label>
                    <textarea class="form-control" name="value" id="ckeditor" rows="3" required>{{$footer->value}}</textarea>
                </div>
            @endif

            <div class="form-group">
                <label>Durum</label>
                <select name="status" id="status" class="form-control">

                    <option value="1" @if($footer->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if($footer->status == 0) selected @endif>Pasif</option>
                </select>
            </div>

        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-info autoClassSave">Kaydet</button>
        </div>

    </form>
@endsection

<!-- CSS -->
@section('css')@endsection

<!-- JS -->
@section('js')
    <!-- CK Editor -->
    <script src="/backend/bower_components/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>

    <script>
        $( document ).ready(function() {
            $('.type_control').change(function(){
                $( ".autoClassSave" ).trigger( "click" );
            });
        });
    </script>
@endsection
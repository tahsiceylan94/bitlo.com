@extends('backend.layout')

@section('activeHomesetting') active @endsection

@section('pagetitle')Anasayfa Genel Ayarlar
<small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('homesetting.index')}}"><i class="fa fa-home"></i> Anasayfa Genel Ayarlar</a></li>
        <li class="active">Düzenle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('homesetting.update',$homesetting->id)}}" method="POST" name="createhomesetting" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="description" class="form-control" value="{{$homesetting->description}}" placeholder="Başlık" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">İçerik</label>
                @if($homesetting->type=="text")
                    <input type="text" class="form-control" value="{{$homesetting->value}}" name="value" placeholder="İçerik" required>
                @elseif($homesetting->type=="textarea")
                    <textarea class="form-control" rows="3" name="value" required>{{$homesetting->value}}</textarea>
                @elseif($homesetting->type=="ckeditor")
                    <textarea class="form-control" id="ckeditor" rows="3" required name="value">{{$homesetting->value}}</textarea>
                @elseif($homesetting->type == "file")
                    <input type="file" class="form-control" name="settings_value_file" value="">
                    @if($homesetting->value !="")
                        <div class="form-group" style="margin-top: 15px;">
                            <label for="removethisfile">Fotoğrafı Kaldır</label>
                            <div class="form-control">
                                <input type="checkbox" name="removethisfile" id="removethisfile" value="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Yüklenmiş Fotoğraf</label>
                            <div class="form-control" style="height: auto;">
                                <img src="/images/homesetting/{{$homesetting->value}}" height="130" class="thisphoto" alt="">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="old_file"  value="{{$homesetting->value}}">
                    @endif
                @endif

                <small>@if($homesetting->key == "home_settings_slider") 1: Çoklu Slider <br> 2: Tek Slider <br> 3: Slider Kapat @endif</small>
            </div>

            <div class="form-group">
                <label>Durum</label>
                <select name="status" id="status" class="form-control">

                    <option value="1" @if($homesetting->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if($homesetting->status == 0) selected @endif>Pasif</option>
                </select>
            </div>

        </div>
        <div class="box-homesetting">
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

    <script>
        $(document).ready(function() {
            $('#removethisfile').click(function() {
                if ($(this).is(':checked')) {
                    $('.thisphoto').hide();
                }else{
                    $('.thisphoto').show();
                }
            });
        });
    </script>
@endsection
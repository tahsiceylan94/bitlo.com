@extends('backend.layout')

@section('activeSettings') active @endsection

@section('pagetitle')Ayarlar <small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('zeplin.settings')}}"><i class="fa fa-cog"></i> Ayarlar</a></li>
        <li class="active">Düzenle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('settings.editform',['id'=>$settings->id])}}" method="POST" name="editsetting" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Açıklama</label>
                <input type="text" name="settings_description" class="form-control" value="{{$settings->settings_description}}" placeholder="Açıklama" readonly disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">İçerik</label>
                @if($settings->settings_type=="text")
                    <input type="text" class="form-control" value="{{$settings->settings_value}}" name="settings_value" placeholder="İçerik" required>
                @elseif($settings->settings_type=="textarea")
                    <textarea class="form-control" rows="3" name="settings_value" required>{{$settings->settings_value}}</textarea>
                @elseif($settings->settings_type=="ckeditor")
                    <textarea class="form-control" id="ckeditor" rows="3" required name="settings_value">{{$settings->settings_value}}</textarea>
                @elseif($settings->settings_type == "file")
                    <input type="file" class="form-control" name="settings_value_file" value="">
                    @if($settings->settings_value !="")
                        <div class="form-group" style="margin-top: 15px;">
                            <label for="removethisfile">Fotoğrafı Kaldır</label>
                            <div class="form-control">
                                <input type="checkbox" name="removethisfile" id="removethisfile" value="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Yüklenmiş Fotoğraf</label>
                            <div class="form-control" style="height: auto;">
                                <img src="/images/settings/{{$settings->settings_value}}" height="130" class="thisphoto" alt="">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="old_file"  value="{{$settings->settings_value}}">
                    @endif
                @endif
            </div>

        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-info">Kaydet</button>
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
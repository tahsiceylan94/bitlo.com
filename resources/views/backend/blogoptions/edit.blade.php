@extends('backend.layout')

@section('activeBlogoption') active @endsection

@section('pagetitle')Blogoption
<small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('blogoption.index')}}"><i class="fa fa-cog"></i> Blogoption</a></li>
        <li class="active">Ekle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('blogoption.update',$blogoption->id)}}" method="POST" name="createblogoption" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="description" class="form-control" value="{{$blogoption->description}}" placeholder="Başlık" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">İçerik</label>
                @if($blogoption->type=="text")
                    <input type="text" class="form-control" value="{{$blogoption->value}}" name="value" placeholder="İçerik" required>
                @elseif($blogoption->type=="textarea")
                    <textarea class="form-control" rows="3" name="value" required>{{$blogoption->value}}</textarea>
                @elseif($blogoption->type=="ckeditor")
                    <textarea class="form-control" id="ckeditor" rows="3" required name="value">{{$blogoption->value}}</textarea>
                @elseif($blogoption->type == "file")
                    <input type="file" class="form-control" name="settings_value_file" value="">
                    @if($blogoption->value !="")
                        <div class="form-group" style="margin-top: 15px;">
                            <label for="removethisfile">Fotoğrafı Kaldır</label>
                            <div class="form-control">
                                <input type="checkbox" name="removethisfile" id="removethisfile" value="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Yüklenmiş Fotoğraf</label>
                            <div class="form-control" style="height: auto;">
                                <img src="/images/blogoption/{{$blogoption->value}}" height="130" class="thisphoto" alt="">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="old_file"  value="{{$blogoption->value}}">
                    @endif
                @endif
            </div>

            <div class="form-group">
                <label>Durum</label>
                <select name="status" id="status" class="form-control">

                    <option value="1" @if($blogoption->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if($blogoption->status == 0) selected @endif>Pasif</option>
                </select>
            </div>
            <div class="box-blogoption">
                <button type="submit" class="btn btn-info autoClassSave">Kaydet</button>
            </div>
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
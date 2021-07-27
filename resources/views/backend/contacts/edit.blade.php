@extends('backend.layout')

@section('activeContact') active @endsection

@section('pagetitle')İletişim
<small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('contact.index')}}"><i class="fa fa-envelope"></i> İletişim</a></li>
        <li class="active">Düzenle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('contact.update',$contact->id)}}" method="POST" name="createcontact" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="description" class="form-control" value="{{$contact->description}}" placeholder="Başlık" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">İçerik</label>
                @if($contact->type=="text")
                    <input type="text" class="form-control" value="{{$contact->value}}" name="value" placeholder="İçerik" required>
                @elseif($contact->type=="textarea")
                    <textarea class="form-control" rows="3" name="value" required>{{$contact->value}}</textarea>
                @elseif($contact->type=="ckeditor")
                    <textarea class="form-control" id="ckeditor" rows="3" required name="value">{{$contact->value}}</textarea>
                @elseif($contact->type == "file")
                    <input type="file" class="form-control" name="value" required value="">
                    @if($contact->value !="")
                        <div class="mevcut_foto">
                            <label>Mevcut Fotoğraf</label>
                            <img src="/images/settings/{{$contact->value}}" width="130" alt="" style="border:1px solid #ccc;padding: 5px;">
                        </div>
                        <input type="hidden" class="form-control" name="old_file"  value="{{$contact->value}}">
                    @endif
                @endif
            </div>

            <div class="form-group">
                <label>Durum</label>
                <select name="status" id="status" class="form-control">

                    <option value="1" @if($contact->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if($contact->status == 0) selected @endif>Pasif</option>
                </select>
            </div>

        </div>
        <div class="box-contact">
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
@extends('backend.layout')

@section('activeNew') active @endsection

@section('pagetitle')Haber
<small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('new.index')}}"><i class="fa fa-newspaper-o"></i> Haber</a></li>
        <li class="active">Ekle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('new.update',$new->id)}}" method="POST" name="createnew" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            @if($new->file)
                <div class="form-group">
                    <label for="removethisfile">Fotoğrafı Kaldır</label>
                    <div class="form-control">
                        <input type="checkbox" name="removethisfile" id="removethisfile" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <label>Yüklenmiş Fotoğraf</label>
                    <div class="form-control" style="height: auto;">
                        <img src="/images/news/{{$new->file}}" height="100" class="thisphoto" alt="">
                    </div>
                </div>
            @endif
            <div class="form-group">
                <label>Fotoğraf</label>
                <input type="file" class="form-control" name="newfile" value="{{$new->file}}">
            </div>
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="title" class="form-control" value="{{$new->title}}" placeholder="Başlık" >
            </div>
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="slug" class="form-control" value="{{$new->slug}}" placeholder="URL" >
            </div>
            <div class="form-group">
                <label>İçerik</label>
                <textarea class="form-control" name="content" id="ckeditor" rows="3" required>{{$new->content}}</textarea>
            </div>
            <div class="form-group">
                <label>Kısa İçerik</label>
                <textarea class="form-control" name="short_content" rows="3">{{$new->short_content}}</textarea>
            </div>

            <div class="form-group">
                <label>Durum</label>
                <select name="status" id="status" class="form-control">

                    <option value="1" @if($new->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if($new->status == 0) selected @endif>Pasif</option>
                </select>
            </div>

<hr>
            <div class="form-group">
                <label>Seo | Title</label>
                <input type="text" name="seo_title" class="form-control" value="{{$new->seo_title}}" placeholder="Seo Title" >
            </div>
            <div class="form-group">
                <label>Seo | Description</label>
                <textarea class="form-control" name="seo_description" rows="2">{{$new->seo_description}}</textarea>
            </div>
            <div class="form-group">
                <label>Seo | Keywords</label>
                <input type="text" name="seo_keyword" class="form-control" value="{{$new->seo_keyword}}" placeholder="Seo Keywords" >
            </div>

            @if($new->file != "")
                <input type="hidden" class="form-control" name="old_file"  value="{{$new->file}}">
            @endif

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
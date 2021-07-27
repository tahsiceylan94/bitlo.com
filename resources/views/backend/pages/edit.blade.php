@extends('backend.layout')

@section('activePage') active @endsection

@section('pagetitle')Sayfa
<small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('page.index')}}"><i class="fa fa-file-text-o"></i> Sayfa</a></li>
        <li class="active">Düzenle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('page.update',$page->id)}}" method="POST" name="createpage" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            @if($page->file)
                <div class="form-group">
                    <label for="removethisfile">Fotoğrafı Kaldır</label>
                    <div class="form-control">
                        <input type="checkbox" name="removethisfile" id="removethisfile" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <label>Yüklenmiş Fotoğraf</label>
                    <div class="form-control" style="height: auto;">
                        <img src="/images/pages/{{$page->file}}" height="100" class="thisphoto" alt="">
                    </div>
                </div>
            @endif
            <div class="form-group">
                <label>Fotoğraf</label>
                <input type="file" class="form-control" name="pagefile" value="{{$page->file}}">
            </div>
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="title" class="form-control" value="{{$page->title}}" placeholder="Başlık" >
            </div>
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="slug" class="form-control" value="{{$page->slug}}" placeholder="URL" >
            </div>
            <div class="form-group">
                <label>İçerik</label>
                <textarea class="form-control" name="content" id="ckeditor" rows="3" required>{{$page->content}}</textarea>
            </div>

            <div class="form-group">
                <label>Durum</label>
                <select name="status" id="status" class="form-control">

                    <option value="1" @if($page->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if($page->status == 0) selected @endif>Pasif</option>
                </select>
            </div>

            <div class="form-group">
                <label>Header</label>
                <select name="header" id="header" class="form-control">
                    <option value="1" @if($page->header == 1) selected @endif>Aktif</option>
                    <option value="0" @if($page->header == 0) selected @endif>Pasif</option>
                </select>
            </div>

            <div class="form-group">
                <label>Footer</label>
                <select name="footer" id="footer" class="form-control">
                    <option value="1" @if($page->footer == 1) selected @endif>Aktif</option>
                    <option value="0" @if($page->footer == 0) selected @endif>Pasif</option>
                </select>
            </div>
<hr>
            <div class="form-group">
                <label>Seo | Title</label>
                <input type="text" name="seo_title" class="form-control" value="{{$page->seo_title}}" placeholder="Seo Title" >
            </div>
            <div class="form-group">
                <label>Seo | Description</label>
                <textarea class="form-control" name="seo_description" rows="2">{{$page->seo_description}}</textarea>
            </div>
            <div class="form-group">
                <label>Seo | Keywords</label>
                <input type="text" name="seo_keyword" class="form-control" value="{{$page->seo_keyword}}" placeholder="Seo Keywords" >
            </div>

            @if($page->file != "")
                <input type="hidden" class="form-control" name="old_file"  value="{{$page->file}}">
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
@extends('backend.layout')

@section('activeBlog') active @endsection

@section('pagetitle')Blog
<small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('blog.index')}}"><i class="fa fa-cog"></i> Blog</a></li>
        <li class="active">Ekle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('blog.update',$blog->id)}}" method="POST" name="createblog" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            @if($blog->file)
                <div class="form-group">
                    <label for="removethisfile">Fotoğrafı Kaldır</label>
                    <div class="form-control">
                        <input type="checkbox" name="removethisfile" id="removethisfile" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <label>Yüklenmiş Fotoğraf</label>
                    <div class="form-control" style="height: auto;">
                        <img src="/images/blogs/{{$blog->file}}" height="100" class="thisphoto" alt="">
                    </div>
                </div>
            @endif
            <div class="form-group">
                <label>Fotoğraf</label>
                <input type="file" class="form-control" name="blogfile" value="{{$blog->file}}">
            </div>
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="title" class="form-control" value="{{$blog->title}}" placeholder="Başlık" >
            </div>
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="slug" class="form-control" value="{{$blog->slug}}" placeholder="URL" >
            </div>
            <div class="form-group">
                <label>İçerik</label>
                <textarea class="form-control" name="content" id="ckeditor" rows="3" required>{{$blog->content}}</textarea>
            </div>
            <div class="form-group">
                <label>Kısa İçerik</label>
                <textarea class="form-control" name="short_content" rows="3">{{$blog->short_content}}</textarea>
            </div>

            <div class="form-group">
                <label>Kategori Seçin</label>
                <select name="cat" id="cat" class="form-control">
                    @foreach(\App\Models\Blogcats::all()->where('status','1') as $cats)
                        <option value="{{$cats->id}}" @if($blog->cat == $cats->id) selected @endif>{{$cats->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Durum</label>
                <select name="status" id="status" class="form-control">

                    <option value="1" @if($blog->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if($blog->status == 0) selected @endif>Pasif</option>
                </select>
            </div>
<hr>
            <div class="form-group">
                <label>Seo | Title</label>
                <input type="text" name="seo_title" class="form-control" value="{{$blog->seo_title}}" placeholder="Seo Title" >
            </div>
            <div class="form-group">
                <label>Seo | Description</label>
                <textarea class="form-control" name="seo_description" rows="2">{{$blog->seo_description}}</textarea>
            </div>
            <div class="form-group">
                <label>Seo | Keywords</label>
                <input type="text" name="seo_keyword" class="form-control" value="{{$blog->seo_keyword}}" placeholder="Seo Keywords" >
            </div>

            @if($blog->file != "")
                <input type="hidden" class="form-control" name="old_file"  value="{{$blog->file}}">
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
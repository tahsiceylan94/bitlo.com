@extends('backend.layout')

@section('activeSlider') active @endsection

@section('pagetitle')Slider
<small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('slider.index')}}"><i class="fa fa-picture-o"></i> Slider</a></li>
        <li class="active">Düzenle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('slider.update',$slider->id)}}" method="POST" name="createslider" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            @if($slider->file)
                <div class="form-group">
                    <label>Yüklenmiş Fotoğraf</label>
                    <div class="form-control" style="height: auto;">
                        <img src="/images/sliders/{{$slider->file}}" height="100" alt="">
                    </div>

                </div>
            @endif
            <div class="form-group">
                <label>Fotoğraf</label>
                <input type="file" class="form-control" name="sliderfile" value="{{$slider->file}}">
            </div>
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="title" class="form-control" value="{{$slider->title}}" placeholder="Başlık" >
            </div>
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="slug" class="form-control" value="{{$slider->slug}}" placeholder="URL" >
            </div>
            <div class="form-group">
                <label>İçerik</label>
                <textarea class="form-control" name="content" id="ckeditor" rows="3" required>{{$slider->content}}</textarea>
            </div>

            <div class="form-group">
                <label>Durum</label>
                <select name="status" id="status" class="form-control">

                    <option value="1" @if($slider->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if($slider->status == 0) selected @endif>Pasif</option>
                </select>
            </div>

            @if($slider->file != "")
                <input type="hidden" class="form-control" name="old_file"  value="{{$slider->file}}">
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
@endsection
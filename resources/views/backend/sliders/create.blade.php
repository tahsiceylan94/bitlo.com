@extends('backend.layout')

@section('activeSliderCreate') active @endsection

@section('pagetitle')Slider
<small>Ekle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('slider.index')}}"><i class="fa fa-picture-o"></i> Slider</a></li>
        <li class="active">Ekle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('slider.store')}}" method="POST" name="createslider" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Fotoğraf</label>
                <input type="file" class="form-control" name="sliderfile" required value="">
            </div>
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="title" class="form-control" value="" placeholder="Başlık" >
            </div>
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="slug" class="form-control" value="" placeholder="URL" >
            </div>
            <div class="form-group">
                <label>İçerik</label>
                <textarea class="form-control" name="content" id="ckeditor" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label>Durum</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="1">Pasif</option>
                </select>
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
@endsection
@extends('backend.layout')

@section('activeProduct') active @endsection

@section('pagetitle')Ürün
<small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('product.index')}}"><i class="fa fa-cog"></i> Ürün</a></li>
        <li class="active">Ekle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('product.update',$product->id)}}" method="POST" name="createproduct" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        @if($product->file)
                            <div class="form-group">
                                <label for="removethisfile">Fotoğrafı Kaldır</label>
                                <div class="form-control">
                                    <input type="checkbox" name="removethisfile" id="removethisfile" value="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Yüklenmiş Fotoğraf</label>
                                <div class="form-control" style="height: auto;">
                                    <img src="/images/products/{{$product->file}}" height="100" class="thisphoto" alt="">
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Fotoğraf</label>
                            <input type="file" class="form-control" name="productfile" value="{{$product->file}}">
                        </div>
                        <div class="form-group">
                            <label>Başlık</label>
                            <input type="text" name="title" class="form-control" value="{{$product->title}}" placeholder="Başlık" >
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" name="slug" class="form-control" value="{{$product->slug}}" placeholder="URL" >
                        </div>

                        <div class="form-group">
                            <label>Fiyat</label>
                            <input type="text" name="fiyat" class="form-control" value="{{$product->fiyat}}" placeholder="Fiyat" >
                            <small>Fiyatları 59.99 şeklinde girmelisiniz. Noktalı şekilde yazınız.</small>
                        </div>

                        <div class="form-group">
                            <label>Kısa İçerik</label>
                            <textarea class="form-control" name="short_content" rows="3">{{$product->short_content}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Durum</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" @if($product->status == 1) selected @endif>Aktif</option>
                                <option value="0" @if($product->status == 0) selected @endif>Pasif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kategori Seçin</label>
                            <select name="cats[]" class="selectpicker form-control" multiple data-selected-text-format="count > 6">
                                {!! $cats !!}
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label>İçerik</label>
                            <textarea class="form-control" name="content" id="ckeditor" rows="3" required>{{$product->content}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Seo | Title</label>
                            <input type="text" name="seo_title" class="form-control" value="{{$product->seo_title}}" placeholder="Seo Title" >
                        </div>
                        <div class="form-group">
                            <label>Seo | Description</label>
                            <textarea class="form-control" name="seo_description" rows="2">{{$product->seo_description}}</textarea>
                        </div>

                        @if($product->file != "")
                            <input type="hidden" class="form-control" name="old_file"  value="{{$product->file}}">
                        @endif
                    </div>
                </div>
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
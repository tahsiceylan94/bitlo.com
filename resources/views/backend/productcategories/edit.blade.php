@extends('backend.layout')

@section('activeProductCategory') active @endsection

@section('pagetitle')Ürün
<small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('productcategory.index')}}"><i class="fa fa-cog"></i> Ürün</a></li>
        <li class="active">Ekle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('productcategory.update',$productcategory->id)}}" method="POST" name="createproductcategory" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        @if($productcategory->file)
                            <div class="form-group">
                                <label for="removethisfile">Fotoğrafı Kaldır</label>
                                <div class="form-control">
                                    <input type="checkbox" name="removethisfile" id="removethisfile" value="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Yüklenmiş Fotoğraf</label>
                                <div class="form-control" style="height: auto;">
                                    <img src="/images/productcategories/{{$productcategory->file}}" height="100" class="thisphoto" alt="">
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Fotoğraf</label>
                            <input type="file" class="form-control" name="productcategoryfile" value="{{$productcategory->file}}">
                        </div>
                        <div class="form-group">
                            <label>Başlık</label>
                            <input type="text" name="title" class="form-control" value="{{$productcategory->title}}" placeholder="Başlık" >
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" name="slug" class="form-control" value="{{$productcategory->slug}}" placeholder="URL" >
                        </div>

                        <div class="form-group">
                            <label>Kısa İçerik</label>
                            <textarea class="form-control" name="short_content" rows="3">{{$productcategory->short_content}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Durum</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" @if($productcategory->status == 1) selected @endif>Aktif</option>
                                <option value="0" @if($productcategory->status == 0) selected @endif>Pasif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alt Kategoriyi Seçin</label> <small>"{{$productcategory->title}}" Kategorisi seçeceğiniz kategorinin altında olacaktır. </small>

                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">Alt Kategori Seçin</option>
                                @foreach(\App\Models\Productcategories::all()->where('status','1') as $aCats)
                                    @if($productcategory->id != $aCats->id)
                                        @if($productcategory->parent_id == $aCats->id)
                                            <option value="{{$aCats->id}}" selected>{{$aCats->title}}</option>
                                            @else
                                            <option value="{{$aCats->id}}">{{$aCats->title}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label>İçerik</label>
                            <textarea class="form-control" name="content" id="ckeditor" rows="3" required>{{$productcategory->content}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Seo | Title</label>
                            <input type="text" name="seo_title" class="form-control" value="{{$productcategory->seo_title}}" placeholder="Seo Title" >
                        </div>
                        <div class="form-group">
                            <label>Seo | Description</label>
                            <textarea class="form-control" name="seo_description" rows="2">{{$productcategory->seo_description}}</textarea>
                        </div>

                        @if($productcategory->file != "")
                            <input type="hidden" class="form-control" name="old_file"  value="{{$productcategory->file}}">
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
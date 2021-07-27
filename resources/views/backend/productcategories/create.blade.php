@extends('backend.layout')

@section('activeProductCategoryAdd') active @endsection

@section('pagetitle')Ürün
<small>Ekle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('productcategory.index')}}"><i class="fa fa-paper-plane"></i> Ürün</a></li>
        <li class="active">Ekle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('productcategory.store')}}" method="POST" name="createproductcategory" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label>Fotoğraf</label>
                            <input type="file" class="form-control" name="productcategoryfile" value="">
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
                            <label>Kısa İçerik</label>
                            <textarea class="form-control" name="short_content" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Durum</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alt Kategori Seçin</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">Alt Kategori Seçin</option>
                                @foreach(\App\Models\Productcategories::all()->where('status','1') as $aCats)
                                    <option value="{{$aCats->id}}">{{$aCats->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label>İçerik</label>
                            <textarea class="form-control" name="content" id="ckeditor" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Seo | Title</label>
                            <input type="text" name="seo_title" class="form-control" value="" placeholder="Seo Title" >
                        </div>
                        <div class="form-group">
                            <label>Seo | Description</label>
                            <textarea class="form-control" name="seo_description" rows="2"></textarea>
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
@endsection
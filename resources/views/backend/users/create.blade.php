@extends('backend.layout')

@section('activeUser') active @endsection

@section('pagetitle')Kullanıcı
<small>Ekle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('user.index')}}"><i class="fa fa-users"></i> Kullanıcı</a></li>
        <li class="active">Ekle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('user.store')}}" method="POST" name="createuser" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Fotoğraf</label>
                <input type="file" class="form-control" name="userfile" required value="">
            </div>

            <div class="form-group">
                <label>Ad Soyad</label>
                <input type="text" name="name" class="form-control" value="" placeholder="Başlık" >
            </div>

            <div class="form-group">
                <label>E-Mail (Kullanıcı Adı)</label>
                <input type="text" name="email" class="form-control" value="" placeholder="URL" >
            </div>

            <div class="form-group">
                <label>Parola</label>
                <input type="password" name="password" class="form-control" value="" placeholder="Parola" >
            </div>

            <div class="form-group">
                <label>Durum</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>
                </select>
            </div>

            <div class="form-group">
                <label>Rol</label>
                <select name="role" id="role" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="writer">Writer</option>
                    <option value="user">Kullanıcı</option>
                </select>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-info">Kaydet</button>
        </div>

    </form>
@endsection

<!-- CSS -->
@section('css')

@endsection

<!-- JS -->
@section('js')

@endsection
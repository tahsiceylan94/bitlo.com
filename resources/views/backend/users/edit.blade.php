@extends('backend.layout')

@section('activeUser') active @endsection

@section('pagetitle')Kullanıcı
<small>Düzenle</small>@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('user.index')}}"><i class="fa fa-users"></i> Kullanıcı</a></li>
        <li class="active">Düzenle</li>
    </ol>
@endsection

@section('content')
    <form action="{{route('user.update',$user->id)}}" method="POST" name="updateuser" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
            @if($user->user_file)
                <div class="form-group">
                    <label>Yüklenmiş Fotoğraf</label>
                    <div class="form-control" style="height: auto;">
                        <img src="/images/users/{{$user->user_file}}" height="100" alt="">
                    </div>

                </div>
            @endif
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <input type="file" class="form-control" name="userfile" value="">
                </div>

                <div class="form-group">
                    <label>Ad Soyad</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Başlık" >
                </div>

                <div class="form-group">
                    <label>E-Mail (Kullanıcı Adı)</label>
                    <input type="text" name="email" class="form-control" value="{{$user->email}}" placeholder="URL" >
                </div>

                <div class="form-group">
                    <label>Parola</label>
                    <input type="password" name="password" class="form-control" value="" placeholder="Parola" >
                    <small>Parolayı değiştirmek istemiyorsanız boş bırakın!</small>
                </div>

            <div class="form-group">
                <label>Durum</label>
                <select name="status" id="status" class="form-control">

                    <option value="1" @if($user->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if($user->status == 0) selected @endif>Pasif</option>
                </select>
            </div>

            <div class="form-group">
                <label>Rol</label>
                <select name="role" id="role" class="form-control">
                    <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                    <option value="writer" @if($user->role == 'writer') selected @endif>Writer</option>
                    <option value="user" @if($user->status == 'user') selected @endif>User</option>
                </select>
            </div>

            @if($user->file != "")
                <input type="hidden" class="form-control" name="old_file"  value="{{$user->user_file}}">
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
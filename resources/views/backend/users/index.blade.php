@extends('backend.layout')

@section('activeUser') active @endsection

@section('pagetitle') Kullanıcılar @endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('zeplin.settings')}}"><i class="fa fa-users"></i> Kullanıcılar</a></li>
    </ol>
@endsection

@section('content')
    <div class="box-body">
        <div align="right">
            <a href="{{route('user.create')}}"><button class="btn btn-success">Ekle</button></a>
        </div>
        <table class="table table-striped">
            <thead>
                <th width="5">Görsel</th>
                <th>Ad Soyad</th>
                <th>E-Mail</th>
                <th width="5">Rol</th>
                <th width="5"></th>
                <th width="5"></th>
            </thead>
            <tbody id="sortable">
                @foreach($data['users'] as $key)
                    <tr id="item-{{$key->id}}">
                        <td class="sortable">@if($key->user_file != "") <img src="/images/users/{{$key->user_file}}" height="70"> @endif</td>
                        <td>{{$key->name}}</td>
                        <td>{{$key->email}}</td>
                        <td>{{$key->role}}</td>
                        <td><a id="{{$key->id}}" href="javascript:void(0);" class="removeline"><i class="fa fa-trash-o"></i></a></td>
                        <td><a href="{{route('user.edit',$key->id)}}"><i class="fa fa-edit"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('css')  @endsection

@section('js')
    <script src="/backend/bower_components/jquery-ui/jquery-ui.js"></script>

    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revent: true,
                //handle: '.sortable',
                axis: 'y',
                update: function (event, ui) {
                    var data = $(this).sortable('serialize');

                    // POST to server using $.post or $.ajax
                    $.ajax({
                        data: data,
                        type: 'POST',
                        url: '{{route('user.sortable')}}',
                        success: function (msg) {
                            if(msg){
                                alertify.success('Sıralama işlemi başarılı.');
                            }else{
                                alertify.error('Sıralama işlemi başarısız.');
                            }
                        }
                    });
                }
            });
            $('#sortable').disableSelection();
        });

        $('.removeline').click(function () {
            destroy_id = $(this).attr('id');

            alertify.confirm('Silme işlemini onaylayın!','Dikkat: bu işlem geri alınamaz!',
            function () {
                $.ajax({
                    type: "DELETE",
                    url: "user/"+destroy_id,
                    success: function (msg) {
                        if(msg){
                            $("#item-"+destroy_id).remove();
                            alertify.success("Silme işlemi başarılı.");
                        }else{
                            alertify.error("Silme işlemi başarısız.");
                        }
                    }
                });
            },
            function () {
                alertify.error('Silme işlemi iptal edildi.');
            }
            );
        });
    </script>
@endsection
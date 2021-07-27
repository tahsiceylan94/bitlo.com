@extends('backend.layout')

@section('activeNew') active @endsection

@section('pagetitle') Sayfalar @endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('zeplin.settings')}}"><i class="fa fa-newspaper-o"></i> Haberler</a></li>
    </ol>
@endsection

@section('content')
    <div class="box-body">
        <div align="right">
            <a href="{{route('new.create')}}"><button class="btn btn-success">Ekle</button></a>
        </div>
        <table class="table table-striped">
            <thead>
                <th width="5">Görsel</th>
                <th>Başlık</th>
                <th width="5">Durum</th>
                <th width="5"></th>
                <th width="5"></th>
            </thead>
            <tbody id="sortable">
                @foreach($data['news'] as $key)
                    <tr id="item-{{$key->id}}">
                        <td class="sortable">@if($key->file != "") <img src="/images/news/{{$key->file}}" width="50"> @else {!! $key->settings_value !!} @endif</td>
                        <td>{{$key->title}}</td>
                        <td>@if($key->status == 1) <i class="fa fa-check-square var" title="yayınlanıyor"></i> @elseif($key->status == 2) <i class="fa fa-calendar-check-o "></i> @else <i class="fa fa-times-rectangle yok" title="yayınlanmıyor"></i> @endif</td>
                        <td><a id="{{$key->id}}" href="javascript:void(0);" class="removeline"><i class="fa fa-trash-o"></i></a></td>
                        <td><a href="{{route('new.edit',$key->id)}}"><i class="fa fa-edit"></i></a></td>
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
                        url: '{{route('new.sortable')}}',
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
                    url: "new/"+destroy_id,
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
@extends('backend.layout')

@section('activeHomesetting') active @endsection

@section('pagetitle') Anasayfa Genel Ayarlar @endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('zeplin.index')}}"><i class="fa fa-home"></i> Anasayfa Genel Ayarlar</a></li>
    </ol>
@endsection

@section('content')
    <div class="box-body">
        <div align="right">
            {{--<a href="{{route('homesetting.create')}}"><button class="btn btn-success">Ekle</button></a>--}}
        </div>
        <table class="table table-striped">
            <thead>
                <th width="6%">Durum</th>
                <th>Type</th>
                <th>Başlık</th>
                <th>İçerik</th>
                <th width="5"></th>
                <th width="5">Düzenle</th>
            </thead>
            <tbody id="sortable">
                @foreach($data['homesettings'] as $key)
                    <tr id="item-{{$key->id}}">
                        <td class="sortable">@if($key->status == 1) <i class="fa fa-check-square var" title="yayınlanıyor"></i> @elseif($key->status == 2) <i class="fa fa-calendar-check-o "></i> @else <i class="fa fa-times-rectangle yok" title="yayınlanmıyor"></i> @endif</td>
                        <td class="sortable">{{$key->type}}</td>
                        <td class="sortable">{{$key->description}}</td>
                        <td class="sortable valueArea">@if($key->type=='file') <img src="/images/homesetting/{{$key->value}}" height="70" /> @else {!! $key->value !!} @endif</td>
                        <td class="sortable">@if($key->delete == 1)<a id="{{$key->id}}" href="javascript:void(0);" class="removeline"><i class="fa fa-trash-o"></i></a>@endif</td>
                        <td class="sortable text-center"><a href="{{route('homesetting.edit',$key->id)}}"><i class="fa fa-edit"></i></a></td>
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
                        url: '{{route('homesetting.sortable')}}',
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
                    url: "homesetting/"+destroy_id,
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
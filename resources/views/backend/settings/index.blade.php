@extends('backend.layout')

@section('activeSettings') active @endsection

@section('pagetitle') Ayarlar @endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('zeplin.settings')}}"><i class="fa fa-cog"></i> Ayarlar</a></li>
    </ol>
@endsection

@section('content')
    <div class="box-body">
        <table class="table table-striped">
            <thead>
                <th>*</th>
                <th>Açıklama</th>
                <th>İçerik</th>
                <th>Anahtar Değer</th>
                <th>Type</th>
                <th width="5"></th>
                <th width="5"></th>
            </thead>
            <tbody id="sortable">
                @foreach($data['adminSettings'] as $key)
                    <tr id="item-{{$key->id}}">
                        <td class="sortable">{{$key->id}}</td>
                        <td class="sortable">{!! $key->settings_description !!}</td>
                        @if($key->settings_key != "settings_footercode" && $key->settings_key != "settings_headercode")
                            <td>@if($key->settings_type == "file") <img src="/images/settings/{{$key->settings_value}}" width="50"> @else {!! $key->settings_value !!} @endif</td>
                            @else
                            <td></td>
                        @endif
                        <td>{{$key->settings_key}}</td>
                        <td>{{$key->settings_type}}</td>
                        <td>@if($key->settings_delete)<a id="{{$key->id}}" href="javascript:void(0);" class="removeline"><i class="fa fa-trash-o"></i></a>@endif</td>
                        <td><a href="{{route('settings.edit',['id'=>$key->id])}}"><i class="fa fa-edit"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<!-- CSS -->
@section('css')@endsection

<!-- JS -->
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
                        url: '{{route('settings.sortable')}}',
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
                location.href = '/zeplin/ayarlar/silme/'+destroy_id;
            },
            function () {
                alertify.error('Silme işlemi iptal edildi.');
            }
            );
        });
    </script>
@endsection
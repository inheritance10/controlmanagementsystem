@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Settings</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Açıklama</th>
                        <th>İçerik</th>
                        <th>Anahtar Değer</th>
                        <th>Type</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @foreach($settings['adminSettings'] as $adminSettings)
                    <tr id="item-{{$adminSettings->id}}">
                        <td>{{$adminSettings->id}}</td>
                        <td class="sortable">{{$adminSettings['settings_description']}}</td>
                        <td>{{$adminSettings->settings_value}}</td>
                        <td>{{$adminSettings->settings_key}}</td>
                        <td>{{$adminSettings->settings_type}}</td>
                        <td width="5"><a href="javascrip:void(0)"><i class="fa fa-pencil-square"></i></a></td>
                        <td width="5">
                            @if($adminSettings->settings_delete == 1)
                                <a href=""><i class="fa fa-trash-o"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <script type="text/javascript">
        $(function(){

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{route('settings.Sortable')}}",
                        success: function (msg) {
                            //console.log(msg);
                            if (msg) {
                                alertify.success("işlem başarılı");
                            } else {
                                alertify.error("işlem başarısız");
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();
        });
    </script>


@endsection




@section('css')
@endsection

@section('js')
@endsection

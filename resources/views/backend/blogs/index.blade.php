@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Blogs</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Başlık</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @foreach($data['blog'] as $blog)
                        <tr id="item-{{$blog->id}}">
                            <td class="sortable">{{$blog->blog_title}}</td>
                            <td width="5"><a href="{{route('settings.edit',['id' => $blog->id])}}"><i class="fa fa-pencil-square"></i></a></td>
                            <td width="5">
                                <a href="javascrip:void(0)"><i id="@php echo $blog->id @endphp" class="fa fa-trash-o"></i></a>
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
        });//sortable işlemi ajax jquery


        $('.fa-trash-o').click(function (){
            destroy_id = $(this).attr('id');
            alertify.confirm('Silme işlemini onaylayın!','Bu işlem geri alınamaz',
                function (){
                    location.href = "/admin/settings/delete/" + destroy_id;
                },
                function (){
                    alertify.error('Silme işlemi iptal edildi');
                }
            )
        })
    </script>


@endsection




@section('css')
@endsection

@section('js')
@endsection

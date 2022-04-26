@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User Düzenleme</h3>
                <div align="right">
                <a href="{{route('user.index')}}" class="btn btn-warning" style="margin-left: 50px">Geri</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data"><!--dosya yükleme işlemi oludğu için multipart/form-data kullandık-->
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" name="user_file" class="form-control">
                            </div>
                        </div>
                    </div>

                    @isset($user->user_file)
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
i                            </div>
                        </div>
                    </div>
                    @endisset

                    <input type="hidden" name="old_file" value="{{$user->user_file}}">



                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="user_title" value="{{$user->user_title}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="user_slug" value="{{$user->user_slug}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Url</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="user_url" value="{{$user->user_url}}">
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <label>İçerik</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea class="form-control" id="editor1" name="user_content">{{$user->user_content}}</textarea>
                                    <script>
                                        CKEDITOR.replace('editor1')
                                    </script>
                                </div>
                            </div>
                        </div>

                            <div class="form-group">
                                <label>Status</label>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <select name="user_status" class="form-control" id="">
                                            @if($user->user_status == 1)
                                                <option selected value="1">Aktif</option>
                                                <option value="0">Pasif</option>
                                            @elseif($user->user_status == 0)
                                                <option selected value="0">Pasif</option>
                                                <option value="1">Aktif</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                            <div align="right">
                                <button type="submit" class="btn btn-success">Düzenle</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </section>

@endsection




@section('css')
@endsection

@section('js')
@endsection


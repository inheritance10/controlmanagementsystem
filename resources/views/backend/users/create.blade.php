@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User Ekleme</h3>
                <div align="right">
                <a href="{{route('user.index')}}" class="btn btn-warning" style="margin-left: 50px">Geri</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data"><!--dosya yükleme işlemi oludğu için multipart/form-data kullandık-->
                    @csrf
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" name="user_file" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="name" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="email" class="form-control" name="email" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kullanıcı Tipi</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="user_status" class="form-control" id="">
                                    <option value="1">Admin</option>
                                    <option value="0">Kullanıcı</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div align="right">
                        <button type="submit" class="btn btn-success">Ekle</button>
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


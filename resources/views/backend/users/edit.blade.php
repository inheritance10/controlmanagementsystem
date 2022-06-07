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
                                <img src="/images/users/{{$user->user_file}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endisset
                    <input type="hidden" name="old_file" value="{{$user->user_file}}">

                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="password" class="form-control" name="password">
                                <small>Şifreyi değişstirmek istemiyorsanız boş bırakın</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Hakkımda</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea cols="120" rows="10" name="about">{{$user->about}}</textarea>
                            </div>
                        </div>
                    </div>

                            <div class="form-group">
                                <label>Kullanıcı Tipi</label>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <select name="user_status" class="form-control" id="">
                                            @if($user->role == 'admin')
                                                <option selected value="1">Admin</option>
                                                <option value="0">Kullanıcı</option>
                                            @elseif($user->role == 'user')
                                                <option selected value="0">Kullanıcı</option>
                                                <option value="1">Admin</option>
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


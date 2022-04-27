@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Blog Ekleme</h3>
                <div align="right">
                <a href="{{route('slider.index')}}" class="btn btn-warning" style="margin-left: 50px">Geri</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data"><!--dosya yükleme işlemi oludğu için multipart/form-data kullandık-->
                    @csrf
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="file" required name="slider_file" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="slider_title" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="slider_slug" value="">
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <label>İçerik</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea class="form-control" id="editor1" name="slider_content"></textarea>
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
                                        <select name="slider_status" class="form-control" id="">
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        </select>
                                    </div>
                                </div>

                            <div align="right">
                                <button type="submit" class="btn btn-success">Ekle</button>
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


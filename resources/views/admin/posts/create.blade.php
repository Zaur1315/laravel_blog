@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новая статья</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Создание новой статьи</h3>
                        </div>

                        <form role="form" method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Новая категория</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Название статьи">
                                </div>
                                <div class="form-group">
                                    <lable for="description">Цитата</lable>
                                    <textarea class="form-control @error('dercription') is-invalid @enderror" name="description" id="description" rows="3" placeholder="Цитата ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <lable for="content">Контент</lable>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="7" placeholder="Контент ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach($categories as $k=>$v)
                                            <option value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                        <option>1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Выбор тегов</label>
                                    <select class="select2 form-control" multiple="multiple" name="tags[]" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach($tags as $k => $v)
                                            <option value="{{$k}}">{{$v}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Изображение</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                        <label class="custom-file-label" for="thumbnail">Выберите изображение</label>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">Создать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        </script>
    <!-- /.content -->
@endsection

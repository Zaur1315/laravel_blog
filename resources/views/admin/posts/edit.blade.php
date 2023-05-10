@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Статья "{{$post->title}}"</h1>
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
                            <h3 class="card-title">Редактирование статьи</h3>
                        </div>

                        <form role="form" method="post" action="{{route('posts.update', ['post'=> $post->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$post->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Цитата</label>
                                    <textarea class="form-control @error('dercription') is-invalid @enderror" name="description" id="description" rows="3">{{$post->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="7">{{$post->content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        @foreach($categories as $k=>$v)
                                            <option value="{{$k}}" @if($k == $post->category_id) selected @endif>{{$v}}</option>
                                        @endforeach
                                        <option>1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Выбор тегов</label>
                                    <select class="select2 form-control" multiple="multiple" name="tags[]" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach($tags as $k => $v)
                                            <option value="{{$k}}" @if(in_array($k, $post->tags->pluck('id')->all())) selected @endif>{{$v}}</option>
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
                                <div class=""><img src="{{$post->getImage()}}" alt=""></div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">Сохранить</button>
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

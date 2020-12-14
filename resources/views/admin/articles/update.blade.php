@extends('admin.layouts.master')
<!-- Sidebar -->
@section('content')

@section('tiny')

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>

@endsection

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
    @include('admin.layouts.topbar')


    <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">New Article</h1>
            </div>

            <form method="POST" action="{{route('articles.update', $article->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" required class="form-control" value="{{$article->title}}">
                </div>


                <div class="form-group">
                    <label for="">Author</label>
                    <input type="text" name="author" required class="form-control" value="{{$article->author}}">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" rows="4" class="form-control">
                        {!! $article->description !!}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="content" id="" rows="4" class="form-control">
                        {!! $article->content !!}
                    </textarea>
                </div>

                <div class="form-group">
                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($article->category_id == $category->id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Save</button>

            </form>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection

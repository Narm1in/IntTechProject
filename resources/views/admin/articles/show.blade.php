@extends('admin.layouts.master')
<!-- Sidebar -->
@section('content')



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
        @include('admin.layouts.topbar')


        <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">All Articles</h1>
                </div>

                <form method="POST" action="">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" required class="form-control" id="" value="{{$article->title}}" readonly>
                    </div>


                    <div class="form-group">
                        <label for="">Author</label>
                        <input type="text" name="author" required class="form-control" value="{{$article->author}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                       {!! $article->description !!}

                    </div>

                    <div class="form-group">
                        <label for="">Content</label>
                        {!! $article->content !!}

                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <input type="text" name="category"  class="form-control" value="{{$article->getCategory->name}}" readonly>
                    </div>


                </form>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

@endsection

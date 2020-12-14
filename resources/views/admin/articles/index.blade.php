@extends('admin.layouts.master')
<!-- Sidebar -->

@section('js')
    <script>
        $(document).on('click', 'delete', function(){
            let url = $(this).data('url');
            $('#delete-modal').modal('show');
        })

        $('.delete-modal').on('click', function(){

        })
    </script>
@endsection

@section('content')



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
        @include('admin.layouts.topbar')


        <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                                                                                   href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Articles</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Description</th>
                                        <th>Content</th>
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Description</th>
                                        <th>Content</th>
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($articles as $article)
                                    <tr>
                                        <td>{{$article->title}}</td>
                                        <td>{{$article->author}}</td>
                                        <td>{!! $article->description !!}</td>
                                        <td>{!! \Illuminate\Support\Str::words($article->content,10) !!}</td>
                                        <td>{{$article->slug}}</td>
                                        <td>{{$article->getCategory->name}}</td>
                                        <td>{{$article->created_at}}</td>
                                        <td>{{$article->updated_at}}</td>
                                        <td>
                                            <a href="{{route('articles.view', $article->id)}}" class="btn btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="{{route('articles.edit', $article->id)}}" class="btn btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="#" class="btn btn-danger delete" data-url="{{route('articles.destroy', $article->id)}}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

            <div class="modal" tabindex="-1" role="dialog" id="delete-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are You Sure?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger delete-modal">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

@endsection

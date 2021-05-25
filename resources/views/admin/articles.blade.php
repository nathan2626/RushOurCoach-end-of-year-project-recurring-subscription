@extends('layouts.defaultAdmin')

@section('contentAdmin')

<div id="main">

    <!-- Header bar -->
    @include('partials.headerbaradmin')

    <!-- Left Sidebar -->
    <div class="left main-sidebar">

        <div class="sidebar-inner leftscroll">

            <div id="sidebar-menu">

                <ul>
                    <li class="submenu">
                        <a href="/admin">
                            <i class="fas fa-bars"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="submenu">
                        <a href="/admin/users">
                            <i class="fas fa-user"></i>
                            <span> Users </span>
                        </a>
                    </li>

                    <li class="submenu">
                        <a class="active" href="/admin/articles">
                            <i class="fas fa-file-alt"></i>
                            <span> Articles </span>
                        </a>
                    </li>

                    <li class="submenu">
                        <a href="/admin/subscriptions">
                            <i class="fab fa-wpforms"></i>
                            <span> Subscriptions </span>
                        </a>
                    </li>

                </ul>

                <div class="clearfix"></div>

            </div>

            <div class="clearfix"></div>

        </div>

    </div>
    <!-- End Sidebar -->

    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">


                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Articles</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Articles</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="notification isBadNotification u-margin-bottom-medium">
                                    <p class="text-danger">{{ $error }}</p>
                                </div>
                            @endforeach
                        @endif

                        @if (session('error'))
                            <div class="notification isBadNotification u-margin-bottom-medium">
                                <p class="text-danger">{{ session('error') }}</p>
                            </div>
                        @endif

                        @if (session('status') && session('good') === '1')
                            <div class="notification isGoodNotification text-success u-margin-bottom-medium">
                                <p class="text-success">{{ session('status') }}</p>
                            </div>
                        @endif

                        @if (session('status') && session('good') === '0')
                            <div class="notification isBadNotification u-margin-bottom-medium">
                                <p class="text-danger">{{ session('status') }}</p>
                            </div>
                        @endif

                        <div class="card mb-3">
                            <div class="card-header">
                                <span class="pull-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_article">
                                        <i class="fas fa-newspaper" aria-hidden="true"></i> Add new article</button>
                                </span>
                                <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_article" aria-hidden="true" id="modal_add_article">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form action="/admin/articles" method="post" enctype="multipart/form-data">
                                                @csrf

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add new article</h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            @if ($errors->any())
                                                                @foreach ($errors->all() as $error)
                                                                    <div class="notification isBadNotification u-margin-bottom-medium">
                                                                        <p>{{ $error }}</p>
                                                                    </div>
                                                                @endforeach
                                                            @endif

                                                            @if (session('error'))
                                                                <div class="notification isBadNotification u-margin-bottom-medium">
                                                                    <p>{{ session('error') }}</p>
                                                                </div>
                                                            @endif

                                                            @if (session('status'))
                                                                <div class="notification isGoodNotification u-margin-bottom-medium">
                                                                    <p>{{ session('status') }}</p>
                                                                </div>
                                                            @endif

                                                            <div class="form-group">
                                                                <label for="title">Title</label>
                                                                <input class="form-control" name="title" type="text" id="title" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="body">Body</label>
                                                                <textarea id="body" class="form-control" name="body" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="published">Published ?</label>
                                                                <select name="published" id="published" class="form-control" required>
                                                                    <option value="0">- Choose -</option>
                                                                        <option value="0">Not Published</option>
                                                                        <option value="1">Published</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="date_of_publication">Date of publication</label>
                                                                <input class="form-control" id="date_of_publication" name="date_of_publication" type="date" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="image">Image :</label>
                                                        <br />
                                                        <input type="file" name="image" id="image" required>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Add article</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <h3><i class="far fa-file-alt"></i> Articles</h3>
                            </div>
                            <!-- end card-header -->

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 300px">Article details</th>
                                                <th style="width:110px">Category</th>
                                                <th style="min-width:110px">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($articles)
                                            @foreach($articles as $article)
                                            <tr>
                                                <td>
                                                    <div class="blog_list"><img class="img-fluid d-none d-lg-block" alt="image" src="https://via.placeholder.com/180x120" /></div>
                                                    <h4>{{ $article->title }}</h4>
                                                    <p>Posted by <b>Administrator</b> at {{ $article->created_at }}</p>
                                                    <p>{{ $article->body }}</p>
                                                </td>

                                                <td>Articles</td>

                                                <td>

                                                    <button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#modal_edit_article{{$article->id}}">
                                                        <i class="far fa-edit" aria-hidden="true"></i>Edit
                                                    </button>
                                                    <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_edit_article{{$article->id}}" aria-hidden="true" id="modal_edit_article{{$article->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <form action="/admin/articles/edit/{{$article->id}}" method="post" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Edit this article</h5>
                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            <span class="sr-only">Close</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">

                                                                        <div class="row">
                                                                            <div class="col-lg-12">


                                                                                <div class="form-group">
                                                                                    <label for="title">Title</label>
                                                                                    <input class="form-control" name="title" value="{{ $article->title }}" type="text" id="title" required />
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label for="body">Body</label>
                                                                                    <textarea id="body" class="form-control" name="body" required>
                                                                                        {{ $article->body }}
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">

                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="published">Published ?</label>
                                                                                    <select name="published" id="published" class="form-control" required>
                                                                                        <option value="0">- Choose -</option>
                                                                                        <option value="0">Not Published</option>
                                                                                        <option value="1">Published</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="date_of_publication">Date of publication</label>
                                                                                    <input class="form-control" value="{{ $article->date_of_publication }}" id="date_of_publication" name="date_of_publication" type="date" />
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="image">Image :</label>
                                                                            <br />
                                                                            <input type="file" name="image" id="name" value="{{ $article->image }}" required>
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">Edit article</button>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button class="btn btn-danger btn-sm btn-block mt-2" data-toggle="modal" data-target="#modal_delete_article{{$article->id}}">
                                                        <i class="fas fa-trash" aria-hidden="true"></i>Delete
                                                    </button>
                                                    <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_delete_article{{$article->id}}" aria-hidden="true" id="modal_delete_article{{$article->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <form action="/admin/articles/delete/{{$article->id}}" method="post" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Delete this article</h5>
                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            <span class="sr-only">Close</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">Delete article</button>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td>
                                                    <div class="blog_list"><img class="img-fluid d-none d-lg-block" alt="image" src="https://via.placeholder.com/180x120" /></div>
                                                    <h4>Aucun article</h4>
                                                </td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>


                            </div>
                            <!-- end card-body -->

                        </div>
                        <!-- end card -->

                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->

            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->

    @include('layouts.scriptsAdmin')

</div>

@endsection


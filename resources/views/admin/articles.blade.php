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
                                                        <input type="file" name="image" id="name" required>
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

                                            <tr>
                                                <td>
                                                    <div class="blog_list"><img class="img-fluid d-none d-lg-block" alt="image" src="https://via.placeholder.com/180x120" /></div>
                                                    <h4> Vivamus condimentum rutrum odio</h4>
                                                    <p>Posted by <b>Administrator</b> at Nov 29 2018</p>
                                                    <p>Nulla cursus maximus lacus at efficitur. In lobortis ante vitae nulla semper, in volutpat libero aliquet. Morbi sit amet nibh vitae metus interdum finibus sed nec nisl. Ut quam dolor, bibendum id maximus ut, suscipit consectetur sem.</p>
                                                </td>

                                                <td>Articles</td>

                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm btn-block"><i class="far fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm btn-block mt-2"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="blog_list"><img class="img-fluid d-none d-lg-block" alt="image" src="https://via.placeholder.com/180x120" /></div>
                                                    <h4>Duis scelerisque eros sit amet risus lobortis</h4>
                                                    <p>Posted by <b>Administrator</b> at Nov 29 2018</p>
                                                    <p>Nulla cursus maximus lacus at efficitur. In lobortis ante vitae nulla semper, in volutpat libero aliquet. Morbi sit amet nibh vitae metus interdum finibus sed nec nisl. Ut quam dolor, bibendum id maximus ut, suscipit consectetur sem.</p>
                                                </td>

                                                <td>Articles</td>

                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm btn-block"><i class="far fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm btn-block mt-2"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="blog_list"><img class="img-fluid d-none d-lg-block" alt="image" src="https://via.placeholder.com/180x120" /></div>
                                                    <h4>Vestibulum justo et feugiat consectetur</h4>
                                                    <p>Posted by <b>Administrator</b> at Nov 29 2018</p>
                                                    <p>Nulla cursus maximus lacus at efficitur. In lobortis ante vitae nulla semper, in volutpat libero aliquet. Morbi sit amet nibh vitae metus interdum finibus sed nec nisl. Ut quam dolor, bibendum id maximus ut, suscipit consectetur sem.</p>
                                                </td>

                                                <td>News</td>

                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm btn-block"><i class="far fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm btn-block mt-2"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="blog_list"><img class="img-fluid d-none d-lg-block" alt="image" src="https://via.placeholder.com/180x120" /></div>
                                                    <h4>Quisque ac justo porttitor mi egestas fermentum</h4>
                                                    <p>Posted by <b>Administrator</b> at Nov 29 2018</p>
                                                    <p>Nulla cursus maximus lacus at efficitur. In lobortis ante vitae nulla semper, in volutpat libero aliquet. Morbi sit amet nibh vitae metus interdum finibus sed nec nisl. Ut quam dolor, bibendum id maximus ut, suscipit consectetur sem.</p>
                                                </td>

                                                <td>News</td>

                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm btn-block"><i class="far fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm btn-block mt-2"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="blog_list"><img class="img-fluid d-none d-lg-block" alt="image" style="max-width:180px; height:auto;" src="https://via.placeholder.com/180x120" /></div>
                                                    <h4>Aenean vehicula erat id mauris porttitor</h4>
                                                    <p>Posted by <b>Administrator</b> at Nov 29 2018</p>
                                                    <p>Nulla cursus maximus lacus at efficitur. In lobortis ante vitae nulla semper, in volutpat libero aliquet. Morbi sit amet nibh vitae metus interdum finibus sed nec nisl. Ut quam dolor, bibendum id maximus ut, suscipit consectetur sem.</p>
                                                </td>

                                                <td>News</td>

                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm btn-block"><i class="far fa-edit"></i> Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm btn-block mt-2"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
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


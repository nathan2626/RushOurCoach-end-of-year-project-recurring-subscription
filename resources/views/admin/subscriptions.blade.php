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
                        <a href="/admin/articles">
                            <i class="fas fa-file-alt"></i>
                            <span> Articles </span>
                        </a>
                    </li>

                    <li class="submenu">
                        <a class="active" href="/admin/subscriptions">
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
                            <h1 class="main-title float-left">Subscriptions</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Subscriptions</li>
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
                                <span class="pull-right"><a href="#" class="btn btn-primary btn-sm"><i class="fas fa-plus" aria-hidden="true"></i> Add new post</a></span>
                                <h3><i class="far fa-file-alt"></i> Subscriptions</h3>
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

                                                <td>Subscriptions</td>

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

                                                <td>Subscriptions</td>

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

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
                        <a class="active" href="/admin">
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
                            <h1 class="main-title float-left">Dashboard</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-danger">
                            <i class="far fa-user float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Users</h6>
                            <h1 class="m-b-20 text-white counter">487</h1>
                            <span class="text-white">12 Today</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-purple">
                            <i class="far fa-envelope float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Articles</h6>
                            <h1 class="m-b-20 text-white counter">20</h1>
                            <span class="text-white">1 Today</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-warning">
                            <i class="fas fa-shopping-cart float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Subscriptions</h6>
                            <h1 class="m-b-20 text-white counter">320</h1>
                            <span class="text-white">25 Today</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-info">
                            <i class="far fa-user float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Admins</h6>
                            <h1 class="m-b-20 text-white counter">5</h1>
                            <span class="text-white">1 Today</span>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fas fa-user-friends"></i>Vue de l'ensemble des users</h3>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
                            </div>

                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Extn.</th>
                                                <th>Date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- end table-responsive-->

                            </div>
                            <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div>

                </div>
                <!-- end row-->

            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->

    @include('layouts.scriptsAdmin')

</div>

<!-- BEGIN Java Script for this page -->
<script src="{{asset('/assets-admin/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('/assets-admin/plugins/datatables/datatables.min.js')}}"></script>

<!-- Counter-Up-->
<script src="{{asset('/assets-admin/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('/assets-admin/plugins/counterup/jquery.counterup.min.js')}}"></script>

<!-- dataTabled data -->
<script src="{{asset('/assets-admin/data/data_datatables.js')}}"></script>

@endsection

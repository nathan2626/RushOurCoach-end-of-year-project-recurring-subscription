@extends('layouts.defaultBlog')

@section('contentBlog')
<!-- Nav -->
@include('partials.navbarBlog')

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-md-8">
            <h1 class="my-4">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            @if($articles)
            @foreach($articles as $article)

            <!-- Blog post-->
            <div class="card mb-4">
                <img class="card-img-top" src="/img/{{ $article->image }}" alt="Card image cap" />
                <div class="card-body">
                    <h2 class="card-title">{{ $article->title }}</h2>
                    <!-- Optimiser les perfs (gerer au niveau du back le substring) -->
                    <p class="card-text">{{ substr($article->body, 0, 150) . '...' }}</p>
                    <a class="btn btn-primary" href="#!">Read More →</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on January 1, 2021 by
                    <a href="#!">Start Bootstrap</a>
                </div>
            </div>

            @endforeach
            @else
                <!-- Blog post-->
                    <div class="card mb-4">
                        <img class="card-img-top" src="/img/article1.png" alt="Card image cap" />
                        <div class="card-body">
                            <h2 class="card-title">Aucun articles pour le moment 😣</h2>
                        </div>
                    </div>
            @endif

            <!-- Pagination-->
            <div class="d-flex justify-content-center">
                {!! $articles->links() !!}
            </div>
            
        </div>
        <!-- Side widgets-->
        <div class="col-md-4">
            <!-- Search widget-->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for..." />
                        <span class="input-group-append"><button class="btn btn-secondary" type="button">Go!</button></span>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!</div>
            </div>
        </div>
    </div>
</div>

@endsection

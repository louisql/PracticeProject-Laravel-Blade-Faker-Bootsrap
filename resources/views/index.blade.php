@extends('master')

@section('title', 'Accueil - TP1')


@section('content')

<!-- Page Header-->
<!-- <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')"> -->
<header class="masthead" style="background-image: url({{ asset('assets/img/home-bg.jpg') }})">

            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>@lang('lang.welcome')</h1>
                            <span class="subheading">@lang('lang.h2')</span>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit architecto quisquam facilis vel repellendus similique.</h2>
                            <h3 class="post-subtitle">Odit architecto quisquam facilis vel </h3>
                        </a>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit architecto quisquam facilis vel repellendus similique.</h2>
                            <h3 class="post-subtitle">Odit architecto quisquam facilis vel </h3>
                        </a>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit architecto quisquam facilis vel repellendus similique.</h2>
                            <h3 class="post-subtitle">Odit architecto quisquam facilis vel </h3>
                        </a>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit architecto quisquam facilis vel repellendus similique.</h2>
                            <h3 class="post-subtitle">Odit architecto quisquam facilis vel </h3>
                        </a>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>

@endsection

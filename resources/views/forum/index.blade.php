@extends('master')

@section('title', 'Post - TP1')

@section('content')

<!-- Page Header-->
<!-- <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')"> -->
<header class="masthead" style="background-image: url({{ asset('assets/img/post-bg.jpg') }})">

    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>Forum</h1>

                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<div class="row">

    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one">
                    @lang('lang.my_blog')
                </h1>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            @lang('lang.reading_title')
                        </p>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('forum.create')}}" class="btn btn-outline-primary">
                            @lang('lang.add_post')
                        </a>
                    </div>
                </div>
                <hr>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Liste des articles
                        </div>
                        <div class="card-body">
                            <ul>
                                @forelse($forums as $forum)

                                <li><a href="{{ route('forum.show', $forum->id)}}">{{ $forum->title }}</a> - {{ $forum->created_at }} - {{ $forum->forumPostHasUser->name }}</li>
                                @empty
                                <li class="text-danger">Aucun article de forum disponible</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
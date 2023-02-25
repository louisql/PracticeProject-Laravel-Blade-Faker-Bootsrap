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
<!-- {{ $logged_user }} -->
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
                        <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>@lang('lang.title')</th>
                <th>Date</th>
                <th>@lang('lang.author')</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($forums as $forum)
                <tr>
                    <td>{{ $forum->title }}</td>
                    <td>{{ $forum->created_at }}</td>
                    <td>{{ $forum->forumPostHasUser->name }}</td>
                    <td>
                        @if($logged_user == $forum->user_id)
                            <a href="{{ route('forum.edit', $forum->id) }}" class="btn btn-primary">@lang('lang.modify')</a>
                        @endif
                        <a href="{{ route('forum.show', $forum->id) }}" class="btn btn-info">@lang('lang.afficher')</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-danger">Aucun article de forum disponible</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
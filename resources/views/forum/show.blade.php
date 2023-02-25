@extends('master')
@section('title', 'Blog')
@section('content')
<header class="masthead" style="background-image: url({{ asset('assets/img/home-bg.jpg') }})">

  <div class="container position-relative px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="site-heading">
          <h1> {{ $forumPost->title }}</h1>
          <span class="subheading">A Post by {{ $forumPost->forumPostHasUser->name}}</span>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="container">
  <div class="row">
    <div class="col-12 pt-2">
      <hr>
      <p> {!! $forumPost->body !!}</p>
      <p><strong>@lang('lang.author'):</strong> {{ $forumPost->forumPostHasUser->name}}</p>
      <p><strong>Date:</strong> {{ $forumPost->created_at}}</p>

      <hr>
    </div>
  </div>
  <div class="row text-center mb-2">
    <div class="col-4">
      <a href="{{route('forum.edit', $forumPost->id)}}" class="btn btn-success">@lang('lang.modify')</a>
    </div>
    <div class="col-4">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
      @lang('lang.delete')
      </button>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.delete')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @lang('lang.confirm_delete')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{ route('forum.edit', $forumPost->id)}}" method="post">
          @csrf
          @method('delete')
          <input type="submit" class="btn btn-danger" value="@lang('lang.delete')">
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@extends('master')

@section('title', 'Contact - TP1')

@section('content')

<!-- Page Header-->
<!-- <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')"> -->
<header class="masthead" style="background-image: url({{ asset('assets/img/contact-bg.jpg') }})">


    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>@lang('lang.directory')</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
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
                <a href="{{ route('repertoire.create')}}" class="btn btn-outline-primary">
                    @lang('lang.add_directory')
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
                        @forelse($repertoires as $repertoire)
                                <li>{{ $repertoire->title }} - {{ $repertoire->created_at }} - {{$repertoire->url}}</li>
                                <li><a href="{{ route('repertoire.download', ['file_path' => $repertoire->url]) }}">Télécharger</a></li>
                                <li>Autheur: {{ $repertoire->RepertoireHasUser->name }}</li>
                                <li><a href="{{ route('repertoire.edit', $repertoire->id)}}">Modifier</a></li>


                        @empty
                                <li class="text-danger">Aucun article de repertoire disponible</li>
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
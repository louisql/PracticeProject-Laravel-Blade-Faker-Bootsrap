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
                        <div class="card-body">
                            @if(count($repertoires) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>@lang('lang.title')</th>
                                        <th>Date</th>
                                        <th>@lang('lang.download')</th>
                                        <th>@lang('lang.author')</th>
                                        <th>@lang('lang.modify')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($repertoires as $repertoire)
                                    <tr>
                                        <td>{{ $repertoire->title }}</td>
                                        <td>{{ $repertoire->created_at }}</td>
                                        <td><a href="{{ route('repertoire.download', ['file_path' => $repertoire->url]) }}">Télécharger</a></td>
                                        <td>{{ optional($repertoire->RepertoireHasUser)->name }}</td>
                                        @if($logged_user == $repertoire->user_id)
                                        <td><a href="{{ route('repertoire.edit', $repertoire->id)}}" class="btn btn-primary">Modifier</a></td>
                                        <td>
                                            <form action="{{ route('repertoire.edit', $repertoire->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Effacer">
                                            </form>
                                        </td>

                                        @endif

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <p class="text-danger">Aucun article de repertoire disponible</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
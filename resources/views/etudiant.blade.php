@extends('master')

@section('title', 'Étudiant - TP1')

@section('content')

<!-- Page Header-->
<!-- <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')"> -->
<header class="masthead" style="background-image: url({{ asset('assets/img/about-bg.jpg') }})">

            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>@lang('lang.student_list')</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->

        <main class="mb-4">
                    <!-- <div class="card"> -->
                    <!-- <div class="col-md-4"> -->
                </div>
                        <div class="card-header">
                            @lang('lang.student_list_description')
                        </div>
                        <div class="card-body">
                            <ul>
                                @forelse($etudiants as $etudiant)
                                    <li><a href="etudiant/{{ $etudiant -> id}}"> {{ $etudiant->nom}} </a></li>
                                @empty
                                    <li class="text-danger">Aucun Étudiant</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection

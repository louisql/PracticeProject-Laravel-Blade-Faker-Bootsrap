@extends('master')

@section('title', 'Show - TP1')

@section('content')

<!-- Page Header-->
<!-- <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')"> -->
<header class="masthead" style="background-image: url({{ asset('assets/img/about-bg.jpg') }})">

    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Information sur un Étudiant</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->


<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <h4 class="display-one mt-2">
                {{ $etudiant -> nom }}
            </h4>
            <h4 class="display-one mt-2">
                {{ $etudiant -> adresse }}
            </h4>
            <h4 class="display-one mt-2">
                {{ $etudiant -> phone }}
            </h4>
            <h4 class="display-one mt-2">
                {{ $etudiant -> email }}
            </h4>
            <h4 class="display-one mt-2">
                {{ $etudiant -> date_de_naissance }}
            </h4>
            <h4 class="display-one mt-2">
                {{ $etudiant -> etudiantHasVille -> nom}}
            </h4>
            <hr>
        </div>
        <a href="{{ route('edit', $etudiant->id) }}" class="btn btn-outline-primary">
            Modifier l'Étudiant
        </a>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Effacer
            </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer un article</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous certain de vouloir effacer ces données ? 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('edit', $etudiant->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="Effacer">
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
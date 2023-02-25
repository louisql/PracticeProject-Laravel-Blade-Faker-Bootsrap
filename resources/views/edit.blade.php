@extends('master')

@section('title', 'Edit - TP1')

@section('content')

<!-- Page Header-->
<!-- <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')"> -->
<header class="masthead" style="background-image: url({{ asset('assets/img/about-bg.jpg') }})">

    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>@lang('lang.student_update')</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <form method="post">
                @csrf
                @method('put') <!-- PUT car on est dans une modification -->

                <div class="card">
                    Formulaire
                </div>
                <div class="card-body">
                    <div class="controle-group col-12">
                        <label for="nom">@lang('lang.nom')</label>
                        <input type="text" id="nom" name="nom" class="form-control" value="{{ $etudiant -> nom }}"> <!-- Ne pas oublier de mettre le name, qui est celui de la base de données -->
                    </div>

                    <div class="controle-group col-12">
                        <label for="adresse">@lang('lang.adresse')</label>
                        <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $etudiant -> adresse }}">
                    </div>

                    <div class="controle-group col-12">
                        <label for="phone">@lang('lang.phone')</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $etudiant -> phone }}">
                    </div>

                    <div class="controle-group col-12">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="{{ $etudiant -> email }}">
                    </div>

                    <div class="controle-group col-12">
                        <label for="date_de_naissance">@lang('lang.birthdate')</label>
                        <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control" value=" {{ $etudiant -> date_de_naissance }}">
                    </div>


                    <select name="ville_id" id="">

                        @forelse($villes as $ville)
                        <option id="{{ $ville->id}}" value="{{ $ville->id}}" @if ($ville->id == $etudiant->ville_id) selected @endif>
                            {{ $ville->nom}}
                        </option>
                        @empty
                        <option class="text-danger">Auncune Ville</option>
                        @endforelse
                    </select>

                </div>
                <div class="card-footer">
                    <input type="submit" value="@lang('lang.modify')" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
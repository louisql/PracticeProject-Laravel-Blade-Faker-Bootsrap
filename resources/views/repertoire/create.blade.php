@extends('master')

@section('title', 'Ajouter')
@section('content')
<header class="masthead" style="background-image: url({{ asset('assets/img/home-bg.jpg') }})">

    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1> Répertoire - Nouveau</h1>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    Formulaire
                </div>
                <div class="card-body">
                    <div class="control-group col-12">
                        <label for="title">File Title - English</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="control-group col-12">
                        <label for="title_fr">Titre du fichier - Français</label>
                        <input type="text" id="title_fr" name="title_fr" class="form-control">
                    </div>
                    <div class="control-group col-12">
                        <label for="file">Example file input</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Sauvegarder" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
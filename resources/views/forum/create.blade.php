@extends('master')

@section('title', 'Ajouter')
@section('content')
<header class="masthead" style="background-image: url({{ asset('assets/img/home-bg.jpg') }})">

    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1> @lang('lang.create_article')</h1>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <form method="post">
                @csrf
                <div class="card-body">
                    <div class="control-group col-12">
                        <label for="title">Message Title - English</label>
                        <input type="text" id="title" name="title" class="form-control">
                        @if($errors->has('title'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('title')}}
                        </div>
                        @endif
                    </div>
                    <div class="control-group col-12">
                        <label for="title_fr">Titre du message - Français</label>
                        <input type="text" id="title_fr" name="title_fr" class="form-control">
                        @if($errors->has('title_fr'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('title_fr')}}
                        </div>
                        @endif
                    </div>
                    <div class="control-group col-12">
                        <label for="body">Message - English</label>
                        <textarea name="body" id="body" class="form-control"></textarea>
                        @if($errors->has('body'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('body')}}
                        </div>
                        @endif
                    </div>
                    <div class="control-group col-12">
                        <label for="body_fr">Message - Français</label>
                        <textarea name="body_fr" id="body_fr" class="form-control"></textarea>
                        @if($errors->has('body_fr'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('body_fr')}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="@lang('lang.save')" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
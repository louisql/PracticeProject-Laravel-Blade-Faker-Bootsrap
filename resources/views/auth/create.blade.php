@extends('master')
@section('title', 'Enregistrer')
@section('content')
<header class="masthead" style="background-image: url({{ asset('assets/img/about-bg.jpg') }})">

            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>@lang('lang.create_user')</h1>

                        </div>
                    </div>
                </div>
            </div>
        </header>
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{session('success')}}</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="@lang('lang.nom')" class="form-control" name="name" value="{{ old('name')}}">
                                @if($errors->has('name'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('name')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email')}}">
                                @if($errors->has('email'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('email')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="@lang('lang.password')" class="form-control" name="password">
                                @if($errors->has('password'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('password')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="@lang('lang.adresse')" class="form-control" name="adresse">
                                @if($errors->has('adresse'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('adresse')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="@lang('lang.phone')" class="form-control" name="phone">
                                @if($errors->has('phone'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('phone')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="date" placeholder="date_de_naissance" class="form-control" name="date_de_naissance">
                                @if($errors->has('date_de_naissance'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('date_de_naissance')}}
                                    </div>
                                @endif
                            </div>
                            <select name="ville_id" id="">
                                @forelse($villes as $ville)
                                    <option id="{{ $ville->id}}" value="{{ $ville->id}}">{{ $ville->nom}}</option>
                                @empty
                                    <option class="text-danger">Auncune Ville</option>
                                @endforelse
                        </select>



                            <div class="d-grid mx-auto">
                                <input type="submit" value="@lang('lang.save')" class="btn btn-dark btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>  

@endsection
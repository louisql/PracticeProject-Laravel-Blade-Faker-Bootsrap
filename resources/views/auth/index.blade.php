@extends('master')
@section('title', 'Login')
@section('content')
<header class="masthead" style="background-image: url({{ asset('assets/img/about-bg.jpg') }})">

            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>@lang('lang.login')</h1>

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
                    <h3 class="card-header text-center">
                    @lang('lang.login')
                    </h3>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{session('success')}}</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if(!$errors->isEmpty())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form action="{{route('user.auth')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email')}}">
                                @if($errors->has('email'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('email')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" class="form-control" name="password">
                                @if($errors->has('password'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('password')}}
                                    </div>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <input type="submit" value="@lang('lang.login')" class="btn btn-dark btn-block">
                            </div>
                        </form>
                        <a href="{{route('forgot.pass')}}">Mot de passe oublié</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>  

@endsection
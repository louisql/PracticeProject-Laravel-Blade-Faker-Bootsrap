@extends('master')

@section('title', 'Mettre a jour')
@section('content')
<header class="masthead" style="background-image: url({{ asset('assets/img/home-bg.jpg') }})">

  <div class="container position-relative px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="site-heading">
          <h1>Modification</h1>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="container">

    <hr>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post">
                    @csrf
                    @method('put')
                    <div class="card-header">
                        Formulaire
                    </div>
                    <div class="card-body">
                        <div class="control-group col-12">
                            <label for="title">Titre du message</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ $forumPost->title}}">
                        </div>
                        <div class="control-group col-12">
                            <label for="body">Message</label>
                            <textarea name="body" id="body" class="form-control">{{ $forumPost->body }}</textarea>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Mettre a jour" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
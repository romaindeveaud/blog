@extends('layouts.backend')

@section('title', 'RÀ4M - Authentification')

@section('content')
<div class="container">


  <form class="form-signin" method="POST" action="/login">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h2 class="form-signin-heading">Tu veux aller plus loin?</h2>
    @if(Session::has('error'))
      <div style="font-size:14px; font-weight:normal;" class="alert alert-danger fade in">
          {{ Session::get('error') }}
      </div>
    @endif
    <label for="email" class="sr-only">E-mail</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="password" class="sr-only">Mot de passe</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label style="font-size:16px;">
        <input type="checkbox" name="remember" value="remember-me"> Souviens-toi de moi!
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Prêt!</button>
  </form>
</div> <!-- /container -->
@stop

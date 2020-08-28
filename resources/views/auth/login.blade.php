@extends('layout.layout')

@section('content')
    <div class="col-lg-6 col-md-6 ml-auto mr-auto">
        <div class="card card-login py-4">
            <p class="description text-center">If you don't have an account yet, <a href="{{ route('register') }}">
                register here!
            </a></p>
            <div class="card-body p-4">
                @include ( 'auth.loginform' )
            </div>
        </div>
    </div>
@endsection

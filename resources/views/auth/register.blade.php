@extends('layout.layout')

@section('content')
    <div class="col-lg-6 col-md-6 ml-auto mr-auto">
        <div class="card card-login py-4">
            <p class="description text-center">If you already have an account, <a href="{{ route('login') }}">
                login here!
            </a></p>
            <div class="card-body p-4">
                @include ( 'auth.registerform' )
            </div>
        </div>
    </div>
@endsection
<form class="needs-validation" method="POST" action="{{ route('login') }}" novalidate>
    @csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="ion-ios-person"></i>
            </span>
        </div>
        <input id="login-username" type="username" class="form-control clear-border @error('username') is-invalid @enderror" name="username" value="{{ old( 'username' ) }}" required autocomplete="username" placeholder="Username...">
        <div class="invalid-feedback">@error('username'){{ $message }}@else You cannot leave this section empty. @enderror</div>
        
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="ion-ios-lock"></i>
            </span>
        </div>
        <input id="login-password" type="password" class="form-control clear-border @error('username') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
        <div class="invalid-feedback">@error('password'){{ $message }}@else You cannot leave this section empty. @enderror</div>
    </div>
    <input type="text" name="char_id" value="{{ Request::is( 'character/*' ) ? $character->id : '' }}" hidden>
    <div class="form-group row mb-0">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-dark">Login</button>

            @if (Request::is( 'login' ))
                <a class="btn btn-link" href="{{ route( 'password.request' ) }}">Forgot your password?</a>
            @endif
        </div>
    </div>
</form>

@section ( 'footer' )

    {{-- Additional scripts for section: /login form --}}
    <script src="/js/validation.js"></script>

@endsection
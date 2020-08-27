<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="ion-ios-person"></i>
            </span>
        </div>
        <input id="login-username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username...">

        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="ion-ios-lock"></i>
            </span>
        </div>
        <input id="login-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <input type="text" name="id" value="{{ Request::is( 'character/*' ) ? $character->id : '' }}">
    <div class="form-group row mb-0">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-dark">
                {{ __('Login') }}
            </button>

            @if (Request::is( 'login' ))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
</form>
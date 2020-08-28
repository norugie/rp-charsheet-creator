<form class="needs-validation" method="POST" action="{{ route('register') }}" novalidate>
    @csrf

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="ion-ios-person"></i>
            </span>
        </div>
        <input id="name" type="name" class="form-control clear-border @error('name') is-invalid @enderror" name="name" value="{{ old( 'name' ) }}" required autocomplete="name" placeholder="Name...">  
        <div class="invalid-feedback">@error('name'){{ $message }}@else You cannot leave this section empty. @enderror</div>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="ion-ios-at"></i>
            </span>
        </div>
        <input id="username" type="username" class="form-control clear-border @error('username') is-invalid @enderror" name="username" value="{{ old( 'username' ) }}" required autocomplete="username" placeholder="Username...">
        <div class="invalid-feedback">@error('username'){{ $message }}@else You cannot leave this section empty. @enderror</div>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="ion-ios-mail"></i>
            </span>
        </div>
        <input id="email" type="email" class="form-control clear-border @error('email') is-invalid @enderror" name="email" value="{{ old( 'email' ) }}" required autocomplete="email" placeholder="Email Address...">
        <div class="invalid-feedback">@error('email'){{ $message }}@else You cannot leave this section empty. @enderror</div>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="ion-ios-lock"></i>
            </span>
        </div>
        <input id="password" type="password" class="form-control clear-border @error('password') is-invalid @enderror" name="password" required autocomplete="password" placeholder="Password...">
        <div class="invalid-feedback">@error('password'){{ $message }}@else You cannot leave this section empty. @enderror</div>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="ion-ios-checkmark-circle"></i>
            </span>
        </div>
        <input id="password-confirm" type="password" class="form-control clear-border @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password...">
        <div class="invalid-feedback">You cannot leave this section empty.</div>
    </div>

    <input type="text" name="char_id" value="{{ Request::is( 'character/*' ) ? $character->id : '' }}" hidden>
    <div class="form-group row mb-0">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-dark">Register</button>
        </div>
    </div>
</form>

@section ( 'footer' )

    {{-- Additional scripts for section: /register form --}}
    <script src="/js/validation.js"></script>

@endsection
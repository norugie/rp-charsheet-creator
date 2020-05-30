@extends ( 'layout.layout' )

@section ( 'content' )

    {{-- Login - User Login --}}

    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        <div class="card card-login py-4">
            <form class="form-login" method="" action="">
                <div class="card-header card-header-primary text-center">
                    <h4 class="card-title">RPSCS</h4>
                </div>
                <p class="description text-center">Login to your account</p>
                <div class="card-body p-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-person"></i>
                            </span>
                        </div>
                        <input type="username" class="form-control" placeholder="Username...">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ion-ios-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password...">
                    </div>
                </div>
                <div class="footer text-center">
                    <a href="#" class="btn btn-dark">Login</a>
                </div>
            </form>
        </div>
    </div>

@endsection
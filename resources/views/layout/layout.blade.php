<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>RP Character Sheet Creator</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Prata&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="/css/animate.css">

        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="/css/magnific-popup.css">

        <link rel="stylesheet" href="/css/aos.css">
        <link rel="stylesheet" href="/css/ionicons.min.css">
        <link rel="stylesheet" href="/css/flaticon.css">
        <link rel="stylesheet" href="/css/icomoon.css">
        
        @yield ( 'header' )

        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/custom.css">

        <link rel="icon" href="/images/icons/rpcsc.png">
    </head>
    <body> 
        {{-- Site Content --}}
        <div class="main-section">

            {{-- Navigation --}}
            <nav class="navbar navbar-expand-md navbar-light bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="/"><img src="/images/icons/rpcsc.png" class="img-fluid" alt="RPCSC Icon"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-rpchcr" aria-controls="navbar-rpchcr" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="oi oi-menu"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbar-rpchcr">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item d-flex {{ Request::is( '/' ) ? 'active' : '' }}">
                                <a class="nav-link d-flex align-items-center" href="/"><i class="ion-ios-home mr-1"></i> Home</a>
                            </li>
                            <li class="nav-item d-flex {{ Request::is( 'create' ) ? 'active' : '' }}">
                                <a class="nav-link d-flex align-items-center" href="/create"><i class="ion-ios-create mr-1"></i> Create</a>
                            </li>
                            <li class="nav-item d-flex {{ Request::is( 'login' ) ? 'active' : '' }}">
                                <a class="nav-link d-flex align-items-center" href="/login"><i class="ion-ios-log-in mr-1"></i> Login</a>
                            </li>
                        </ul>
                        <form action="/search" method="POST" class="form-inline my-2 my-lg-0">
                            {{ csrf_field() }}
                            <input class="form-control mr-xsm search-input" type="search" placeholder="Search keyword. . ." name="search" aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-2 btn-fab btn-blk-small" type="submit"><i class="ion-ios-search"></i> Search</button>
                        </form>
                    </div>
                </div>
            </nav>

            {{-- Content --}}
            <div class="ftco-section">
                <div class="container">
                    <div class="row">
                        @yield ( 'content' )
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <footer class="ftco-section ftco-section-2">
                <div class="col-md-12 text-center">
                    <p class="mb-0">
                        <!-- Link back to Colorlib can't be removed. -->
                        &copy; <script>document.write(new Date().getFullYear());</script>. RPCSC | Template by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. -->
                    </p>
                </div>
            </footer>

        </div>

        {{-- Loader --}}
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

        {{-- Scripts --}}
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/jquery.easing.1.3.js"></script>
        <script src="/js/jquery.waypoints.min.js"></script>
        <script src="/js/jquery.stellar.min.js"></script>
        <script src="/js/owl.carousel.min.js"></script>
        <script src="/js/jquery.magnific-popup.min.js"></script>
        <script src="/js/aos.js"></script>

        {{-- Additional Page Scripts --}}
        @yield ( 'footer' )
        
        <script src="/js/main.js"></script>

    </body>
</html>
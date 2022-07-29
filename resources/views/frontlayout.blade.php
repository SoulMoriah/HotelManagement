<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <!-- lightbox-->
        <link type="text/css" href="{{asset('vendor/lightbox2-2.11.3/src/css/lightbox.css')}}" rel="stylesheet" />
        <!-- jquery-->
        <script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script
        src="https://browser.sentry-cdn.com/7.7.0/bundle.min.js"
        integrity="sha384-zVycKakbFST6m0pi9RFIAnb5nw7mrA1n/mE4C8grImB4B6iqCp/0LHOcTIu9AI7+"
        crossorigin="anonymous"
        ></script>

        <title>Home page</title>

        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">-->
    </head>
    <body>
        <!-- Nav bar section star-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="{{url('/')}}">Hotel Soul</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                  <a class="nav-link" aria-current="page" href="#">Services</a>
                  <a class="nav-link" href="#">Gallery</a>
                  @if (Session::has('costumerlogin'))
                  <a class="nav-link" href="{{url('logout')}}">Logout</a>
                  <a class="nav-link btn btn-sm btn-success" href="{{url('booking')}}">Booking</a>
                  @else
                    <a class="nav-link" href="{{url('login')}}">Login</a>
                    <a class="nav-link" href="{{url('register')}}">Register</a>
                    <a class="nav-link btn btn-sm btn-success" href="#">Booking</a>
                  @endif
                </div>
              </div>
            </div>
          </nav>
          <!-- Nav bar section end-->

          <main>
            @yield('content')
          </main>
          @yield('scripts')
    </body>
</html>
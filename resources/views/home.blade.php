@extends('frontlayout')
@section('content')
              <!-- Carousel section start-->
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{('img/carou1.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{('img/carou2.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{('img/carou3.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Some representative placeholder content for the third slide.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <!-- Carousel section end-->

          <!-- Services section Start-->
          <div class="container my-4">
            <h1 class="text-center border">Services</h1>
            <div class="row my-4">
                <div class="col-md-4">
                    <img src="{{('img/service1.jpg')}}" class="img-thumbnail" alt="...">
                </div>
                <div class="col-md-8">
                    <h3>Service heading</h3>
                    <p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.
                        Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.
                        Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.
                    </p>
                    <p>
                        <a href="#" class="btn btn-sm btn-primary">Read More</a>
                    </p>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-md-4">
                    <img src="{{('img/service2.jpg')}}" class="img-thumbnail" alt="...">
                </div>
                <div class="col-md-8">
                    <h3>Service heading</h3>
                    <p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.
                        Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.
                        Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.
                    </p>
                    <p>
                        <a href="#" class="btn btn-sm btn-primary">Read More</a>
                    </p>
                </div>
            </div>
          </div>
          <!-- Services section end-->

          <!-- Gallery section start-->
          <div class="container my-4">
            <h1 class="text-center border">Gallery</h1>
            <div class="row my-4">
              @foreach ($roomTypes as $rtype)
                <div class="col-md-3">
                  <div class="card">
                    <h4 class="card-header">{{$rtype->title}}</h4>
                      <div class="card-body">
                        
                        @foreach ($rtype->roomtypeimages as $index => $img )
                        <a href="{{('imgs/'.$img->img_src)}}" data-lightbox="rgallery{{$rtype->id}}">
                          @if ($index > 0)
                            <img class="img-fluid hide" src="{{('imgs/'.$img->img_src)}}"  >
                          @else
                          <img class="img-fluid" src="{{('imgs/'.$img->img_src)}}"  >
                          @endif
                       </a>
                        @endforeach
                          
                      </div>
                  </div>
                </div>  
              @endforeach

            </div>
          </div>
          <!-- Gallery section end-->



          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
          <!-- jquery-->
          <script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
          
          <!-- lightbox-->
          <script type="text/javascript" src="{{asset('vendor/lightbox2-2.11.3/src/js/lightbox.js')}}"></script>

          <style type="text/css">
            .hide{
              display: none;
            }
          </style>
@endsection
    </body>
</html>
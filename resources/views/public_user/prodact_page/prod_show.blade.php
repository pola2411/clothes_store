@extends('public_user.layout.layout')

@section('boby')


<div class="container show_prod">

<div class="row">
    <div class="col-md-6">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset($data->image)}}" class="d-block  "  style="width:100%;height:200px" alt="...">
              </div>

              @forelse ($data->prod_image as $images )
              <div class="carousel-item">
                <img src="{{asset($images->image)}}" class="d-block " style="width:100%;height:200px" alt="...">
              </div>
              @empty

              @endforelse

            </div>
           <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </button>
          </div>

    </div>
    <div class="col-md-6">
        <div class="card">

            <div class="card-body">
              <h3 class="card-title">{{$data->title}}</h3>
              <h4 class="card-title">{{$data->main_desconde}} LE <span style="text-decoration-line:line-through;  text-decoration-color: red;">{{$data->main_price}} LE</span></h4>

              <p class="card-text">{{$data->description}}</p>
              @foreach ($colors as $color )
              <div style="width:30px;height:30px; background-color:{{$color}};display:inline "></div>

              @endforeach
              <a href="#" class="btn btn-primary" style="display: block">Go somewhere</a>



            </div>

          </div>

</div>
</div>



@endsection

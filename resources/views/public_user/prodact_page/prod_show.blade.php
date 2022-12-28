@extends('public_user.layout.layout')

@section('boby')


    <div class="container show_prod">

        <div class="row">
            <div class="col-md-6">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset($data->image) }}" class="d-block  " style="width:100%;height:200px"
                                alt="...">
                        </div>

                        @forelse ($data->prod_image as $images)
                            <div class="carousel-item">
                                <img src="{{ asset($images->image) }}" class="d-block " style="width:100%;height:200px"
                                    alt="...">
                            </div>
                        @empty
                        @endforelse

                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3 class="card-title">{{ $data->title }}</h3>
                        <h4 class="card-title">{{ $data->main_desconde }} LE <span
                                style="text-decoration-line:line-through;  text-decoration-color: red;">{{ $data->main_price }}
                                LE</span></h4>

                        <p class="card-text">{{ $data->description }}</p>
                        <form action="{{ route('prod.addtocard') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $data->id }}" name="prod_id">
                            <h4>choose color</h4>
                            <ul>
                                @foreach ($colors as $color)
                                    <li id="view_color" style="background:{{ $color }}">
                                        <input type="radio" id="redio" value="{{ $color }}" name="color">
                                    </li>
                                @endforeach

                            </ul>
                            <h4>choose size</h4>
                            <ul>
                                @foreach ($sizes as $size)
                                    <li id="view_size">
                                        {{ $size }}
                                        <input type="radio" id="radio_size" value="{{ $size }}" name="size">
                                    </li>
                                @endforeach
                            </ul>
                            <h4>Quantity</h4>
                            <input type="number" name="quantity" style="display:block" max="4" min="1"
                                placeholder="Quantity">



                            <button type="submit" class="btn btn-primary" style="margin-top:10px">Add To Card</button>

                        </form>





                    </div>

                </div>

            </div>
        </div>



    @endsection

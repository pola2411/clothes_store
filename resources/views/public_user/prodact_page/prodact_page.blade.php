@extends('public_user.layout.layout')

@section('boby')
    <div class="continer">

        <div class="row">
            @forelse ($query as $data )

            <div class="card prod_view col-lg-3 col-md-4 col-sm-6">
                <img src="{{asset($data->image)}}"  class="card-img-top" alt="...">
                <div class="card-body">
                    <h2  class="card-title">{{$data->title}}</h2>
                    <p class="card-title">{{$data->description}}</p>
                    <p class="card-title">{{$data->main_desconde}} <span style="text-decoration-line:line-through;  text-decoration-color: red;">{{$data->main_price}}</span></p>
                    <a href="{{route('show.prod',$data->id)}}" class="btn btn-primary">Buy Now</a>
                </div>


            </div>

            @empty

            @endforelse
        </div>
    </div>
@endsection

@push('javas')


@endpush




@extends('public_user.layout.layout')

@section('boby')
    <div class="continer">

        <div class="row">
            @forelse ($query as $data)
                <div class="card prod_view col-lg-3 col-md-4 col-sm-6">
                    <img src="{{ asset($data->image) }}"width="200px" height="200px"  alt="...">
                    <div class="card-body">
                        <ul>
                            <li>{{ $data->title }}</li>
                            <li>{{ $data->description }}</li>
                            <li>{{ $data->main_desconde }} <span
                                    style="text-decoration-line:line-through;  text-decoration-color: red;">{{ $data->main_price }}</span>
                            </li>
                            <li> <a href="{{ route('show.prod', $data->id) }}" class="btn btn-primary">Buy Now</a>
                            </li>
                        </ul>

                    </div>


                </div>

            @empty
            @endforelse
        </div>
    </div>
@endsection

@push('javas')
@endpush

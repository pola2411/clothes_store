@extends('public_user.layout.layout')
@section('boby')
    <div class="container con col-md-5">
        <div class="row">
            <div class="card first_card col-md-12" >

                <div class="card-body ">

                        <div class="totle">
                            <h1 class="title">Categores</h1>
                            @forelse ($parent as $parent)
                            <div class="parent">
                              <h1 id="btn"> {{ $parent->title }}</h1>
                                @forelse ($child as $chil)
                                @if ($parent->id == $chil->parent_id)

                                <div class="child none ">
                                  <a href="{{route('user.prod',$chil->id)}}">  <h4>{{ $chil->title }}</h4></a>

                                </div>
                                @endif

                                @empty
                                @endforelse
                            </div>
                            @empty
                            @endforelse
                        </div>


                </div>

            </div>
        </div>
    </div>
@endsection

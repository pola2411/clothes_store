@extends('public_user.layout.layout')

@section('boby')
    <div class="container">
        <div class="row">
            @foreach ($items as $row)
                <div class="card col-md-3 card_show">




                    <img src="{{ asset($row->associatedModel->image) }}" width="200px" height="200px" alt="...">
                    <div class="card-body">
                        <ul>
                            <li>Product Name: {{ $row->name }}</li>
                            <li>Product Color: {{ $row->attributes->color }}</li>
                            <li>Product Size: {{ $row->attributes->size }}</li>
                            <li>Product Quantity: {{ $row->quantity }}</li>
                            <li>Product Price One: {{ $row->price }} LE </li>
                            <li>Total Of Price : {{ $row->quantity * $row->price }} LE</li>
                        </ul>

                        <button type="button" class="btn btn-primary" data-id='' data-toggle="modal"
                            data-target="#exampleModal{{ $row->id }}">
                            Edit
                        </button>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{ $row->id }}">
    Remove
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop{{ $row->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Delete {{ $row->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5>Are You Sure you want delete this producat</h5>

            <form action="{{ route('delete_from_card') }}" method="POST">
                @method('delete')
                @csrf
                <input type="hidden" value="{{$row->id}}" name="prod_id">


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </div>
    </form>
      </div>
    </div>
  </div>












                        <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edite Product Name:
                                            {{ $row->name }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('update.card') }}" method="POST">
                                            @method('put')
                                            @csrf
                                            <input type="hidden" value="{{$row->id}}" name="prod_id">

                                            </ul>
                                            <h4>Quantity</h4>
                                            <input type="number" name="quantity" value="{{ $row->quantity }}"
                                                style="display:block" max="4" min="1" placeholder="Quantity">






                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            @endforeach
            <div class="cheak col-md-12 mx-auto">
                <h1 class="card-title">totle: {{ $totla }} LE</h1>
                <a href="{{ route('order_create') }}" class="btn btn-info">submit order</a>
            </div>
        </div>
    </div>
@endsection

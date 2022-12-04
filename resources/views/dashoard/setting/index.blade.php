@extends('dashoard.layout.layouts')

@section('body')

<div class="container col-md-8">
    <div class="title">
        <h1 class="h1">Setting <h1>

    </div>


    <div class="row">

        <div class="card setting" >

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
    @if(Session::has('sussfull'))
        <div class="alert alert-success">{{Session::get('sussfull')}}</div>
        @endif

                <form method="POST" action="{{route('setting.update',$setting->id)}}" enctype="multipart/form-data">
                   @csrf
                   @method('PUT')
                    <div class="form-group">

                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" name="title" value="{{$setting->title}}" class="form-control" id="exampleInputEmail1">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="description" class="form-control" id="" cols="15" rows="10">{{$setting->description}}</textarea>

                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Logo</label>
                        <input type="file" name="logo" class="form-control dropify" id="exampleInputEmail1" data-default-file="{{asset($setting->logo)}}">


                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Favicon</label>
                        <input type="file" name="favicon" class="form-control dropify" id="exampleInputEmail1"data-default-file="{{asset('logo/5eb32eab-64f6-4207-8c14-9feddfde58481670056396.jpg')}}">

                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" value="{{$setting->email}}" class="form-control" id="exampleInputEmail1">

                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Facebook</label>
                        <input type="text" name="face" value="{{$setting->face}}" class="form-control" id="exampleInputEmail1">

                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Instagram</label>
                        <input type="text" name="insta" value="{{$setting->insta}}" class="form-control" id="exampleInputEmail1">

                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail1">Twitter</label>
                        <input type="text" name="twitter" value="{{$setting->twitter}}" class="form-control" id="exampleInputEmail1">

                      </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">WhatsApp</label>
                      <input type="text" name="whats" value="{{$setting->whats}}" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>




            </div>
          </div>







    </div>



</div>



@endsection

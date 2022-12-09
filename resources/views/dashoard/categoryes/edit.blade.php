@extends('dashoard.layout.layouts')
@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            {{-- <h3>{{/*$category->name*/}} --}}
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Digital</li>
                            <li class="breadcrumb-item active">Sub Category</li>
                            {{-- <li class="breadcrumb-item active">{{/*$category->name*/}}</li> --}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">



                        </div>

                        <div class="card-body">

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

                            <div class="table-responsive table-desi">
                                <form class="needs-validation" action="{{route('categores.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                                    <div class="form">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="validationCustom01" class="mb-1">الإسم :</label>
                                            <input class="form-control" value="{{$data->title}}" id="validationCustom01" type="text"
                                                name="title" value="">
                                        </div>
                                         @if ($data->child_count==0)
                                        <div class="form-group">
                                            <label for="validationCustom01" class="mb-1">القسم الرئيسي </label>



                                            <select name="parent_id" id="" class="form-control">
                                                <option value="" @if ($data->parent_id==0)selected

                                                @endif>قسم رئيسي</option>
                                                @forelse ($maincategory as $category)
                                                @if ($category->id !=$data->id)


                                                    <option value="{{ $category->id }}" @if ($category->id==$data->parent_id)selected

                                                    @endif>{{ $category->title }}</option>

                                                  @endif
                                                @empty
                                                    <option value="">not found</option>
                                                @endforelse

                                            </select>

                                        </div>
                                         @endif

                                        <div class="form-group mb-0">
                                            <label for="validationCustom02" class="mb-1">الصورة :</label>
                                            <input class="form-control dropify" id="validationCustom02" type="file"
                                                name="image" data-default-file="{{asset($data->image)}}">
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>
@endsection

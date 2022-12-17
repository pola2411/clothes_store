@extends('dashoard.layout.layouts')

@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3> المنتجات
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Digital</li>
                            <li class="breadcrumb-item active">Sub Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row product-adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>تعديل منتج</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('product.update', $query->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="col-12">


                                        @if ($errors->any())
                                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                                        @endif

                                        <div class="form-group">
                                            <label for="validationCustomtitle" class="col-form-label pt-0">القسم</label>
                                            <select name="cat_id" id="" class="form-control" required>
                                                @foreach ($categores as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($category->id == $query->cat_id) selected @endif>
                                                        {{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="validationCustom05" class="col-form-label pt-0">
                                                الصورة الرئيسية للمنتج</label>
                                            <input class="form-control dropify" id="validationCustom05" type="file"
                                                name="image"data-default-file="{{ asset($query->image) }}">
                                        </div>


                                        <div class="form-group">
                                            <label for="validationCustom01" class="col-form-label pt-0">
                                                اسم المنتج</label>
                                            <input class="form-control" value="{{ $query->title }}" id="validationCustom01"
                                                type="text" name="title" required>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-form-label">وصف المنتج</label>
                                            <textarea rows="5" cols="12" class="form-control" name="description">{{ $query->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom02" class="col-form-label">
                                                السعر الأساسي للمنتج </label>
                                            <input class="form-control" id="validationCustom02" type="text"
                                                name="main_price" value="{{ $query->main_price }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="validationCustom02" class="col-form-label">
                                                التخفيض الأساسي للمنتج </label>
                                            <input class="form-control" id="validationCustom02" type="text"
                                                name="main_desconde" value="{{ $query->main_desconde }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom02" class="col-form-label">
                                                الالوان المتاحه</label>
                                            <select class="form-control colors" multiple="multiple"name="colors[]"
                                                id="">
                                                <option value="{{ $query->colors }}">{{ $query->colors }}</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="validationCustom02" class="col-form-label">
                                                المقاسات المتاحه</label>
                                            <select class="form-control sizes" multiple="multiple"name="sizes[]"
                                                id="">
                                                <option value="{{ $query->sizes }}">{{ $query->sizes }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom05" class="col-form-label pt-0">
                                                صور المنتج</label>
                                            <input class="form-control dropify" id="validationCustom05" type="file"
                                                name="images[]" multiple>
                                        </div>


                                    </div>
                            </div>



                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">حفظ</button>
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
    </div>
 <div class="container">
        <div class="row">


            @foreach ($query->prod_image as $im)
            <div class="card col-md-4" >
                <img src="{{asset($im->image)}}" class="card-img-top" width="300" height="300" alt="...">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>

                  <a href="{{route('delete.images',$im->id)}}" class="btn btn-primary">DELETE</a>

                </div>

              </div>
              @endforeach
        </div>
    </div>
@endsection
@push('java')
    <script>

        $(".colors").select2({
            tags: true
        });
        $(".sizes").select2({
            tags: true
        });
    </script>
@endpush

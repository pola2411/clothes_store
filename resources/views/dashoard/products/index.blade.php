@extends('dashoard.layout.layouts')

@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>أقسام المنتجات
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
            <div class="row">
                <div class="col-sm-12">
                    <div class="card col-md-12">
                        <div class="card-header">
                            <form class="form-inline search-form search-box">

                            </form>

                            <a href="{{ route('product.create') }}" class="btn btn-primary mt-md-0 mt-2">إضافة منتج جديد</a>



                        </div>

                        <div class="card-body">

                            <div class="table-responsive table-desi">
                                <table class="table all-package table-category " id="editableTable">
                                    <thead>
                                        <tr>
                                            <th>الإسم</th>
                                            <th>القسم</th>
                                            <th>السعر</th>
                                            <th>الخصم</th>
                                            <th>الالوان</th>
                                            <th>المقاسات</th>

                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->




    </div>

    </div>


    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('product.delete') }}" method="POST">
                <div class="modal-content">

                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <p>متأكد من الحذف .. ؟؟</p>
                            @csrf
                            <input type="hidden" name="id" id="id">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-danger">حذف </button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@push('java')
    <script>
        $(function() {

            var table = $('#editableTable').DataTable({



                processing: true,
                serverSide: true,
                ajax: "{{ route('product.getall') }}",
                columns:

                    [

                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'categories',
                            name: 'categories'

                        },
                        {
                            data: 'main_price',
                            name: 'main_price'

                        },
                        {
                            data: 'main_desconde',
                            name: 'main_desconde'
                        },
                        {
                            data: 'colors',
                            name: 'colors'


                        },
                        {
                            data: 'sizes',
                            name: 'sizes'


                        },

                        {
                            data: 'action',
                            name: 'action'
                        }


                    ]








            });
        });

        $('#editableTable tbody').on('click','#deleteBtn',function(argument){

            var id=$(this).attr('data-id');

            $('#deletemodal #id').val(id);





        })

    </script>













@endpush

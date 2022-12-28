
@extends('dashoard.layout.layouts')


@section('body')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3> Orders Details
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
                    <li class="breadcrumb-item active">Sub Orders</li>
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





                </div>

                <div class="card-body">

                    <div class="table-responsive table-desi">
                        <table class="table all-package table-category " id="editableTable">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Product Name</th>
                                    <th> Quantity</th>
                                    <th> color</th>
                                    <th> size</th>
                                    <th> total</th>
                                    <th>date</th>

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







@endsection


@push('java')
    <script type="text/javascript">
        $(function() {

            var table = $('#editableTable').DataTable({

                processing: true,
                serverSide: true,
                ajax: "{{ route('order.ajax') }}",
                columns: [{
                        data: "usres",
                        name: "usres"

                    },
                    {
                        data: "peoduct",
                        name: "peoduct"


                    },
                    {
                        data: "quantity",
                        name: "quantity"


                    },
                    {
                        data: "color",
                        name: "color"

                    },
                    {
                        data: "size",
                        name: "size"

                    },
                    {
                        data: "totla",
                        name: "totla"

                    },
                    {
                        data: "created_at",
                        name: "created_at"

                    },




                ]



            });
        });

    </script>
@endpush

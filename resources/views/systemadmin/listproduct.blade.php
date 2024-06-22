@extends('layouts')

@section('maincontent')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $pageName }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a>Product</a></li>
                        <li class="breadcrumb-item active"><a>List</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                    <!-- Custom tabs (Charts with tabs)-->

                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#modal-cat">+ Add New Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-cat"  style="overflow:hidden;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">New Product</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/add-product" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category">
                                                <option value="" selected readonly disabled>choose Category</option>
                                                <?php
                                                    foreach ($listCat as $cat) {
                                                        ?>
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Brand [<a href="{{ url('') }}/product/create-category-brand">+ Add</a>]</label>
                                            <select class="form-control" name="brand">
                                                <option value="" selected readonly disabled>choose Brand</option>
                                                <?php
                                                    foreach ($listBrand as $brand) {
                                                        ?>
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add New Category</button>
                                    </div>
                                    </form>

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users mr-2"></i>
                                List of Product
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">

                                <table id="productList" class="table stripe table-striped table-bordered hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">SKU</th>
                                            <th class="text-center">Price (RM)</th>
                                            @if ($userinfo->role == "1" || $userinfo->role == "2")
                                                <th class="text-center">Action</th>
                                            @endif

                                            <!-- Add more columns if needed -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                            {{-- @foreach ($dataArray as $listUser) --}}

                                            <?php
                                            $c=1;
                                            foreach ($listProduct as $lc) {
                                                //$countC = count(explode(',', $lc->product_attached));
                                                ?>
                                                <tr>
                                                    <td class="text-center">{{ $c }}</td>
                                                    <td class="text-center">
                                                        @if($lc->have_variation == 0)
                                                            Single
                                                        @else
                                                            Variation
                                                        @endif
                                                    </td>
                                                    <td class="text-left">{{ $lc->product_name }}</td>
                                                    <td class="text-center">{{ $lc->sku }}</td>
                                                    <td class="text-left">
                                                        Capital:
                                                        <p class="mb-5">RM{{ number_format($lc->capital_price, 2) }}<</p>
                                                        Retail:
                                                        <p class="mb-5">RM{{ number_format($lc->retail_price, 2) }}<</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="btn btn-success mb-2" style="display: block;width: fit-content;">Delete</span>
                                                    </td>
                                                    @if ($userinfo->role == "1" || $userinfo->role == "2")
                                                        <td class="text-center">
                                                            <span class="btn btn-success mb-2" style="display: block;width: fit-content;">Edit</span>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <?php
                                                $c++;
                                            }
                                            ?>





                                    </tbody>
                                </table>
                                <script>
                                    $(document).ready(function() {
                                        $('#productList').DataTable({
                                            responsive: true,
                                            "columnDefs": [ {
                                                "targets": 0,
                                                "orderable": false
                                            } ]
                                        });
                                    });
                                </script>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->





                    <!-- TO DO List -->

                    <!-- /.card -->
                </section>
                <!-- /.Left col -->

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

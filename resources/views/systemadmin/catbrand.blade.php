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
                        <li class="breadcrumb-item active"><a>Category/Brand</a></li>
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
                                        <button class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#modal-cat">+ Add New Category</button>
                                        <button class="btn btn-primary mr-2 mb-2" data-toggle="modal" data-target="#modal-brand">+ Add New Brand</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="modal-cat">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">New Category</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/add-category" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
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

                        <div class="modal fade" id="modal-brand">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">New Brand</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/add-brand" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label>Brand Name</label>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add New Brand</button>
                                    </div>
                                    </form>

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>



                        <!-- /.modal -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users mr-2"></i>
                                List of Category
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">

                                <table id="catList" class="table stripe table-striped table-bordered hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Brand Name</th>
                                            <th class="text-center">Product Attached</th>
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
                                            foreach ($listCategory as $lc) {
                                                //$countC = count(explode(',', $lc->product_attached));
                                                ?>
                                                <tr>
                                                    <td class="text-center">{{ $c }}</td>
                                                    <td class="text-left">{{ $lc->name }}</td>
                                                    <td class="text-center">{{ $lc->product_attached }}</td>
                                                    <td class="text-center">
                                                        <span class="btn btn-success mb-2" style="display: block;width: fit-content;">Delete</span>
                                                    </td>
                                                </tr>
                                                <?php
                                                $c++;
                                            }
                                            ?>





                                    </tbody>
                                </table>
                                <script>
                                    $(document).ready(function() {
                                        $('#catList').DataTable({
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-users mr-2"></i>
                                List of Brand
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">

                                <table id="brandList" class="table stripe table-striped table-bordered hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Brand Name</th>
                                            <th class="text-center">Product Attached</th>
                                            @if ($userinfo->role == "1" || $userinfo->role == "2")
                                                <th class="text-center">Action</th>
                                            @endif

                                            <!-- Add more columns if needed -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                            {{-- @foreach ($dataArray as $listUser) --}}

                                            <?php
                                            $d=1;
                                            foreach ($listBrand as $lb) {
                                                //$countB = count(explode(',', $lb->product_attached));
                                                ?>
                                                <tr>
                                                    <td class="text-center">{{ $d }}</td>
                                                    <td class="text-left">{{ $lb->name }}</td>
                                                    <td class="text-center">{{ $lb->product_attached }}</td>
                                                    <td class="text-center">
                                                        <span class="btn btn-success mb-2" style="display: block;width: fit-content;">Delete</span>
                                                    </td>
                                                </tr>
                                                <?php
                                                $d++;
                                            }
                                            ?>





                                    </tbody>
                                </table>
                                <script>
                                    $(document).ready(function() {
                                        $('#brandList').DataTable({
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

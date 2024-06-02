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

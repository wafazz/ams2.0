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
                        <div class="modal fade" id="modal-cat">
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
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>Category [<a href="{{ url('') }}/product/create-category-brand">+ Add Category</a>]</label>
                                                    <select class="form-control" name="category" required>
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
                                                <div class="col-6">
                                                    <label>Brand [<a href="{{ url('') }}/product/create-category-brand">+ Add Brand</a>]</label>
                                                    <select class="form-control" name="brand" required>
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



                                        </div>
                                        <div class="form-group">
                                            <label>SKU</label>
                                            <input  type="text" class="form-control" name="sku" required placeholder="Product SKU">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" required placeholder="Product Name">
                                        </div>

                                        <h4>Dimension</h4>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>Weight (gram)</label>
                                                    <input type="number" class="form-control mb-3" min="1" step="1" name="weight" required placeholder="Product Weight in Gram">
                                                </div>
                                                <div class="col-6">
                                                    <label>Length (cm)</label>
                                                    <input type="number" class="form-control mb-3" min="1" step="1" name="length" required placeholder="Product Length in cm">
                                                </div>
                                                <div class="col-6">
                                                    <label>Width (cm)</label>
                                                    <input type="number" class="form-control mb-3" min="1" step="1" name="width" required placeholder="Product Width in cm">
                                                </div>
                                                <div class="col-6">
                                                    <label>Height (cm)</label>
                                                    <input type="number" class="form-control mb-3" min="1" step="1" name="height" required placeholder="Product Height in cm">
                                                </div>
                                            </div>



                                        </div>

                                        <h4>Pricing</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>Capital (RM)</label>
                                                    <input type="number" class="form-control mb-3" min="1" step="0.01" name="capital" required placeholder="Product Capital Price (RM)">
                                                </div>
                                                <div class="col-6">
                                                    <label>Retails (RM)</label>
                                                    <input type="number" class="form-control mb-3" min="1" step="0.01" name="retail" required placeholder="Product Retail Price (RM)">
                                                </div>

                                                <?php

                                                //foreach ($dataSetting as $ds) {

                                                    //dd($dataSetting->level_usage);

                                                    $maxR = $dataSetting->level_usage;



                                                    $maxRR = $maxR + 4;

                                                    for($d=1; $d<=$maxRR; $d++){
                                                        if($d >= "5" AND $d<=$maxRR){
                                                            $roleName = "role_".$d;
                                                            ?>
                                                             <div class="col-6">
                                                                <label>{{ $dataSetting->$roleName }} (RM)</label>
                                                                <input type="number" class="form-control mb-3" min="1" step="0.01" name="lp[]" required placeholder="{{ $dataSetting->$roleName }} Price (RM)">
                                                            </div>
                                                            <?php
                                                        }
                                                    }

                                                //}
                                                ?>
                                            </div>



                                        </div>

                                        <h4>Image</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>Product Image 1 (Mandatory)</label>
                                                    <input type="file" class="form-control mb-3" min="1" step="1" name="productimg[]" required>
                                                </div>
                                                <div class="col-6">
                                                    <label>Product Image 2 (optional)</label>
                                                    <input type="file" class="form-control mb-3" min="1" step="1" name="productimg[]">
                                                </div>
                                                <div class="col-6">
                                                    <label>Product Image 3 (optional)</label>
                                                    <input type="file" class="form-control mb-3" min="1" step="1" name="productimg[]">
                                                </div>
                                                <div class="col-6">
                                                    <label>Product Image 4 (optional)</label>
                                                    <input type="file" class="form-control mb-3" min="1" step="1" name="productimg[]">
                                                </div>

                                            </div>



                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add New Product</button>
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

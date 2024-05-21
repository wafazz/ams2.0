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
                        <li class="breadcrumb-item active"><a>User&Member</a></li>
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
                                List of User/Member
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">+ Add New User</button>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:20px;">
                                    <div class="col-lg-12">
                                        @if(empty($level))
                                            <button class="btn btn-info mb-2 mr-2 active">All</button>
                                        @else
                                            <button class="btn btn-info mb-2 mr-2" onclick="window.location.href = '{{ url('user') }}?level=all'">All</button>
                                        @endif
                                        <?php
                                        $max = $dataSetting->level_usage + 4;
                                            for($x=1; $x<=$max; $x++){
                                                $newRole = ($x);
                                                $rolee = "role_".$newRole;
                                                if($userinfo->role <= $newRole && $newRole >= "2"){
                                                    ?>
                                                    @if($level == $newRole)
                                                        <button class="btn btn-info mb-2 mr-2 active">{{ $dataSetting->$rolee }}</button>
                                                    @else
                                                        <button class="btn btn-info mb-2 mr-2" onclick="window.location.href = '{{ url('user') }}?level={{ $newRole }}'">{{ $dataSetting->$rolee; }}</button>
                                                    @endif
                                                    <?php
                                                }

                                            }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">New Registration</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Designation/Level</label>
                                            <select name="designation" id="designation" class="form-control" required>
                                                <option value="" selected disabled>choose Designation/Level</option>
                                                <?php
                                                    $max2 = $dataSetting->level_usage + 4;
                                                    for($xt=1; $xt<=$max2; $xt++){

                                                        if($xt > $userinfo->role){
                                                            $theLevel = "role_".$xt;
                                                            ?>
                                                            <option value="<?php echo $xt; ?>">{{ $dataSetting->$theLevel }}</option>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off"
                                            value="{{ old('email') }}" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>

                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>

                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control @error('password') is-invalid @enderror" required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>

                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select name="country" id="country" class="form-control" required>
                                                <option value="" selected disabled>choose country</option>
                                                <option value="1" >Malaysia</option>
                                                <option value="2" >Singapore</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <div style="position:relative;">
                                                <input type="text" id="protectedInput" name="phone" class="form-control" style="padding-left:26px;" value="" required disabled oninput="protectInput()">
                                                <span id="cc" style="position: absolute;
                                                top: 7px;
                                                left: 10px;"></span>
                                            </div>

                                            <small class="text-danger" id="remark"><i>Please select country first.</i></small>
                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Register Now</button>
                                    </div>
                                    </form>
                                    <script>

                                        $(document).ready(function() {
                                            $('#country').change(function(){
                                                var country = $(this).val();

                                                //alert(country);

                                                if(country == "1"){
                                                    $("#cc").html("60");
                                                    $("#protectedInput").prop("disabled", false);
                                                    $("#remark").text("");
                                                }else if(country == "2"){
                                                    $("#cc").html("65");
                                                    $("#protectedInput").prop("disabled", false);
                                                    $("#remark").text("");
                                                }
                                            });
                                        });
                                    </script>
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
                                List of User/Member
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">

                                <table id="userList" class="table stripe table-striped table-bordered hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th class="text-center">User ID</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Role</th>
                                            @if ($userinfo->role == "1" || $userinfo->role == "2")
                                                <th class="text-center">Action</th>
                                            @endif

                                            <!-- Add more columns if needed -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                            {{-- @foreach ($dataArray as $listUser) --}}
                                                @for ($u=0; $u<$countUser; $u++)

                                                <tr>
                                                    <td class="text-center">
                                                        {{ date("jS F Y, h:i A", strtotime($dataArray[$u]["reg_date"])) }}
                                                        <br>
                                                        <img src="{{ url('') }}/{{ $dataArray[$u]["photo"] }}" style="max-width: 100px;
                                                        width: 100px;"></td>
                                                    <td class="text-center"><a href="{{ url('') }}/profile?id={{ $dataArray[$u]["id"] }}">#{{ $dataArray[$u]["id"] }}</a></td>
                                                    <td>{{ $dataArray[$u]["name"] }}</td>
                                                    <td class="text-center">{{ $dataArray[$u]["email"] }}</td>
                                                    <td class="text-center"><span class="active btn btn-secondary mb-2" style="display: block;width: fit-content;">{{ $dataArray[$u]["role"] }}</span>
                                                    <?php
                                                        if($dataArray[$u]["status"] == 1){
                                                            ?>
                                                            <span class="btn btn-success active mb-2" style="display: block;width: fit-content;">ACTIVE</span>
                                                            <?php
                                                        }else if($dataArray[$u]["status"] == 0){
                                                            ?>
                                                            <span class="btn btn-primary active mb-2" style="display: block;width: fit-content;">INACTIVE</span>
                                                            <?php
                                                        }else if($dataArray[$u]["status"] == 2){
                                                            ?>
                                                            <span class="btn btn-warning active mb-2" style="display: block;width: fit-content;">BANNED</span>
                                                            <?php
                                                        }
                                                    ?>
                                                    </td>
                                                    @if ($userinfo->role == "1" || $userinfo->role == "2")
                                                    <td class="text-center">
                                                        <span class="btn btn-info mr-2 mb-2" onclick="window.location.href = '{{ url('') }}/profile?id={{ $dataArray[$u]['id'] }}'"><i class="far fa-eye"></i></span>
                                                        <?php
                                                        if($dataArray[$u]["status"] == 1){
                                                            ?>
                                                            <span class="btn btn-danger mr-2 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Banned this User" onclick="window.location.href = '{{ url('') }}/banned-user/{{ $dataArray[$u]['id'] }}'"><i class="fas fa-ban"></i></span>
                                                            <?php
                                                        }else if($dataArray[$u]["status"] == 0){
                                                            ?>
                                                            <span class="btn btn-primary mr-2 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Activate this User" onclick="window.location.href = '{{ url('') }}/activate-user/{{ $dataArray[$u]['id'] }}'"><i class="fas fa-check"></i></span>
                                                            <?php
                                                        }else if($dataArray[$u]["status"] == 2){
                                                            ?>
                                                            <span class="btn btn-success mr-2 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Unbanned this User" onclick="window.location.href = '{{ url('') }}/unbanned-user/{{ $dataArray[$u]['id'] }}'"><i class="fas fa-undo-alt"></i></span>
                                                            <?php
                                                        }
                                                    ?>

                                                    </td>
                                                    @endif
                                                </tr>
                                                @endfor


                                            {{-- @endforeach --}}


                                    </tbody>
                                </table>
                                <script>
                                    $(document).ready(function() {
                                        $('#userList').DataTable({
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

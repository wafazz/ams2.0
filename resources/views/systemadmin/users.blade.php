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
                                        <button class="btn btn-primary">+ Add New User</button>
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
                                                        <button class="btn btn-info mb-2 mr-2 active">{{ $dataSetting->$rolee; }}</button>
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
                                                    <td class="text-center"><img src="{{ url('') }}/{{ $dataArray[$u]["photo"] }}" style="max-width: 100px;
                                                        width: 100px;"></td>
                                                    <td class="text-center"><a href="{{ url('') }}/user-details/{{ $dataArray[$u]["id"] }}">#{{ $dataArray[$u]["id"] }}</a></td>
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
                                                        <span class="btn btn-info mr-2 mb-2" onclick="window.location.href = '{{ url('') }}/user-details/{{ $dataArray[$u]['id'] }}'"><i class="far fa-eye"></i></span>
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

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
                        <li class="breadcrumb-item active"><a>Profile</a></li>
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
                <section class="col-lg-5 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-images mr-2"></i>
                                Profile Image
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <img src="{{ url('') }}/{{ $dataPI }}" style="max-width: 300px;
                                display: block;
                                width: calc(100% - 40px);
                                margin-left: auto;
                                margin-right: auto;">
                                <button class="btn btn-primary @error('image') is-invalid @enderror" id="openchangePI" style="display: block;
                                margin-top: 20px;
                                margin-left: auto;
                                margin-right: auto;width: 100%;">Change Profile Image</button>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button class="btn btn-danger" id="closechangePI" style="display: none;
                                margin-top: 20px;
                                margin-bottom: 10px;
                                margin-left: auto;
                                margin-right: auto;width: 100%;">Close</button>

                                <form action="" id="uploadForm" style="display:none;" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Upload New Profile Image</label>
                                        <div class="custom-file">
                                            <input type="file" name="newProfileImage" id="exampleInputFile" class="custom-file-input ">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            <span style="color:red;">Only format jpeg, jpg, png & gif allowed to upload.</span>

                                        </div>
                                    </div>
                                    <div class="form-group" id="divPreview" style="display:none;">
                                        <label for="exampleInputFile">Preview Image</label>
                                        <div>
                                            <img id="imagePreview" src="#" alt="Preview Image" style="max-width: 100%; max-height: 200px; display: none;">
                                            <script>
                                                document.getElementById('exampleInputFile').addEventListener('change', function() {
                                                    var file = this.files[0];
                                                    if (file) {
                                                        var reader = new FileReader();
                                                        reader.onload = function(event) {
                                                            document.getElementById('imagePreview').src = event.target.result;
                                                            document.getElementById('imagePreview').style.display = 'block';
                                                            document.getElementById('divPreview').style.display = 'block';
                                                        };
                                                        reader.readAsDataURL(file);
                                                    } else {
                                                        document.getElementById('imagePreview').src = '#';
                                                        document.getElementById('imagePreview').style.display = 'none';
                                                        document.getElementById('divPreview').style.display = 'none';
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <button type="submit" name="submitUpload" class="btn btn-secondary">Upload Now</button>
                                </form>

                                <script>
                                    $( document ).ready(function() {
                                        $("#openchangePI").click(function(){
                                            $(this).hide();
                                            $('#closechangePI').show();
                                            $('#uploadForm').show();
                                        });

                                        $("#closechangePI").click(function(){
                                            $(this).hide();
                                            $('#openchangePI').show();
                                            $('#uploadForm').hide();
                                        });
                                    });
                                </script>

                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- DIRECT CHAT -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-id-badge mr-1"></i> Data Sponsor</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="tab-content p-0 text-center">

                                    @foreach($dataSP as $key => $value)

                                        <div class="form-group">


                                            @if ($key == "image")
                                                <img src="{{ url('') }}/{{ $value }}" style="max-width: 200px;
                                                display: block;
                                                width: calc(100% - 40px);
                                                margin-left: auto;
                                                margin-right: auto;border-radius:100%;">
                                            @else
                                                <label class="col-lg-12" style="margin-bottom: 0px !important;">{{ ucfirst("$key") }}</label>
                                                <strong class="btn btn-info">{{ $value }}</strong>
                                            @endif

                                        </div>
                                    @endforeach

                                <!-- /.direct-chat-msg -->

                            </div>
                            <!--/.direct-chat-messages-->


                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!--/.direct-chat -->

                    <!-- TO DO List -->

                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-7 ">

                    <!-- Map card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user mr-1"></i> Your Details</h3>

                        <span style="position: absolute;
                        right: 10px !important;cursor:pointer;" id="editDetails"><div id="open1"><i class="fas fa-edit"></i> edit</div><div id="close1" style="display:none;"><i class="fas fa-edit"></i> close</div></span>
                        <input type="hidden" value="0" id="openclose">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <style>
                                .hide-span{
                                    display: none;
                                }
                            </style>
                            <div class="tab-content p-0 text-left">

                                <form action="{{ url('') }}/update-profile" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>Email:</label>
                                        <span class="form-control">
                                            <strong>{{ $userinfo->email }}</strong>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Full Name <span class="req" style="color:red;display:none;">*</span>:</label>
                                        <input type="text" disabled name="full_name" class="form-control" style="cursor:no-drop;" value="{{ $userinfo->full_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number <span class="req" style="color:red;display:none;">*</span>:</label>
                                        <input type="text" disabled name="phone_no" class="form-control" style="cursor:no-drop;" value="{{ $userinfo->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Address Line 1 <span class="req" style="color:red;display:none;">*</span>:</label>
                                        <input type="text" disabled name="address_1" class="form-control" style="cursor:no-drop;" value="{{ $userinfo->address_1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Address Line 2 <span class="req" style="display:none;">(optional)</span>:</label>
                                        <input type="text" disabled name="address_2" class="form-control" style="cursor:no-drop;" value="{{ $userinfo->address_2 }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Postcode <span class="req" style="color:red;display:none;">*</span>:</label>
                                        <input type="text" disabled name="postcode" class="form-control" style="cursor:no-drop;" value="{{ $userinfo->postcode }}">
                                    </div>
                                    <div class="form-group">
                                        <label>City <span class="req" style="color:red;display:none;">*</span>:</label>
                                        <input type="text" disabled name="city" class="form-control" style="cursor:no-drop;" value="{{ $userinfo->postcode }}">
                                    </div>
                                    <div class="form-group">
                                        <label>State <span class="req" style="color:red;display:none;">*</span>:</label>
                                        <select type="text" disabled name="state" class="form-control" style="cursor:no-drop;">
                                            <option value="">select your state</option>
                                            @foreach ($states as $state)
                                                @if($userinfo->state == $state->name)
                                                    <option value="{{ $state->name }}" selected>{{ $state->name }}</option>
                                                @else
                                                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Country <span class="req" style="color:red;display:none;">*</span>:</label>
                                        <select type="text" disabled name="country" class="form-control" style="cursor:no-drop;">
                                            <option value="">select your country</option>

                                                @if($userinfo->country == "Malaysia")
                                                    <option value="Malaysia" selected>Malaysia</option>
                                                @else
                                                    <option value="Malaysia">Malaysia</option>
                                                @endif

                                                @if($userinfo->country == "Singapore")
                                                    <option value="Singapore" selected>Singapore</option>
                                                @else
                                                    <option value="Singapore">Singapore</option>
                                                @endif

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" disabled type="submit" name="saveProfile"><i class="fa fa-save"></i> Save Profile</button>
                                    </div>

                                </form>


                                <!-- /.direct-chat-msg -->

                            </div>
                            <!--/.direct-chat-messages-->

                            <script>
                                $( document ).ready(function() {
                                    $("#editDetails").click(function(){
                                        var openclose = $("#openclose").val();

                                        if(openclose == 0){
                                            $('input[name="full_name"]').prop({"disabled": false, "required": true}).css("cursor", "pointer");
                                            $('input[name="phone_no"]').prop({"disabled": false, "required": true}).css("cursor", "pointer");
                                            $('input[name="address_1"]').prop({"disabled": false, "required": true}).css("cursor", "pointer");
                                            $('input[name="address_2"]').prop({"disabled": false, "required": false}).css("cursor", "pointer");
                                            $('input[name="postcode"]').prop({"disabled": false, "required": true}).css("cursor", "pointer");
                                            $('input[name="city"]').prop({"disabled": false, "required": true}).css("cursor", "pointer");
                                            $('select[name="state"]').prop({"disabled": false, "required": true}).css("cursor", "pointer");
                                            $('select[name="country"]').prop({"disabled": false, "required": true}).css("cursor", "pointer");
                                            $('button[name="saveProfile"]').prop({"disabled": false}).css("cursor", "pointer");
                                            $('#open1').hide();
                                            $('#close1').show().css("color", "red");
                                            $("#openclose").val("1");
                                            $(".req").show();
                                        }else{
                                            $('input[name="full_name"]').prop({"disabled": true, "required": false}).css("cursor", "no-drop");
                                            $('input[name="phone_no"]').prop({"disabled": true, "required": false}).css("cursor", "pointer");
                                            $('input[name="address_1"]').prop({"disabled": true, "required": false}).css("cursor", "pointer");
                                            $('input[name="address_2"]').prop({"disabled": true, "required": false}).css("cursor", "pointer");
                                            $('input[name="postcode"]').prop({"disabled": true, "required": false}).css("cursor", "pointer");
                                            $('input[name="city"]').prop({"disabled": true, "required": false}).css("cursor", "pointer");
                                            $('select[name="state"]').prop({"disabled": true, "required": false}).css("cursor", "pointer");
                                            $('select[name="country"]').prop({"disabled": true, "required": false}).css("cursor", "pointer");
                                            $('button[name="saveProfile"]').prop({"disabled": true}).css("cursor", "no-drop");
                                            $('#open1').show();
                                            $('#close1').hide().css("color", "red");
                                            $("#openclose").val("0");
                                            $(".req").hide();
                                        }

                                    });

                                });
                            </script>


                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!--/.direct-chat -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-lock mr-1"></i> Password</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="{{ url("") }}/change-password" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label>Current Password <span class="req" style="color:red;display:inline-block;">*</span>:</label>
                                    <input type="password"  name="current_password" class="form-control" placeholder="Current Password">
                                </div>
                                <div class="form-group">
                                    <label>New Password <span class="req" style="color:red;display:inline-block;">*</span>:</label>
                                    <input type="password"  name="new_password" class="form-control" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm New Password <span class="req" style="color:red;display:inline-block;">*</span>:</label>
                                    <input type="password"  name="new_password_confirmation" class="form-control" placeholder="Confirm New Password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save Password</button>
                                </div>

                            </form>

                        </div>
                    </div>
                    <!-- solid sales graph -->
                    
                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

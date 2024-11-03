<?php
session_start();
if (isset($_SESSION['email'])  AND isset($_SESSION['key']) )
    echo " ";
else {
    header("location:../index.php");

}



if ($_SERVER["REQUEST_METHOD"] == "GET") {


    $get_id=$_GET['id'];
    include ("../db_connect.php");
    include('../my_function.php');
    $query = mysqli_query($con, "SELECT * FROM owner WHERE owner_id='$get_id'");
    $row = mysqli_fetch_assoc($query);


}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    include ("../db_connect.php");
    $owner_id = $_POST['owner_id'];
    $owner_name = $_POST['owner_name'];
    $owner_email = $_POST['owner_email'];
    $owner_phone = $_POST['owner_phone'];
    $owner_address = $_POST['owner_address'];
    $owner_password = $_POST['owner_password'];


    $query = mysqli_query($con, "SELECT * FROM owner WHERE owner_id='$owner_id'");
    $row = mysqli_fetch_assoc($query);


    $sql = mysqli_query($con, "Update owner SET owner_name='$owner_name',owner_email='$owner_email',owner_cell='$owner_phone',owner_address='$owner_address',owner_password='$owner_password' WHERE owner_id='$owner_id'");

    if ($sql) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire("Successfully Updated!","Done!","success");';
        echo '}, 500);</script>';

        echo '<script type="text/javascript">';
        echo "setTimeout(function () { window.open('owners.php','_self')";
        echo '}, 1500);</script>';

    } else {// display the error message
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire("ERROR!","Something Wrong!","error");';
        echo '}, 500);</script>';


    }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Owner Profile</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../plugins/jquery.min/jquery.min.js"></script>


    <!--Preloader-->
    <link rel="stylesheet" href="../dist/css/preloader.css">
    <script src="../dist/js/preloader.js"></script>


    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">


    <!-- Bootstrap core CSS     -->
    <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="se-pre-con"></div>
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-light-blue sidebar-blue  elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="../dist/img/AdminLTELogo.png"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="owners.php" class="nav-link active">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Owners

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="shop_information.php" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                All Shop

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="edit_admin.php" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Profile

                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">


                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">

                            <h3 class="card-title">Owner information</h3>

                        </div>


                        <form role="form" id="quickForm" method="post" action="edit_owner.php">
                            <div class="card-body">

                                <div class="form-group">

                                    <input type="hidden" name="owner_id" class="form-control" id="exampleInputOwnerName"
                                           value="<?php echo $row['owner_id'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputOwnerName">Owner Name</label>
                                    <input type="text" name="owner_name" class="form-control" id="exampleInputOwnerName"
                                           value="<?php echo $row['owner_name'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address <small>[Not Editable]</small> </label>
                                    <input type="email" name="owner_email" class="form-control" id="exampleInputEmail1"
                                           readonly
                                           value="<?php echo $row['owner_email'] ?>">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPhone">Phone Number <small>[Not Editable]</small> </label>
                                    <input type="tel" name="owner_phone" class="form-control" id="exampleInputPhone"
                                           readonly
                                           value="<?php echo $row['owner_cell'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputAddress">Owner Address</label>
                                    <input type="text" name="owner_address" class="form-control"
                                           id="exampleInputAddress"
                                           value="<?php echo $row['owner_address'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword">Owner Password</label>
                                    <input type="password" name="owner_password" class="form-control"
                                           id="exampleInputPassword" minlength="4"
                                           value="<?php echo $row['owner_password'] ?>">
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" id="update_owner" class="btn btn-primary"><i
                                            class="fa fa-check-circle"></i> Update Profile
                                </button>
                            </div>
                        </form>


                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">

    $(document).on('click', '#update_owner', function (e) {


        $('#quickForm').validate({
            rules: {

                owner_name: {
                    required: true
                },
                owner_email: {
                    required: true,
                    email: true,
                },
                owner_phone: {
                    required: true
                },
                owner_address: {
                    required: true
                },
                owner_password: {
                    required: true
                },


            },
            messages: {
                owner_name: {
                    required: "Please enter owner name"
                },
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address"
                },
                owner_phone: {
                    required: "Please enter owner phone number"
                },
                owner_address: {
                    required: "Please enter owner address"
                },

                owner_password: {
                    required: "Please enter password"
                },

            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });


</script>


<script type="text/javascript">

    $(document).on('click', '#update_owner', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Want to update ?',
            text: 'Are you sure?',
            icon: 'warning',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Update it!',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {

                $('#quickForm').submit();

            }
        })

    });
</script>


</body>
</html>

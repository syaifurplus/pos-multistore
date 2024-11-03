<?php
session_start();
if (isset($_SESSION['email'])  AND isset($_SESSION['key']) )
    echo " ";
else {
    header("location:../index.php");

}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include ("../db_connect.php");

    $shop_name = $_POST['shop_name'];
    $shop_email = $_POST['shop_email'];
    $shop_phone = $_POST['shop_phone'];
    $shop_address = $_POST['shop_address'];
    $shop_currency = $_POST['shop_currency'];
    $shop_status = $_POST['shop_status'];
    $owner_id = $_POST['owner_id'];


    $result = mysqli_query($con, "SELECT * FROM shop WHERE shop_name='$shop_name' OR shop_email='$shop_email' OR shop_contact='$shop_phone' AND shop_owner_id='$owner_id'");
    $num_rows = mysqli_num_rows($result);


    if ($num_rows > 0) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire("ERROR!","Shop already exists!","error");';
        echo '}, 500);</script>';
    } else {
        if (mysqli_query($con, "INSERT INTO shop (`shop_name`,`shop_email`,`shop_contact`,`shop_address`,`currency_symbol`,`shop_status`,`shop_owner_id`) VALUE ('$shop_name','$shop_email','$shop_phone','$shop_address','$shop_currency','$shop_status','$owner_id')")) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire("Shop Successfully Added!","Done!","success");';
            echo '}, 500);</script>';

            echo '<script type="text/javascript">';
            echo "setTimeout(function () { window.open('shop_information.php','_self')";
            echo '}, 1500);</script>';

        } else {// display the error message
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire("ERROR!","Something Wrong!","error");';
            echo '}, 500);</script>';
        }


    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Shop</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../plugins/jquery.min/jquery.min.js"></script>

    <!--Preloader-->
    <link rel="stylesheet" href="../dist/css/preloader.css">
    <script src="../dist/js/preloader.js"></script>

    <script src="../plugins/jquery.min/jquery.min.js"></script>
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


    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

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
                        <a href="owners.php" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Owners

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="shop_information.php" class="nav-link active">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                All Shop

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="edit_admin.php" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
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

                            <h3 class="card-title">Add shop information</h3>

                        </div>


                        <form role="form" id="quickForm" method="post" action="add_shop.php">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputCustomerName">Shop Name</label>
                                    <input type="text" name="shop_name" class="form-control" id="exampleInputshopName"
                                           placeholder="Enter shop Name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Shop Email Address</label>
                                    <input type="email" name="shop_email" class="form-control" id="exampleInputEmail1"
                                           placeholder="Enter email address">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPhone">Shop Phone Number</label>
                                    <input type="tel" name="shop_phone" class="form-control" id="exampleInputPhone"
                                           placeholder="Enter phone number">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputAddress">Shop Address</label>
                                    <input type="text" name="shop_address" class="form-control" id="exampleInputAddress"
                                           placeholder="Enter shop address">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputAddress">Shop Currency Symbol</label>
                                    <input type="text" name="shop_currency" class="form-control"
                                           id="exampleInputAddress" maxlength="3"
                                           placeholder="Enter shop currency symbol">
                                </div>


                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="exampleShopStatus">Shop Status</label>
                                        <select class="form-control" name="shop_status" id="exampleShopStatus">

                                            <option value="OPEN">OPEN</option>
                                            <option value="CLOSED">CLOSED</option>

                                        </select>


                                    </div>
                                </div>



                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="exampleInputSupplier">Select Shop Owner</label>
                                        <select class="form-control" name="owner_id">

                                            <?php
                                            include('../db_connect.php');

                                            $result = mysqli_query($con, "SELECT * FROM owner");
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<option value='" . $row['owner_id'] . "'>" . $row['owner_name'] . "</option>";

                                            }
                                            echo "</select>";

                                            ?>
                                    </div>
                                </div>



                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="reset" class="btn btn-dark"><i class="fa fa-times-circle"></i> Reset
                                </button>
                                <button type="submit" id="add_shop" class="btn btn-primary"><i
                                            class="fa fa-check-circle"></i> Add shop
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

    <!-- /.control-sidebar -->
</div>


<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">

    $(document).on('click', '#add_shop', function (e) {


        $('#quickForm').validate({
            rules: {

                shop_name: {
                    required: true
                },
                shop_email: {
                    required: true,
                    email: true,
                },
                shop_phone: {
                    required: true
                },
                shop_address: {
                    required: true
                },
                shop_currency: {
                    required: true
                },


            },
            messages: {
                shop_name: {
                    required: "Please enter shop name"
                },
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address"
                },
                shop_phone: {
                    required: "Please enter shop phone number"
                },
                shop_address: {
                    required: "Please enter shop address"
                },
                shop_currency: {
                    required: "Please enter shop currency symbol"
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

    $(document).on('click', '#add_shop', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Want to add ?',
            text: 'Are you sure?',
            icon: 'warning',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
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
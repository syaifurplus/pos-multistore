<?php
session_start();
if (isset($_SESSION['email']) and isset($_SESSION['key']))
    echo " ";
else {
    header("location:index.php");

}


?>


<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Owners</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../plugins/jquery.min/jquery.min.js"></script>
    <!--Preloader-->
    <link rel="stylesheet" href="../dist/css/preloader.css">
    <script src="../dist/js/preloader.js"></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

    <!--For data export and print button css-->
    <link rel="stylesheet" href="../dist/css/buttons.dataTables.min.css">

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
                    <div class="col-sm-6">


                    </div>

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
                            <button type="button" onclick="location.href = 'add_owner.php';"
                                    class="btn btn-primary float-right"><i class='fas fa-plus-circle'></i> Add Owner
                            </button>
                            <h3 class="card-title">All shop owners information</h3>

                        </div>


                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Owner Name</th>
                                    <th>Owner Email</th>
                                    <th>Owner Phone</th>
                                    <th>Owner Address</th>
                                    <th>Status</th>

                                    <th>Action</th>


                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                include('../db_connect.php');
                                $sql = "SELECT * FROM owner ORDER BY owner_id DESC";
                                $result = mysqli_query($con, $sql);
                                $i = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";

                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $row['owner_name'] . "</td>";
                                    echo "<td>" . $row['owner_email'] . "</td>";
                                    echo "<td>" . $row['owner_cell'] . "</td>";
                                    echo "<td>" . $row['owner_address'] . "</td>";

                                    if ($row['owner_status']==0)
                                    {
                                        echo "<td><a class='btn btn-success'  href=\"active_owner.php?id=" . $row['owner_id'] . "\" ><i class='fas fa-check-circle'></i> Active</a></td> ";
                                    }
                                    else
                                    {
                                        echo "<td><a class='btn btn-danger'  href=\"inactive_owner.php?id=" . $row['owner_id'] . "\" ><i class='fas fa-times-circle'></i> Inactive</a></td> ";
                                    }

                                    echo "<td><a class='btn btn-primary'  href=\"edit_owner.php?id=" . $row['owner_id'] . "\" ><i class='fas fa-edit'></i></a>  ";
                                    echo "<a class='confirmation btn btn-danger'  href=\"delete_owner.php?id=" . $row['owner_id'] . "\" ><i class='fas fa-trash'></i></a></td>";


                                    $i++;

                                    echo "</tr> ";
                                }

                                echo " </tbody>";
                                echo " </table>";

                                ?>
                        </div>
                        <!-- /.card-body -->
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
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<!-- page script for export data from data tables -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": true,

            dom: 'Bfrtip',
            buttons: [

                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'pdfHtml5',

                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },

                {
                    extend: 'print',
                    message: '<?php echo 'Print Time: '. date(" h:m a d F, Y")?>',
                    title: '<p align="center">Owner List</p>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },


            ]


        });

    });
</script>


<script>
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>


<!--For data export and print-->
<script src="../plugins/buttons/dataTables.buttons.min.js"></script>
<script src="../plugins/buttons/jszip.min.js"></script>
<script src="../plugins/buttons/pdfmake.min.js"></script>
<script src="../plugins/buttons/vfs_fonts.js"></script>
<script src="../plugins/buttons/buttons.html5.min.js"></script>
<script src="../plugins/buttons/buttons.print.min.js"></script>
<!--For data export and print-->

</body>
</html>

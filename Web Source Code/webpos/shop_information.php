<?php
session_start();
if (isset($_SESSION['owner_email']) and isset($_SESSION['key'])) {

    include('db_connect.php');
    $status = $_SESSION['status'];
    $owner_id = $_SESSION['owner_id'];
    $email = $_SESSION['owner_email'];
    $result = mysqli_query($con, "SELECT * FROM owner WHERE owner_status=1 AND owner_email='$email'");

    if (mysqli_num_rows($result) == 1)
        echo " ";
    else
        header("location:index.php");
} else {
    header("location:index.php");

}


?>


<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shop Information</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="plugins/jquery.min/jquery.min.js"></script>
    <!--Preloader-->
    <link rel="stylesheet" href="dist/css/preloader.css">
    <script src="dist/js/preloader.js"></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="dist/img/AdminLTELogo.png"
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
                        <a href="customers.php" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Customers

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="suppliers.php" class="nav-link">
                            <i class="nav-icon fas fa-people-carry"></i>
                            <p>
                                Suppliers

                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="category.php" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Products Category

                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="products.php" class="nav-link">
                            <i class="nav-icon fas fa-shopping-bag"></i>
                            <p>
                                Products

                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="orders.php" class="nav-link">
                            <i class="nav-icon fas fa-sort-amount-up"></i>
                            <p>
                                Orders

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="expense.php" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>
                                Expense
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Reports
                                <i class="right fas fa-angle-left"></i>

                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="sales_report.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sales Report</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="sales_report_by_date.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sales Report By Date</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="expense_report.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Expense Report</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="expense_report_by_date.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Expense Report By Date</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="sales_chart.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sales Chart </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="expense_chart.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Expense Chart</p>
                                </a>
                            </li>

                        </ul>


                    </li>

                    <li class="nav-item has-treeview menu-open">
                        <a href="products.php" class="nav-link active">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Settings
                                <i class="right fas fa-angle-left"></i>

                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="shop_information.php" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Shop Information</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="all_users.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="edit_owner.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Owner Profile</p>
                                </a>
                            </li>
                        </ul>

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

                            <h3 class="card-title">All Shop information</h3>

                        </div>


                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Shop Name</th>
                                    <th>Shop Email</th>
                                    <th>Shop Phone</th>
                                    <th>Shop Address</th>
                                    <th>Currency Symbol</th>
                                    <th>Shop Status</th>
                                    <?php
                                    $user_type = $_SESSION['user_type'];
                                    if ($user_type == 'admin') {


                                        ?>
                                        <th>Action</th>

                                        <?php
                                    }
                                    ?>
                                </tr>
                                </thead>
                                <tbody>

                                <?php


                                $sql = "SELECT * FROM shop WHERE shop_owner_id='$owner_id' ORDER BY shop_id DESC";
                                $result = mysqli_query($con, $sql);
                                $i = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";

                                    echo "<td>" . $i . "</td>";
                                    echo "<td><button class='btn btn-primary'/> <i class='fas fa-store-alt'></i> " . $row['shop_name'] . " ";
                                    echo "<td>" . $row['shop_email'] . "</td>";
                                    echo "<td>" . $row['shop_contact'] . "</td>";
                                    echo "<td>" . $row['shop_address'] . "</td>";
                                    echo "<td>" . $row['currency_symbol'] . "</td>";

                                    if ($row['shop_status'] == 'OPEN') {
                                        echo "<td><button class='btn btn-success'/> <i class='fas fa-check-circle'></i> OPEN ";

                                    } else {
                                        echo "<td><button class='btn btn-danger'/> <i class='fas fa-times-circle'></i> CLOSED ";

                                    }

                                    if ($user_type == 'admin') {

                                        echo "<td><a class='btn btn-primary'  href=\"edit_shop.php?id=" . $row['shop_id'] . "\" ><i class='fas fa-edit'></i></a>  ";
                                    }

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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>


<script>
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>


</body>
</html>

<?php
session_start();
if (isset($_SESSION['email']) and isset($_SESSION['key']))
    echo " ";
else {
    header("location:../index.php");

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Dashboard </title>


    <!--chart-->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <script src="../plugins/jquery.min/jquery.min.js"></script>
    <script src="../plugins/morris/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>

    <!--Preloader-->
    <link rel="stylesheet" href="../dist/css/preloader.css">
    <script src="../dist/js/preloader.js"></script>


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
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
            <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="dashboard.php" class="nav-link active">
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
        <br>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <?php
                include('../db_connect.php');
                $count_customer = mysqli_query($con, "SELECT * FROM customers");
                $total_customer = mysqli_num_rows($count_customer);

                $count_owner = mysqli_query($con, "SELECT * FROM owner");
                $total_owner = mysqli_num_rows($count_owner);


                $count_shop = mysqli_query($con, "SELECT * FROM shop");
                $total_shop = mysqli_num_rows($count_shop);


                $count_suppliers = mysqli_query($con, "SELECT * FROM suppliers");
                $total_suppliers = mysqli_num_rows($count_suppliers);


                $count_products = mysqli_query($con, "SELECT * FROM products");
                $total_products = mysqli_num_rows($count_products);

                $count_order = mysqli_query($con, "SELECT * FROM order_list");
                $total_orders = mysqli_num_rows($count_order);


                ?>

                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $total_owner ?></h3>

                                <p>Total Owners</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="owners.php" class="small-box-footer">More Details <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $total_shop ?></h3>

                                <p>Total Shop</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="shop_information.php" class="small-box-footer">More Details <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-navy">
                            <div class="inner">
                                <h3><?php echo $total_products ?></h3>

                                <p>Total Products</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $total_orders ?></h3>

                                <p>Total Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->


                </div>


                <div class="row">
                    <div class="col-lg-6">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Latest Shop</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Address</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        include('../my_function.php');
                                        $currency = getCurrency();

                                        $sql = "SELECT * FROM shop ORDER BY shop_id DESC";
                                        $result = mysqli_query($con, $sql);
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {

                                            if ($i > 5) {
                                                break;
                                            }
                                            echo "<tr>";

                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['shop_name'] . "  <span class=\"badge bg-danger\">NEW</span></td> ";
                                            echo "<td>" . $row['shop_contact'] . "</td>";
                                            echo "<td>" . $row['shop_address'] . "</td>";


                                            $i++;

                                            echo "</tr> ";
                                        }

                                        echo " </tbody>";
                                        echo " </table>";

                                        ?>

                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="button" onclick="location.href = 'shop_information.php';"
                                        class="btn btn-sm btn-primary float-right"><i class='fas fa-eye'></i> View All
                                    Shop
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </div>

                        <!-- /.card -->
                    </div>


                    <div class="col-lg-6">
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Latest Shop Owners</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Address</th>



                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php


                                        $sql = "SELECT * FROM owner ORDER BY owner_id DESC";
                                        $result = mysqli_query($con, $sql);
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                            if ($i > 5) {
                                                break;
                                            }

                                            echo "<tr>";

                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row['owner_name'] . "  <span class=\"badge bg-danger\">NEW</span></td> ";
                                            echo "<td>" . $row['owner_cell'] . "</td>";
                                            echo "<td>" . $row['owner_address'] . "</td>";

                                            $i++;

                                            echo "</tr> ";
                                        }

                                        echo " </tbody>";
                                        echo " </table>";

                                        ?>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="button" onclick="location.href = 'owners.php';"
                                        class="btn btn-sm btn-primary float-right"><i class='fas fa-eye'></i> View All
                                    Owners
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </div>

                        <!-- /.col-md-6 -->


                    </div>
                    <!-- /.col-md-6 -->


                    <!-- /.container-fluid -->
                </div>
                <!-- /.content -->


                <!-- REQUIRED SCRIPTS -->

                <!-- jQuery -->
                <script src="../plugins/jquery/jquery.min.js"></script>
                <!-- Bootstrap -->
                <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- AdminLTE -->
                <script src="../dist/js/adminlte.js"></script>

                <!-- OPTIONAL SCRIPTS -->
                <script src="../plugins/chart.js/Chart.min.js"></script>
                <script src="../dist/js/demo.js"></script>
                <script src="../dist/js/pages/dashboard3.js"></script>


              


              
</body>
</html>

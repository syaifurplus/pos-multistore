<?php

include ('../db_connect.php');

$id=$_GET['id'];

$update=mysqli_query($con,"UPDATE owner SET owner_status=0  WHERE owner_id='$id'");

if($update)
{
	echo "<script>alert('Owner Inactivated!')</script>";
	echo "<script>window.open('owners.php','_self')</script>";
}

else
{
	echo "<script>alert('Failed!')</script>";
	echo "<script>window.open('owners.php','_self')</script>";
}


?>
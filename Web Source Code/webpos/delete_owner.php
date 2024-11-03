<?php

include ('../db_connect.php');

$id=$_GET['id'];

$delete=mysqli_query($con,"DELETE FROM owner  WHERE owner_id='$id'");

if($delete)
{
	echo "<script>alert('Owner Deleted!')</script>";
	echo "<script>window.open('owners.php','_self')</script>";
}

else
{
	echo "<script>alert('Failed!')</script>";
	echo "<script>window.open('owners.php','_self')</script>";
}


?>

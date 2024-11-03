<?php

include('db_connect.php');
$categoryId = $_POST['categoryId'];
echo "<option selected disabled>Select Sub Category</option>";
$res = mysqli_query($con, "SELECT * FROM sub_category WHERE category_id='$categoryId'");
while ($data = mysqli_fetch_array($res)) {
    echo "<option value='" . $data['sub_category_id'] . "'>" . $data['sub_category_name'] . "</option>";
}
?>
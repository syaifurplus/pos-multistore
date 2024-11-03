<?php
 define('HOST','localhost');         //hostname
 define('USER','superpos');     //username
 define('PASS','password');        //user password
 define('DB','superpos');  //database name
 
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

?>
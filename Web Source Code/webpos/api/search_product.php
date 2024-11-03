<?php 


if ($_SERVER['REQUEST_METHOD'] == 'GET' ){


   require_once 'db_connect.php';
   include ('my_function.php');

   $category_id = $_GET['category_id'];
   $shop_id = $_GET['shop_id'];
  
  
  $query = "SELECT * FROM products WHERE shop_id='$shop_id' AND  product_category_id='$category_id' ORDER BY product_id DESC";

        
        $result = mysqli_query($con, $query);
        $response = array();
        while( $row = mysqli_fetch_assoc($result) ){
            array_push($response, 
            array(
                'product_id'=>$row['product_id'], 
                'product_name'=>$row['product_name'], 
                'product_code'=>$row['product_code'], 
                'product_category_id'=>$row['product_category_id'],
                 'product_category_name'=>categoryName($row['product_category_id']),
                'product_description'=>$row['product_description'],
                'product_sell_price'=>$row['product_sell_price'],
                'product_weight'=>$row['product_weight'],
                'weight_unit_name'=>weightUnit($row['product_weight_unit_id']),
                'product_suppler'=>$row['product_supplier_id'],
                'product_image'=>$row['product_image'],
                'product_stock'=>$row['product_stock'],
                'tax'=>$row['tax']
                
                ) 
            );
        }
        echo json_encode($response);   
    


mysqli_close($con);

}

?>
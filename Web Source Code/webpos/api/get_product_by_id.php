<?php 


if ($_SERVER['REQUEST_METHOD'] == 'GET' ){
require_once 'db_connect.php';
include('my_function.php');


   $product_id = $_GET['product_id'];
   $shop_id = $_GET['shop_id'];
  
    //SQL  query 
         
         $query = "SELECT * FROM products WHERE product_id='$product_id'";
      
        
        
        $result = mysqli_query($con, $query);
        $response = array();
        while( $row = mysqli_fetch_assoc($result) ){
            array_push($response, 
            array(
                'product_id'=>$row['product_id'], 
                'product_name'=>$row['product_name'], 
                'product_code'=>$row['product_code'], 
            'product_category_name'=>categoryName($row['product_category_id']),
                'product_category_id'=>$row['product_category_id'],
                'product_description'=>$row['product_description'],
                'product_buy_price'=>$row['product_buy_price'],
                'product_sell_price'=>$row['product_sell_price'],
                'product_weight'=>$row['product_weight'],
                'weight_unit_id'=>$row['product_weight_unit_id'],
                'weight_unit_name'=>weightUnit($row['product_weight_unit_id']),
                'product_supplier_id'=> $row['product_supplier_id'],
                'suppliers_name'=> supplierName($row['product_supplier_id']),
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
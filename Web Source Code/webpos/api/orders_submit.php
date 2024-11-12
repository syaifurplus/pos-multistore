<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'db_connect.php';
    include('../my_function.php');

    // Get JSON posted by Android Application
    $json = file_get_contents('php://input');

    // Convert JSON to PHP object
    $data = json_decode($json);

    $invoice_id = $data->invoice_id ?? null;
    $order_date = $data->order_date ?? null;
    $order_time = $data->order_time ?? null;
    $order_type = $data->order_type ?? null;
    $order_price = $data->order_price ?? null;
    $order_payment_method = $data->order_payment_method ?? null;
    $discount = $data->discount ?? null;
    $tax = $data->tax ?? null;
    $customer_name = $data->customer_name ?? null;
    $served_by = $data->served_by ?? null;
    $shop_id = $data->shop_id ?? null;
    $owner_id = $data->owner_id ?? null;

    // Check if lines property exists and is an array
    $product_data = $data->lines ?? [];

    // Check if the order already exists
    $result = mysqli_query($con, "SELECT * FROM order_list WHERE invoice_id='$invoice_id'");
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        echo "exists";
    } else {
        $sql = "INSERT INTO order_list (invoice_id, order_date, order_time, order_type, order_payment_method, order_price, discount, tax, customer_name, served_by, shop_id, owner_id) VALUES ('$invoice_id', '$order_date', '$order_time', '$order_type', '$order_payment_method', '$order_price', '$discount', '$tax', '$customer_name', '$served_by', '$shop_id', '$owner_id')";

        if (mysqli_query($con, $sql)) {
            foreach ($product_data as $product) {
                $product_id = $product->product_id;
                $product_name = $product->product_name;
                $product_image = $product->product_image;
                $product_price = $product->product_price;
                $product_weight = $product->product_weight;
                $product_order_date = $product->product_order_date;
                $product_qty = $product->product_qty;
                $tax = $product->tax;

                $sql2 = "INSERT INTO order_details (invoice_id, product_name, product_quantity, product_weight, product_price, product_order_date, product_id, product_image, shop_id, owner_id, tax) VALUES ('$invoice_id', '$product_name', '$product_qty', '$product_weight', '$product_price', '$product_order_date', '$product_id', '$product_image', '$shop_id', '$owner_id', '$tax')";
                mysqli_query($con, $sql2);

                $stock = getProductStock($product_id);
                $updated_stock = intval($stock) - intval($product_qty);
                $sql3 = "UPDATE products SET product_stock='$updated_stock' WHERE product_id='$product_id'";
                mysqli_query($con, $sql3);
            }

            echo "success";
        } else {
            echo "fail";
        }
    }

    mysqli_close($con);
}

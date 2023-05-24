<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();


if(isset($_POST['cuser_id']) && isset($_POST['address_id']) && isset($_POST['product_id'])
    && isset($_POST['shop_id']) && isset($_POST['product_name']) && isset($_POST['product_price'])
    && isset($_POST['product_quantity']) && isset($_POST['image_url']) && isset($_POST['order_number'])){

  if($conn){

    $cuser_id = $_POST['cuser_id'];
    $address_id = $_POST['address_id'];
    $product_id = $_POST['product_id'];
    $shop_id = $_POST['shop_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $image_url = $_POST['image_url'];
    $order_number = $_POST['order_number'];

    if($db -> BuyNow($cuser_id,$address_id,$product_id,$shop_id,$product_name,
    $product_price,$product_quantity,$image_url,$order_number)){

      echo "Success";
      
    }
    else{
        echo "Error Occured";
    }

  }
  else{
      echo "Error in database connection";
  }


}
else {
    echo "All Fields is Required";
}

 
?>





    
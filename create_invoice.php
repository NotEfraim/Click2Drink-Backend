<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if(isset($_POST['order_number']) && isset($_POST['cuser_id']) 
&& isset($_POST['total_price']) && isset($_POST['total_gallons'])
&& isset($_POST['shop_id']) && isset($_POST['address_id']) && isset($_POST['date_ordered'])){

    if($conn){

        $order_number= $_POST['order_number'];
        $cuser_id = $_POST['cuser_id'];
        $total_price = $_POST['total_price'];
        $total_gallons = $_POST['total_gallons'];
        $order_status = "Processing";
        $shop_id = $_POST['shop_id'];
        $address_id = $_POST['address_id'];
        $date_ordered = $_POST['date_ordered'];
        
        
        $sql = "INSERT INTO customer_invoice(order_number, cuser_id, address_id, shop_id, total_price, total_gallons, order_status, date_ordered) VALUES ('" . $order_number . "','" . $cuser_id . "',
        '" . $address_id . "', '" . $shop_id . "', '" . $total_price . "','" . $total_gallons . "','" . $order_status . "','" . $date_ordered . "')";
        
        if($conn->query($sql)){
            echo "Success";
        }
        else{
            
            echo "Error Occured";
        }

    }
    else {
        echo "Error on Database Connection";
    }



}
else {
    echo "Email is Required";
}

?>


    
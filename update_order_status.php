<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if( isset($_POST['order_number']) && isset($_POST['order_status'])){

    if($conn){

        $order_number = $_POST['order_number'];
        $order_status = $_POST['order_status'];
    

        $sql = "UPDATE customer_invoice SET order_status = '$order_status'  WHERE order_number = '$order_number' ";

        if($conn -> query($sql)){
            echo "Status Updated";
        }
        else{
            echo "Error";
        }

    }
    else {
        echo "Error on Database Connection";
    }



}
else {
    echo "All Fields is Required";
}

 
?>





    
<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if( isset($_POST['order_number']) && isset($_POST['truck_id']) ){

    if($conn){

        $order_number = $_POST['order_number'];
        $truck_id = $_POST['truck_id'];
        $sql = "UPDATE customer_trucks SET order_number = '$order_number'  WHERE truck_id = '$truck_id' ";

        if($conn -> query($sql)){
            echo "Profile Updated";
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





    
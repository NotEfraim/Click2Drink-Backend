<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if( isset($_POST['address_id']) && isset($_POST['cuser_id'])){

    if($conn){

        $cuser_id = $_POST['cuser_id'];
        $address_id = $_POST['address_id'];

        $sql = "UPDATE customer_trucks SET address_id = '$address_id'  WHERE cuser_id = '$cuser_id' ";

        if($conn -> query($sql)){
            echo "ID Updated";
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





    
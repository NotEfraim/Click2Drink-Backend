<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if(isset($_POST['truck_id'])){

    if($conn){

        $id = $_POST['truck_id'];
        $sql = "DELETE FROM customer_trucks WHERE truck_id = '$id' ";
        
        
        if($conn -> query($sql)){
            echo "success";
        }
        else{
            echo "Error in processing your request";
        }



    }
    else {
        echo "Error on Database Connection";
    }



}
else {
    echo "id is Required";
}

 
?>





    
<?php
require "DataBase.php";

$db = new DataBase;

$conn = $db->dbConnect();

if(isset($_POST['cuser_id']) && isset($_POST['order_number'])){
    
    if($conn){


        $cuser_id = $_POST['cuser_id'];
        $order_number = $_POST['order_number'];
        $sql = "SELECT * FROM customer_trucks WHERE cuser_id = '$cuser_id'
         AND order_number ='$order_number'";
    
    $result = $conn->query($sql);
    
    $products = array();
    
    if($result -> num_rows>0){
    
        while($row = $result->fetch_assoc()){
    
            $temp = array();
    
            
            array_push($products,$row);
            
        }
        
        echo json_encode($products);
     
    }

    }

    else{
        echo "Database Connection Error";
    }
}
else {
    echo "ID is Required";
}
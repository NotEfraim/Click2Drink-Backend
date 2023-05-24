<?php
require "DataBase.php";

$db = new DataBase;

$conn = $db->dbConnect();

if(isset($_POST['order_number'])){
    
    if($conn){
        $order_number = $_POST['order_number'];
        $sql = "SELECT * FROM customer_orders WHERE order_number = '$order_number' ORDER BY order_id DESC";
    
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
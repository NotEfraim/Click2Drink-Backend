<?php
require "DataBase.php";

$db = new DataBase;

$conn = $db->dbConnect();

if(isset($_POST['cuser_id'])){
    
    if($conn){

        $cuser_id = $_POST['cuser_id'];
        $sql = "SELECT * FROM purchase_history WHERE cuser_id = '$cuser_id' ORDER BY id DESC";
    
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









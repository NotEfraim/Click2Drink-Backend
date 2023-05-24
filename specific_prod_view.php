<?php
require "DataBase.php";

$db = new DataBase;

$conn = $db->dbConnect();

if(isset($_POST['shop_id'])){
    
$shop_id = $_POST['shop_id'];

$sql = "SELECT * FROM products WHERE shop_id = '$shop_id' ";

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
else {
    echo 'All fields is required';
}






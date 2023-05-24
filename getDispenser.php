<?php
require "DataBase.php";

$db = new DataBase;

$conn = $db->dbConnect();
$sql = "SELECT * FROM products WHERE category = 'Dispenser Gallon' AND shopIsActive = 'active' ";

$result = $conn->query($sql);


$partners = array();

if($result -> num_rows>0){

    while($row = $result->fetch_assoc()){

        $temp = array();

        
        array_push($partners,$row);
        
    }
    

    echo json_encode($partners);
 
    
    
}






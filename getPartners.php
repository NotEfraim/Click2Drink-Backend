<?php
require "DataBase.php";

$db = new DataBase;

$conn = $db->dbConnect();
//users table is partner or business admins table
$sql = "SELECT * FROM users WHERE usertype <> 'Super Admin' ";

$result = $conn->query($sql);


$partners = array();

if($result -> num_rows>0){

    while($row = $result->fetch_assoc()){

        $temp = array();

        
        array_push($partners,$row);
        
    }
    

    echo json_encode($partners);
 
    
    
}






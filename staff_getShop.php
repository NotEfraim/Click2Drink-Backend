<?php
require "DataBase.php";

$db = new DataBase;

$conn = $db->dbConnect();

if(isset($_POST['staff_email'])){

    $email = $_POST['staff_email'];
    $sql = "SELECT * FROM staff_users WHERE email = '$email' ";

    $result = $conn->query($sql);


$products = array();

    if($result -> num_rows>0){

        while($row = $result->fetch_assoc()){

        $temp = array();

        
        array_push($products,$row);
        
        }
    

        echo json_encode($products);
 
    
    
    }


} else{
    echo "email is required";
}





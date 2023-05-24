<?php
require "DataBase.php";

$db = new DataBase;

if(isset($_POST['cuser_id'])){

    $id = $_POST['cuser_id'];
    $conn = $db->dbConnect();
$sql = "SELECT * FROM customer_trucks WHERE cuser_id = $id ";

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
    echo "ID is Required";
}







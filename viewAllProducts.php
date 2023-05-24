<?php
require "DataBase.php";

$db = new DataBase;

$conn = $db->dbConnect();

if(isset($_POST['municipality'])){

    $municipality = $_POST['municipality'];

    if(ReadPriority($conn, $municipality)){
    
    }
    else{
        ReadAllRandom($conn);
    }

}

else{
    ReadAllRandom(($conn));
}


#----------------

function ReadAllRandom($conn){

$sql = "SELECT * FROM products WHERE shopIsActive = 'active' ORDER BY RAND() ";


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

#-------------------

function ReadPriority($conn, $municipality){

    $sql = "SELECT * FROM products WHERE location LIKE '%$municipality%' AND shopIsActive = 'active' ORDER BY prod_id ASC";

    $result = $conn->query($sql);

        $products = array();

    if($result -> num_rows>0){

    while($row = $result->fetch_assoc()){

        $temp = array();

        
        array_push($products,$row);
        
    }
    

    echo json_encode($products);
    
        return true;
   
    }

    else{
        return false;
    }

}

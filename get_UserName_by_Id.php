<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if(isset($_POST['cuser_id'])){

    if($conn){

        $cuser_id = $_POST['cuser_id'];
        $sql = "SELECT cuser_name FROM customer_users WHERE cuser_id = '$cuser_id'";
        $result = $conn -> query($sql);

        $data = array();

        if($result->num_rows>0){

            while($row = $result->fetch_assoc()){

                $temp = array();
        
                
                array_push($data,$row);
                
            }

            echo json_encode($data);
            
        }




    }
    else {
        echo "Error on Database Connection";
    }



}
else {
    echo "Email is Required";
}

 
?>





    
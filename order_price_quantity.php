<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if(
    isset($_POST['order_quantity']) && isset($_POST['order_price']) && isset($_POST['truck_id']))

    {
        if($conn){

            $truck_id = $_POST['truck_id'];
            $quantity = $_POST['order_quantity'];
            $price = $_POST['order_price'];
            
            $sql = "UPDATE customer_trucks SET order_quantity = '$quantity', order_price ='$price'
        WHERE truck_id = '$truck_id' ";

            $result = $conn -> query($sql);

            if($result){
                echo "Success";
            }
            else{
                echo "Failed";
            }
            
           

        }
        else{
            echo "Error on Database Connection";
        }

        
    }
    else{
        echo "All Fields is Required";
    }





 ?>
<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if(
    isset($_POST['cuser_id']) && isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price']) 
    && isset($_POST['product_location']) && isset($_POST['image_url']) && isset($_POST['shop_id']))

    {
        if($conn){

            $cuser_id = $_POST['cuser_id'];
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_location = $_POST['product_location'];
            $image_url = $_POST['image_url'];
            $shop_id = $_POST['shop_id'];
           
            if($db->AddtoTruck($cuser_id,$product_id,$product_name,$product_price,$product_location,$image_url,$shop_id)){

              echo "Successs";

            }

            else {
                echo "Error on Request";
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
<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if(
    isset($_POST['cuser_email']) && isset($_POST['cuser_number']) && isset($_POST['cuser_house_number']) 
    && isset($_POST['cuser_brgy']) && isset($_POST['cuser_municipality']) && isset($_POST['cuser_province'])
    && isset($_POST['address_title']) && isset($_POST['zipcode']))

    {
        if($conn){

            $number = $_POST['cuser_number'];
            $house_number = $_POST['cuser_house_number'];
            $brgy = $_POST['cuser_brgy'];
            $municipality = $_POST['cuser_municipality'];
            $province = $_POST['cuser_province'];
            $title = $_POST['address_title'];
            $zip = $_POST['zipcode'];
            $email = $_POST['cuser_email'];

            if($db->AddAddress($email,$number,$house_number,$brgy,$municipality,$province,$title,$zip)){

              echo "Successs";

            }

            else {
                echo "Error on Adding Address";
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
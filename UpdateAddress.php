<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if( isset($_POST['address_id']) && isset($_POST['cuser_number']) && isset($_POST['cuser_house_number']) 
&& isset($_POST['cuser_brgy']) && isset($_POST['cuser_municipality']) && isset($_POST['cuser_province'])
&& isset($_POST['address_title']) && isset($_POST['zipcode']) ){

    if($conn){

        $id  = $_POST['address_id'];
        $number = $_POST['cuser_number'];
        $house_number = $_POST['cuser_house_number'];
        $brgy = $_POST['cuser_brgy'];
        $municipality = $_POST['cuser_municipality'];
        $province = $_POST['cuser_province'];
        $title = $_POST['address_title'];
        $zip = $_POST['zipcode'];

        if($db->UpdateAddress($id,$number,$house_number,$brgy,$municipality,$province,$title,$zip)){

            echo "Address Updated";

        }
        else {
            echo "Error on processing your request";
        }


    }
    else {
        echo "Error on Database Connection";
    }



}
else {
    echo "All Fields is Required";
}

 
?>





    
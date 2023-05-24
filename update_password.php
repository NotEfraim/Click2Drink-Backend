<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if(isset($_POST['password']) && isset($_POST['number'])){

    if($conn){

        $password = $_POST['password'];
        $number = $_POST['number'];

        if($db -> UpdatePassword($password, $number)){
            echo "Updated Successfully";
        }
        else{
            echo "Error";
        }

    }
    else {
        echo "Error on Database Connection";
    }



}
else {
    echo "Information is Required";
}

?>


    
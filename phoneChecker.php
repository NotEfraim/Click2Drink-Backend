<?php
require "DataBase.php";
$db = new DataBase();

if(isset($_POST['number'])){

    if($db->dbConnect()){

        $number = $_POST['number'];

        if($db->phoneChecker($number)){
            echo "Phone Number is Already Registered";
        }
        else{
            echo "proceed";
        }

    }

    else{
        echo "Database Connection Error";
    }
}
else{
    echo "Phone Number is required";
}

?>
<?php
require "DataBase.php";
$db = new DataBase();

if(isset($_POST['cuser_email'])){

    if($db->dbConnect()){


        if($db->emailChecker($_POST['cuser_email'])){
            echo "Email is Taken";
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
    echo "Email is required";
}

?>
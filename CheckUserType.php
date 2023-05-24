<?php
require "DataBase.php";

$db = new DataBase;

$conn = $db->dbConnect();

if( isset($_POST['email']) ){


    if($db->dbConnect()){

        if($db->checkUserType($_POST['email']) == "customer"){

            echo "customer";

        }
        else if ($db->checkUserType($_POST['email']) == "staff"){

            echo "staff";

        }
        else {

            echo "User not Found";

        }

    }
    else {
        echo "Error in Database Connection";
    }

}
else echo "fields is required";


 
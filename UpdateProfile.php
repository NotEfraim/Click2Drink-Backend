<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();


#Pag lahat ay e a update

if( isset($_POST['cuser_email']) && isset($_POST['cuser_name']) && isset($_POST['cuser_bday']) 
&& isset($_POST['cuser_phone_number']) && isset($_POST['cuser_current_address']) ){


    if($conn){

        $email = $_POST['cuser_email'];
        $cuser_phone_number = $_POST['cuser_phone_number'];
        $cuser_bday = $_POST['cuser_bday'];
        $cuser_name = $_POST['cuser_name'];
        $cuser_current_address = $_POST['cuser_current_address'];


        $sql = "UPDATE customer_users SET cuser_name = '$cuser_name', cuser_bday ='$cuser_bday',
        cuser_phone_number ='$cuser_phone_number', cuser_current_address ='$cuser_current_address'
        WHERE cuser_email = '$email' ";

        $result = $conn -> query($sql);

        $data = array();

           echo "Profile Updated";
            


    }
    else {
        echo "Error on Database Connection";
    }



}
else {
    echo "All Fields is Required";
}

 
?>





    
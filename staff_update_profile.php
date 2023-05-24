<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();


#Pag lahat ay e a update

if( isset($_POST['email']) && isset($_POST['birth_date']) 
&& isset($_POST['phone_number']) && isset($_POST['current_address']) ){


    if($conn){

        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $bday = $_POST['birth_date'];
        $current_address = $_POST['current_address'];


        $sql = "UPDATE staff_users SET birth_date ='$bday',
        phone_number ='$phone_number', current_address ='$current_address'
        WHERE email = '$email' ";

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





    
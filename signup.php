<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['cuser_name']) && isset($_POST['cuser_email']) && isset($_POST['cuser_password']) && isset($_POST['cuser_phone_number'])) {
    
    if ($db->dbConnect()) {
        
        if ($db->signUp("customer_users", $_POST['cuser_name'], $_POST['cuser_email'],$_POST['cuser_password'],$_POST['cuser_phone_number'])) {
            
            
                echo "Sign Up Success";
            

        } else echo "Email is Taken";
    } else echo "Error: Database connection";
} else echo "All fields are required";


?>

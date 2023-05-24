<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['cuser_email']) && isset($_POST['cuser_password'])) {
    if ($db->dbConnect()) {
        
        
            //Email validator
        $email = $_POST['cuser_email'];    
        $conn = $db->dbConnect();
        $sql = "SELECT * FROM customer_users WHERE cuser_email = '$email' ";
        $result = $conn->query($sql);
        
         if($result->num_rows == 0 || $result->num_rows == NULL){
             
             echo "Email is not Registered";
         }
         
         else {
             
              if ($db->logIn("customer_users", $_POST['cuser_email'], $_POST['cuser_password'])) {
            
            echo "Login Success";
         
        } else echo "Wrong Password or Email";
             
         }
        
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>

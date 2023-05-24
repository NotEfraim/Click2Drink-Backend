<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['email']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        
            //Email validator
        $email = $_POST['email'];    
        $conn = $db->dbConnect();

        $sql = "SELECT * FROM staff_users WHERE email = '$email' ";

        $result = $conn->query($sql);
        
         if($result->num_rows == 0 || $result->num_rows == NULL){
             
             echo "Email is not Registered";
         }
         
         else {
             
              if ($db->StaffLogIn("staff_users", $_POST['email'], $_POST['password'])) {
            
            echo "Login Success";
         
        } else echo "Wrong Password or Email";
             
         }
        
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
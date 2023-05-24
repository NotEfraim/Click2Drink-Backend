<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if(isset($_POST['cuser_id'])){

  if($conn){

    $cuser_id = $_POST['cuser_id'];

    if($db -> truckCheckout($cuser_id)){
       
       $sql = "DELETE FROM customer_trucks WHERE cuser_id = '$cuser_id' ";

        if($conn->query($sql)){
            echo "Success";
        }
        else{
            echo "Error Deleting Items to Truck";
        }
      
    }
    else{
        echo "Error Occured";
    }

  }
  else{
      echo "Error in database connection";
  }


}
else {
    echo "ID is Required";
}

 
?>





    
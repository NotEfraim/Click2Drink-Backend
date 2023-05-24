<?php
require "DataBase.php";

$db = new DataBase;
$conn = $db->dbConnect();

if(isset($_POST['order_number']) && isset($_POST['current_date'])){

  if($conn){

    $order_number = $_POST['order_number'];
    $current_date = $_POST['current_date'];

    if($db -> OrderReceived($order_number)){

        $sql = "DELETE FROM customer_orders WHERE order_number = '$order_number' ";

        if($conn->query($sql)){

            if($db -> Invoice_log($order_number, $current_date)){

                $sql2 = "DELETE FROM customer_invoice WHERE order_number = '$order_number' ";
         
                 if($conn->query($sql2)){
                     echo "Success";
                 }
                 else{
                     echo "Error";
                 }
    
            }

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
    echo "Order_number is Required";
}

 
?>





    
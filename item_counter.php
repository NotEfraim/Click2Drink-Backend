<?php
require "DataBase.php";

$db = new DataBase;

$conn = $db->dbConnect();

if( isset($_POST['cuser_id'] )){

$id = $_POST['cuser_id'];    
$sql = "SELECT * FROM customer_trucks WHERE cuser_id = '$id'";

$result = $conn->query($sql);

echo mysqli_num_rows($result);

}
else {
    echo 'Id is Required';
}

?>






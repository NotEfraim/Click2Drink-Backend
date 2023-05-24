<?php
require "DataBase.php";

$db = new DataBase;

$conn = $db->dbConnect();
$sql = "SELECT Utils.maintenance_mode FROM Utils";

$result = $conn->query($sql);
 $row = mysqli_fetch_assoc($result);


if($result -> num_rows>0){
    
echo $row['maintenance_mode'];
    
}
else echo "on";






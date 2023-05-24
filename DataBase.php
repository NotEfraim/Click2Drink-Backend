<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect;
        $this->data = null;
        $this->sql = null;

        $dbc = new DataBaseConfig();

        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;

    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }


    function logIn($table, $email, $password)
    {
        $email = $this->prepareData($email);
        $password = $this->prepareData($password);
        
        $this->sql = "select * from " . $table . " where cuser_email = '" . $email . "'";
        
        $result = mysqli_query($this->connect, $this->sql);

        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) != 0) {
            
            $dbemail= $row['cuser_email'];
            $dbpassword = $row['cuser_password'];
           
           
            if ($email == $dbemail && password_verify($password, $dbpassword)) {
                $login = true;
            } else $login = false;
            
        } else $login = false;

        return $login;
    }
    
    function StaffLogIn($table, $email, $password)
    {
        $email = $this->prepareData($email);
        $password = $this->prepareData($password);
        
        $this->sql = "select * from " . $table . " where email = '" . $email . "'";
        
        $result = mysqli_query($this->connect, $this->sql);

        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) != 0) {
            
            $dbemail= $row['email'];
            $dbpassword = $row['password'];
           
            if ($email == $dbemail && password_verify($password, $dbpassword)) {
                $login = true;
            } else $login = false;
            
        } else $login = false;

        return $login;
    }

    function signUp($table, $fullname, $email, $password,$phone_number)
    {
        $fullname = $this->prepareData($fullname);
        $password = $this->prepareData($password);
        $email = $this->prepareData($email);
        $phone = $this->prepareData($phone_number);
        
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        //Email validator if taken
        $conn = $this->connect;
        $sql = "SELECT * FROM customer_users WHERE cuser_email = '$email' ";
        $result = $conn->query($sql);

        if($result->num_rows>0){
           //the email is taken
        }
        else{
            $this->sql = "INSERT INTO " . $table . " (cuser_name, cuser_email, cuser_password, cuser_phone_number) VALUES ('" . $fullname . "','" . $email . "','" . $password . "','" . $phone_number . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;

        } 
        
         

}

        function emailChecker($email){

         $email = $this->prepareData($email);
            
        //Email validator if taken
        $conn = $this->connect;
        $sql = "SELECT * FROM customer_users WHERE cuser_email = '$email' ";
        $result = $conn->query($sql);

             if($result->num_rows>0){
           //the email is taken
                return true;
             }
            else {
                return false; // wala pa
            }

            
    }

    function phoneChecker($number){

        $number = $this->prepareData($number);
        $conn = $this->connect;
        $sql = "SELECT * FROM customer_users WHERE cuser_phone_number ='$number'";
        $result = $conn->query($sql);

            if($result->num_rows>0){
                return true;  // meron ng phone
            }
            else {
                return false;  // wala pa
            }
    }
    
     function checkUserType($email){

        $email = $this->prepareData($email);
        $conn = $this->connect;
        $sql1 = "SELECT * FROM staff_users WHERE email ='$email'";
        $sql2 = "SELECT * FROM customer_users WHERE cuser_email ='$email'";
        $result = $conn->query($sql1);
        $result2 = $conn->query($sql2);

        if($result->num_rows>0 && $result2 ->num_rows==0){
            //the user is staff
            $type = "staff";
            return $type;

        }
        else if($result->num_rows==0 && $result2 ->num_rows>0){
            //user is customer
            $type = "customer";
            return $type;
        }
        else{
            // Logic Error 
            return "Logic Error";
        }

    }
    
      function AddAddress($email,$number,$house_number,$brgy,$municipality,$province,$address_title,$zipcode){

            $email = $this->prepareData($email);
            $number = $this->prepareData($number);
            $house_number = $this->prepareData($house_number);
            $brgy = $this->prepareData($brgy);
            $municipality = $this->prepareData($municipality);
            $province = $this->prepareData($province);
            $address_title = $this->prepareData($address_title);
            $zipcode = $this->prepareData($zipcode);

            $conn = $this->connect;

            $sql = "INSERT INTO customer_address (cuser_email,cuser_number,cuser_house_number,cuser_brgy,cuser_municipality,
            cuser_province,address_title,zipcode) VALUES ('" . $email . "','" . $number . "', '" . $house_number . "',
            '" . $brgy . "','" . $municipality . "','" . $province . "', '" . $address_title . "','" . $zipcode. "')";

            if (mysqli_query($conn, $sql)){

                return true;
            }
            else {
                return false;
            }


    }
    
     function UpdateAddress($id,$number,$house_number,$brgy,$municipality,$province,$address_title,$zipcode){

        $id = $this->prepareData($id);
        $number = $this->prepareData($number);
        $house_number = $this->prepareData($house_number);
        $brgy = $this->prepareData($brgy);
        $municipality = $this->prepareData($municipality);
        $province = $this->prepareData($province);
        $address_title = $this->prepareData($address_title);
        $zipcode = $this->prepareData($zipcode);
        
        $conn = $this->connect;

        $sql = "UPDATE customer_address SET cuser_number ='$number',cuser_brgy ='$brgy', 
        cuser_house_number = '$house_number', cuser_municipality ='$municipality', cuser_province ='$province',
        address_title ='$address_title',zipcode ='$zipcode' WHERE address_id ='$id' ";

        if(mysqli_query($conn, $sql)){
            return true;
        }
        else{
            return false;
        }


    }
    
    function AddtoTruck($cuser_id,$product_id,$product_name,$product_price,$product_location,$image_url,$shop_id){
    
    $product_id = $this->prepareData($product_id);
    $cuser_id = $this->prepareData($cuser_id);
    $product_name = $this->prepareData($product_name);
    $product_location = $this->prepareData($product_location);
    $product_price = $this->prepareData($product_price);
    $image_url = $this->prepareData($image_url);
    $shop_id = $this->prepareData($shop_id);

    $conn = $this->connect;
    $sql = "INSERT INTO customer_trucks(cuser_id, product_id, product_name, product_price , product_location, image_url, shop_id) VALUES ('" . $cuser_id . "','" . $product_id . "', 
    '" . $product_name . "', '" . $product_price . "', '" . $product_location . "','" . $image_url . "','" . $shop_id . "')";

    if(mysqli_query($conn, $sql)){
        return true;
    }
    else{
        return false;
    }

    }
    
    function truckCheckout($cuser_id){

    $cuser_id = $this->prepareData($cuser_id);

    $conn = $this-> connect;

    $sql = "INSERT INTO customer_orders (cuser_id, product_id, shop_id, address_id, product_name, product_price , product_quantity, image_url, order_number)
    SELECT cuser_id, product_id, shop_id, address_id,product_name, order_price, order_quantity, image_url, order_number FROM customer_trucks
    WHERE cuser_id='$cuser_id'"; 

    if(mysqli_query($conn, $sql)){
     return true;
    }
        else{
    return false;
    }

    }
    

     function OrderReceived($order_number){

        $order_number = $this->prepareData($order_number);
    
        $conn = $this-> connect;
    
        $sql = "INSERT INTO purchase_history (cuser_id, address_id, product_id, shop_id, product_name, product_price , product_quantity, image_url, order_number)
        SELECT cuser_id, address_id, product_id, shop_id, product_name, product_price , product_quantity, image_url, order_number FROM customer_orders
        WHERE order_number='$order_number'"; 
    
        if(mysqli_query($conn, $sql)){
         return true;
        }
            else{
        return false;
        }
    
        }

        function Invoice_log($order_number, $current_date){

            $order_number = $this->prepareData($order_number);
        
            $conn = $this-> connect;
        
            $sql = "INSERT INTO invoice_log (order_number, cuser_id, address_id, shop_id, total_price, total_gallons)
            SELECT order_number, cuser_id, address_id, shop_id, total_price, total_gallons FROM customer_invoice
            WHERE order_number='$order_number'"; 
            
            $sql2 = "UPDATE invoice_log SET received_date ='$current_date' WHERE order_number = '$order_number' ";
        
            if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
             return true;
            }
                else{
            return false;
            }
        
            }
            
            
        
        function BuyNow($cuser_id, $address_id, $product_id, $shop_id, $product_name,
      $product_price , $product_quantity, $image_url, $order_number){
        
        $cuser_id = $this->prepareData($cuser_id);
        $address_id = $this->prepareData($address_id);
        $product_id = $this->prepareData($product_id);
        $shop_id = $this->prepareData($shop_id);
        $product_name = $this->prepareData($product_name);
        $product_price = $this->prepareData($product_price);
        $product_quantity = $this->prepareData($product_quantity);
        $image_url = $this->prepareData($image_url);
        $order_number = $this->prepareData($order_number);

        $conn = $this-> connect;

        $sql = "INSERT INTO customer_orders(cuser_id, address_id, product_id, shop_id, 
        product_name, product_price , product_quantity , image_url, order_number)
         VALUES ('" . $cuser_id . "','" . $address_id . "','" . $product_id . "',
          '" . $shop_id . "','" . $product_name . "', '" . $product_price . "', 
          '" . $product_quantity . "','" . $image_url . "','" . $order_number . "')";


        if(mysqli_query($conn, $sql)){
            return true;
        }
        else {
            return false;
        }

     }
     
      function UpdatePassword($password, $number){

        $password = $this->prepareData($password);
        $number = $this->prepareData($number);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql ="UPDATE customer_users SET cuser_password = '$password' WHERE cuser_phone_number = '$number' ";

        if(mysqli_query($this->connect, $sql)){
            return true;
        }
        else{
            return false;
        }
    }
    

    
    //end of code here
       
}

?>

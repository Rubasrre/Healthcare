<?php
include('../connection.php');
session_start();
error_reporting(0);

if (isset($_POST['signup'])) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ic = $_POST['ic']; 
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $cost = $_POST['cost'];
    $bank = $_POST['bank'];
    $acc_name = $_POST['acc_name'];
    $acc_no = $_POST['acc_no'];



   // $sql = "SELECT * FROM assistance_h WHERE username='$username'";
   $sql = "SELECT * FROM assistance_h WHERE username='$username'";
    $result = mysqli_query($conn,$sql);
    if(!$result->num_rows>0) {
      $sql = "INSERT INTO assistance_h (first_name,last_name,username,password,ic_no,phone_no,email,address,document,cost,bank_name,account_holder,account_no,receipt_id,status,verified_document)
              VALUES ('$fname','$lname','$username','$password','$ic','$phone','$email','$address','none','$cost','$bank','$acc_name','$acc_no','none','none','none')";
  $results = mysqli_query($conn, $sql);
        if($results){
            echo '<script language="javascript" type="text/javascript">
            alert("Registration successful! Welcome to Healthcare Assistance");  
            </script>';
            header("Refresh:1; url=dashboard.php")
        }else{
            echo '<script language="javascript" type="text/javascript">
                          alert("Woops! Something went wrong.");  
                          </script>';
            echo $fname ,$lname,$address,$username,$password,$ic,$phone,$email,$cost,$bank,$acc_name,$acc_no;
            header("Refresh:1; url=login.html");
        }
    }else{
        echo '<script language="javascript" type="text/javascript">
        alert("Woops! Email alread exist.");  
        </script>';
    }
}
?>

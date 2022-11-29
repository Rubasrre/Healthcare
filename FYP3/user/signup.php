<?php
include_once '../connection.php';
session_start();

if (isset($_POST['signup'])) {

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
    $hospital = $_POST['hospital'];
    $reason = $_POST['reason'];

    $sql = "SELECT * FROM assistance_h WHERE username='$username'";

    $result = mysqli_query($conn,$sql);
    if(!$result->num_rows>0) {
        $insertSql = "INSERT INTO assistance_h (first_name,last_name,username,password,ic_no,phone_no,email,address,cost,bank_name,account_holder,account_no,hospital,reason)
                VALUES ('$fname','$lname','$username','$password','$ic','$phone','$email','$address','$cost','$bank','$acc_name','$acc_no','$hospital','$reason')";

        $insertResult = mysqli_query($conn,$insertSql);
        if($insertResult){
            echo '<script language="javascript" type="text/javascript">
            alert("Registration successful! Welcome to Healthcare Assistance");  
            </script>';
            header("Refresh:0; url=login.html");
        }else{
            echo '<script language="javascript" type="text/javascript">
            alert("Woops! Something went wrong.");  
            </script>';
            header("Refresh:0; url=login.html");
        }
    }
}
?>

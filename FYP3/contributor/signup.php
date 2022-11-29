<?php
include_once '../connection.php';
session_start();

if (isset($_POST['signup'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $ic = $_POST['ic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM contribute_h WHERE uname='$uname'";

    $result = mysqli_query($conn,$sql);
    if(!$result->num_rows>0) {
        $insertSql = "INSERT INTO contribute_h (f_name,l_name,address,uname,password,ic_no,phone_no,email)
                      VALUES ('$first_name','$last_name','$address','$uname','$password','$ic','$phone','$email')";

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
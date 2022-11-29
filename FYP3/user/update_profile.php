<?php
include '../connection.php';
session_start();

if(isset($_POST['update'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ic = $_POST['ic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    //$document = $_FILES['document']['name'];
    $password = $_POST['password'];
    $cost = $_POST['cost'];
    $bank = $_POST['bank'];
    $acc_name = $_POST['acc_name'];
    $acc_no = $_POST['acc_no'];
    $id = $_SESSION['id_assist'];

    if($_FILES["document"]["error"]==4){
        //check whether it is exist or not the document
        echo '<script language="javascript" type="text/javascript">
        alert("Document does not exist");
        </script>';
    }else{
        $filename = $_FILES["document"]["name"];
        $filesize = $_FILES["document"]["size"];
        $Tempname = $_FILES["document"]["tmp_name"];
        $validDocumentExtension = ['jpg','jpeg','png','pdf'];
        $documentExtension = explode('.',$filename);
        $documentExtension = strtolower(end($documentExtension));

        if(! in_array($documentExtension,$validDocumentExtension)){
            //check document extension format like jpg, jpeg and so on
            echo '<script language="javascript" type="text/javascript">
            alert("Invalid document");
            </script>';
            header("Refresh:0; url=profile.php");
        }
        elseif ($filesize > 100000000000000) {
            //check image size 
            echo '<script language="javascript" type="text/javascript">
            alert("Document size too large");
            </script>'; 
            header("Refresh:0; url=profile.php"); 
        }
        else{
            $newDocumentName = uniqid();//special id will create for the document save folder
            $newDocumentName .='.'.$documentExtension;
            move_uploaded_file($Tempname, "../Document/".$newDocumentName);
            $sql = "UPDATE assistance_h SET first_name='$fname',last_name='$lname',username='$username',password='$password',ic_no='$ic',phone_no='$phone',email='$email',address='$address',cost='$cost',bank_name='$bank',account_holder='$acc_name',account_no='$acc_no',document='$newDocumentName' WHERE id_assist='$id'";
            // if (!$result->num_rows > 0) {
            //$sql = "UPDATE parent  SET username='$_POST[username]', phonenumber= '$phonenumber',childname= '$childname',address = '$address',password = '$password' WHERE email='$_SESSION[email]'";
            $result = mysqli_query($conn, $sql);
            if ($result) {

                echo '<script language="javascript" type="text/javascript">
                alert("Successfully Updated.");
                </script>';
                header("Refresh:0; url=profile.php");

            }
        }
    }
    
}
?>
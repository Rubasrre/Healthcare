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
    $password = $_POST['password'];
    //$document = $_FILES['document']['name'];
    $id = $_SESSION['id_contribute'];

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
            alert("Image size too large");
            </script>'; 
            header("Refresh:0; url=profile.php"); 
        }
        else{
            $newDocumentName = uniqid();//special id will create for the document save folder
            $newDocumentName .='.'.$documentExtension;
            move_uploaded_file($Tempname, "../Document/".$newDocumentName);
            $sql = "UPDATE contribute_h SET f_name='$fname',l_name='$lname',uname='$username',password='$password',email='$email',address='$address',ic_no='$ic',phone_no='$phone',support_doc='$newDocumentName' where id_contribute='$id'";

            $result = mysqli_query($conn,$sql);
            if($result){
                echo '<script language="javascript" type="text/javascript">
                alert("Successfully Updated.");
                </script>';
                header("Refresh:0; url=profile.php");
            } else {
                echo '<script language="javascript" type="text/javascript">
                alert("Woops! Something Wrong Went.");
                </script>';
            }
        }
    }
}
?>
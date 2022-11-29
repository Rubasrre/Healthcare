<?php
include '../connection.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM assistance_h WHERE id_assist=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo '<script language="javascript" type="text/javascript">
            alert("Deleted assistance applicant successfully!");
            </script>';
        header("Refresh:0; url=assistance.php");
    }
}
?>
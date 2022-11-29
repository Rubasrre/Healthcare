<?php 
include '../connection.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM contribute_h WHERE id_contribute=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo '<script language="javascript" type="text/javascript">
            alert("Deleted contributor applicant successfully!");
            </script>';
        header("Refresh:0; url=contribute.php");
    }
}
?>
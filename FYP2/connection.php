<?php

$conn = new mysqli('localhost','root','root','healthcare');

if(!$conn){

    die(mysqli_error($conn));
    echo '<script language="javascript" type="text/javascript">
    alert("Woops! ");  
    </script>';
}
?>
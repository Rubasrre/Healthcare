<?php
$conn = new mysqli('localhost','root','','healthcare');

if(!$conn){
    die(mysqli_error($conn));
}
?>
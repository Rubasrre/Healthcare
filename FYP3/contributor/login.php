<?php
include_once('../connection.php');

if ((!empty($_POST['uname']) && !empty($_POST['password']))
    && (isset($_POST['uname']) && isset($_POST['password']))){

        $uname = $_POST['uname'];
        $password = $_POST['password'];

        $contributeRow = "Select * from contribute_h where uname = '$uname'";
        if($result = mysqli_query($conn,$contributeRow)){
            $count = mysqli_num_rows($result);
            if($count == 0){
                echo '<script language="javascript" type="text/javascript">
                alert("Sorry, Username does not exist. Please try again.");
                </script>';
                header("Refresh:0; url=login.html");
            }
            else{
                $row = mysqli_fetch_array($result,MYSQLI_BOTH);
                if($row["password"] == $password)
                {
                    session_start();
                    $_SESSION["id_contribute"] = $row['id_contribute'];
                    $_SESSION["f_name"] = $row['f_name'];
                    $_SESSION["phone_no"] = $row['phone_no'];

                    echo '<script language="javascript" type="text/javascript">
                    alert("Login Successfull!Welcome to Healthcare Assistance");
                    </script>';
                header("Refresh:0; url=dashboard.php");
                }
                else{
                    echo '<script language="javascript" type="text/javascript">
                    alert("Sorry, Password is incorrect. Please try again.");
                    </script>';
                    header("Refresh:0; url=login.html");
                }
            }
        }
        else{
            echo '<script language="javascript" type="text/javascript">
                    alert("Sorry, Password is incorrect. Please try again.");
                    </script>';
            header("Refresh:0; url=login.html");
        }
    }
?>
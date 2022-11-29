<?php
include_once '../connection.php';

if ((!empty($_POST['username']) && !empty($_POST['password']))
    && (isset($_POST['username']) && isset($_POST['password']))){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $adminRow = "SELECT * FROM admin_h where username = '$username'";
        if($result = mysqli_query($conn,$adminRow)){
            $count = mysqli_num_rows($result);
            if($count == 0){
                echo '<script language="javascript" type="text/javascript">
                alert("Sorry, Username does not exist. Please try again.");
                </script>';
                header("Refresh:0; url=login.html");
            }
            else {
                $row = mysqli_fetch_array($result,MYSQLI_BOTH);
                if($row["password"] == $password)
                {
                    session_start();
                    $_SESSION["id_admin"] = $row['id_admin'];
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["password"] = $row['password'];

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
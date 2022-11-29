<?php
include '../connection.php';
session_start();
if(isset($_SESSION['id_admin'])){

}else{
    echo '<script language="javascript" type="text/javascript">
    alert("Dear admin, login is required to proceed! Thank you. ");
    </script>';
    header("Refresh:0; url=login.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a272bcb024.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <title>Medical Healthcare</title>
    <style>
        .contribute{
            background-color: #FEE3C3;
            min-height: 110vh;
        }
        .contribute-view{
            margin: 2rem 5rem;
        }
        .contribute-view p{
            margin-top: 1rem;
        }
        button{
            width: 8rem;
            height: 2rem;
            border: 1px solid #CDBEBD;
            background: #84855D;
            border-radius: 5px;
        }
        button a{
            text-decoration: none;
            color: #fff;
        }
        button a:hover{
            color: #000;
        }
    </style>
</head>
<body class="contribute">
    <div class="contribute-view">
        <?php
        
        $id = $_GET['updateid'];
        $sql = "SELECT * FROM contribute_h WHERE id_contribute=$id";
        $result = mysqli_query($conn,$sql);
        $contributeRow = mysqli_fetch_array($result); 

        $fname = $contributeRow['f_name'];
        $lname = $contributeRow['l_name'];
        $ic = $contributeRow['ic_no'];
        $phone = $contributeRow['phone_no'];
        $email = $contributeRow['email'];
        $address = $contributeRow['address'];
        $doc = $contributeRow['support_doc'];
        $status = $contributeRow['status'];

        if(isset($_POST['update'])){
            $status = $_POST['status'];

            $sql = "UPDATE contribute_h SET status='$status' WHERE id_contribute=$id";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo '<script language="javascript" type="text/javascript">
                alert("Detail updated successfully. Thank you.");
                </script>';
                header("Refresh:0; url=contribute.php");
            }
        }
        ?>

        <h3>Update Contribute Details</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <p>First Name:</p>
                <input type="text" name="fname" id="fname" readonly value=<?php echo $fname;?>>

                <p>Last Name:</p>
                <input type="text" name="lname" id="lname" readonly value=<?php echo $lname;?>>

                <p>Idenification Number:</p>
                <input type="text" name="ic" id="ic" readonly value=<?php echo $ic;?>>

                <p>Phone Number:</p>
                <input type="text" name="phone" id="phone" readonly value=<?php echo $phone;?>>

                <p>Email Address:</p>
                <input type="text" name="email" id="email" readonly value=<?php echo $email;?>>

                <p>Address:</p>
                <textarea name="address" id="address" cols="50" rows="10" readonly><?php echo $address;?></textarea>

                <p>Document:</p>
                <input type="text" name="doc" id="doc" value=<?php echo $doc;?>>

                <p>Status:</p>
                <input type="text" name="status" id="status" readonly value=<?php echo $status;?>>
                <select name="status" id="status">
                    <option disabled value selected>Choose the status</option>
                    <option value="Approve">Approve</option>
                    <option value="Reject">Withdraw</option>
                    <option value="Blacklist">Blacklist</option>
                </select>
            </div>
            <div class="profile-button">
                <button type="submit" name="update" id="update">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
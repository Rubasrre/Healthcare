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
        $sql = "SELECT * FROM assistance_h WHERE id_assist=$id";
        $result = mysqli_query($conn,$sql);
        $assistRow = mysqli_fetch_array($result); 

        $fname = $assistRow['first_name'];
        $lname = $assistRow['last_name'];
        $ic = $assistRow['ic_no'];
        $phone = $assistRow['phone_no'];
        $email = $assistRow['email'];
        $address = $assistRow['address'];
        $doc = $assistRow['document'];
        $cost = $assistRow['cost'];
        $bank = $assistRow['bank_name'];
        $holder = $assistRow['account_holder'];
        $account_no = $assistRow['account_no'];
        $status = $assistRow['status'];
        $hospital = $assistRow['hospital'];
        $reason = $assistRow['reason'];
        //$v_doc = $assistRow['verified_document'];

        $target_dir = "../Document";
        $target_file = $target_dir . basename($_FILES['verified_document']['name']);
        $uploadOK = 1;
        $imageFile = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(isset($_POST['update'])){
            $status = $_POST['status'];
            $v_doc = $_POST['verified_document'];

            
            // Check file size
            if($_FILES["verified_document"]["size"] > 10000000000) {
                echo "Sorry your file is too large.";
                $uploadOK = 0;
            }

            //Allow certain file formats
            if($imageFile != "jpg" && $imageFile != "png" && $imageFile != "jpeg"
            $imageFile != "pdf"){
                echo "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {

                if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE assistance_h SET status='$status', verified_document='$newdocumentname' WHERE id_assist=$id";
                $result = mysqli_query($conn,$sql);
                if($result){
                    echo '<script language="javascript" type="text/javascript">
                    alert("Detail updated successfully. Thank you.");
                    </script>';
                    header("Refresh:0; url=assistance.php");
                } 
                else {
                    echo '<script language="javascript" type="text/javascript">
                    alert("Woops! Something Wrong Went.");
                    </script>';
                    header("Refresh:0; url=assistance.php");
                }
        
                echo "The file ". htmlspecialchars(basename( $_FILES["document"]["name"])). " has been uploaded.";
                } else {
                echo "Sorry, there was an error uploading your file.";
                }
            }
            
        }
        ?>

        <h3>Update Assistance Details</h3>
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

                <p>Cost:</p>
                <input type="text" name="cost" id="cost" readonly value=<?php echo $cost;?>>

                <p>Bank Name:</p>
                <input type="text" name="bank_name" id="bank_name" readonly value=<?php echo $bank;?>>

                <p>Account Holder:</p>
                <input type="text" name="holder" id="holder" readonly value=<?php echo $holder;?>>

                <p>Account Number:</p>
                <input type="text" name="acc_number" id="acc_number" readonly value=<?php echo $account_no;?>>

                <p>Status:</p>
                <input type="text" name="status" id="status" readonly value=<?php echo $status;?>>
                <select name="status" id="status">
                    <option disabled value selected>Choose the status</option>
                    <option value="Approve">Approve</option>
                    <option value="Reject">Reject</option>
                    <option value="Pending">Pending</option>
                    <option value="Verified">Verified</option>
                    <option value="Completed">Completed</option>
                </select>

                <p>Hospital:</p>
                <input type="text" name="hospital" id="hospital" readonly value=<?php echo $hospital;?>>

                <p>Additional Information:</p>
                <textarea name="additional" id="additional" cols="30" rows="10"><?php echo $hospital;?></textarea>

                <p>Verified Document:</p>
                <input type="file" name="v_doc" id="v_doc" class="pfile" value=<?php echo $v_doc;?>>
            </div>
            <div class="profile-button">
                <button type="submit" name="update" id="update">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
require('../connection.php'); // connect database
session_start(); // connect session to make sure its the right user that login, not different acc

if (!isset($_SESSION['id_assist'])) { // if wrong email detected it will  open main page
    header("Location: index.html");
}
error_reporting(0); // to hide default error in input

if(isset($_POST['update'])){
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ic = $_POST['ic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $document = $_FILES['document']['name'];
    $password = $_POST['password'];
    $cost = $_POST['cost'];
    $bank = $_POST['bank'];
    $acc_name = $_POST['acc_name'];
    $acc_no = $_POST['acc_no'];
    $id = $_SESSION['id_assist'];
    $sql = "UPDATE assistance_h SET first_name='$fname',last_name='$lname',username='$username',password='$password',ic_no='$ic',phone_no='$phone',email='$email',address='$address',cost='$cost',bank_name='$bank',account_holder='$acc_name',account_no='$acc_no',document='$document' WHERE id_assist='$id'";



    // if (!$result->num_rows > 0) {
    //$sql = "UPDATE parent  SET username='$_POST[username]', phonenumber= '$phonenumber',childname= '$childname',address = '$address',password = '$password' WHERE email='$_SESSION[email]'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_assist'] = $row['id_assist'];
  
        echo "<script>alert('Successfully Updated.')</script>";
        header("Refresh:1; url=dashboard.php");

    } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
    }
}
//}
$result = mysqli_query($conn, "SELECT * FROM assistance_h WHERE id_assist = $_SESSION[id_assist]");
$assistRow = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a272bcb024.js" crossorigin="anonymous"></script>
    <title>Medical Healthcare</title>
</head>
<body class="profile">
    <nav>
        <img src="../images/medical_icon.png" class="image">
        <div class="nav-links">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>
    <div class="line"></div>
    <div class="user-profile">
        <h3>My Profile</h3>
        <form class="profile-detail" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="fname" id="fname" value="<?php echo $assistRow['first_name'];?>">
                <label>Last Name:</label>
                <input type="text" name="lname" id="lname" value="<?php echo $assistRow['last_name'];?>">
            </div>
            <div class="form-group">
                <label>Identification Number:</label>
                <input type="text" name="ic" id="ic" value="<?php echo $assistRow['ic_no'];?>">
                <label>Phone Number:</label>
                <input type="text" name="phone" id="phone" value="<?php echo $assistRow['phone_no'];?>">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $assistRow['email'];?>">
                <label>Address:</label>
                <input type="text" name="address" id="address" value="<?php echo $assistRow['address'];?>">
            </div>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" id="username" value="<?php echo $assistRow['username'];?>">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="text" name="password" id="password" value="<?php echo $assistRow['password'];?>">
            </div>
            <div class="form-group">
                <label>Supporting Document:</label>
                <input type="file" name="document" id="document" class="pfile" value="<?php echo $assistRow['document'];?>">
                <label>Cost:</label>
                <input type="number" step="0.01"  name="cost" id="cost" value="<?php echo $assistRow['cost'];?>">
            </div>
            <div class="form-group">
                <select name="bank" id="bank">
                    <option disabled value selected>Bank Name</option>
                    <option value="Maybank">Maybank</option>
                    <option value="CIMB">CIMB Bank</option>
                    <option value="Public">Public Bank</option>
                    <option value="RHB">RHB Bank</option>
                    <option value="Hong Leong">Hong Leong Bank</option>
                    <option value="AmBank">AmBank</option>
                    <option value="UOB">UOB Malaysia</option>
                    <option value="BankRakyat">Bank Rakyat</option>
                    <option value="OCBC">OCBC Bank</option>
                    <option value="HSBC">HSBC Bank Malaysia</option>
                    <option value="Bank Islam">Bank Islam</option>
                    <option value="Affin">Affin Bank</option>
                    <option value="Alliance">Alliance Bank Malaysia Berhad</option>
                    <option value="Standard Chartered">Standard Chartered Bank</option>
                    <option value="MBSB">MBSB Bank Berhad</option>
                    <option value="Citibank">Citibank Malaysia</option>
                    <option value="BSN">Bank Simpanan Nasional</option>
                    <option value="Muamalat">Bank Muamalat Malaysia Berhad</option>
                    <option value="Agro">Agrobank</option>
                    <option value="Al-Rajhi">Al-Rajhi Malaysia</option>
                </select>
            </div>
            <div class="form-group">
                <label>Account Holder:</label>
                <input type="text" name="acc_name" id="acc_name" value="<?php echo $assistRow['account_holder'];?>">
                <label>Account Number:</label>
                <input type="text" name="acc_no" id="acc_no" value="<?php echo $assistRow['account_no'];?>">
            </div>
            <div class="profile-button">
                <button type="submit" name="update" id="update">Save</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>
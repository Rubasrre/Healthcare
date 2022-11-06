<?php
include('../connection.php');
session_start();
if (!isset($_SESSION['id_assist'])) { // if wrong email detected it will  open main page
    header("Location: ../index.html");
}

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a272bcb024.js" crossorigin="anonymous"></script>
    <title>Medical Healthcare</title>
</head>

<body class="dashboard">
    <nav>
        <img src="../images/medical_icon.png" class="image">
        <div class="nav-link">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">LogOut</a></li>
            </ul>
        </div>
    </nav>
    <div class="line"></div>
    <div class="status">
        <p><?php echo $assistRow['status'];?></p>
    </div>
    <div class="information">
        
        <h3>Applicant Information Detail</h3>
        <div class="line1"></div>
  
             
        <div class="details">
            <p class="detail">Name:</p>
            <div class="info-detail">
            <p class="info"><?php echo $assistRow['first_name'];?> <?php echo $assistRow['last_name'];?></p>
            </div>
            <p class="detail">Identification Number:</p>
            <div class="info-detail">
                <p class="info"><?php echo $assistRow['ic_no'];?></p>
            </div>
            <p class="detail">Phone Number:</p>
            <div class="info-detail">
                <p class="info"><?php echo $assistRow['phone_no'];?></p>
            </div>
            <p class="detail">Email:</p>
            <div class="info-detail">
                <p class="info"><?php echo $assistRow['email'];?></p>
            </div>
            <p class="detail">Address:</p>
            <div class="info-detail">
                <p class="info"><?php echo $assistRow['address'];?></p>
            </div>
            <p class="detail">Supporting Document:</p>
            <div class="info-detail">
                <p class="info"><?php echo $assistRow['document'];?></p>
            </div>
            <p class="detail">Cost:</p>
            <div class="info-detail">
                <p class="info"><?php echo $assistRow['cost'];?></p>
            </div>
            <p class="detail">Status:</p>
            <div class="info-detail">
                <p class="info"><?php echo $assistRow['status'];?></p>
            </div>
          
        </div>
    </div>
</body>

</html>
<?php
include('../connection.php');
session_start();
$contribute = mysqli_query($conn, "SELECT * FROM contribute_h WHERE id_contribute = '".$_SESSION['id_contribute']."'");
$contributeRow = mysqli_fetch_array($contribute);
if(isset($_SESSION['id_contribute'])){
    
}else{
    echo '<script language="javascript" type="text/javascript">
        alert("Dear contributor, login is required to proceed! Thank you. ");
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
    <title>Medical Healthcare</title>
    <style>
        .dashboard {
            background-color: #FEE3C3;
            min-height: 110vh;
        }

        nav .image {
            width: 5.5rem;
        }

        .nav-link {
            flex: 1;
            text-align: center;
        }

        .nav-link ul li {
            list-style: none;
            display: inline-block;
            padding: 1rem 6rem;
            margin-top: -1rem;
            position: relative;
        }

        .nav-link ul li a {
            color: #000;
            text-decoration: none;
            font-size: 18px;
        }

        .nav-link ul li::after {
            content: '';
            width: 0%;
            height: 6px;
            background: #84855D;
            display: block;
            margin: auto;
            transition: 0.5s;
            border-radius: 10rem;
        }

        .nav-link ul li:hover::after {
            width: 100%;
        }

        .line {
            position: absolute;
            margin-top: -2.2rem;
            min-width: 100%;
            border: 1px solid #CDBEBD;
            background-color: #CDBEBD;
        }

        .status {
            position: absolute;
            margin: 0.6rem 2rem;
            width: 12rem;
            height: 5rem;
            background-color: #CDBEBD;
            border-radius: 10px;
            border: 1px solid #FDF9F6;
        }

        .status p {
            text-align: center;
            align-items: center;
            margin-top: 1.7rem;
            font-size: 18px;
        }

        .information {
            position: absolute;
            margin: 8rem 2rem;
            width: 50rem;
            height: 24rem;
            background-color: #CDBEBD;
            border-radius: 8px;
        }

        .information h3 {
            position: absolute;
            margin: 0.5rem 0.5rem;
            color: #574540;
            text-decoration: underline;
        }

        .line1 {
            position: absolute;
            margin-top: 2.5rem;
            min-width: 100%;
            border: 1px solid #F5EAC7;
            background-color: #CDBEBD;
            border-radius: 100%;
        }

        .details {
            margin: 2.4rem 1rem;
        }

        .detail {
            padding: 1rem 1rem;
            font-size: 20px;
            color: #000;
            font-weight: normal;
        }

        .info-detail {
            position: absolute;
            margin-left: 15rem;
            margin-top: -2.4rem;
        }

        .info-detail .info {
            font-size: 18px;
            color: #000;
            font-weight: normal;
            width: 20rem;
            text-align: center;
        }
    </style>
</head>

<body class="dashboard">
    <nav>
        <img src="../images/medical_icon.png" class="image">
        <div class="nav-link">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="assistance.php">Assistance</a></li>
                <li><a href="logout.php">LogOut</a></li>
            </ul>
        </div>
    </nav>
    <div class="line"></div>
    <div class="status">
        <p><?php echo $contributeRow['status'];?></p>
    </div>
    <div class="information">
        <h3>Applicant Information Detail</h3>
        <div class="line1"></div>
        <div class="details">
            <p class="detail">Name:</p>
            <div class="info-detail">
                <p class="info"><?php echo $contributeRow['f_name'];?> <?php echo $contributeRow['l_name'];?></p>
            </div>
            <p class="detail">Identification Number:</p>
            <div class="info-detail">
                <p class="info"><?php echo $contributeRow['ic_no'];?></p>
            </div>
            <p class="detail">Phone Number:</p>
            <div class="info-detail">
                <p class="info"><?php echo $contributeRow['phone_no'];?></p>
            </div>
            <p class="detail">Email:</p>
            <div class="info-detail">
                <p class="info"><?php echo $contributeRow['email'];?></p>
            </div>
            <p class="detail">Address:</p>
            <div class="info-detail">
                <p class="info"><?php echo $contributeRow['address'];?></p>
            </div>
            <p class="detail">Status:</p>
            <div class="info-detail">
                <p class="info"><?php echo $contributeRow['status'];?></p>
            </div>
        </div>
    </div>
</body>

</html>
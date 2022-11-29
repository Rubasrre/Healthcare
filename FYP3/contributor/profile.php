<?php
include('../connection.php');
session_start();
if(isset($_SESSION['id_contribute'])){
    
}else{
    echo '<script language="javascript" type="text/javascript">
        alert("Dear contributor, login is required to proceed! Thank you. ");
        </script>';
    header("Refresh:0; url=login.html");
}

$result1 = mysqli_query($conn,"SELECT * FROM contribute_h where id_contribute = $_SESSION[id_contribute]");
$contributeRow = mysqli_fetch_array($result1);
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
    <style>
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
    </style>
</head>
<body class="profile">
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
    <div class="user-profile">
        <h3>My Profile</h3>
        <form class="profile-detail" method="POST" enctype="multipart/form-data" action="update_profile.php">
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="fname" id="fname" value="<?php echo $contributeRow['f_name'];?>">
                <label>Last Name:</label>
                <input type="text" name="lname" id="lname" value="<?php echo $contributeRow['l_name'];?>">
            </div>
            <div class="form-group">
                <label>Identification Number:</label>
                <input type="text" name="ic" id="ic" value="<?php echo $contributeRow['ic_no'];?>">
                <label>Phone Number:</label>
                <input type="text" name="phone" id="phone" value="<?php echo $contributeRow['phone_no'];?>">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $contributeRow['email'];?>">
                <label>Address:</label>
                <input type="text" name="address" id="address" value="<?php echo $contributeRow['address'];?>">
            </div>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" id="username" value="<?php echo $contributeRow['uname'];?>">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="text" name="password" id="password" value="<?php echo $contributeRow['password'];?>">
            </div>
            <div class="form-group">
                <label>Supporting Document:</label>
                <input type="file" name="document" id="document" class="pfile"><em>*Upload your identification number</em>
            </div>
            <div class="profile-button">
                <button type="submit" name="update" id="update">Save</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>
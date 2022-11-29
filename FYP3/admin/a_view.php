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
        if(isset($_GET['viewid'])){
            $id = $_GET['viewid'];

            $assist = mysqli_query($conn,"SELECT * FROM assistance_h where id_assist='$id'");
            $assistRow = mysqli_fetch_array($assist);

            $first_name = $assistRow['first_name'];
            $last_name = $assistRow['last_name'];
            $ic = $assistRow['ic_no'];
            $phone = $assistRow['phone_no'];
            $email = $assistRow['email'];
        }
        ?>

        <h3>View Assistance Details</h3>
        <p>Applicant Name: <?php echo $assistRow['first_name'];?> <?php echo $assistRow['last_name'];?></p>
        <p>Identification Number: <?php echo $assistRow['ic_no'];?></p>
        <p>Phone Number: <?php echo $assistRow['phone_no'];?></p>
        <p>Email Address: <?php echo $assistRow['email'];?></p>
        <p>Address: <?php echo $assistRow['address'];?></p>
        <p>Supportive Document:</p>
        <p>Amount: <?php echo $assistRow['cost'];?></p>
        <p>Bank Name: <?php echo $assistRow['bank_name'];?></p>
        <p>Account Holder: <?php echo $assistRow['account_holder'];?></p>
        <p>Account Number: <?php echo $assistRow['account_no'];?></p>

        <button type="button"><a href="assistance.php">Go Back</a></button>
    </div>
</body>
</html>
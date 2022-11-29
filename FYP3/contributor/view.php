<?php
include '../connection.php';
session_start();
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
        .receipt{
            background-color: #FEE3C3;
        }
        .receipt-assist{
            position: absolute;
            margin: 5rem 5rem;
        }
        .input{
            height: 35px;
            width: 200px;
            color: #000;
            border: none;
            outline: none;
            border-radius: 10px;
            background: #FDF9F6;
            font-size: 15px;
            text-align: center;
            font-style: normal;
        }
        button{
            width: 10rem;
            height: 2rem;
            border-radius: 5px;
            border: none;
            background-color: #5F4C45;
            font-size: 1rem;
        }
        button a{
            text-decoration: none;
            color: #FEE3C3;
        }
        button a:hover{
            color: #000;
        }
    </style>
</head>
<body class="receipt">
    <div class="receipt-assist">
        <?php
            $id = $_GET['viewid'];
            $receiptSQl = "SELECT * FROM assistance_h where id_assist = '$id'";
            $rResult = mysqli_query($conn,$receiptSQl);
            $rRow = mysqli_fetch_array($rResult);
        ?>
        <h3><?php echo $rRow['first_name'];?> <?php echo $rRow['last_name'];?></h3>
        <div class="form-group">
            <label>Identification Number: <?php echo $rRow['ic_no'];?></label>
        </div>
        <div class="form-group">
            <label>Phone Number: <?php echo $rRow['phone_no'];?></label>
        </div>
        <div class="form-group">
            <label>Email Address: <?php echo $rRow['email'];?></label>
        </div>
        <div class="form-group">
            <label>Address: <?php echo $rRow['address'];?></label>
        </div>
        <div class="form-group">
            <label>Cost: <?php echo $rRow['cost'];?></label>
        </div>
        <div class="form-group">
            <label>Verified Document: <?php echo $rRow['verified_document'];?></label>
        </div>
        <div class="form-group">
            <label>Bank Name: <?php echo $rRow['bank_name'];?></label>
        </div>
        <div class="form-group">
            <label>Account Holder: <?php echo $rRow['account_holder'];?></label>
        </div>
        <div class="form-group">
            <label>Account Number: <?php echo $rRow['account_no'];?></label>
        </div>
        <div class="form-group">
            <label>Amount Help: <?php echo $rRow['cost'];?></label>
        </div>

        <button><a href="assistance.php">Go Back</a></button>
    </div>
</body>
</html>
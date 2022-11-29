<?php
include '../connection.php';
session_start();
$contribute = mysqli_query($conn,"SELECT * FROM contribute_h where id_contribute");
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

        button{
            width: 10rem;
            height: 2rem;
            border-radius: 5px;
            border: none;
            background-color: #5F4C45;
            font-size: 1rem;
            color: #FEE3C3;
        }

        button a{
            text-decoration: none;
            color: #FEE3C3;
        }

        button a:hover{
            color: #fff;
        }
    </style>
</head>

<body class="assistance">
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

    <?php
        //get contributor data
        $id = $_GET['contributeid'];
        $sql = "SELECT * FROM assistance_h WHERE id_assist = $id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        //view the assistance data
        $id_assist = $row['id_assist'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $cost = $row['cost'];

        //post the data in the receipt table
        if(isset($_POST['contribute'])){
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $a = substr(str_shuffle($chars),0,2);
            $num = rand(100,199);
            $id_receipt = $a.$num;
            //$receipt = ['receipt']['name'];
            $id1 = $_POST['id'];
            $name = $_POST['name'];
            $cost = $_POST['cost'];
            $amount = $_POST['amount'];
            $id_contri = $_SESSION['id_contribute'];
            $after_contribute = $cost - $amount;

            if($_FILES["receipt"]["error"]==4){
                //check whether it is exist or not the receipt
                echo '<script language="javascript" type="text/javascript">
                alert("Receipt does not exist");
                </script>';
            }else{
                $filename = $_FILES["receipt"]["name"];
                $filesize = $_FILES["receipt"]["size"];
                $Tempname = $_FILES["receipt"]["tmp_name"];
                $validDocumentExtension = ['jpg','jpeg','png','pdf'];
                $docExtension = explode('.',$filename);
                $docExtension = strtolower(end($docExtension));

                if(! in_array($docExtension,$validDocumentExtension)){
                    //check document extension format like jpg, jpeg and so on
                    echo '<script language="javascript" type="text/javascript">
                    alert ("Invalid document");
                    </script>';
                }
                elseif ($filesize > 100000000000000){
                    //check document size 
                    echo '<script language="javascript" type="text/javascript">
                    alert("Receipt size too large.");
                    </script>';
                    header("Refresh:0; url=contribute.php");
                }
                else{
                    $newdocumentname = uniqid();
                    $newdocumentname .= '.'.$docExtension;
                    move_uploaded_file($Tempname, "../receipt/".$newdocumentname);

                    $insertsql = "INSERT INTO receipt_h (id_receipt,receipt,amount,id_assist,assist_name,cost,id_contribute,after_contribute)
                    VALUES ('$id_receipt','$newdocumentname','$amount','$id1','$name','$cost','$id_contri','$after_contribute')";

                    $insert = mysqli_query($conn,$insertsql);
                    if($insert){
                        echo '<script language="javascript" type="text/javascript">
                        alert("Thank you for your contribution.");
                        </script>';
                        header("Refresh:0; url=assistance.php");
                    }else{
                        echo '<script language="javascript" type="text/javascript">
                        alert("Sorry Please Try Again. Thank you!");
                        </script>';
                        header("Refresh:0; url=contribute.php");
                    }
                }
            }
        }

    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id" id="id" value="<?php echo $id_assist;?>">
            <p>Applicant Name:</p>
            <input type="text" name="name" id="name" readonly value="<?php echo $fname;?><?php echo $lname;?> ">
            <p>Amount Needed:</p>
            <input type="text" name="cost" id="cost" readonly value="<?php echo $cost;?>">
            <p>Receipt:</p>
            <input type="file" name="receipt" id="receipt" class="pfile">
            <p>Contribute Amount:</p>
            <input type="text" name="amount" id="amount">
            <br><br>
            <button type="submit" name="contribute" id="contribute">Save</button>
            <button type="button"><a href="assistance.php">Go Back</a></button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Receipt</th>
                <th scope="col">Amount Contribute</th>
                <th scope="col">Cost</th>
                <th scope="col">After Contribute</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //view receipt the data 
                $sql = "SELECT * FROM receipt_h WHERE id_assist = $id";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result)){
                    echo '<tr>
                    <th scope="row">'.$row['id_receipt'].'</th>
                    <td>'.$row['receipt'].'</td>
                    <td>'.$row['amount'].'</td>
                    <td>'.$row['cost'].'</td>
                    <td>'.$row['after_contribute'].'</td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>

</body>

</html>
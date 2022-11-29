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

    


    <div class="assistance-list">
        <h3>Assistance List</h3>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Assistance Name</th>
                    <th scope="col">Supporting Document</th>
                    <th scope="col">Cost (RM)</th>
                    <th scope="col">Status</th>
                    <th scope="col">View Details</th>
                    <th scope="col">Contribution</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!isset($_POST['submit'])){
                    $assist = mysqli_query($conn,"SELECT * FROM assistance_h");
                    while($assistRow = mysqli_fetch_array($assist)){
                        echo '<tr>
                            <th scope="row">'.$assistRow['id_assist'].'</th>
                            <td>'.$assistRow['first_name'].' '.$assistRow['last_name'].'</td>
                            <td>'.$assistRow['document'].'</td>
                            <td>'.$assistRow['cost'].'</td>
                            <td>'.$assistRow['status'].'</td>
                            <td>
                                <button type="button" class="btn btn-primary"><a href="view.php?viewid='.$assistRow['id_assist'].'">View Details</a></button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary"><a href="contribute.php?contributeid='.$assistRow['id_assist'].'">Contribution</a></button>
                            </td>
                        </tr>';
                    }
                }
                ?>
                    
                
            </tbody>
        </table>
    </div>

</body>

</html>
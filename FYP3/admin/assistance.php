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
        .view {
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
            padding: 1rem 5rem;
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

        .menu{
            position: absolute;
            margin: 1rem 2rem;
        }

        .menu button{
            width: 8rem;
            height: 2rem;
            border: 1px solid #CDBEBD;
            background: #84855D;
            border-radius: 5px;
        }
        
        .menu button a{
            text-decoration: none;
            color: #fff;
        }

        .view-table{
           margin: 4rem 2.8rem;
           width: 70rem;
        }

        .action{
            width: 8rem;
            height: 2rem;
            border: 1px solid #CDBEBD;
            background: #CDBEBD;
            border-radius: 5px;
        }

        .action a{
            text-decoration: none;
            color: #000;
        }

        h3{
            margin-left: 2.5rem;
        }
    </style>
</head>
<body class="view">
    <nav>
        <img src="../images/medical_icon.png" class="image">
        <div class="nav-link">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="assistance.php">Assistance</a></li>
                <li><a href="contribute.php">Contributor</a></li>
                <li><a href="logout.php">LogOut</a></li>
            </ul>
        </div>
    </nav>
    <div class="line"></div>

    <h3>Assistance</h3>
    <div class="menu">
        <button><a href="assistance.php">View Details</a></button>
        <button><a href="a_approve.php">Approved</a></button>
        <button><a href="a_reject.php">Rejected</a></button>
    </div>

    <div class="view-table">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $assist = mysqli_query($conn,"SELECT * FROM assistance_h");
                while($assistRow = mysqli_fetch_array($assist)){
                    echo '<tr>
                        <th scope="row">'.$assistRow['id_assist'].'</th>
                        <td>'.$assistRow['first_name'].'</td>
                        <td>'.$assistRow['last_name'].'</td>
                        <td>'.$assistRow['phone_no'].'</td>
                        <td>'.$assistRow['status'].'</td>
                        <td>
                            <button type="button" class="action">
                                <a href="a_view.php?viewid='.$assistRow['id_assist'].'">View Details</a>
                            </button>
                            <button type="button" class="action">
                                <a href="a_contribute.php?contributeid='.$assistRow['id_assist'].'">Contribution</a>
                            </button>
                            <button type="button" class="action">
                                <a href="a_update.php?updateid='.$assistRow['id_assist'].'">Update</a>
                            </button>
                            <button type="button" class="action">
                                <a href="a_delete.php?deleteid='.$assistRow['id_assist'].'">Delete</a>
                            </button>
                        </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>


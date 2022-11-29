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
        .number{
            background-color: #CDBEBD;
        }
        .assistance, .contribute h3{
            margin-left: 7rem;
        }
        .assistance, .contribute .table{
            width: 10rem;
            margin-left: 7rem;
        }
    </style>
</head>
<body class="dashboard">
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

    <div class="container text-center">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <div class="col">
                <?php
                    $dash_assist_query = "SELECT * FROM assistance_h";
                    $dash_assist_query_num = mysqli_query($conn, $dash_assist_query);

                    if($assistTotal = mysqli_num_rows($dash_assist_query_num)){
                        echo '<div class="p-3 border bg-light">
                        <h2 style="font-size: 15px;">Number of Assistance</h2><br>
                        '.$assistTotal.'</div>';
                    }else{
                        echo '<div class="p-3 border bg-light">
                        <h2 style="font-size: 15px;">Number of Assistance</h2><br>
                        No Data Found</div>';
                    }
                ?>
            </div>
            <div class="col">
                <?php
                    $dash_contribute_query = "SELECT * FROM contribute_h";
                    $dash_contribute_query_num = mysqli_query($conn, $dash_contribute_query);

                    if($contributeTotal = mysqli_num_rows($dash_contribute_query_num)){
                        echo '<div class="p-3 border bg-light">
                        <h2 style="font-size: 15px;">Number of Contribute</h2><br>
                        '.$contributeTotal.'</div>';
                    }else{
                        echo '<div class="p-3 border bg-light">
                        <h2 style="font-size: 15px;">Number of Assistance</h2><br>
                        No Data Found</div>';
                    }
                ?>
            </div>
            <div class="col">
                <?php
                    $dash_approve_query = "SELECT * FROM assistance_h WHERE status = 'Approve'";
                    $dash_approve_query_num = mysqli_query($conn, $dash_approve_query);

                    if($approveTotal = mysqli_num_rows($dash_approve_query_num)){
                        echo '<div class="p-3 border bg-light">
                        <h2 style="font-size: 15px;">Number of Approval(Assistance)</h2>
                        '.$approveTotal.'</div>';
                    }else{
                        echo '<div class="p-3 border bg-light">
                        <h2 style="font-size: 15px;">Number of Approval(Assistance)</h2>
                        No Data Found</div>';
                    }
                ?>
            </div>
            <div class="col">
            <?php
                    $dash_decline_query = "SELECT * FROM assistance_h WHERE status = 'Declined'";
                    $dash_decline_query_num = mysqli_query($conn, $dash_decline_query);

                    if($declineTotal = mysqli_num_rows($dash_decline_query_num)){
                        echo '<div class="p-3 border bg-light">
                        <h2 style="font-size: 15px;">Number of Decline(Assistance)</h2>
                        '.$declineTotal.'</div>';
                    }else{
                        echo '<div class="p-3 border bg-light">
                        <h2 style="font-size: 15px;">Number of Decline(Assistance)</h2>
                        No Data Found</div>';
                    }
                ?>
            </div>
        </div>
    </div>

    <br><br>
    <div class="assistance">
        <h3>Assistance Information Details</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Assistance Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $assist = mysqli_query($conn, "SELECT * FROM assistance_h");
                    while($assistRow = mysqli_fetch_array($assist)){
                        echo '<tr>
                        <th scope="row">'.$assistRow['id_assist'].'</th>
                        <td>'.$assistRow['first_name'].' '.$assistRow['last_name'].'</td>
                        <td>'.$assistRow['phone_no'].'</td>
                        <td>'.$assistRow['address'].'</td>
                        <td>'.$assistRow['email'].'</td>
                        <td>'.$assistRow['status'].'</td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="contribute">
    <h3>Contribute Information Details</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Contribute Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $contribute = mysqli_query($conn, "SELECT * FROM contribute_h");
                    while($contributeRow = mysqli_fetch_array($contribute)){
                        echo '<tr>
                        <th scope="row">'.$contributeRow['id_contribute'].'</th>
                        <td>'.$contributeRow['f_name'].' '.$contributeRow['l_name'].'</td>
                        <td>'.$contributeRow['phone_no'].'</td>
                        <td>'.$contributeRow['address'].'</td>
                        <td>'.$contributeRow['email'].'</td>
                        <td>'.$contributeRow['status'].'</td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
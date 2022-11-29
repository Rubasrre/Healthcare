<?php
include 'connection.php';
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
        .home {
            background-color: #FEE3C3;
        }
        .blacklist{
            background: #FDF9F6;
            margin-top: 20rem;
            min-height: 100vh;
        }
        .bl{
            position: absolute;
            margin-top: 3rem;
        }
        .blacklist h3{
            margin-left: 5rem;
            top: 5rem;
        }
        .blacklist .container{
            margin-left: 4.5rem;
        }
        .table{
            margin: 1rem 5rem;
            width: 55rem;
        }
    </style>
</head>

<body class="home">
    <nav>
        <a href="index.html"><img src="images/medical_icon.png"></a>
        <div class="nav-links">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="user/login.html">Assistance</a></li>
                <li><a href="contributor/login.html">Contributor</a></li>
                <li><a href="admin/login.html">Admin</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </div>
    </nav>

    <section class="medica">
        <img src="images/medica.png" class="medica_img">
        <h2>Health & Welfare Assistance Portal</h2>
    </section>

    <section class="blacklist">
        <div class="bl">
          <h3>Blacklisted Contribute</h3>  

          <div class="container text-center">
                <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                    <div class="col">
                        <?php
                            $blacklist = "SELECT * FROM contribute_h WHERE status = 'Blacklist'";
                            $blacklist_query_num = mysqli_query($conn, $blacklist);

                            if($assistTotal = mysqli_num_rows($blacklist_query_num)){
                                echo '<div class="p-3 border bg-light">
                                <h2 style="font-size: 15px;">Blacklisted Contribute</h2><br>
                                '.$assistTotal.'</div>';
                            }else{
                                echo '<div class="p-3 border bg-light">
                                <h2 style="font-size: 15px;">Blacklisted Contribute</h2><br>
                                No Data Found</div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <h3>Assistance Help Needed</h3>
          <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Contribute Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $blacklist = "SELECT * FROM assistance_h WHERE status = 'Pending'";
                $result = mysqli_query($conn,$blacklist);
                while($row = mysqli_fetch_array($result)){
                    echo '<tr>
                    <th scope="row">'.$row['id_assist'].'</th>
                    <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                    <td>'.$row['phone_no'].'</td>
                    <td>'.$row['address'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['cost'].'</td>
                    <td>'.$row['status'].'</td>
                    </tr>';
                }
            ?>  
            </tbody>
          </table>
        </div>
    </section>
</body>

</html>
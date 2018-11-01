<!--Project Name: Registration Form V1
//Module Name: php7_module
//Programmers: Jacob Taylor, Hermes Mimini, Isaiah Camacho, Isaiah DeBenedetto
//Date: 9/23/18
//Synopsis of php7_module: PHP 7 uses new Zend Engine 3.0 to improve application performance almost twice and 50% better memory consumption than PHP 5.6. It allows to serve more concurrent users without requiring any additional hardware.
//References: https://www.tutorialspoint.com/php7/index.htm, https://www.w3schools.com/php/,
// Welling, L., & Thomson, L. (2008). PHP and MySQL web development (4th ed.). Boston, MA: Addison-Wesley Professional. ISBN-13: 9780672329166-->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>



    <style>
        .card{
            width: 500px;
            margin: 0 auto;
            margin-top: 25px;
            margin-bottom: 50px;
        }
        body{
            background-image: linear-gradient(to right, #11998e , #38ef7d);
        }

        .registerLink{

        }
    </style>

</head>
<body>

<!-- Material form register -->
<div class="container">
    <div class="card">

        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Log In</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="text-center" style="color: #757575;" action="users.php" method="post">

                <!-- E-mail -->
                <div class="md-form mt-0">
                    <input type="email" name="emailInput"class="form-control" placeholder="E-mail">
                </div>

                <!-- Password -->
                <div class="md-form">
                    <input type="password" name="passwordInput" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" placeholder="Password">
                </div>
                <!-- Log In button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="log_user">Log In</button>
                <div class="registerLink">
                <a href="register.php">Not a user? Sign Up Now</a>
                </div>


            </form>
            <!-- Form -->

        </div>

    </div>
</div>
<!-- Material form register -->

</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/js/mdb.min.js"></script>

</html>
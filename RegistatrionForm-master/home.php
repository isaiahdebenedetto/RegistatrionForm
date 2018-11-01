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
    <title>Home</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <style>
        body{
            /*background-image: linear-gradient(to right, #43cea2, #185a9d);*/
        }
        p{
            width: 80%;
        }
        .login-error {
            background-color: #f1f1f1; 
            box-shadow: 0 3px 5px rgba(0,0,0,0.25);
            color: red; 
            height: 24px; 
            left: 0; 
            top: 0;
            position: fixed; 
            right: 0; 
            text-align: center; 
            z-index: 1;
        }

    </style>

</head>
<body>

<!-- Section: Blog v.3 -->
<section class="my-5" style="margin-left: 25px;">

    <a data-toggle="modal" data-target="#newPostModal" href="#newPostModal">New Post</a>

    <div id="newPostModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modalHeader"></div>
            <div id="modalContent" class="modal-content" style="position: absolute; width: 120%; height: auto; left: -10%;">
                <form class="text-center border border-light p-5" action="posts.php" method="post">
                    <p style="margin: 0 auto;" class="h4 mb-4">New Post</p>
                    <input type="text" name="title" class="form-control mb-4" placeholder="Title of Post">
                    <input type="text" name="author" class="form-control mb-4" placeholder="Name of Author">
                    <div class="form-group"><textarea name="body" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message"></textarea></div>
                    <button name="submitPost" class="btn btn-info btn-block" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>



    <!-- Section: Blog v.3 -->
    <section class="my-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-5">Recent Posts</h2>
        <!-- Section description -->
        <p class="text-center dark-grey-text w-responsive mx-auto mb-5">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        
        <?php
        // isaiah's local database
        $hostname = "localhost";
        $username = "root";
        $password = "root";
        $database = "blog";

        //heroku db
        //$hostname = "bbj31ma8tye2kagi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
        //$username = "c6yha5d7xaec2saa";
        //$password = "mmz42r0bv1ukt52b";
        //$database = "ecdupp1z6rgjtuqa";


            // Create connection
            $conn = mysqli_connect($hostname, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM posts ORDER BY id DESC;";
            $result = $conn->query($sql);
            $permission = $conn->query("SELECT role FROM users WHERE email = '".$_COOKIE['user']."'");
            if ($permission->num_rows > 0) $role = $permission->fetch_assoc()['role'];

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="row">'.
                            '<div class="col-lg-5 col-xl-4">'.
                                '<div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">'.
                                '<img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" alt="Sample image">'.
                                    '<a><div class="mask rgba-white-slight"></div></a>'.
                                '</div>'.
                            '</div>'.
                            '<div class="col-lg-7 col-xl-8">'.
                                '<h3 class="font-weight-bold mb-3"><strong>'.$row["title"].'</strong></h3>'.
                                '<p class="dark-grey-text">'.$row["body"].'</p>'.
                                '<p>by <a class="font-weight-bold">'.$row["author"].'</a></p>'.
                            '</div>'.
                        '</div>';
                    if ($role == 'administrator'){
                        echo'<form action="delete_post.php" method="post">'.
                                '<input type="hidden" name="post_id" value="'.$row['id'].'">'.
                                '<button>delete post</button>'.
                            '</form>';
                        echo'<form action="edit_post.php" method="post">'.
                                '<input type="hidden" name="post_id" value="'.$row['id'].'">'.
                                '<button>edit post</button>'.
                            '</form>';
                        //echo'<button data-toggle="modal" data-target="#editPostModal" href="#editPostModal">Edit Post</button>';
                    }
                    echo '<hr class="my-5">';
                }
            } 
            else { echo "0 results"; }
            $conn->close();

        ?>        
    </body>
</html>
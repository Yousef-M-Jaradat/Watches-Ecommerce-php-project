
<?php
session_start();

include('connection.php');

$query = "SELECT image FROM `product`"; // Fix the query syntax
$stmt = $pdo->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($rows) > 0) { // Corrected numRows to count($rows)
    $randomIndex = array_rand($rows); // Get a random index from the array

    // Fetch the selected random image data
    $imageData = $rows[$randomIndex]['image'];
    $imageBase64 = base64_encode($imageData);
   
}
?>



<!DOCTYPE  html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Forgot Password </title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="./favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="./node_modules/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="./node_modules/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="./node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="./dist/css/theme.min.css">
        <script src="./src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" style="background-image: url('<?php echo (count($rows) > 0) ? "data:image/jpg;base64, $imageBase64" : "watch2.png"; ?>')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                            <img src="watch2.png"width=200px>
                            </div>
                            <h3> Reset password</h3>
                            
                            <form action="passwored_reset_code.php" method="post">
                            <input type="hidden" value="<?php if (isset($_GET['token'])) {
                                  echo $_GET['token'];
                                } ?>" name="password_token">

                                <div class="form-group mb-3">
                                  <label for="currentPassword">Email Address</label>
                                  <input type="hidden" class="form-control" id="currentPassword" name="email"
                                    value="<?php if (isset($_GET['email'])) {
                                      echo $_GET['email'];
                                    } ?>" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="new_Password" placeholder=" New password" Required="">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="confirm_Password" placeholder="Confirm Password" Required="">
                                    <i class="ik ik-eye-off"></i>
                                </div>

                                <div class="sign-btn text-center">
                                    <button type="submit" class="btn btn-theme" name="password_update" >Submit Change</button>
                                </div>
                            </form>
                            <div class="register">
                                <p>Not a member? <a href="registration.php">Create an account</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        if(isset($_POST['password_update'])){
            header('Location:login.php');
        }
        ?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="./src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="./node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="./node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="./node_modules/screenfull/dist/screenfull.js"></script>
        <script src="./dist/js/theme.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>

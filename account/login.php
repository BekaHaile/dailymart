<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
$username = "";

if (isset($_POST['submit'])) {
    // Process the form

    $required_fields = array("username", "password");

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Attempt Login

        $username = trim($_POST["username"]);
        $password = $_POST["password"];

        $found_admin = attempt_login($username, $password);

        if ($found_admin) {
            // Success
            // Mark user as logged in
            $_SESSION["admin_id"] = $found_admin["id"];
            $_SESSION["username"] = $found_admin["user_name"];
            $_SESSION["role"] = $found_admin["role"];

            if (trim($_SESSION["role"]) === "admin" || trim($_SESSION["role"]) === "editor")
                redirect_to("../admin/index.php");
            elseif (trim($_SESSION["role"]) === "salessupervisor")
                redirect_to("../admin/order.php");
            else
                $_SESSION["art_error"] = "You Have No Permission.";

        } else {
//             Failure
            $_SESSION["art_error"] = "Username/password not found.";
        }
    }
} elseif (isset($_SESSION["admin_id"])) {
    redirect_to("../admin/index.php");

} else {
    // This is probably a GET request
} // end: if (isset($_POST['submit']))

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daily Mart</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="boot/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="boot/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">

    <!-- Styles -->
    <link href="styles/login_layout.css" rel="stylesheet" type="text/css">
    <link href="styles/elements.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="boot/css/jquery-ui.css"/>

    <script src="boot/jQuery/jquery.min.js"></script>
    <script src="boot/js/bootstrap.min.js"></script>
    <script src="boot/jQuery/jquery-ui.min.js"></script>


    <!-- Favicon: http://realfavicongenerator.net -->
    <link rel="apple-touch-icon" sizes="76x76" href="images/logo.png">
    <link rel="icon" type="image/png" href="images/logo.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/logo.png" sizes="16x16">
    <meta name="theme-color" content="#ffffff">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="container">
                <div class="row">
                    <div class="col-md-5 center-block-e">


                        <div class="login-form" style="background: #808080">

                            <div class="login-form-inner">
                                <a href="../index.php"><p class="login-form-intro"><img src="images/logo.png"
                                                                                        width="250"></p></a>

                                <form action="login.php" id="login_form" method="post"
                                      accept-charset="utf-8">
                                    <?php echo art_message(); ?>


                                    <div class="form-group login-form-area has-feedback">
                                        <input type="text" class="form-control" name="username"
                                               value="<?php echo htmlentities($username); ?>" placeholder="User Name">

                                        <i class="glyphicon glyphicon-phone form-control-feedback login-icon-color">
                                        </i>
                                    </div>

                                    <div class="form-group login-form-area has-feedback">
                                        <input type="password" name="password" value="" class="form-control"
                                               placeholder="*********">
                                        <i class="glyphicon glyphicon-lock form-control-feedback login-icon-color"></i>
                                    </div>

                                    <p><input type="submit" name="submit" class="btn btn-flat-login form-control"
                                              style="background: #8ac64f"
                                              value="Login"></p>

                                </form>

                            </div>


                        </div>
                    </div>
                </div>

                <div class="login-footer">

                </div>

            </div>
        </div>
    </div>

</body>

</html>
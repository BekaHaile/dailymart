<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php");
confirm_admin_logged_in()
?>
<?php

$ids = $_GET["id"];
$user = find_all_admin_by_id($ids);

if (isset($_POST['submit'])) {
    // Process the form
    if (isset($_POST["role"]) && isset($_POST["pass"])) {
        $pass = trim($_POST["pass"]);
        $compass = trim($_POST["compass"]);
        if ($pass === $compass) {

            $id = $user["id"];
            $fname = sqlsrv_escape(trim($_POST["fname"]));
            $lname = sqlsrv_escape(trim($_POST["lname"]));
            $email = sqlsrv_escape(trim($_POST["email"]));
            $role = sqlsrv_escape(trim($_POST["role"]));
            $pass = sqlsrv_escape(trim($_POST["pass"]));


            $query = "UPDATE [dbo].[user] SET ";
            $query .= "[first_name] = '{$fname}'";
            $query .= ",[last_name] = '{$lname}'";
            $query .= ",[email] = '{$email}'";
            $query .= ",[password] = '{$pass}'";
            $query .= ",[role] = '{$role}' ";
            $query .= "WHERE [id] = {$id}; ";

            $result = sqlsrv_query($connection, $query);

            if ($result) {
                // Success
                $_SESSION["art_message"] = "Successfully Updated";

                redirect_to("users.php");
            } else {
                // Failure
                $_SESSION["art_error"] = "Update failed." . $query;
            }

        } else {
            $_SESSION["art_error"] = 'Password is not match.';
        }
    } else {
        $_SESSION["art_error"] = 'Please fill the form.';
    }
} else {
    // This is probably a GET request

}

include_once("header.php")
?>
<section role="main" class="content-body card-margin" xmlns="http://www.w3.org/1999/html">
    <header class="page-header" style="background: #8ac64f">
        <h2>User</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>EditUser</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                    </div>

                    <h2 class="card-title">Edit User</h2>
                </header>
                <div class="card-body">
                    <?php echo art_message(); ?>

                    <form class="form-horizontal form-bordered"
                          action="editUser.php?id=<?php echo urlencode($user["id"]); ?>" method="post">

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2" for="textareaDefault">First
                                Name</label>

                            <div class="col-lg-4">
                                <input type="text" name="fname" value="<?php echo trim($user["first_name"]); ?>"
                                       class="form-control" data-plugin-maxlength maxlength="100" required/>

                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2" for="textareaDefault">Last
                                Name</label>

                            <div class="col-lg-4">
                                <input type="text" name="lname" value="<?php echo trim($user["last_name"]); ?>"
                                       class="form-control" data-plugin-maxlength maxlength="100" required/>

                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2" for="textareaDefault">User
                                Name</label>

                            <div class="col-lg-4">
                                <input type="text" name="name" value="<?php echo trim($user["user_name"]); ?>"
                                       class="form-control" data-plugin-maxlength maxlength="100" required disabled/>

                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2"
                                   for="textareaDefault">E-mail</label>

                            <div class="col-lg-4">
                                <input type="email" name="email" value="<?php echo trim($user["email"]); ?>"
                                       class="form-control"/>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Role</label>

                            <div class="col-lg-4">
                                <select name="role" data-plugin-selectTwo class="form-control populate">
                                    <option
                                        value="admin" <?php echo trim($user["role"]) === "admin" ? "selected" : ""; ?> >
                                        Admin
                                    </option>
                                    <option
                                        value="editor" <?php echo trim($user["role"]) === "editor" ? "selected" : ""; ?> >
                                        Editor
                                    </option>
                                    <option
                                        value="salessupervisor" <?php echo trim($user["role"]) === "salessupervisor" ? "selected" : ""; ?> >
                                        Sales Supervisor
                                    </option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2"
                                   for="textareaDefault">Password</label>

                            <div class="col-lg-4">
                                <input type="password" name="pass" class="form-control"/>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2"
                                   for="textareaDefault">Confirm Password</label>

                            <div class="col-lg-4">
                                <input type="password" name="compass" class="form-control"/>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-7">
                                <a href="users.php">
                                    <button type="button" style="float: right" class="mb-1 mt-1 mr-1 btn btn-info">
                                        Cancel
                                    </button>
                                </a>
                                <input type="submit" name="submit" style="float: right"
                                       class="mb-1 mt-1 mr-1 btn btn-success"
                                       value="Update">
                            </div>
                        </div>

                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>
</div>

</section>

<!-- Vendor -->
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="vendor/jquery-cookie/jquery-cookie.js"></script>
<script src="master/style-switcher/style.switcher.js"></script>
<script src="vendor/popper/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.js"></script>
<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="vendor/common/common.js"></script>
<script src="vendor/nanoscroller/nanoscroller.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="vendor/jquery-ui/jquery-ui.js"></script>
<script src="vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
<script src="vendor/select2/js/select2.js"></script>
<script src="vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>
<script src="vendor/fuelux/js/spinner.js"></script>
<script src="vendor/dropzone/dropzone.js"></script>
<script src="vendor/bootstrap-markdown/js/markdown.js"></script>
<script src="vendor/bootstrap-markdown/js/to-markdown.js"></script>
<script src="vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script src="vendor/codemirror/lib/codemirror-2.html"></script>
<script src="vendor/codemirror/addon/selection/active-line.html"></script>
<script src="vendor/codemirror/addon/edit/matchbrackets.html"></script>
<script src="vendor/codemirror/mode/javascript/javascript.html"></script>
<script src="vendor/codemirror/mode/xml/xml.html"></script>
<script src="vendor/codemirror/mode/htmlmixed/htmlmixed.html"></script>
<script src="vendor/codemirror/mode/css/css.html"></script>
<script src="vendor/summernote/summernote-bs4.js"></script>
<script src="vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="vendor/ios7-switch/ios7-switch.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>
<!-- Analytics to Track Preview Website -->
<script>          (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-42715764-8', 'auto');
    ga('send', 'pageview');        </script>
<!-- Examples -->
<script src="js/examples/examples.advanced.form.js"></script>

</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.0.0/forms-advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Feb 2018 14:39:55 GMT -->
</html>
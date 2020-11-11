<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php");
confirm_admin_logged_in()
?>
<?php
$k = 1;
$cats = find_all_Category();
$cat = find_product_group_by_id($_GET["id"]);


if (isset($_POST["submit"])) {
    if (isset($_POST["pro"])) {

        $id = $cat["id"];
        $image = upload_image_with_title($cat["product_Id"],"image");

        if (empty($image)) {
            $image = $cat["image"];
			$query = "UPDATE [dbo].[product_group] SET ";
			$query .= "[image] = NULL ";
			$query .= "WHERE [id] = '{$id}'; ";
			$result = sqlsrv_query($connection, $query);
        } else {
            $query = "UPDATE [dbo].[product_group] SET ";
			$query .= "[image] = NULL ";
			$query .= "WHERE [id] = '{$id}'; ";
			$result = sqlsrv_query($connection, $query);
        }

        $query = "UPDATE [dbo].[product_group] SET ";
        $query .= "[image] = N'{$image}'";
        $query .= "WHERE [id] = '{$id}'; ";
        $result = sqlsrv_query($connection, $query);

        if ($result) {
            // Success
            $_SESSION["art_message"] = "Successfully Updated";

            redirect_to("productGroup.php");
        } else {
            // Failure
            $_SESSION["art_error"] = "Update failed.";
        }

    } else {
        $_SESSION["art_error"] = "Please Fill All Fields ";
    }
}
include_once("header.php")
?>
<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Category 2</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Category 2</span></li>
            </ol>

        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Edit Category 2</h2>
                </header>
                <div class="card-body">
                    <?php echo art_message(); ?>
                    <form class="form-horizontal form-bordered" action="#" method="post" enctype='multipart/form-data'>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Category 1</label>

                            <div class="col-lg-4">
                                <select name="cat" disabled data-plugin-selectTwo class="form-control populate" required>
                                    <option value="">Select Category 1</option>
                                    <?php
                                    while ($row = sqlsrv_fetch_array($cats, SQLSRV_FETCH_ASSOC)) {
                                        ?>
                                        <option <?php if($row["id"] == $cat["category_id"]){echo 'selected';}?>
                                            value="<?php echo $row["id"] ?>"><?php echo $row["title_en"] . "/ " . $row["title_am"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Category 2</label>

                            <div class="col-lg-4">
                                <select name="pro" readonly data-plugin-selectTwo class="form-control populate" required>
                                    <option value="<?php echo $cat["id"] ?>">
                                        <?php echo $cat["title_en"] . "/ " . $cat["title_am"]; ?>
                                    </option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Category 2 Image</label>

                            <div class="col-lg-4">
                                <input type="file" name="image" class="form-control" />

                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-lg-6">
                                <a href="productGroup.php">
                                    <button type="button" style="float: right" class="mb-1 mt-1 mr-1 btn btn-info">
                                        Cancel
                                    </button>
                                </a>
                                <input type="submit" name="submit" style="float: right"
                                       class="mb-1 mt-1 mr-1 btn btn-success"
                                       value="Update Category 2">
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>

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

<script>
    $(document).ready(function () {
        $("#pro").change(function () {
            var pro = $(this).val();
            $.ajax({
                url: "test/JobCategory.php",
                data: {pro_id: pro},
                type: 'POST',
                success: function (response) {
                    var resp = $.trim(response);
                    $("#parent").html(resp);
                }
            });
        });
    });

</script>

</body>

</html>
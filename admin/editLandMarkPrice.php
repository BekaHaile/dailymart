<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php");
confirm_admin_logged_in()
?>
<?php
$k = 1;
$landMarkPrice = find_land_mark_price_by_entry_no($_GET["id"]);
$landMarkDesc = find_land_mark_by_id($landMarkPrice["land_mark_code"]);
$shopDesc = find_shop_by_id($landMarkPrice["shop_code"]);
$date = find_date_by_date($landMarkPrice['date']);

if (isset($_POST["submit"])) {
    if (isset($_POST["txt_price"])) {

        $id = $landMarkPrice["id"];
       
		$price = $_POST["txt_price"];

        
        $user = $_SESSION["admin_id"];

        $query = "UPDATE [dbo].[land_mark_price] SET ";
        $query .= "[price] = N'{$price}' ";
        
        $query .= "WHERE [id] = '{$id}'; ";
        $result = sqlsrv_query($connection, $query);

        if ($result) {
            // Success
            $_SESSION["art_message"] = "Successfully Updated";

            redirect_to("landMarkPrice.php");
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
        <h2>Land Mark Price</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Land Mark Price</span></li>
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

                    <h2 class="card-title">Edit Land Mark Price</h2>
                </header>
                <div class="card-body">
                    <?php echo art_message(); ?>
                    <form class="form-horizontal form-bordered" action="#" method="post" enctype='multipart/form-data'>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Date</label>

                            <div class="col-lg-4">
                                <select name="slc_date" disabled data-plugin-selectTwo class="form-control populate"
                                        required>
                                    <option value="<?php echo $landMarkPrice["date"]; ?>">
                                        <?php echo $date['title_en']." / ".$date['title_am']; ?>
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Time Range</label>

                            <div class="col-lg-4">
                                <select name="slc_time_range" readonly data-plugin-selectTwo class="form-control populate"
                                        required>
                                    <option value="<?php  echo $landMarkPrice["time_range"]; ?>">
                                        <?php echo $landMarkPrice["time_range"]; ?>
                                    </option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Land Mark</label>

                            <div class="col-lg-4">
                                <select name="slc_land_mark" readonly data-plugin-selectTwo class="form-control populate"
                                        required>
                                    <option value="<?php echo $landMarkPrice["land_mark_code"]; ?>">
                                        <?php echo $landMarkDesc['title_en']." / ".$landMarkDesc['title_am'];?>
                                    </option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Shop</label>

                            <div class="col-lg-4">
                                <select name="slc_shop" readonly data-plugin-selectTwo class="form-control populate"
                                        required>
                                    <option value="<?php echo $landMarkPrice["shop_code"]; ?>">
                                        <?php echo $shopDesc['title_en']." / ".$shopDesc['title_am']; ?>
                                    </option>

                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2"
                                   for="textareaDefault">Price </label>

                            <div class="col-lg-4">
                                <textarea class="form-control"
                                          name="txt_price"><?php echo $landMarkPrice['price']; ?></textarea>
										  

                            </div>
                        </div>

                    


                        <div class="form-group row">
                            <div class="col-lg-6">
                                <a href="item.php">
                                    <button type="button" style="float: right" class="mb-1 mt-1 mr-1 btn btn-info">
                                        Cancel
                                    </button>
                                </a>
                                <input type="submit" name="submit" style="float: right"
                                       class="mb-1 mt-1 mr-1 btn btn-success"
                                       value="Update Item">
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
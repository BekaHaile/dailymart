<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
$k = 1;
$cat = find_all_Category();

if (isset($_POST["submit"])) {
    if (isset($_POST["brand"])) {

        $brands = $_POST["brand"];
        $image = upload_image("image");
        $user = $_SESSION["admin_id"];

        create_brand($brands, $image, $user);

    } else {
        $_SESSION["art_error"] = "Please Fill All Fields ";
    }
}
include_once("header.php")
?>
<section role="main" class="content-body card-margin">
    <header class="page-header">
        <h2>Category</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Category 3</span></li>
            </ol>

        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">

                    <h2 class="card-title">Create Category 3</h2>
                </header>
                <div class="card-body">
                    <?php echo art_message(); ?>
                    <form class="form-horizontal form-bordered" action="#" method="post" enctype='multipart/form-data'>

						<div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Category 1</label>

                            <div class="col-lg-4">
                                <select name="cat" id="cat" data-plugin-selectTwo class="form-control populate" required>
                                    <option value="">Select Category 1</option>
                                    <?php
                                    while ($row = sqlsrv_fetch_array($cat, SQLSRV_FETCH_ASSOC)) {
                                        ?>
                                        <option
                                            value="<?php echo $row["id"] ?>"><?php echo $row["title_en"] . "/ " . $row["title_am"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Category 2</label>

                            <div class="col-lg-4">
                                <select name="pro" id="pro" data-plugin-selectTwo class="form-control populate" required>
                                    <option value="">Select Category 2</option>
                                    
                                </select>
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Category 3</label>

                            <div class="col-lg-4">
                                <select name="brand" id="brand" data-plugin-selectTwo class="form-control populate" required>
                                    <option value="">Select Category 3</option>
                                
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-2 control-label text-lg-right pt-2">Category 3 Image</label>

                            <div class="col-lg-4">
                                <input type="file" name="image" class="form-control" required/>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <a href="brand.php">
                                    <button type="button" style="float: right" class="mb-1 mt-1 mr-1 btn btn-info">
                                        Cancel
                                    </button>
                                </a>
                                <input type="submit" name="submit" style="float: right"
                                       class="mb-1 mt-1 mr-1 btn btn-success"
                                       value="Create Category 3">
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

<!-- Examples -->
<script src="js/examples/examples.advanced.form.js"></script>

<script>
    $(document).ready(function () {
        $("#cat").change(function () {
            var cat = $(this).val();
            $.ajax({
                url: "test/data.php",
                data: {category_id: cat},
                type: 'POST',
                success: function (response) {
                    var resp = $.trim(response);
                    $("#pro").html(resp);
                }
            });
        });
    });

	$(document).ready(function () {
        $("#pro").change(function () {
            var pro = $(this).val();
            $.ajax({
                url: "test/data.php",
                data: {product_id: pro},
                type: 'POST',
                success: function (response) {
                    var resp = $.trim(response);
                    $("#brand").html(resp);
                }
            });
        });
    });
</script>

</body>

</html>
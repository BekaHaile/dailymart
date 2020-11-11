<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php");
confirm_admin_logged_in()
?>
<?php
$k = 1;
$cat = find_all_Category();
$date = find_all_Date();
$time_range = find_all_Time_range();
$land_mark = find_all_Land_mark();
if (isset($_POST["submit"])) {
    if (isset($_POST["item"])) {

        $item = $_POST["item"];
        $specen = $_POST["specen"];
        $specam = $_POST["specam"];
        $image = upload_image("image");
        $user = $_SESSION["admin_id"];

        create_item($item, $specen, $specam, $image, $user);

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

                    <h2 class="card-title">Create Land Mark Price</h2>
                </header>
                <div class="card-body">
                    <?php echo art_message(); ?>
					<div id="dv_message"></div>
                    <form class="form-horizontal form-bordered" action="#" method="post" enctype='multipart/form-data' id="frm_land_mark">

						<div class="form-group row">
                           <!-- <label class="col-lg-3 control-label text-lg-right pt-2" style="text-align:left;">Date</label>
							<label class="col-lg-3 control-label text-lg-right pt-2" style="text-align:left;">Time Range</label>
							<label class="col-lg-3 control-label text-lg-right pt-2" style="text-align:left;">Land Mark</label> -->
                            
                            <div class="col-lg-4 col-md-4 col-sm-4" >
							<label class=" control-label text-lg-right pt-2" style="text-align:left;">Date</label>
                                <select name="slc_date" id="cat" data-plugin-selectTwo class="form-control populate" required>
                                    <option value="">Select Date</option>
                                    <?php
                                    while ($row = sqlsrv_fetch_array($date, SQLSRV_FETCH_ASSOC)) {
                                        ?>
                                        <option
                                            value="<?php echo $row["id"] ?>"><?php echo $row["title_en"] . "/ " . $row["title_am"]; ?></option>
                                    <?php } ?>
                                </select>
								 <input type="submit" name="submit" 
                                       class="mb-1 mt-1 mr-1 btn btn-success"
                                       value="View" id="btn_view">
								
                            </div>
							
							 <div class="col-lg-4 col-md-4 col-sm-4">
							 <label class=" control-label text-lg-right pt-2" style="text-align:left;">Time Range</label>
                                <select name="slc_time_range" id="pro" data-plugin-selectTwo class="form-control populate" required>
                                    <option value="">Select Time Range</option>
                                     <?php
                                    while ($row = sqlsrv_fetch_array($time_range, SQLSRV_FETCH_ASSOC)) {
                                        ?>
                                        <option
                                            value="<?php echo $row["id"] ?>"><?php echo $row["time_range"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
							 
							 <div class="col-lg-4 col-md-4 col-sm-4">
							 <label class=" control-label text-lg-right pt-2" style="text-align:left;">Land Mark</label>
                                <select name="slc_land_mark" id="brand" data-plugin-selectTwo class="form-control populate" required>
                                    <option value="">Select Land Mark</option>
                                <?php
                                    while ($row = sqlsrv_fetch_array($land_mark, SQLSRV_FETCH_ASSOC)) {
                                        ?>
                                        <option
                                             value="<?php echo $row["id"] ?>"><?php echo $row["title_en"] . "/ " . $row["title_am"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
							
							
							
						
                        </div>
						
                       
                        <br>
                        <br>
                        <br>
                        <br>

                    </form>
					<div id="dv_shops" >
					
					</div>
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

<script src="js/examples/examples.advanced.form.js"></script>

<script>
   /* $(document).ready(function () {
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
                data: {br_id: pro},
                type: 'POST',
                success: function (response) {
                    var resp = $.trim(response);
                    $("#brand").html(resp);
                }
            });
        });
    });

	$(document).ready(function () {
        $("#brand").change(function () {
            var brand = $(this).val();
            $.ajax({
                url: "test/data.php",
                data: {brand_id: brand},
                type: 'POST',
                success: function (response) {
                    var resp = $.trim(response);
                    $("#item").html(resp);
                }
            });
        });
    }); */
	$(document).ready(function () {
	
		
		$('#btn_view').click(function(){
	 url_land_mark= "test/show_shop.php";
	//url_land_mark= "/show_shop.php"; $('#frm_land_mark').serialize()
    $.post(url_land_mark, $("#frm_land_mark").serialize() ,function(data){  //to decide to show the div or not
        $('#dv_shops').html(data);
		$(".txt_price").blur(function(){
           //alert("hello");
		   url_shop = "test/save_shop.php";
		$.post(url_shop, $(this).closest('form').serialize() ,function(data){
		$('#dv_message').html(data);
	});
        });
		
		
		
        
    });
	return false;
});
    });
	
	
</script>

</body>

</html>
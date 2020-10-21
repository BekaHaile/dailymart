<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php 









$date_value = "";
$time_range_value="";
$land_mark_value = "";
if(isset($_POST['slc_date']) && isset($_POST['slc_time_range']) && isset($_POST['slc_land_mark'])){
	$date_value = $_POST['slc_date'];
	$time_range_value = $_POST['slc_time_range'];
	$land_mark_value = $_POST['slc_land_mark'];
	
}


?>


<div>
      
</div>
<div id="dv_shops">


<?php 
$find_all_shops = find_all_shops();
$size_all_shop_codes = count($find_all_shops[0]); 
for($i = 0; $i < $size_all_shop_codes ; $i++){
?>
<form action="" method="post" class="frm_shop">
<input type="text" name="txt_date" id="txt_date" style="display:none;" value="<?php echo $date_value; ?>" />
<input type="text" name="txt_time_range" id="txt_time_range" style="display:none;" value="<?php echo $time_range_value; ?>"/>
<input type="text" name="txt_land_mark" id="txt_land_mark" style="display:none;" value="<?php echo $land_mark_value; ?>"/>
<label><?php echo $find_all_shops[1][$i];?></label>
<input type="text" name="txt_shop" id="txt_shop" style="display:none;" value="<?php echo $find_all_shops[0][$i] ?>" />
<input type="text" value="" id="<?php echo $find_all_shops[0][$i];    ?>" class="txt_price" name="txt_price" />

</form>
<?php  } ?> 

</div>
</div>          
    <!-- Jquery JS-->
	 
  <!--     <script type="text/javascript" src="bootstrap2.min.js"></script> 
  
  
	<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
	
	 <script type="text/javascript" src="land_mark.js"></script> 
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


<!-- end document-->
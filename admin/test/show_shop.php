<?php include("../../includes/db_connection.php"); ?>
<?php include("../../includes/functions.php"); ?>
<?php

$date_value = "";
$time_range_value="";
$land_mark_value = "";
if(isset($_POST['slc_date']) && isset($_POST['slc_time_range']) && isset($_POST['slc_land_mark'])){
	$date_value = find_date_by_id($_POST['slc_date'])['title_en'];
	$time_range_value = find_time_range_by_id($_POST['slc_time_range'])['time_range'];
	$land_mark_value = find_land_mark_by_entry_no($_POST['slc_land_mark'])['code'];
	if($date_value != "" && $time_range_value != "" && $land_mark_value != ""){
		
		
		
	
?>
<div id="dv_shops">


<?php 
$find_all_shops = find_all_shops();
//echo $size_all_shop_codes = count($find_all_shops); 
//for($i = 0; $i < $size_all_shop_codes ; $i++){
	while ($row = sqlsrv_fetch_array($find_all_shops, SQLSRV_FETCH_ASSOC)) {
?>
<form action="" method="post" class="frm_shop">
<input type="text" class = "form-control populate" name="txt_date" id="txt_date" style="display:none;" value="<?php echo $date_value; ?>" />
<input type="text" class = "form-control populate" name="txt_time_range" id="txt_time_range" style="display:none;" value="<?php echo $time_range_value; ?>"/>
<input type="text"  class = "form-control populate" name="txt_land_mark" id="txt_land_mark" style="display:none;" value="<?php echo $land_mark_value; ?>"/>
<div class="form-group row" style="margin-bottom:20px;">

<div class="col-lg-4 col-md-5 col-sm-6" ><label style="float:right;"><?php echo $row['title_en']." / ".$row['title_am'];?></label></div>
<div class="col-lg-4 col-md-5 col-sm-6"><input type="text" class = "form-control populate" name="txt_shop" id="txt_shop" style="display:none;" value="<?php echo $row['location_code']; ?>" />
<input type="text" class = "form-control populate txt_price" value="" id="<?php echo $row['location_code'];    ?>"  name="txt_price" placeholder="Price" />
</div>

</div>
</form>
<?php  } 

}else{ // if they are empty
?>
		<div class="alert alert-danger alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>ERROR!</strong> Please fill all fields!
</div>
<?php		
	}
	
}else{ //	if they are not set
	//echo "no";
	?>
	<div class="alert alert-danger alert-dismissible">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>ERROR!</strong> Not set!
</div>
<?php
}
?> 

</div>

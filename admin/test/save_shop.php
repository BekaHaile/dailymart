<?php include("../../includes/db_connection.php"); ?>
<?php include("../../includes/functions.php"); ?>
<?php

if(isset($_POST['txt_date']) && isset($_POST['txt_time_range']) && isset($_POST['txt_land_mark']) && isset($_POST['txt_price']) && isset($_POST['txt_shop'])){
	
	//echo "success";
	//echo $_POST['txt_date'];
	$date= $_POST['txt_date'];
	$time_range = $_POST['txt_time_range'];
	$land_mark_code = $_POST['txt_land_mark'];
	//$land_mark_desc = find_land_mark_by_id($land_mark_code)['title'];
	$land_mark_latitude = find_land_mark_by_id($land_mark_code)['latitude'];
	$land_mark_longitude = find_land_mark_by_id($land_mark_code)['longitude'];
	$price = $_POST['txt_price'];
	$shop_code = $_POST['txt_shop'];
	//$shop_desc = find_shop_by_id($shop_code)['location_desc'];
	//echo $shop_desc;
	if(find_land_mark_price_by_id($date,$time_range,$land_mark_code,$shop_code) == null && $price != ""){
	 create_land_mark_price($date, $time_range, $land_mark_code,  $shop_code, $price);
	
	}else{
	
	}
	//echo "successfully saved";
	
}

?>
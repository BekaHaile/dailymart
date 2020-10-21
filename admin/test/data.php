<?php include("../../includes/db_connection.php"); ?>
<?php include("../../includes/functions.php"); ?>
<?php

if (isset($_POST['brand_id'])) {
    $data = $_POST['brand_id'];
	
    $sql = "select * from [dbo].[view_item] WHERE brand_code = {$data} ;";
    $res = sqlsrv_query($connection, $sql);

    echo "<option value=''>Select Category 3</option>";

    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row["item_code"] . "'>" . $row["item_description_english"] . "/ " . $row["item_description_amharic"] . "</option>";
    }

}
elseif (isset($_POST['br_id'])) {
    $data = $_POST['br_id'];
	
   $pro = find_product_group_by_pro_id($data)["id"];

    $sql = "select * from [dbo].[brand] WHERE product_id = {$pro} ;";
    $res = sqlsrv_query($connection, $sql);

    echo "<option value=''>Select Category 3</option>";

    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row["brand_id"] . "'>" . $row["title_en"] . "/ " . $row["title_am"] . "</option>";
    }

}
elseif (isset($_POST['product_id'])) {
    $data = $_POST['product_id'];
	
    $sql = "select * from [dbo].[view_brand] WHERE product_group_code = {$data} ;";
    $res = sqlsrv_query($connection, $sql);

    echo "<option value=''>Select Category 3</option>";

    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row["code"] . "'>" . $row["brand_description"] . "/ " . $row["amharic_name"] . "</option>";
    }

} 
elseif (isset($_POST['category_id'])) {
    $np = $_POST['category_id'];

    $sql = "select * from [dbo].[product_group] WHERE category_id = {$np} ;";
    $res = sqlsrv_query($connection, $sql);

    echo "<option value=''>Select Category 2</option>";

    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row["product_Id"] . "'>" . $row["title_en"] . "/ " . $row["title_am"] . "</option>";
    }
}
elseif (isset($_POST['cat_id'])) {
    $np = $_POST['cat_id'];

    $sql = "select * from [dbo].[view_product_group] WHERE item_catagory_code = {$np} ;";
    $res = sqlsrv_query($connection, $sql);

    echo "<option value=''>Select Category 2</option>";

    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row["code"] . "'>" . $row["group_description"] . "/ " . $row["amharic_name"] . "</option>";
    }
} else {
    header('location: ./');
}
?>

<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php");
confirm_admin_logged_in();
?>
<?php
if(!isset($_POST['category'])){
    $item = find_all_item();
}
else if(isset($_POST['category'])){
    $item = find_item_by_category_id($_POST['category']);
    $category = find_category_by_id($_POST['category']);
}
$category = find_all_Category();
$k = 1;
?>

<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
    <thead>
    <tr>
        <th>No <?php echo $_POST['category'];?> </th>
        <th>Category Title</th>
        <th>Product Group Title</th>
        <th>Brand Title</th>
        <th>Item Title</th>
        <th>Image</th>
        <th>Created By</th>
        <th>Barcode</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $k = 1;
    while ($row = sqlsrv_fetch_array($item, SQLSRV_FETCH_ASSOC)) {
        $category = find_category_by_cat_id($row["category_id"]);
        $product_group = find_product_group_by_pro_id($row["product_id"]);
        $brand = find_brand_by_brand_id($row["brand_id"]);
        ?>
        <tr class="">
            <td><?php echo $k++; ?></td>
            <td><?php echo $category["title_en"]; ?></td>
            <td><?php echo $product_group["title_en"]; ?></td>
            <td><?php echo $brand["title_en"]; ?></td>
            <td><?php echo $row["title_en"]; ?></td>
            <td>
                <img src="<?php echo $row["image"]; ?>"
                        style="height: 50px;width: auto">
            </td>
            <td><?php echo find_all_admin_by_id($row["created_by"])["user_name"]; ?></td>
            <td>
                <img alt='testing' src='barcode.php?codetype=Code39&size=60&text=<?php echo $row["item_id"]; ?>&print=true'/>

            </td>
            <td class="actions">
                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                <a href="editItem.php?id=<?php echo urldecode($row["item_id"]); ?>"
                    class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                <a href="deleteItem.php?id=<?php echo $row["id"] . ''; ?>"
                    onclick="return confirm('Are you sure?');" class="on-default remove-row"><i
                        class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    <?php
    } ?>
    </tbody>
</table>
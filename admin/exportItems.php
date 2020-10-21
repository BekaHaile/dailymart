<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php

$item = find_all_item();

$output = "<table class='table' border = '1'>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Category Title</th>
                            <th>Product Group Title</th>
                            <th>Brand Title</th>
                            <th>Item Title</th>
                            <th>Created By</th>
                        </tr>
                        </thead>
                        <tbody>";



$k = 1;
while ($row = sqlsrv_fetch_array($item, SQLSRV_FETCH_ASSOC)) {
    
    $category = find_category_by_cat_id($row["category_id"]);
    $product_group = find_product_group_by_pro_id($row["product_id"]);
    $brand = find_brand_by_brand_id($row["brand_id"]);

    $output.= "<tr>
                    <td>".$k++."</td>
                    <td>".$category["title_en"] . "/ " . $category["title_am"]."</td>
                    <td>".$product_group["title_en"] . "/ " . $product_group["title_am"]."</td>
                    <td>".$brand["title_en"] . "/ " . $brand["title_am"]."</td>
                    <td>".$row["title_en"]."</td>
                    <td>".find_all_admin_by_id($row["created_by"])["user_name"]."</td>
                </tr>";
}

$output.= "</tbody></table>";



$date = time();
$filename = "Item-report-".$date.".xls";


header("Content-Type: application/x-www-form-urlencoded");
header("Content-Transfer-Encoding: Binary");
header("Content-Disposition: attachment; filename=\"".$filename."\"");

echo $output;

// $writer = new Xlsx($spreadsheet);
// $writer->save('report2.xlsx');

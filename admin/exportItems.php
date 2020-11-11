<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php

if($_GET['category'] == "All"){
    $item = find_all_item();
}
else if($_GET['category'] != "All" && $_GET['product_group'] == "All"){
    $item = find_item_by_category_id($_GET['category']);
}
else if($_GET['product_group'] != "All" && $_GET['brand'] == "All"){
    $item = find_item_by_product_group_id($_GET['product_group']);
}
else if($_GET['brand'] != "All"){
    $item = find_item_by_brand_id($_GET['brand']);
}

$output = "<table class='table' border = '1'>
                        <thead>
                        <tr>
                            <th>Nav Code</th>
							<th>Barcode </th>
                            <th>Category Title</th>
                            <th>Product Group Title</th>
                            <th>Brand Title</th>
                            <th>Item Title</th>
                            <th>Price</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>";



$k = 1;
while ($row = sqlsrv_fetch_array($item, SQLSRV_FETCH_ASSOC)) {
    
    $category = find_category_by_cat_id($row["category_id"]);
    $product_group = find_product_group_by_pro_id($row["product_id"]);
    $brand = find_brand_by_brand_id($row["brand_id"]);
	$price = find_price_by_item_id($row["item_id"]);
    if(file_exists($row['image'])) { 
        $image = 'yes';
     } else { 
        $image = 'no';
      }
    $output.= "<tr>
                    <td>".$row["item_id"]."</td>
                    <td>".$row["item_code1"]."</td>
                    <td>".$category["title_en"]."</td>
                    <td>".$product_group["title_en"]."</td>
                    <td>".$brand["title_en"]."</td>
                    <td>".$row["title_en"]."</td>
                    <td>".$price["price"]."</td>
                    <td>".$image."</td>
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

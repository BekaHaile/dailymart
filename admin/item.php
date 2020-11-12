<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php");
confirm_admin_logged_in();
?>
<?php
if(!isset($_POST['category']) || $_POST['category'] == 'All'){
    $item = find_all_item();
}
else if(isset($_POST['category']) && !isset($_POST['product_group'])){
    $item = find_item_by_category_id($_POST['category']);
    $product_group = find_product_group_by_category_id($_POST['category']);
}
else if(isset($_POST['product_group']) && !isset($_POST['brand'])){
    $item = find_item_by_product_group_id($_POST['product_group']);
    $product_group = find_product_group_by_category_id($_POST['category']);
    $brand = find_brand_by_product_id($_POST['product_group']);
}
else if(isset($_POST['brand'])){
    $item = find_item_by_brand_id($_POST['brand']);
    $product_group = find_product_group_by_category_id($_POST['category']);
    $brand = find_brand_by_product_id($_POST['product_group']);
}
$category = find_all_Category();
$k = 1;
if(!isset($_POST['category'])){
    include_once("header.php");
}
?>

<div id="mainbody">
<section role="main" class="content-body" >
    <header class="page-header">
        <h2>Item </h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs" style="margin-right: 50px;">
                <li>
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Item</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                <div class="card-actions">

                    <div class="row">
                        <div class="col-sm-3">
                                <div class="mb-3">
                                        <button class="btn btn-info" onclick="printItemWithBarcode()">Product Price <i class="fa fa-download"></i>
                                        </button>
                                </div>
                        </div>
                            <div class="col-sm-5">
                                <div class="mb-3">
                                    <button class="btn btn-info" onclick="printItemWithImage()">Item with Image/Barcode <i class="fa fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                    <button class="btn btn-info" onclick="exportItems()">Export to Excel <i class="fa fa-download"></i>
                                    </button>
                            </div>
                        </div>
                    </div>

                    </div>

                    <h2 class="card-title">All Items List</h2>
                </header>
                <div class="card-body">
                    <?php echo art_message();
                    ?>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group mb">
                                <select class="form-control" id="sel1" name="category" onchange="changeFilter()">
                                    <option value="All" disabled hidden selected>Select Category</option>
                                    <option value="All" <?php if(isset($_POST['category'])) { if($_POST['category'] == "All") { echo 'selected';} } ?>>All</option>
                                    <?php while ($row = sqlsrv_fetch_array($category, SQLSRV_FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $row["category_id"]; ?>"
                                    <?php if(isset($_POST['category'])) { if($_POST['category'] == $row["category_id"]) { echo 'selected';} }?>>
                                    <?php echo $row["title_en"]; ?> </option>
                                    <?php } ?>
                                </Select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group mb">
                                <select class="form-control" id="sel2" name="product_group" onchange="changeFilter2()">
                                    <option value="All" disabled hidden selected>Select Product Group</option>
                                    <?php if(isset($_POST['category']) || isset($_POST['product_group'])) { ?>
                                    <option value="All" <?php if(isset($_POST['product_group'])) { if($_POST['product_group'] == "All") { echo 'selected';} } ?>>All</option>
                                    <?php while ($row = sqlsrv_fetch_array($product_group, SQLSRV_FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $row["product_Id"]; ?>"
                                    <?php if(isset($_POST['product_group'])) { if($_POST['product_group'] == $row["product_Id"]) { echo 'selected';} }?>>
                                    <?php echo $row["title_en"]; ?> </option>
                                    <?php } }?>
                                </Select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group mb">
                                <select class="form-control" id="sel3" name="brand" onchange="changeFilter3()">
                                    <option value="All" disabled hidden selected>Select Brand</option>
                                    <?php if(isset($_POST['brand']) || isset($_POST['product_group'])) { ?>
                                    <option value="All" <?php if(isset($_POST['brand'])) { if($_POST['brand'] == "All") { echo 'selected';} } ?>>All</option>
                                    <?php while ($row = sqlsrv_fetch_array($brand, SQLSRV_FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $row["brand_id"]; ?>"
                                    <?php if(isset($_POST['brand'])) { if($_POST['brand'] == $row["brand_id"]) { echo 'selected';} }?>>
                                    <?php echo $row["title_en"]; ?> </option>
                                    <?php } }?>
                                </Select>
                            </div>
                        </div>
                        <!-- <div class="col-sm-1">
                            <input class="btn btn-success w-100" name="submit" type="submit" value="Submit"/>
                         </div> -->
                    </div>
                    <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                        <thead>
                        <tr>
                            <th>Item Id</th>
                            <th>Category Title</th>
                            <th>Product Group Title</th>
                            <th>Brand Title</th>
                            <th>Item Title</th>
							<th>Price </th>
                            <th>Image</th>
                            <!-- <th>Barcode</th> -->
							<?php if (trim($_SESSION["role"]) !== "salessupervisor") { ?>
                            <th>Actions</th>
							<?php } ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $k = 1;
                        while ($row = sqlsrv_fetch_array($item, SQLSRV_FETCH_ASSOC)) {
                            $category = find_category_by_cat_id($row["category_id"]);
                            $product_group = find_product_group_by_pro_id($row["product_id"]);
                            $brand = find_brand_by_brand_id($row["brand_id"]);
							$price = find_price_by_item_id($row["item_id"]);
                            ?>
                            <tr class="">
                                <td><?php echo $row["item_id"]; ?></td>
                                <td><?php echo $category["title_en"]; ?></td>
                                <td><?php echo $product_group["title_en"]; ?></td>
                                <td><?php echo $brand["title_en"]; ?></td>
                                <td><?php echo $row["title_en"]; ?></td>
								<td><?php echo $price['price']; ?> </td>
                                <td>
                                    <img src="<?php echo $row["image"]; ?>"
                                         style="height: 50px;width: auto">
                                </td>
                                <!-- <td><?php echo find_all_admin_by_id($row["created_by"])["user_name"]; ?></td> -->
                                <!-- <td>
                                    <img alt='testing' src='barcode.php?codetype=Code39&size=60&text=<?php echo $row["item_code1"]; ?>&print=true'/>

                                </td> -->
								<?php if (trim($_SESSION["role"]) !== "salessupervisor") { ?>
                                <td class="actions">
                                    <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                    <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                    <a href="editItem.php?id=<?php echo urldecode($row["item_id"]); ?>"
                                       class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                    <a href="deleteItem.php?id=<?php echo $row["id"] . ''; ?>"
                                       onclick="return confirm('Are you sure?');" class="on-default remove-row"><i
                                            class="fa fa-trash-o"></i></a>
                                </td>
								<?php } ?>
                            </tr>
                        <?php
                        } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    </section>
    </div>

</section>
</div>

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
<script src="vendor/select2/js/select2.js"></script>
<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
<script src="vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
<script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>
<!-- Analytics to Track Preview Website -->
<script>          
(function (i, s, o, g, r, a, m) {
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
    ga('send', 'pageview');        
</script>
<!-- Examples -->
<script src="js/examples/examples.datatables.default.js"></script>
<script src="js/examples/examples.datatables.row.with.details.js"></script>
<script src="js/examples/examples.datatables.tabletools.js"></script>
<script> 
function changeFilter(){
    var sel = document.getElementById("sel1");
    var category= sel.options[sel.selectedIndex].value;

    $.ajax({
            url: "item.php",
            data: {category: category},
            method: "POST",
            success: function (rt) {
                var resp = $.trim(rt);

                $("#mainbody").html(resp);
            }
        });
}
function changeFilter2(){
    var sel = document.getElementById("sel1");
    var category= sel.options[sel.selectedIndex].value;

    var sel2 = document.getElementById("sel2");
    var product_group = sel2.options[sel2.selectedIndex].value;

    $.ajax({
            url: "item.php",
            data: {category: category, product_group: product_group},
            method: "POST",
            success: function (rt) {
                var resp = $.trim(rt);

                $("#mainbody").html(resp);
            }
        });
}
function changeFilter3(){
    var sel = document.getElementById("sel1");
    var category= sel.options[sel.selectedIndex].value;

    var sel2 = document.getElementById("sel2");
    var product_group= sel2.options[sel2.selectedIndex].value;

    var sel3 = document.getElementById("sel3");
    var brand = sel3.options[sel3.selectedIndex].value;


    $.ajax({
            url: "item.php",
            data: {category: category, product_group: product_group, brand: brand},
            method: "POST",
            success: function (rt) {
                var resp = $.trim(rt);

                $("#mainbody").html(resp);
            }
        });
}

function printItemWithBarcode (){
    var sel = document.getElementById("sel1");
    var category= sel.options[sel.selectedIndex].value;

    var sel2 = document.getElementById("sel2");
    var product_group= sel2.options[sel2.selectedIndex].value;

    var sel3 = document.getElementById("sel3");
    var brand = sel3.options[sel3.selectedIndex].value;
    
    window.location.href = "printItemBarcode.php?category=" + category+"&product_group="+product_group+"&brand="+brand;

}

function printItemWithImage (){
    var sel = document.getElementById("sel1");
    var category= sel.options[sel.selectedIndex].value;

    var sel2 = document.getElementById("sel2");
    var product_group= sel2.options[sel2.selectedIndex].value;

    var sel3 = document.getElementById("sel3");
    var brand = sel3.options[sel3.selectedIndex].value;
    
    window.location.href = "printItemImage.php?category=" + category+"&product_group="+product_group+"&brand="+brand;

}

function exportItems (){
    var sel = document.getElementById("sel1");
    var category= sel.options[sel.selectedIndex].value;

    var sel2 = document.getElementById("sel2");
    var product_group= sel2.options[sel2.selectedIndex].value;

    var sel3 = document.getElementById("sel3");
    var brand = sel3.options[sel3.selectedIndex].value;
    
    window.location.href = "exportItems.php?category=" + category+"&product_group="+product_group+"&brand="+brand;

}
</script>
</body>

</html>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
$item = find_all_item();
$k = 1;
include_once("header.php")
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Item</h2>

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
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <a href="exportItems.php">
                                        <button class="btn btn-info">Export to Excel <i class="fa fa-download"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <h2 class="card-title">All Items List</h2>
                </header>
                <div class="card-body">
                    <?php echo art_message();
                    ?>

                    <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Category Title</th>
                            <th>Product Group Title</th>
                            <th>Brand Title</th>
                            <th>Item Title</th>
                            <th>Image</th>
                            <th>Created By</th>
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
                                <td><?php echo $category["title_en"] . "/ " . $category["title_am"]; ?></td>
                                <td><?php echo $product_group["title_en"] . "/ " . $product_group["title_am"]; ?></td>
                                <td><?php echo $brand["title_en"] . "/ " . $brand["title_am"]; ?></td>
                                <td><?php echo $row["title_en"] . "/ " . $row["title_am"]; ?></td>
                                <td>
                                    <img src="<?php echo $row["image"]; ?>"
                                         style="height: 50px;width: auto">
                                </td>
                                <td><?php echo find_all_admin_by_id($row["created_by"])["user_name"]; ?></td>
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
                </div>
            </section>
        </div>
    </div>

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
<script>          (function (i, s, o, g, r, a, m) {
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
    ga('send', 'pageview');        </script>
<!-- Examples -->
<script src="js/examples/examples.datatables.default.js"></script>
<script src="js/examples/examples.datatables.row.with.details.js"></script>
<script src="js/examples/examples.datatables.tabletools.js"></script>
</body>

</html>
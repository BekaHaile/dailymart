<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
$k = 1;
$order = find_all_order_by_order_id($_GET["id"], $_GET["customer_id"]);
$singleOrder = find_single_order_by_order_id($_GET["id"], $_GET["customer_id"]);
$order_id = $_GET["id"];
$customer_id = $_GET["customer_id"];

    if (isset($_POST["Delivered"])) {
        $query = "UPDATE [dbo].[order] SET ";
        $query .= "status = '1' ";
        $query .= "WHERE order_id = $order_id AND customer_id = $customer_id; ";
        $result = sqlsrv_query($connection, $query);

        if ($result) {
            // Success
            $_SESSION["art_message"] = "Successfully Updated";

            redirect_to("order.php");
        } else {
            // Failure
            $_SESSION["art_error"] = "Update failed.";
        }
    }

    include_once("header.php");
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Orders</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs" style="margin-right: 50px;">
                <li>
                    <a href="order.php">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Orders</span></li>
            </ol>
        </div>
        <style>
            .alnright { text-align: right; }
            .space {margin-top: 20px;}
        </style>
        
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
                                    <!---<a href="addItem.php">
                                        <button class="btn btn-primary">Add <i class="fa fa-plus"></i>
                                        </button>
                                    </a> -->
                                </div>
                            </div>
                        </div>

                    </div>
                <div class="row">
                        <div class="col-sm-11">
                            <h2 class="card-title"> 
                                <div>
                                <a href="order.php" class="on-default edit-row">
                                    <i class="fa fa-arrow-left"></i>
                                </a> Order details
                                </div>
                            </h2>
                        </div> 
                        <div class="col-sm-1">
                            <a href="orderPdf.php?id=<?php echo urldecode($_GET["id"]);?>&customer_id=<?php echo urldecode($_GET["customer_id"]);?>&total_price=<?php echo urldecode(number_format($_GET["total_price"],2));?>"><button><i class="fa fa-print"></i></button></a>
                            <!-- <a href="javascript:void(processPrint());"><button><i class="fa fa-print"></i></button></a> -->
                            <!-- javascript:void(processPrint()); -->
                        </div>
                </header>
                <div class="card-body">

                <?php echo art_message();
                    ?>

                <?php
                      while ($row = sqlsrv_fetch_array($singleOrder, SQLSRV_FETCH_ASSOC)) {
                          
                        $location = find_shop_by_id($row["location"]);
                        $landMark = find_land_mark_by_id($row["land_mark"]);
                            ?>
            <div id="printMe">
                <div class="row">
                    <div class="col-sm-4">
                       <h3>Daily Mini Mart PLC</h3>
                    </div>
                    <div class="col-sm-4">
                        <h2>Purchase Order</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                       Address 
                    </div>
                    <div class="col-sm-4">
                        DATE: <?php $string=$row["date_time"]->format('Y-m-d'); echo $string; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Addis Ababa City, Yeka Sub City, Woreda 13
                    </div>
                    <div class="col-sm-4">
                        #Order No: <?php $string=$row["order_id"]; echo $string; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <?php $string=$row["delivery_method"]; echo $string; ?>
                    </div>
                    <div class="col-sm-4">
                    Payment Method: <?php $string=$row["payment_method"]; echo $string; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Telephone No.: +251978155119
                    </div>
                    <div class="col-sm-4">
                        Status: <?php if($row['status'] == 0) {echo 'Open';} else echo 'Delivered'?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Shop Location: <?php echo $location['title_en']?>
                    </div>
                </div>

                <!-- customer Detail -->
                <div class="row">
                    <div class="col-sm-4">
                       <h3>Customer</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Name: <?php echo $row['name']?>
                    </div>
                </div>
                <?php if(isset($landmark)){ ?>
                    <div class="row">
                        <div class="col-sm-4">
                            Delivery Address: <?php echo $landmark['title_en']?>
                        </div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-sm-4">
                        Addis Ababa
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Phone No: <?php echo $row['mobile_no']?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Delivery Date: <?php echo $row['delivery_date']?> <?php echo $row['time_range']?>
                    </div>
                    
                </div>

                <?php } ?>

                    <table class="table table-bordered table-striped mb-0 space" id="datatable" style="empty-cells: hide;">
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Item Description</th>
                            <th>Uom</th>
                            <th>Quantity</th>
                            <th class='alnright'>Unit Price</th>
                            <th class='alnright'>Total Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $k = 1;
                        while ($row = sqlsrv_fetch_array($order, SQLSRV_FETCH_ASSOC)) {
                            ?>
                            <tr class="">
                                    <td><?php echo $row["item"]; ?></td>
                                    <td><?php echo $row["item_description"]; ?></td>
                                    <td><?php echo $row["uom"]; ?></td>
                                    <td><?php echo $row["qty"]; ?></td>
                                    <td class='alnright'><?php echo number_format($row["unit_price"],2)."<br>"; ?></td>
                                    <td class='alnright'><?php echo number_format($row["total_price"],2)."<br>"; ?></td>
                            </tr>
                        <?php
                        } ?>
                        <tr>
                        <td style="visibility: hidden;"></td>
                        <td style="visibility: hidden;"></td>
                        <td style="visibility: hidden;"></td>
                        <td style="visibility: hidden;"></td>
                        <td style="visibility: hidden;"></td>
                        <td class='alnright'>Total: <?php echo $_GET["total_price"]."<br>";?></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-5" >
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Comments or Special Instructions</label>
                                <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" disabled></textarea>
                            </div>
                        </div>
                    </div>
    </div>
                    <form class="form-horizontal form-bordered" action="#" method="post" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-sm-5" >
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <input type="submit" name="Delivered" style="float: right"
                                        class="mb-1 mt-1 mr-1 btn btn-success"
                                        value="Delivered">
                                </div>
                            </div>
                        </div>
                     </form>

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

<script src="js/printThis.js"></script>

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
<script language="javascript">
    var gAutoPrint = true;

    function processPrint(){

    if (document.getElementById != null){
    var html = '<HTML>\n<HEAD>\n';
    if (document.getElementsByTagName != null){
    var headTags = document.getElementsByTagName("head");
    if (headTags.length > 0) html += headTags[0].innerHTML;
    }

    html += '\n</HE' + 'AD>\n<BODY>\n';
    var printReadyElem = document.getElementById("printMe");

    if (printReadyElem != null) html += printReadyElem.innerHTML;
    else{
    alert("Error, no contents.");
    return;
    }

    html += '\n</BO' + 'DY>\n</HT' + 'ML>';
    var printWin = window.open("","processPrint");
    printWin.document.open();
    printWin.document.write(html);
    printWin.document.close();

    if (gAutoPrint) printWin.print();
    } else alert("Browser not supported.");

    }
</script>
</body>

</html>	
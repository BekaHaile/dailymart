<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php");
confirm_admin_logged_in()
?>
<?php
include_once("header.php");
$balance = "";
$balances = "";
$total = "";
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Dashboard</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs" style="padding-right: 50px">
                <li>
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Dashboard</span></li>
            </ol>
        </div>
    </header>


    <!-- end: page -->
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
<script src="vendor/jquery-appear/jquery-appear.js"></script>
<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="vendor/flot/jquery.flot.js"></script>
<script src="vendor/flot.tooltip/flot.tooltip.js"></script>
<script src="vendor/flot/jquery.flot.pie.js"></script>
<script src="vendor/flot/jquery.flot.categories.js"></script>
<script src="vendor/flot/jquery.flot.resize.js"></script>
<script src="vendor/jquery-sparkline/jquery-sparkline.js"></script>
<script src="vendor/raphael/raphael.js"></script>
<script src="vendor/morris/morris.js"></script>
<script src="vendor/gauge/gauge.js"></script>
<script src="vendor/snap.svg/snap.svg.js"></script>
<script src="vendor/liquid-meter/liquid.meter.js"></script>
<script src="vendor/chartist/chartist.js"></script>

<!-- Specific Page Vendor -->
<script src="vendor/select2/js/select2.js"></script>
<script src="vendor/datatables/jquery.dataTables.min1.js"></script>
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
<style>
    #ChartistCSSAnimation .ct-series.ct-series-a .ct-line {
        fill: none;
        stroke-width: 4px;
        stroke-dasharray: 5px;
        -webkit-animation: dashoffset 1s linear infinite;
        -moz-animation: dashoffset 1s linear infinite;
        animation: dashoffset 1s linear infinite;
    }

    #ChartistCSSAnimation .ct-series.ct-series-b .ct-point {
        -webkit-animation: bouncing-stroke 0.5s ease infinite;
        -moz-animation: bouncing-stroke 0.5s ease infinite;
        animation: bouncing-stroke 0.5s ease infinite;
    }

    #ChartistCSSAnimation .ct-series.ct-series-b .ct-line {
        fill: none;
        stroke-width: 3px;
    }

    #ChartistCSSAnimation .ct-series.ct-series-c .ct-point {
        -webkit-animation: exploding-stroke 1s ease-out infinite;
        -moz-animation: exploding-stroke 1s ease-out infinite;
        animation: exploding-stroke 1s ease-out infinite;
    }

    #ChartistCSSAnimation .ct-series.ct-series-c .ct-line {
        fill: none;
        stroke-width: 2px;
        stroke-dasharray: 40px 3px;
    }

    @-webkit-keyframes dashoffset {
        0% {
            stroke-dashoffset: 0px;
        }

        100% {
            stroke-dashoffset: -20px;
        }

    ;
    }

    @-moz-keyframes dashoffset {
        0% {
            stroke-dashoffset: 0px;
        }

        100% {
            stroke-dashoffset: -20px;
        }

    ;
    }

    @keyframes dashoffset {
        0% {
            stroke-dashoffset: 0px;
        }

        100% {
            stroke-dashoffset: -20px;
        }

    ;
    }

    @-webkit-keyframes bouncing-stroke {
        0% {
            stroke-width: 5px;
        }

        50% {
            stroke-width: 10px;
        }

        100% {
            stroke-width: 5px;
        }

    ;
    }

    @-moz-keyframes bouncing-stroke {
        0% {
            stroke-width: 5px;
        }

        50% {
            stroke-width: 10px;
        }

        100% {
            stroke-width: 5px;
        }

    ;
    }

    @keyframes bouncing-stroke {
        0% {
            stroke-width: 5px;
        }

        50% {
            stroke-width: 10px;
        }

        100% {
            stroke-width: 5px;
        }

    ;
    }

    @-webkit-keyframes exploding-stroke {
        0% {
            stroke-width: 2px;
            opacity: 1;
        }

        100% {
            stroke-width: 20px;
            opacity: 0;
        }

    ;
    }

    @-moz-keyframes exploding-stroke {
        0% {
            stroke-width: 2px;
            opacity: 1;
        }

        100% {
            stroke-width: 20px;
            opacity: 0;
        }

    ;
    }

    @keyframes exploding-stroke {
        0% {
            stroke-width: 2px;
            opacity: 1;
        }

        100% {
            stroke-width: 20px;
            opacity: 0;
        }

    ;
    }
</style>
<script src="js/examples/examples.datatables.default.js"></script>
<script src="js/examples/examples.datatables.row.with.details.js"></script>
<script src="js/examples/examples.datatables.tabletools.js"></script>

<script src="js/examples/examples.charts.js"></script>
</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.0.0/ui-elements-charts.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Feb 2018 14:39:20 GMT -->
</html>
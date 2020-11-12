<?php
/**
 * Created by PhpStorm.
 * User: Melkamu
 * Date: 4/2/2019
 * Time: 9:26 AM
 */
include("../includes/db_connection.php");
include("../includes/functions.php");

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf/tcpdf.php');
//require_once('tcpdf/tcpdf_barcodes_1d.php');
require_once('tcpdf_lib/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Melkamu Mitiku');
//$pdf->SetTitle(find_class_by_id($_GET["class"])["title"]);
//$pdf->SetSubject(find_class_by_id($_GET["class"])["title"] . " Certificate");
$pdf->SetKeywords('Certificate');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, 6, 5,0);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// convert TTF font to TCPDF format and store it on the fonts folder
$fontname = TCPDF_FONTS::addTTFfont('tcpdf/fonts/nyala.ttf', 'TrueTypeUnicode', '', 36);

// use the font
$pdf->SetFont($fontname, '', 9, '', false);

// set font
//$pdf->SetFont('times', 'BI', 12);

//$students = find_student_by_class_id($_GET["class"]);
//while ($row = mysqli_fetch_assoc($students)) {
// add a page
$pdf->AddPage('p', 'A4');

//$html .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';
//    $flp = fetch_flp();

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

$k = 1;
$i = 1;
$item1 = "";
$item2 = "";
$item3 = "";
$item4 = "";
$item5 = "";
$output = "<style>
    table, th, tr {
        text-align:center;
    }
    th, tr {
        padding: 10px;
    }
    tr { page-break-inside:avoid; page-break-after:auto }

    table {
        page-break-inside: auto;
      }
      tr {
        page-break-inside: avoid;
        page-break-after: auto;
      }
      thead {
        display: table-header-group;
      }
      tfoot {
        display: table-footer-group;
      }
	  .bolded {
		  font-weight: bold;
		  font-size: 18px;
	  }
</style>";

$output .= '<table CELLSPACING=10 CELLPADDING=10 border="1"> <tbody>';
while ($row = sqlsrv_fetch_array($item, SQLSRV_FETCH_ASSOC)) {
    $price = find_price_by_item_id($row['item_id']);

    if ($k == 1) {
        $item1 = $row;
    } else if ($k == 2) {
        $item2 = $row;
    } else if ($k == 3) {
        $item3 = $row;
    } else if ($k == 4) {
        $item4 = $row;
    } else if ($k == 5) {
        $item5 = $row;

        $output .= '<tr nobr="true" style="font-weight: normal;text-align: center;padding-bottom: 20px;font-size: 8px;width: 100%">';
        for ($x = 1; $x <= 5; $x++) {

            if ($x == 1) {

                $output .= '<th style="font-weight: bolder;text-align: center;font-size: 13px;width: 20%;"><br><div>' . $item1['item_code1'] . '</div>' . $item1['title_en'] . '<div class="bolded">' . find_price_by_item_id($item1['item_id'])["price"] . ' birr' . '</div><br>';
               
				$output .= '</th>';
            } else if ($x == 2) {
                $output .= '<th style="font-weight: normal;text-align: center;font-size: 13px;width: 20%"><br><div>' . $item2['item_code1'] . '</div>' . $item2['title_en'] . '<div class="bolded">' . find_price_by_item_id($item2['item_id'])["price"] . ' birr' . '</div><br>';
               
				$output .= '</th>';
            } else if ($x == 3) {
                $output .= '<th style="font-weight: bolder;text-align: center;font-size: 13px;width: 20%"><br><div>' . $item3['item_code1'] . '</div>'. $item3['title_en'] . '<div class="bolded">' . find_price_by_item_id($item3['item_id'])["price"] . ' birr' . '</div><br>';
               
				$output .= '</th>';
            } else if ($x == 4) {
                $output .= '<th style="font-weight: bolder;text-align: center;font-size: 13px;width: 20%"><br><div>' . $item4['item_code1'] . '</div>' . $item4['title_en'] . '<div class="bolded">' . find_price_by_item_id($item4['item_id'])["price"] . ' birr' . '</div><br>';
              
				$output .= '</th>';
            } else if ($x == 5) {
                $output .= '<th style="font-weight: bolder;text-align: center;font-size: 13px;width: 20%"><br><div>' . $item5['item_code1'] . '</div>' . $item5['title_en'] . '<div class="bolded">' . find_price_by_item_id($item5['item_id'])["price"] . ' birr' . '</div><br>';
               
				$output .= '</th>';
            }
        }

        $output .= '</tr>';
        $k = 0;
    }
    $k++;
}

$output .= '</tbody>
                </table>';

$html = $output;

$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output("Item.pdf", 'I');

//============================================================+
// END OF FILE
//============================================================+
?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
require('fpdf.php');

$k = 1;
$order = find_all_order_by_order_id($_GET["id"], $_GET["customer_id"]);
$singleOrder = find_single_order_by_order_id($_GET["id"], $_GET["customer_id"]);
$total = $_GET["total_price"];

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../account/images/logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(276,5,'Customer Order',0,0,'C');
    $this->Ln();
    // Title
    // $this->Cell(30,10,'Customer Order',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

function userDetail($singleOrder){
    while ($row = sqlsrv_fetch_array($singleOrder, SQLSRV_FETCH_ASSOC)) {
        $location = find_shop_by_id($row["location"]);
        $landMark = find_land_mark_by_id($row["land_mark"]);
        $string=$row["date_time"]->format('Y-m-d');
        
        $this->setFont('Times','B',12);
        $this->Cell(80,10,'Name: '.$row['name'],0,0,'C');
        $this->Cell(230,10,'Phone No: '.$row['mobile_no'],0,0,'C');
        $this->Ln();
        $this->Cell(80,10,'Payment Method: '.$row['payment_method'],0,0,'C');
        $this->Cell(230,10,'Delivery Type: '.$row['delivery_method'],0,0,'C');
        $this->Ln();
        $this->Cell(80,10,'Order Date: '.$string,0,0,'C');
        $this->Cell(230,10,'Delivery Date: '.$row['delivery_date'],0,0,'C');
        $this->Ln();
        $this->Cell(80,10,'Delivery Time: '.$row['time_range'],0,0,'C');
        $this->Cell(230,10,'Shop Location: '.$location,0,0,'C');
        $this->Ln();
        $this->Cell(80,10,'Customer Location: '.$landMark['title_en'],0,0,'C');
        if($row['status'] == 0)
            $this->Cell(230,10,'Delivery Status: Open',0,0,'C');
        else
            $this->Cell(230,10,'Delivery Status: Delivered',0,0,'C');
        $this->Ln();
        $this->Ln(20);
    }
}

function headerTable(){
    $this->setFont('Times','B',12);
    $this->Cell(40,10,'Item', 1,0,'C');
    $this->Cell(50,10,'Item Description', 1,0,'C');
    $this->Cell(40,10,'Uom', 1,0,'C');
    $this->Cell(40,10,'Quantity', 1,0,'C');
    $this->Cell(40,10,'Unit Price', 1,0,'R');
    $this->Cell(40,10,'Total Price', 1,0,'R');
    $this->Ln();
}
function viewTable($order, $total){
    while ($row = sqlsrv_fetch_array($order, SQLSRV_FETCH_ASSOC)) {
        $this->Cell(40,10,$row['item'], 1,0,'C');
        $this->Cell(50,10,$row['item_description'], 1,0,'L');
        $this->Cell(40,10,$row['uom'], 1,0,'L');
        $this->Cell(40,10,$row['qty'], 1,0,'C');
        $this->Cell(40,10,$row['unit_price'], 1,0,'R');
        $this->Cell(40,10,$row['total_price'], 1,0,'R');
        $this->Ln();
    }
    $this->Cell(250,10,'Total Price: '.$total,0,0,'R');
}

}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->userDetail($singleOrder);
$pdf->headerTable();
$pdf->viewTable($order, $total);
$pdf->SetFont('Times','',12);
$pdf->Output('I', $_GET["id"].'.pdf');
?>
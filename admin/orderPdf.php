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
    $this->Cell(200,5,'Order Info',0,0,'C');
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
        $orderId=$row["order_id"];

        $this->SetFont('Arial','B',13);
        // Move to the right
        $this->Cell(120,10,'Daily Mini Mart PLC',0,0,'L');
        $this->Cell(210,10,'Purchase Order',0,0,'L');
        $this->Ln();
        
        $this->setFont('Times', '', 10);
        
        $this->Cell(120,5,'Address: Addis Ababa, Yeka Sub City, Woreda 13',0,0,'L');
        $this->Cell(35,5,'DATE ',0,0,'L');
        $this->Cell(35,5,$string,0,0,'L');
        $this->Ln();

        $this->Cell(120,5,'Delivery Method: '.$row["delivery_method"],0,0,'L');
        $this->Cell(35,5,'#Order No ',0,0,'L');
        $this->Cell(35,5,$orderId,0,0,'L');
        $this->Ln();
        
        $this->Cell(120,5,'Phone: +251978155119',0,0,'L');
        $this->Cell(35,5,'Payment Method ',0,0,'L');
        $this->Cell(35,5,$row["payment_method"],0,0,'L');
        $this->Ln();
        
        $this->Cell(120,5,'Shop Location: '.$location['title_en'],0,0,'L');
        if($row['status'] == 0){
            $this->Cell(35,5,'Status',0,0,'L');
            $this->Cell(35,5,'Open',0,0,'L');
        }
        else{
            $this->Cell(35,5,'Status',0,0,'L');
            $this->Cell(35,5,'Delivered',0,0,'L');
        }
        $this->Ln();
        $this->Ln(5);


        $this->SetFont('Arial','B',13);
        // Move to the right
        $this->Cell(120,10,'Customer',0,0,'L');
        $this->Ln();

        $this->setFont('Times','',10);

        $this->Cell(120,5,$row['name'],0,0,'L');
        $this->Ln();
        if(isset($landMark)){
            $this->Cell(120,5,$landMark['title_en'],0,0,'L');
            $this->Ln();
        }
        $this->Cell(120,5,'Phone No: '.$row['mobile_no'],0,0,'L');
        $this->Ln();
        $this->Cell(120,5,'Delivery Date: '.$row['delivery_date'],0,0,'L');
        $this->Ln();
    
        $this->Ln(5);
    }
}

function headerTable(){
    $this->setFont('Times','B',12);
    $this->SetFillColor(240, 240, 240);
    $this->Cell(26,10,'Item', 1,0,'C');
    $this->Cell(85,10,'Item Description', 1,0,'C');
    $this->Cell(17,10,'Uom', 1,0,'C');
    $this->Cell(17,10,'Qty', 1,0,'C');
    $this->Cell(25,10,'Unit Price', 1,0,'R');
    $this->Cell(25,10,'Total Price', 1,0,'R');
    $this->Ln();
}
function viewTable($order, $total){
    $this->setFont('Times','',10);
    while ($row = sqlsrv_fetch_array($order, SQLSRV_FETCH_ASSOC)) {
        $barcode = find_item_by_item_id($row['item']);

        $this->Cell(26,7,$barcode['item_code1'], 1,0,'C');
        $this->Cell(85,7,$row['item_description'], 1,0,'L');
        $this->Cell(17,7,$row['uom'], 1,0,'L');
        $this->Cell(17,7,$row['qty'], 1,0,'C');
        $this->Cell(25,7,$row['unit_price'], 1,0,'R');
        $this->Cell(25,7,$row['total_price'], 1,0,'R');
        $this->Ln();
    }
    $this->Cell(170,7,'SUBTOTAL ',0,0,'R');
    $this->Cell(25,7, $total,1,0,'R');
    $this->Ln();
    $this->Cell(40,7,'Comments or Special Instructions',0,0,'L');
    $this->Cell(130,7,'TAX ',0,0,'R');
    $this->Cell(25,7, ' - ',1,0,'R');
    $this->Ln();
    $this->Cell(60,7,'',0,0,'L', true);
    $this->Cell(110,7,'SHIPPING ',0,0,'R');
    $this->Cell(25,7, ' - ',1,0,'R');
    $this->Ln();
    $this->Cell(60,7,'',0,0,'L', true);
    $this->Cell(85,7,'',0,0,'R');
    $this->Cell(25,7,'OTHER ','B',0,'R');
    $this->Cell(25,7, ' - ',1,0,'R');
    $this->Ln();
    $this->setFont('Times','B',10);
    $this->Cell(170,7,'TOTAL ',0,0,'R');
    $this->Cell(25,7, $total,1,0,'R');
    $this->Ln(15);
}

function SignArea()
{
    $this->setFont('Times','',12);
    // Move to the right
    $this->Cell(60,5,'Picked by',0,0,'C');
    $this->Cell(60,5,'Checked by',0,0,'C');
    $this->Cell(60,5,'Received by',0,0,'C');
    $this->Ln();
    $this->Cell(60,5,'Name_____________________',0,0,'L');
    $this->Cell(60,5,'Name_____________________',0,0,'L');
    $this->Cell(60,5,'Name_____________________',0,0,'L');
    $this->Ln();
    $this->Cell(60,5,'Sign______________________',0,0,'L');
    $this->Cell(60,5,'Sign______________________',0,0,'L');
    $this->Cell(60,5,'Sign______________________',0,0,'L');
    $this->Ln();
    // Title
    // $this->Cell(30,10,'Customer Order',1,0,'C');
    // Line break
    $this->Ln(20);
}

}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->userDetail($singleOrder);
$pdf->headerTable();
$pdf->viewTable($order, $total);
$pdf->SignArea();
$pdf->SetFont('Times','',12);
$pdf->Output('I', $_GET["id"].'.pdf');
?>
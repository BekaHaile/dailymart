<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
require('fpdf.php');

$item = find_all_item();

class PDF extends FPDF
{

function itemDetail($item){
    $k = 1;
    $item1;
    $item2;
    $item3;
    $item4;
    $item5;
    while ($row = sqlsrv_fetch_array($item, SQLSRV_FETCH_ASSOC)) {
        $price = find_price_by_item_id($row['item_id']);
        

        if($k == 1){
            $item1 = $row;
        }
        else if($k == 2){
            $item2 = $row;
        }
        else if($k == 3){
            $item3 = $row;
        }
        else if($k == 4){
            $item4 = $row;
        }
        else if($k == 5){
            $item5 = $row;
        
            $this->SetFont('Arial','B',8);
                for ($x = 1; $x <= 5; $x++) {
                    if($x == 1){
                        $this->Cell(40,10,$item1['item_id'],0,0,'C');
                    }
                    else if($x == 2){
                        $this->Cell(40,10,$item2['item_id'],0,0,'C');
                    }
                    else if($x == 3){
                        $this->Cell(40,10,$item3['item_id'],0,0,'C');
                    }
                    else if($x == 4){
                        $this->Cell(40,10,$item4['item_id'],0,0,'C');
                    }
                    else if($x == 5){
                        $this->Cell(40,10,$item5['item_id'],0,0,'C');
                    }
                }
                $this->Ln();
                for ($x = 1; $x <= 5; $x++) {
                    if($x == 1){
                        $this->Cell(40,10,$item1['title_en'],0,0,'L');
                    }
                    else if($x == 2){
                        $this->Cell(40,10,$item2['title_en'],0,0,'L');
                    }
                    else if($x == 3){
                        $this->Cell(40,10,$item3['title_en'],0,0,'L');
                    }
                    else if($x == 4){
                        $this->Cell(40,10,$item4['title_en'],0,0,'L');
                    }
                    else if($x == 5){
                        $this->Cell(40,10,$item5['title_en'],0,0,'L');
                    }
                }
                $this->Ln();
            $k = 0;
        }
        $k++;
}

}
}
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->itemDetail($item);
$pdf->SetFont('Times','',12);
$pdf->Output('I', 'Item list.pdf');
?>
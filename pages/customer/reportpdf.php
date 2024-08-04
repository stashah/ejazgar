
<?php

require '../../assets/db.php';
$id  ="";

if(isset($_GET['id'])){
	$id = $_GET['id'];
}else {

}
//require('../../fpdf/fpdf.php');
require '../../fpdf/mctable.php';

$pdf = new PDF_MC_Table();

$sql = 'SELECT * FROM customer where custid=' . $id;

$result = $conn->query($sql);
$row = $result->fetch_assoc();


$msg = "";
if (!empty($_GET["msg"])) {
    $msg = $_GET["msg"];
}
$total = 0;
$sqlsale = "select * from (
    SELECT sale.remarks, sale.saldate as sdt,sale.saleid,DATE_FORMAT(sale.saldate, '%d-%m-%Y') as saldate,sale.productid,sale.custid,sale.salqty,sale.salprice,'0' as paidamount	   FROM sale WHERE sale.custid=$id and sale.account=1
UNION
	SELECT '',customeraccount.paymentdate as sdt, customeraccount.salid,DATE_FORMAT(customeraccount.paymentdate, '%d-%m-%Y') as saldate, paymentdetail ,customeraccount.custid,'0' as     qty,'0' as sp, customeraccount.amount FROM customeraccount WHERE customeraccount.custid=$id
UNION
	SELECT '',cashaccount.ldate as sdt, cashaccount.balid,DATE_FORMAT(cashaccount.ldate, '%d-%m-%Y') as saldate, cashaccount.detail ,cashaccount.custid,'' as qty,cashaccount.amount as sp, '0' as paidamount FROM cashaccount WHERE cashaccount.custid=$id 
              
              ) as nt ORDER BY sdt ASC";
$resultsale = $conn->query($sqlsale);
$rowsale = $result->fetch_assoc();





if($row == NULL){

	//A4 width : 219mm
	//default margin : 10mm each side
	//writable horizontal : 219-(10*2)=189mm

	$pdf = new FPDF('P','mm','A4');

	$pdf->AddPage();

	//set font to arial, bold, 14pt
	$pdf->SetFont('Courier','',8);

    

	//Cell(width , height , text , border , end line , [align] )

	$pdf->Cell(130	,5,'Shop Admin',0,1);//end of line
	$pdf->Cell(130	,5,'Invalid Customer ID.',0,0);

}else {

//$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Courier','B',10);


//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(150, 15,'',0,0);
$pdf->Cell(15	,5,'Date:',0,0);
$pdf->Cell(0	,5,date("d-m-Y"),0,1);//end of line
$pdf->Cell(75,15,'',0,0);
$pdf->Cell(0	,5,'Customer Statement',0,1);//end of line

$pdf->Cell(0,15,'',0,1);
$pdf->Cell(130	,5,'Ejaz Garments',0,1);


$pdf->Cell(130	,5,'Daniyar Market, Center Jamat Khana ',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(90	,5,'Road, Chervellandeh, Booni, Chitral',0,1);





$pdf->Cell(90	,8,'',0,0);
$pdf->Cell(45	,8,'customer Id :',0,0);
$pdf->Cell(15	,8,$id,0,1);
//end of line

$pdf->Cell(90	,5,'',0,0);
$pdf->Cell(45	,5,'customer Name :',0,0);
$pdf->MultiCell(55	,5,$row["custname"],0,1);
//end of line

$pdf->Cell(90	,6,'',0,1);

//invoice contents
$pdf->SetFont('Courier','B',10);

//defining table colum width
$pdf->setwidths(Array(10,25,50,20,15,23,25,25));

$pdf->setlineheight(6);

$pdf->Row(Array(
    'Sr.',
    'Date',
    'Details',
    'Remarks',
    'Qty',
    'Unit Price',
    'Amount Paid',
    'Balance'
));

$pdf->SetAligns(Array('','','','C','R','R','R'));

//Numbers are right-aligned so we give 'R' after new line parameter
$pdf->SetFont('Courier','',10);
//items

$tax = 0; //total tax
$amount = 0; //total amount
$sr = 0;
//display the items
require '../customer/custaccount.php';
while ($rowsale = $resultsale->fetch_assoc()) {
    if ($rowsale["salqty"] == ""){
        $total = $total +  $rowsale["salprice"] - $rowsale["paidamount"];
    }else{
        $total = $total + ($rowsale["salqty"] * $rowsale["salprice"]) - $rowsale["paidamount"];
    }

    $qty = '';
    $amount = 0;
    $amountpaid = 0;
	$name = getproductname($rowsale["productid"]);
    $status= "";
    if($rowsale["remarks"] == 'R'){
        $status = "Returned";
    }else{
        $status = "";
    }
    if($rowsale["salqty"] == 0){
        $qty ="";
    }else{
        $qty = $rowsale["salqty"];
    }
    if($rowsale["salprice"] == 0){
        $amount = "";
    }else{
        $amount = number_format($rowsale["salprice"],0);
    }
    if($rowsale["paidamount"] == 0){$amountpaid ="";}else{
       $amountpaid =  number_format($rowsale["paidamount"]);
    }
	
$pdf->Row(Array(
    $sr = $sr+1,
    $rowsale["saldate"],
    $name,
    $status,
    $qty,
    $amount,
    $amountpaid,
    number_format($total,0)
));

	
}
$pdf->SetFont('Courier','B',10);
$pdf->Cell(0	,7,'',0,1,'R');//end of line

$pdf->Cell(168	,7,'Total',1,0,'C');

$pdf->Cell(25	,7,number_format($total, 0),1,1,'R');//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,3,'',0,1);//end of line


}
$pdf->Output();
?>


<?php

require '../../assets/db.php';
$id  ="";
$custid =0;


if(isset($_GET['id'])){
	$id = $_GET['id'];
    $custid = $_GET['cid'];
}else {

}
//require('../../fpdf/fpdf.php');
require '../../fpdf/mctable.php';

$pdf = new PDF_MC_Table();

$total = 0;
$sqlsale = "select * from (
    SELECT sale.remarks,sale.saldate as sdt,sale.saleid,DATE_FORMAT(sale.saldate, '%d-%m-%Y') as saldate,sale.productid,sale.custid,sale.salqty,sale.salprice,'0' as paidamount	   FROM sale where sale.custid=".$custid."
UNION
	SELECT '',customeraccount.paymentdate as sdt, customeraccount.salid,DATE_FORMAT(customeraccount.paymentdate, '%d-%m-%Y') as saldate, paymentdetail ,customeraccount.custid,'0' as     qty,'0' as sp, customeraccount.amount FROM customeraccount where customeraccount.custid=".$custid." 
UNION
	SELECT '',cashaccount.ldate as sdt, cashaccount.balid as salid,DATE_FORMAT(cashaccount.ldate, '%d-%m-%Y') as saldate, cashaccount.detail ,cashaccount.custid,'' as qty,cashaccount.amount as sp, '0' as paidamount FROM cashaccount where cashaccount.custid=".$custid."   
              
              ) as nt where nt.saleid='".$id."' ORDER BY sdt ASC" ;
$resultsale = $conn->query($sqlsale);






if($id == NULL){
   

	//A4 width : 219mm
	//default margin : 10mm each side
	//writable horizontal : 219-(10*2)=189mm

	$pdf = new FPDF('P','mm','A4');

	$pdf->AddPage();

	//set font to arial, bold, 14pt
	$pdf->SetFont('Times','',12);

	//Cell(width , height , text , border , end line , [align] )

	$pdf->Cell(130	,5,'Shop Admin',0,1);//end of line
	$pdf->Cell(130	,5,'Invalid Customer ID.',0,1);
    
    

}else {

    $sqlc = 'SELECT * FROM customer where custid=' . $custid;

$resultcust = $conn->query($sqlc);
$rowcust = $resultcust->fetch_assoc();
    
//$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('courier','B',10);

//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(150, 15,'',0,0);
$pdf->Cell(15	,5,'Date:',0,0);
$pdf->Cell(0	,5,date("d-m-Y"),0,1);//end of line
$pdf->Cell(75,15,'',0,0);
$pdf->Cell(0	,5,'Invoice',0,1);//end of line

$pdf->Cell(0,15,'',0,1);
$pdf->Cell(130	,5,'Ejaz Garments',0,1);


$pdf->Cell(130	,5,'Daniyar Market, Center Jamat Khana ',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(90	,5,'Road, Chervellandeh, Booni, Chitral',0,1);

$pdf->Cell(15	,5,"",0,1);//end of line


$pdf->Cell(90	,8,'',0,0);
$pdf->Cell(45	,8,'Invoice No :',0,0);
$pdf->Cell(15	,8,$id,0,1);
//end of line

$pdf->Cell(90	,5,'',0,0);
$pdf->Cell(45	,5,'customer Name :',0,0);
$pdf->MultiCell(55	,5,$rowcust["custname"],0,1);
//end of line

$pdf->Cell(90	,6,'',0,1);
//invoice contents
$pdf->SetFont('courier','B',10);

//defining table colum width
$pdf->setwidths(Array(10,25,45,25,15,25,25,25));

$pdf->setlineheight(6);

$pdf->Row(Array(
    'Sr.',
    'Date',
    'Details',
    'remarks',
    'Qty',
    'Unit Price',
    'Amount Paid',
    'Balance'
));

$pdf->SetAligns(Array('','','','','C','R','R','R'));

//Numbers are right-aligned so we give 'R' after new line parameter
$pdf->SetFont('courier','',10);
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
    $status = "";
	$name = getproductname($rowsale["productid"]);

    if($rowsale["remarks"] == 'R'){
        $status ="Returned";
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
    number_format($total,2)
));

	
}



$pdf->Cell(0	,7,'',0,1,'R');//end of line

$pdf->Cell(170	,7,'Total',1,0,'C');

$pdf->Cell(25	,7,number_format($total, 2),1,1,'R');//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,3,'',0,1);//end of line

$cussal= getcusttotalsale($custid);

$cuspaid = getcustpaidamount($custid);
$totalcashbal = custcashaccountbal($custid);


$pdf->Cell(0	,7,'',0,1,'R');//end of line

$pdf->Cell(170	,7,'Total Outstanding',1,0,'C');

$pdf->Cell(25	,7,number_format(($totalcashbal + $cussal ) - $cuspaid, 2),1,1,'R');//end of line



}
$pdf->Output();
?>

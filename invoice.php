<?php
require('fpdf186/fpdf.php');
require('fpdf186/word.php');
include('./include/db.php');



//customer and invoice details
$info=[
    "customer"=>"",
    "address"=>",",
    "city"=>"",
    "invoice_no"=>"",
    "invoice_date"=>"",
    "total_amt"=>"",
    "words"=>"",
  ];
  

// Retrieve bookid from URL parameter
$bookid = isset($_GET['bookid']) ? mysqli_real_escape_string($conn, $_GET['bookid']) : '';

// Assuming you have a table named 'serviceapointment' with columns 'sid', 'bid', etc.
// Assuming 'registration', 'barber', and 'services' are the names of other tables
$query = "SELECT sa.bookid, sa.date, sa.time, sa.paymentid, r.fname, r.id, r.city, r.address, b.barbername, s.subServiceStylePrice, s.subServiceStyleTitle, sa.status, sa.paymentid, sa.bookdate
          FROM serviceapointment sa
          LEFT JOIN registration r ON sa.useremail = r.email
          LEFT JOIN barbers b ON sa.bid = b.bid
          LEFT JOIN services s ON sa.sid = s.sid
          WHERE sa.bookid = '$bookid'";
$res = mysqli_query($conn, $query);


  if($res->num_rows>0){
	  $row=$res->fetch_assoc();
	  
	  $obj=new IndianCurrency($row["subServiceStylePrice"]);
	 

	  $info=[
		"customer"=>$row["fname"],
		"address"=>$row["address"],
    "customerID" => $row["id"],
    "paymentID" => $row["paymentid"],
		
		"city"=>$row["city"],
		"invoice_no"=>$row["bookid"],
		"invoice_date"=>date("d-m-Y",strtotime($row["bookdate"])),
		"total_amt"=>$row["subServiceStylePrice"],

		"words"=> $obj->getWords(),
	  ];
  }
  
  //invoice Products
  $products_info=[];
  
  //Select Invoice Product Details From Database
  $query = "SELECT sa.bookid, sa.date, sa.time, r.fname, r.id, r.city, r.address, b.barbername, s.subServiceStylePrice, s.subServiceStyleTitle, sa.status, sa.paymentid, sa.bookdate
  FROM serviceapointment sa
  LEFT JOIN registration r ON sa.useremail = r.email
  LEFT JOIN barbers b ON sa.bid = b.bid
  LEFT JOIN services s ON sa.sid = s.sid
  WHERE sa.bookid = '$bookid'";
$res = mysqli_query($conn, $query);
  if($res->num_rows>0){
	  while($row=$res->fetch_assoc()){
		   $products_info[]=[
			"name"=>$row["subServiceStyleTitle"],
			"price"=>$row["subServiceStylePrice"],
			"total"=>$row["subServiceStylePrice"],
      "barbername"=>$row["barbername"]
		   ];
	  }
  }
  
  class PDF extends FPDF
  {
    function Header(){
      
      //Display Company Info
      $this->SetFont('Arial','B',14);
      $this->Cell(50,10,"ARTIKA SALON",0,1);
      $this->SetFont('Arial','',14);
      $this->Cell(50,7,"West Street,",0,1);
      $this->Cell(50,7,"Salem 636000.",0,1);
      $this->Cell(50,7,"PH : 9999999999",0,1);
      
      //Display INVOICE text
      $this->SetY(15);
      $this->SetX(-40);
      $this->SetFont('Arial','B',18);
      $this->Cell(50,10,"INVOICE",0,1);
      
      //Display Horizontal line
      $this->Line(0,48,210,48);
    }
    
    function body($info,$products_info){
      
      //Billing Details
      $this->SetY(55);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(50,10,"Bill To: ",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(50,7,$info["customer"],0,1);
      $this->Cell(50,7,$info["address"],0,1);
      $this->Cell(50,7,$info["city"],0,1);
      
      //Display Invoice no
      $this->SetY(55);
      $this->SetX(-70);
      $this->Cell(50,7,"Invoice No : AS".$info["invoice_no"]);
      
      //Display Invoice date
      $this->SetY(61);
      $this->SetX(-70);
      $this->Cell(50,7,"Invoice Date : ".$info["invoice_date"]);
      //Display Invoice date
      $this->SetY(67);
      $this->SetX(-70);
      $this->Cell(50,7,"Customer ID : ".$info["customerID"]);
      $this->SetY(73);
      $this->SetX(-70);
      $this->Cell(50,7,"Payment ID : ".$info["paymentID"]);
      
      //Display Table headings
      $this->SetY(95);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(85,9,"DESCRIPTION",1,0);
      $this->Cell(35,9,"BARBER",1,0,"C");
      $this->Cell(35,9,"PRICE",1,0,"C");
      $this->Cell(35,9,"TOTAL",1,1,"C");
      $this->SetFont('Arial','',12);
      
      //Display table product rows
      foreach($products_info as $row){
        $this->Cell(85,9,$row["name"],"LR",0);
        $this->Cell(35,9,$row["barbername"],"R",0,"R");
        $this->Cell(35,9,$row["price"],"R",0,"C");
        $this->Cell(35,9,$row["total"],"R",1,"R");
      }
      //Display table empty rows
      for($i=0;$i<12-count($products_info);$i++)
      {
        $this->Cell(85,9,"","LR",0);
        $this->Cell(35,9,"","R",0,"R");
        $this->Cell(35,9,"","R",0,"C");
        $this->Cell(35,9,"","R",1,"R");
      }
      //Display table total row
      $this->SetFont('Arial','B',12);
      $this->Cell(155,9,"TOTAL",1,0,"R");
      $this->Cell(35,9,$info["total_amt"],1,1,"R");
      
      //Display amount in words
      $this->SetY(225);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,9,"Amount in Words ",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(0,9,$info["words"],0,1);
      
    }
    function Footer(){
      
      //set footer position
      $this->SetY(-50);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,10,"for ARTIKA SALON",0,1,"R");
      $this->Ln(15);
      $this->SetFont('Arial','',12);
      $this->Cell(0,10,"Authorized Signature",0,1,"R");
      $this->SetFont('Arial','',10);
      
      //Display Footer Text
      $this->Cell(0,10,"This is a computer generated invoice",0,1,"C");
      
    }
    
  }
  //Create A4 Page with Portrait 
  $pdf=new PDF("P","mm","A4");
  $pdf->AddPage();
  $pdf->body($info,$products_info);
  $pdf->Output();
?>


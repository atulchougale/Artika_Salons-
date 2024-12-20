<?php
require('fpdf186/fpdf.php');
require('fpdf186/word.php');
include('./include/db.php');



//customer and invoice details
$info = [
    "customer" => "",
    "address" => ",",
    "city" => "",
    "invoice_no" => "",
    "invoice_date" => "",
    "total_amt" => "",
    "words" => "",
];


// Retrieve bookid from URL parameter
$crid = isset($_GET['crid']) ? mysqli_real_escape_string($conn, $_GET['crid']) : '';

// Assuming you have a table named 'serviceapointment' with columns 'sid', 'bid', etc.
// Assuming 'registration', 'barber', and 'services' are the names of other tables
$query = "SELECT courseregistration.crid,
                courseregistration.cid,
                courseregistration.batch,
                courseregistration.status,
                courseregistration.courseRegDate,
                
                registration.fname,
                registration.phone,
                registration.email,
                registration.gender,
                registration.address,
                registration.city,
                registration.state,
                course.cname,
                course.ctype,
                course.cfees
                FROM registration
                INNER JOIN courseregistration ON courseregistration.userEmail = registration.email
                INNER JOIN course ON course.cid = courseregistration.cid
                        WHERE courseregistration.crid = '$crid'";
$res = mysqli_query($conn, $query);


if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();

    $obj = new IndianCurrency($row["cfees"]);


    $info = [
        "customer" => $row["fname"],
        "address" => $row["address"],
        "phone" => $row["phone"],
        "email" => $row["email"],
        "city" => $row["city"],
        "state" => $row["state"],
        "invoice_no" => $row["crid"],
        "invoice_date" => date("d-m-Y", strtotime($row["courseRegDate"])),
        "total_amt" => $row["cfees"],

        "words" => $obj->getWords(),
    ];
}

//invoice Products
$products_info = [];

//Select Invoice Product Details From Database
$query = "SELECT courseregistration.crid,
                courseregistration.cid,
                courseregistration.batch,
                courseregistration.status,
                courseregistration.courseRegDate,
                
               
                course.cname,
                course.ctype,
                course.cfees
                FROM registration
                INNER JOIN courseregistration ON courseregistration.userEmail = registration.email
                INNER JOIN course ON course.cid = courseregistration.cid
                        WHERE courseregistration.crid = '$crid'";
$res = mysqli_query($conn, $query);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $products_info[] = [
            "name" => $row["cname"],
            "type" => $row["ctype"],
            "price" => $row["cfees"],
            "total" => $row["cfees"],
            "batch" => $row["batch"]
        ];
    }
}

class PDF extends FPDF
{
    function Header()
    {

        //Display Company Info
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(50, 10, "ARTIKA SALON", 0, 1);
        $this->SetFont('Arial', '', 14);
        $this->Cell(50, 7, "West Street,", 0, 1);
        $this->Cell(50, 7, "Salem 636000.", 0, 1);
        $this->Cell(50, 7, "PH : 9999999999", 0, 1);

        //Display INVOICE text
        $this->SetY(15);
        $this->SetX(-40);
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(50, 10, "RECEIPT", 0, 1);

        //Display Horizontal line
        $this->Line(0, 48, 210, 48);
    }

    function body($info, $products_info)
    {

        //Billing Details
        $this->SetY(55);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 10, "Bill To: ", 0, 1);
        $this->SetFont('Arial', '', 12);
        $this->Cell(50, 7, $info["customer"], 0, 1);
        $this->Cell(50, 7, $info["address"], 0, 1);
        $this->Cell(50, 7, $info["city"], 0, 0);
        $this->Cell(50, 7, $info["state"], 0, 1);
        $this->Cell(50, 7, $info["email"], 0, 0);
        $this->Cell(50, 7, $info["phone"], 0, 1);

        //Display Invoice no
        $this->SetY(55);
        $this->SetX(-60);
        $this->Cell(50, 7, "Invoice No : CR" . $info["invoice_no"]);

        //Display Invoice date
        $this->SetY(63);
        $this->SetX(-60);
        $this->Cell(50, 7, "Invoice Date : " . $info["invoice_date"]);

        //Display Table headings
        $this->SetY(95);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 9, "DESCRIPTION", 1, 0);
        $this->Cell(50, 9, "COURSE TYPE", 1, 0);
        $this->Cell(30, 9, "BATCH", 1, 0);
        $this->Cell(30, 9, "PRICE", 1, 0, "C");
        $this->Cell(30, 9, "TOTAL", 1, 1, "C");
        $this->SetFont('Arial', '', 12);

        //Display table product rows
        foreach ($products_info as $row) {
            $this->Cell(50, 9, $row["name"], "LR", 0);
            $this->Cell(50, 9, $row["type"], "LR", 0);
            $this->Cell(30, 9, $row["batch"], "LR", 0);
            $this->Cell(30, 9, $row["price"], "R", 0, "C");
            $this->Cell(30, 9, $row["total"], "R", 1, "R");
        }
        //Display table empty rows
        for ($i = 0; $i < 12 - count($products_info); $i++) {
            $this->Cell(50, 9, "", "LR", 0);
            $this->Cell(50, 9, "", "R", 0, "R");
            $this->Cell(30, 9, "", "R", 0, "R");
            $this->Cell(30, 9, "", "R", 0, "C");
            $this->Cell(30, 9, "", "R", 1, "R");
        }
        //Display table total row
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(160, 9, "TOTAL", 1, 0, "R");
        $this->Cell(30, 9, $info["total_amt"], 1, 1, "R");

        //Display amount in words
        $this->SetY(225);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 9, "Amount in Words ", 0, 1);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 9, $info["words"], 0, 1);
    }
    function Footer()
    {

        //set footer position
        $this->SetY(-50);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "for ARTIKA SALON", 0, 1, "R");
        $this->Ln(15);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, "Authorized Signature", 0, 1, "R");
        $this->SetFont('Arial', '', 10);

        //Display Footer Text
        $this->Cell(0, 10, "This is a computer generated invoice", 0, 1, "C");
    }
}
//Create A4 Page with Portrait 
$pdf = new PDF("P", "mm", "A4");
$pdf->AddPage();
$pdf->body($info, $products_info);
$pdf->Output();

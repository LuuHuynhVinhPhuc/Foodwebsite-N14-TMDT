<?php
session_start();
$id = $_SESSION['ide'];
require_once("../fpdf185/fpdf.php");
include "connections.php";


$item_name = mysqli_query($link, "select item_name FROM receipt_item WHERE receipt_id = '$id'");
$count1 = mysqli_fetch_array($item_name);
$item_price = mysqli_query($link, "select item_price FROM receipt_item WHERE receipt_id = '$id'");
$count2 = mysqli_fetch_array($item_price);
$quantity = mysqli_query($link, "select quantity FROM receipt_item WHERE receipt_id = '$id'");
$count3 = mysqli_fetch_array($quantity);
$total = mysqli_query($link, "select total_price FROM receipt_item WHERE receipt_id = '$id'");
$count4 = mysqli_fetch_array($total);

//customer and invoice details
$info = [
    "customer" => "Phuc Luu",
    "address" => "4th cross,Car Street,",
    "city" => "Salem 636204.",
    "invoice_no" => $id,
    "invoice_date" => date("Y-m-d H:i:s"),
    "total_amt"=> $count4[0]
];

//invoice Products
$products_info = [
    [
        "name"   => $count1[0],
        "price"  => $count2[0],
        "qty"    => $count3[0],
        "total"  => $count4[0]
    ]
];

class PDF extends FPDF
{
    function Header()
    {

        //Display Company Info
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(50, 10, "MAXICAN BURGER", 0, 1);
        $this->SetFont('Arial', '', 14);
        $this->Cell(50, 7, "West Street,", 0, 1);
        $this->Cell(50, 7, "Salem 636002.", 0, 1);
        $this->Cell(50, 7, "PH : 123456789", 0, 1);

        //Display INVOICE text
        $this->SetY(15);
        $this->SetX(-40);
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(50, 10, "INVOICE", 0, 1);

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
        $this->Cell(50, 7, $info["city"], 0, 1);

        //Display Invoice no
        $this->SetY(55);
        $this->SetX(-60);
        $this->Cell(30, 7, "Invoice No : " . $info["invoice_no"]);

        //Display Invoice date
        $this->SetY(63);
        $this->SetX(-60);
        $this->Cell(50, 7, "Invoice Date : " . $info["invoice_date"]);

        //Display Table headings
        $this->SetY(95);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(80, 9, "DESCRIPTION", 1, 0);
        $this->Cell(40, 9, "PRICE", 1, 0, "C");
        $this->Cell(30, 9, "QTY", 1, 0, "C");
        $this->Cell(40, 9, "TOTAL", 1, 1, "C");
        $this->SetFont('Arial', '', 12);

        //Display table product rows
        foreach ($products_info as $row) {
            $this->Cell(80, 9, $row["name"], "LR", 0);
            $this->Cell(40, 9, $row["price"], "R", 0, "R");
            $this->Cell(30, 9, $row["qty"], "R", 0, "C");
            $this->Cell(40, 9, $row["total"], "R", 1, "R");
        }
        //Display table empty rows
        for ($i = 0; $i < count($products_info); $i++) {
            $this->Cell(80, 9, "", "LR", 0);
            $this->Cell(40, 9, "", "R", 0, "R");
            $this->Cell(30, 9, "", "R", 0, "C");
            $this->Cell(40, 9, "", "R", 1, "R");
        }
        //Display table total row
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(150, 9, "TOTAL", 1, 0, "R");
        $this->Cell(40,9,$info["total_amt"],1,1,"R");
    }
    function Footer()
    {

        //set footer position
        $this->SetY(-50);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "for MAXICAN BURGER", 0, 1, "R");
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

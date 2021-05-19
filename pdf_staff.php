<?php
require ('pdf/fpdf.php');

class PDF extends FPDF {
	function header (){
		// $this->image('pic/logo.png', 10, 10, 20);
		$this->setfont('Arial','B', 16);
		$this->settextcolor(0, 0, 0);
		$this->cell(0, 10, 'KISARAWE DATABASE USERS', 0, 0, 'C');
		$this->Ln(10);
		$this->setfont('Arial','',12);
		$this->settextcolor(0, 0, 255);
		// $this->cell(0, 10, 'STAFF USERS',0, 0, 'C');
		$this->Ln(30);
	}
	function footer(){
		$this->sety(-12);
		$this->setfont('Arial', '', 10);
		$this->cell(0, 7, 'page'.$this->pageNo().'/{nb}', 0, 0,'C');
	}
	function printData(){
		$con=mysqli_connect('localhost','root','','kisarawe');
		$id = $_GET['id'];
		$this->setFont('Arial','B',10);
		$this->cell(40, 7, 'First Name', 1, 0, 'L');
		$this->cell(40, 7, 'Last Name', 1, 0, 'L');
		$this->cell(50, 7, 'username', 1, 0, 'L');
		$this->cell(25, 7, 'Status', 1, 0, 'L');
		$this->cell(25, 7, 'Role', 1, 1, 'L');
		$result=mysqli_query($con,"SELECT * FROM users");
		while($row=mysqli_fetch_assoc($result)){
			$this->setFont('Arial','',10);
		$this->cell(40, 7, ucwords($row['fname']), 1, 0, 'L');
		$this->cell(40, 7, ucwords($row['lname']), 1, 0, 'L');
		$this->cell(50, 7, $row['username'], 1, 0, 'L');
		$this->cell(25, 7, $row['status'], 1, 0, 'L');
		$this->cell(25, 7, $row['role'], 1, 1, 'L');
        }
	}

}
 
		$pdf= new PDF();
 		$pdf->AliasNBPages();
		$pdf->addpage();
		$pdf->printData();
		$pdf->output();
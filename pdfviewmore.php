<?php
require ('pdf/fpdf.php');

class PDF extends FPDF {
	function header (){
		// $this->image('pic/school_logo.png', 10, 10, 20);
		$this->setfont('Arial','B', 16);
		$this->settextcolor(0, 0, 0);
		$this->cell(0, 10, 'FULL INDIVIDUAL INFORMATION', 0, 0, 'C');
		$this->Ln(10);
		$this->setfont('Arial','',12);
		$this->settextcolor(0, 0, 255);
		// $this->cell(0, 10, 'STUDENTS INFORMATION',0, 0, 'C');
		$this->Ln(15);
	}
	function footer(){
		$this->sety(-12);
		$this->setfont('Arial', '', 10);
		$this->cell(0, 7, 'page'.$this->pageNo().'/{nb}', 0, 0,'C');
	}
	function printData(){
		$con=mysqli_connect('localhost','root','','kisarawe');
		$id = $_GET['id'];
			$result=mysqli_query($con,"SELECT * FROM wananchi where id = '$id'");
		while($row=mysqli_fetch_assoc($result)){
			$this->setFont('Arial','B',10);
			$this->settextcolor(0, 0, 0);
		// $this->cell(0, 10 .$row['fname']. 0, 0, 'C');
		$this->Ln(15);
			$this->cell(38, 7, 'User ID:', 0, 0, 'L'); $this->cell(30, 7, $row['plot_id'], 0, 1, 'L');
			$this->cell(38, 7, 'First Name:', 0, 0, 'L'); $this->cell(12, 7, ucwords($row['fname']), 0, 1, 'L');
			$this->cell(38, 7, 'Second Name:', 0, 0, 'L'); $this->cell(15, 7, ucwords($row['sname']), 0, 1, 'L');
			$this->cell(38, 7, 'Third Name:', 0, 0, 'L'); $this->cell(15, 7, ucwords($row['lname']), 0, 1, 'L');
			$this->cell(38, 7, 'Phone Number:', 0, 0, 'L'); $this->cell(15, 7, $row['phone'], 0, 1, 'L');
			$this->cell(38, 7, 'Plot Attained:', 0, 0, 'L'); $this->cell(25, 7, $row['plota'], 0, 1, 'L');
			$this->cell(38, 7, 'Original Area:', 0, 0, 'L'); $this->cell(25, 7, $row['og'], 0, 1, 'L');
			$this->cell(38, 7, 'Total Area:', 0, 0, 'L'); $this->cell(25, 7, $row['total'], 0, 1, 'L');
			$this->cell(38, 7, 'Owner Shares:', 0, 0, 'L'); $this->cell(25, 7, $row['owner'], 0, 1, 'L');
			$this->cell(38, 7, 'World Map Shares:', 0, 0, 'L'); $this->cell(25, 7, $row['wmc'], 0, 1, 'L');
			$this->cell(38, 7, 'Kisarawe DC Shares:', 0, 0, 'L'); $this->cell(25, 7, $row['kdc'], 0, 1, 'L');
			$this->settextcolor(0, 0, 0);
		// $this->cell(0, 10, 'GUARDIAN DETAILS',0, 0, 'C');
		$con=mysqli_connect('localhost','root','','kisarawe');
		$id = $_GET['id'];
			$result=mysqli_query($con,"SELECT * FROM Viwanja where wananchiid = '$id'");
			
			$this->setFont('Arial','B',10);
		$this->Ln(15);
		$this->cell(95, 7, 'PLOT NUMBER', 1, 0, 'L'); 
		$this->cell(95, 7, 'PLOT SIZE', 1, 1, 'L');
		while($row=mysqli_fetch_assoc($result)){
		$this->cell(95, 7, $row['plot_no'], 1, 0, 'L');
		$this->cell(95, 7, $row['plot_size'], 1, 1, 'L');
	
		}
	}
}

}
 
		$pdf= new PDF();
 		$pdf->AliasNBPages();
		$pdf->addpage();
		$pdf->printData();
		$pdf->output();
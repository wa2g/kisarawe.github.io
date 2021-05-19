<?php
require ('pdf/fpdf.php');

class PDF extends FPDF {
	function header (){
		// $this->image('pic/logo.png', 10, 10, 20);
		$this->setfont('Arial','B', 16);
		$this->settextcolor(0, 0, 0);
		$this->cell(0, 10, 'WORLD MAP COMPANY ', 0, 0, 'C');
		$this->Ln(10);
		$this->setfont('Arial','',12);
		$this->settextcolor(0, 0, 0);
		$this->cell(0, 10, 'PLOTS',0, 0, 'C');
		$this->Ln(30);
	}
	function footer(){
		$this->sety(-12);
		$this->setfont('Arial', '', 10);
		$this->cell(0, 7, 'page'.$this->pageNo().'/{nb}', 0, 0,'C');
	}
	function printData(){
		$con=mysqli_connect('localhost','root','','kisarawe');
		$plot_no = $_GET['plot_no'];
		$this->setFont('Arial','B',10);
		$this->cell(50, 7, 'PLOT NUMBER', 1, 0, 'L');
		$this->cell(50, 7, 'PLOT SIZE(sqm)', 1, 0, 'L');
		$this->cell(50, 7, 'PLOT USES', 1, 0, 'L');
		$this->cell(40, 7, 'OWNERSHIP', 1, 1, 'L');
		// $this->cell(25, 7, 'Date Of Issue', 1, 0, 'L');
		// $this->cell(45, 7, 'Address', 1, 1, 'L');
		$result=mysqli_query($con,"SELECT * FROM wmc WHERE owner='WMC'");
		while($row=mysqli_fetch_assoc($result)){
			$this->setFont('Arial','',10);
		$this->cell(50, 7, ucwords($row['plot_no']), 1, 0, 'L');
		$this->cell(50, 7, ucwords($row['plot_size']), 1, 0, 'L');
		$this->cell(50, 7, $row['plot_uses'], 1, 0, 'L');
		$this->cell(40, 7, $row['owner'], 1, 1, 'L');
		// $this->cell(25, 7, $row['doi'], 1, 0, 'L');
		// $this->cell(45, 7, ucwords($row['address']), 1, 1, 'L');
		}
	}

}
 
		$pdf= new PDF();
 		$pdf->AliasNBPages();
		$pdf->addpage();
		$pdf->printData();
		$pdf->output();
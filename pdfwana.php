<?php
require ('pdf/fpdf.php');

class PDF extends FPDF {
	function header (){
		// $this->image('pic/logo.png', 10, 10, 20);
		$this->setfont('Arial','B', 16);
		$this->settextcolor(0, 0, 0);
		$this->cell(0, 10, 'WANANCHI', 0, 0, 'C');
		$this->Ln(10);
		$this->setfont('Arial','',12);
		$this->settextcolor(0, 0, 0);
		$this->cell(0, 10, 'INFORMATION',0, 0, 'C');
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
		$this->cell(35, 7, 'FIRST NAME', 1, 0, 'L');
		$this->cell(35, 7, 'LAST NAME', 1, 0, 'L');
		$this->cell(30, 7, 'PHONE NO', 1, 0, 'L');
        $this->cell(30, 7, 'PLOT ATTAINED', 1, 0, 'L');
		$this->cell(30, 7, 'TOTAL AREA', 1, 0, 'L');
		$this->cell(30, 7, 'AGREEMENT', 1, 1, 'L');
		// $this->cell(25, 7, 'Date Of Issue', 1, 0, 'L');
		// $this->cell(45, 7, 'Address', 1, 1, 'L');
		$result=mysqli_query($con,"SELECT * FROM wananchi ORDER BY `fname` ASC");
		while($row=mysqli_fetch_assoc($result)){
			if($row['agree']==1){
				$agree ="Yes";
			}else{
				$agree ="No";
			}
			
			$this->setFont('Arial','',10);
		$this->cell(35, 7, ucwords($row['fname']), 1, 0, 'L');
		$this->cell(35, 7, ucwords($row['lname']), 1, 0, 'L');
		$this->cell(30, 7, $row['phone'], 1, 0, 'L');
		$this->cell(30, 7, $row['plota'], 1, 0, 'L');
		$this->cell(30, 7, $row['total'], 1, 0, 'L');
		$this->cell(30, 7, $agree, 1, 1, 'L');
		}
	}

}
 
		$pdf= new PDF();
 		$pdf->AliasNBPages();
		$pdf->addpage();
		$pdf->printData();
		$pdf->output();
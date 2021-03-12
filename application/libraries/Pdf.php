<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Pdf {
	
	public function makePdf($html){
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class PhpspreadsheetController extends CI_Controller {
public function __construct()
{
parent::__construct();
}
public function index(){
$this->load->view('spreadsheet');
}
public function export()
{
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'ProductID');
$sheet->setCellValue('B1','SKU');
$sheet->setCellValue('C1','ASIN');
$sheet->setCellValue('D1','Base Price');
$sheet->setCellValue('E1','Quantity');
$writer = new Xlsx($spreadsheet);
$filename = 'Result Sheet';
 
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output'); // download file
}
}
?>
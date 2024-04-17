<?php
require 'PhpSpreadsheet/src/Bootstrap.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Fetch the report data from the database
// Replace this with your own code to fetch the report data
$reportData = array(
    array('Date', 'Fine'),
    array('2023-07-01', 1000),
    array('2023-07-02', 0),
    array('2023-07-03', 500),
);

// Create a new PhpSpreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set the report data in the worksheet
$sheet->fromArray($reportData, NULL, 'A1');

// Set the file name for download
$fileName = 'employee_report.xlsx';

// Set the appropriate headers for file download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $fileName . '"');
header('Cache-Control: max-age=0');

// Save the PhpSpreadsheet object as an Excel file
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

<?php
require_once("/includes/Java.inc");
require_once("/includes/connection.php");

use com\aspose\cells\Workbook as Workbook;
use com\aspose\cells\FileFormatType as FileFormatType;

$dataDir = __DIR__ . '/data/';
$workbook = new Workbook();

// Accessing the first worksheet in the book ("Sheet1").
$sheet = $workbook->getWorksheets()->get(0);

$data = run_query('exec php_reports_excel;',null);
$result1 = sqlsrv_fetch_array($data,SQLSRV_FETCH_ASSOC);
$sheet->getCells()->importArrayList($result1, 0, 0, false);

sqlsrv_next_result($data);
$result2 = sqlsrv_fetch_array($data,SQLSRV_FETCH_ASSOC);
$sheet->getCells()->importArrayList($result2, 3, 0, false);

sqlsrv_next_result($data);
$count = 0;
while( $row = sqlsrv_fetch_array( $data, SQLSRV_FETCH_ASSOC )) {
  $sheet->getCells()->importArrayList($row, 5+$count, 0, false);
  $count = $count + 1;
}


# Saving the modified Excel file in default (that is Excel 2003) format
$file_format_type = new FileFormatType();
$workbook->save($dataDir . "Tables.xls", $file_format_type->EXCEL_97_TO_2003);
$file = __DIR__ . '/data/Tables.xls';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}

 ?>

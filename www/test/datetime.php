<?php

require_once("../includes/Java.inc");
require_once("../includes/connection.php");

use com\aspose\cells\Workbook as Workbook;
use com\aspose\cells\WorkbookSettings as WorkbookSettings;
use com\aspose\cells\FileFormatType as FileFormatType;

$Locale = java("java.util.Locale");
echo "Java Locale: " . $Locale->getDefault() . "<br>";

$dataDir = __DIR__ . '/data/';
$workbook = new Workbook();
$result[] = "";
$setting  = new WorkbookSettings();
$setting  = $workbook->getSettings();
echo "WorkbookSettings Locale: ".$setting->getLocale()."<br>";

session_start();

$conn = open_connection();
$query = "select ColumnA, ColumnD from php_reports";

$data = sqlsrv_query($conn, $query,  array());
if( sqlsrv_fetch( $data ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
else {
  $result = sqlsrv_fetch_array($data,SQLSRV_FETCH_ASSOC);
  print_r($result);
}

$sheet = $workbook->getWorksheets()->get(0);

$sheet->getCells()->importArray($result, 0, 0, false);

# Saving the modified Excel file in default (that is Excel 2003) format
$file_format_type = new FileFormatType();
$workbook->save($dataDir . "DateTime.xls", $file_format_type->EXCEL_97_TO_2003);
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

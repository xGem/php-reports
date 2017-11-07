<?php
require_once("/includes/Java.inc");
require_once("/includes/connection.php");

use com\aspose\cells\Workbook as Workbook;
use com\aspose\cells\FileFormatType as FileFormatType;

$dataDir = __DIR__ . '/data/';

//Creating a new Excel object
$workbook = new Workbook();

//Accessing the first worksheet in the Excel file
$worksheets = $workbook->getWorksheets();
$worksheet = $worksheets->get(0);

//Changing the worksheet's name
$worksheet->setName("Data");

//Get the cells collection in the sheet.
$cells = $worksheet->getCells();

//Put a text indicating what is this about.
$cells->get("A1")->setValue("You only can read this if you decrypt this workbook with the password");

//Set the password for protecting the file.
$workbook->getSettings()->setPassword("password");

//Saving the modified Excel file in default format
# Saving the modified Excel file in default (that is Excel 2003) format
$file_format_type = new FileFormatType();
$workbook->save($dataDir . "encrypted_file.xlsx", $file_format_type->XLSX);
$file = __DIR__ . '/data/encrypted_file.xlsx';

//Returning the file to the user, for testing...
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

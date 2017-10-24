<?php
require_once("/includes/Java.inc");

use com\aspose\cells\Workbook as Workbook;
use com\aspose\cells\FileFormatType as FileFormatType;

$dataDir = __DIR__ . '/data/';
$workbook = new Workbook();

// Accessing the first worksheet in the book ("Sheet1").
$sheet = $workbook->getWorksheets()->get(0);

# Access cell "A1" in the sheet.
$cell = $sheet->getCells()->get("A1");
$cell->setValue(10);

$cell = $sheet->getCells()->get("A2");
$cell->setValue(25);

$cell = $sheet->getCells()->get("A3");
$cell->setFormula("=A1+A2");

$workbook->calculateFormula(); 

# Saving the modified Excel file in default (that is Excel 2003) format
$file_format_type = new FileFormatType();
$workbook->save($dataDir . "Formulas.xls", $file_format_type->EXCEL_97_TO_2003);
$file = __DIR__ . '/data/Formulas.xls';

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

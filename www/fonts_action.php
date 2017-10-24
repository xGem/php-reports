<?php
require_once("/includes/Java.inc");

use com\aspose\cells\Workbook as Workbook;
use com\aspose\cells\FileFormatType as FileFormatType;
use com\aspose\cells\Color as Color;


$dataDir = __DIR__ . '/data/';
$workbook = new Workbook();
$color = new Color();

// Accessing the first worksheet in the book ("Sheet1").
$sheet = $workbook->getWorksheets()->get(0);

# Access cell "A1" in the sheet.
$cell = $sheet->getCells()->get("A1");
$cell->setValue("Times New Roman");
$style = $cell->getStyle();
$font = $style->getFont();
$font->setName("Times New Roman");
$font->setBold(true);
$font->setSize(14);
$cell->setStyle($style);

$cell = $sheet->getCells()->get("A2");
$cell->setValue("Arial");
$style = $cell->getStyle();
$font = $style->getFont();
$font->setName("Arial");
$font->setBold(true);
$font->setColor($color->getBlue());
$font->setSize(20);
$cell->setStyle($style);


# Saving the modified Excel file in default (that is Excel 2003) format
$file_format_type = new FileFormatType();
$workbook->save($dataDir . "Fonts.xls", $file_format_type->EXCEL_97_TO_2003);
$file = __DIR__ . '/data/Fonts.xls';

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

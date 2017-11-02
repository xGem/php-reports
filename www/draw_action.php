<?php
require_once("/includes/Java.inc");
require_once("/includes/connection.php");

use com\aspose\cells\Workbook as Workbook;
use com\aspose\cells\FileFormatType as FileFormatType;
use com\aspose\cells\TextBox as TextBox;
use com\aspose\cells\Color as Color;
use com\aspose\cells\PlacementType as PlacementType;

$dataDir = __DIR__ . '/data/';
$workbook = new Workbook();
$color = new Color();
$placementType = new PlacementType();

// Accessing the first worksheet in the book ("Sheet1").
$sheet = $workbook->getWorksheets()->get(0);

// Get the textbox object.
$textboxIndex = $sheet->getTextBoxes()->add(2, 1, 160, 200);
$textbox0 = $sheet->getTextBoxes()->get($textboxIndex);

// Fill the text.
$textbox0->setText("ASPOSE______PHP-Reports!");

// Set the placement.
$textbox0->setPlacement($placementType->FREE_FLOATING);

// Set the font color.
$textbox0->getFont()->setColor($color->getBlue());


# Saving the modified Excel file in default (that is Excel 2003) format
$file_format_type = new FileFormatType();
$workbook->save($dataDir . "Draw.xls", $file_format_type->EXCEL_97_TO_2003);
$file = __DIR__ . '/data/Draw.xls';

//exit();

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

<?php
require_once("/includes/Java.inc");

use com\aspose\cells\Workbook as Workbook;
use com\aspose\cells\FileFormatType as FileFormatType;
use com\aspose\cells\VbaModule as VbaModule;

$dataDir = __DIR__ . '/data/';

$workbook = new Workbook();
$module = new VbaModule();

// Accessing the first worksheet in the book ("Sheet1").
$sheet = $workbook->getWorksheets()->get(0);

// Add VBA Module
$idx = $workbook->getVbaProject()->getModules()->add($sheet);

// Access the VBA Module, set its name and codes
$module = $workbook->getVbaProject()->getModules()->get($idx);
$module->setName("TestModule");

$module->setCodes("Sub ShowMessage()"."\r\n"."    MsgBox \"Welcome to Aspose!\""."\r\n"."End Sub");

# Saving the modified Excel file in default (that is Excel 2003) format
$file_format_type = new FileFormatType();
$workbook->save($dataDir . "macros.xlsm", $file_format_type->XLSM);
$file = __DIR__ . '/data/macros.xlsm';

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

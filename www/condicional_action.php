<?php
require_once("/includes/Java.inc");
require_once("/includes/connection.php");

use com\aspose\cells\Workbook as Workbook;
use com\aspose\cells\FileFormatType as FileFormatType;
use com\aspose\cells\TextBox as TextBox;
use com\aspose\cells\Color as Color;
use com\aspose\cells\PlacementType as PlacementType;
use com\aspose\cells\FormatCondition as FormatCondition;
use com\aspose\cells\Style as Style;
use com\aspose\cells\Font as Font;
use com\aspose\cells\FontUnderlineType as FontUnderlineType;

$dataDir = __DIR__ . '/data/';

set_time_limit(0);

$workbook = new Workbook($dataDir."template.xlsx");

// Accessing the first worksheet in the book ("Sheet1").
$sheet = $workbook->getWorksheets()->get(0);

//Seteo Nombre empresa
$range = $workbook->getWorksheets()->getNames()->get("empresa")->getRange();
$range->setValue('Empresa EEEE');

//Seteo nombre periodo
$range = $workbook->getWorksheets()->getNames()->get("periodo")->getRange();
$range->setValue('201701');

//Seteo nombre LISTADO (una lista)
$range = $workbook->getWorksheets()->getNames()->get("LISTADO")->getRange();
$row = '' . $range->getFirstRow();
$row = intval($row);
$aux = ["Tabla 2",  'date()', 'date()', 123, 120, 3, "OK"];
$IDsheet = $range->getWorksheet()->getIndex();
$sheet = $workbook->getWorksheets()->get($IDsheet);
$sheet->getCells()->InsertRows($row+1, 4);

for ($count=0; $count < 5; $count++) {
	$sheet->getCells()->importArrayList($aux, ($row+$count), 1, false);
}

//Seteo nombre DATOS_1 (una lista) con 100000 registros
$cantidadRegistrosNuevos = 100;

$range = $workbook->getWorksheets()->getNames()->get("DATOS_1")->getRange();
$row = ''.$range->getFirstRow(); //ERROR SI NO LO CONVIERTO EN STRING
$row = intval($row);
$aux = ["Tabla1", 34, "1111 1111	3333", "Error 1", "Prueba ERROR"];

$IDsheet = $range->getWorksheet()->getIndex();
$sheet = $workbook->getWorksheets()->get($IDsheet);

$sheet->getCells()->InsertRows($row+1, $cantidadRegistrosNuevos-1);

for ($count=0; $count < $cantidadRegistrosNuevos; $count++) {
  $aux[3] = rand();
	$sheet->getCells()->importArrayList($aux, ($row+$count), 1, false);
}

$fc = new FormatCondition();
$style = new Style;
$fontUnderlineType = new FontUnderlineType;
$color = new Color;

//$style = $fc->getStyle();
$font = new Font;
$font = $style->getFont();
$font->setItalic(true);
$font->setBold(true);
$font->setStrikeout(true);
$font->setUnderline($fontUnderlineType->DOUBLE);
$font->setColor($color->getBlack());
//$fc->setStyle($style);

# Saving the modified Excel file in default (that is Excel 2003) format
$file_format_type = new FileFormatType();
$workbook->save($dataDir . "template_result.xlsx", $file_format_type->XLSX);
$file = __DIR__ . '/data/template_result.xlsx';

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

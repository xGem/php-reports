<?php
require_once("/includes/Java.inc");
require_once("/includes/connection.php");

use com\aspose\cells\Workbook as Workbook;
use com\aspose\cells\FileFormatType as FileFormatType;
use com\aspose\cells\TextBox as TextBox;
use com\aspose\cells\Color as Color;
use com\aspose\cells\PlacementType as PlacementType;

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
$cantidadRegistrosNuevos = 100000;

$range = $workbook->getWorksheets()->getNames()->get("DATOS_1")->getRange();
$row = ''.$range->getFirstRow(); //ERROR SI NO LO CONVIERTO EN STRING
$row = intval($row);
$aux = ["Tabla1", 34, "1111 1111	3333", "Error 1", "Prueba ERROR"];

$IDsheet = $range->getWorksheet()->getIndex();
$sheet = $workbook->getWorksheets()->get($IDsheet);

$sheet->getCells()->InsertRows($row+1, $cantidadRegistrosNuevos-1);

for ($count=0; $count < $cantidadRegistrosNuevos; $count++) {
	$sheet->getCells()->importArrayList($aux, ($row+$count), 1, false);
}

/*$range = $workbook->getWorksheets()->getNames()->get("HOJA2")->getRange();
$range->setValue('Empresa EEEtttE');*/

/*$IDsheet = $range->getWorksheet()->getIndex();
$sheet = $workbook->getWorksheets()->get($IDsheet);
$row = $range->getFirstRow();
$column = $range->getFirstColumn();
$cell = $sheet->getCells()->get($row, $column);
$cell->setValue("Empresa EEEE");

$range = $workbook->getWorksheets()->getNames()->get("periodo")->getRange();
//echo $range;
$row = $range->getFirstRow();
$column = $range->getFirstColumn();
$cell = $sheet->getCells()->get($row, $column);
$cell->setValue("Periodo 201701");


$range = $workbook->getWorksheets()->getNames()->get("HOJA2")->getRange();
$range->setValue('Empresa EEEE');
//echo $range->getWorksheet()->getCodeName() . '---';
$IDsheet = $range->getWorksheet()->getIndex();
$sheet = $workbook->getWorksheets()->get($IDsheet);
$row = $range->getFirstRow();
$column = $range->getFirstColumn();
$cell = $sheet->getCells()->get($row, $column);
$cell->setValue("Periodo 201701");*/


//$range = $workbook->getWorksheets()->getNames()->get("HOJA2")->getRange();
//$row = '' . $range->getFirstRow();
//echo intval($row)+1;

//$range->get(0,0)->setValue("Periodo 201701");
/*echo $range;
$row = $range->getFirstRow();
$column = $range->getFirstColumn();
$aux = array();
$aaa = int($row) + 1;
echo $row .' ';
echo $column;
echo $range->getRefersTo();
$aux = ["Banana", "Orange", "Apple", "Mango", "Orange", "Apple", "Mango"];
for ($count=0; $count < 5; $count++) {
	//echo ($row->toString());
	//echo 1+$count-1;
	//$sheet->getCells()->importArrayList($aux, ($row+$count)-1, 1, false);
}


for ($count=0; $count < 5; $count++) {
	//$range->get(0,$count)->setValue("1");

	//echo ($row->toString());
	//echo 1+$count-1;
	//$row = 8; //$range->getFirstRow();

	//$column = $range->getFirstColumn();
	$sheet->getCells()->importArrayList($aux, ($row+$count), 1, false);
	//$sheet->getCells()->InsertRow($row+1);
}

*/
//$cell = $sheet->getCells()->get($row, $column);
//$cell->setValue("Perdiodo 201701");


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

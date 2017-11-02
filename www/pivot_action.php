<?php
require_once("/includes/Java.inc");
require_once("/includes/connection.php");

use com\aspose\cells\Workbook as Workbook;
use com\aspose\cells\FileFormatType as FileFormatType;
use com\aspose\cells\PivotTableCollection as PivotTableCollection;
use com\aspose\cells\PivotTable as PivotTable;
use com\aspose\cells\PivotFieldType as PivotFieldType;

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
$cell = $sheet->getCells()->get("A6");
$cell->setValue("ColumnA");
$cell = $sheet->getCells()->get("B6");
$cell->setValue("ColumnB");
$cell = $sheet->getCells()->get("C6");
$cell->setValue("ColumnC");
$cell = $sheet->getCells()->get("D6");
$cell->setValue("ColumnD");

while( $row = sqlsrv_fetch_array( $data, SQLSRV_FETCH_ASSOC )) {
  $sheet->getCells()->importArrayList($row, 6+$count, 0, false);
  $count = $count + 1;
}

$pivotTables = new PivotTableCollection;
$pivotTables = $sheet->getPivotTables();
$PivotFieldType = new PivotFieldType;

//Adding a PivotTable to the worksheet
$index = $pivotTables->add("=A6:D900", "H3", "PivotTable2");
//Accessing the instance of the newly added PivotTable
$pivotTable = $pivotTables->get($index);

//Unshowing grand totals for rows.
$pivotTable->setRowGrand(false);

//Dragging the first field to the row area.
$pivotTable->addFieldToArea($PivotFieldType->ROW, 0);

//Dragging the second field to the column area.
$pivotTable->addFieldToArea($PivotFieldType->COLUMN, 1);

//Dragging the third field to the data area.
$pivotTable->addFieldToArea($PivotFieldType->DATA, 2);

$pivotTable->calculateData();

# Saving the modified Excel file in default (that is Excel 2003) format
$file_format_type = new FileFormatType();
$workbook->save($dataDir . "Tables.xlsx", $file_format_type->XLSX);
$file = __DIR__ . '/data/Tables.xlsx';

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

<?php
require_once("/includes/Java.inc");
require_once("/includes/connection.php");

use com\aspose\cells\Workbook as Workbook;
use com\aspose\cells\ChartType as ChartType;
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
$sheet->setName("Data");

//Get the cells collection in the sheet.
$cells = $sheet->getCells();

//Put some values into a cells of the Data sheet.
$cells->get("A1")->setValue("Empresa");
$cells->get("A2")->setValue("FENIE");
$cells->get("A3")->setValue("A2 ENERGIA");
$cells->get("A4")->setValue("NABALIA");
$cells->get("A5")->setValue("ALDRO");
$cells->get("A6")->setValue("FOENER");
$cells->get("A7")->setValue("CEMOI");
$cells->get("A8")->setValue("FOX");
$cells->get("A9")->setValue("ODF");
$cells->get("A10")->setValue("HOLALUZ");
$cells->get("A11")->setValue("WATIUM");

$cells->get("B1")->setValue("GWh");
$cells->get("B2")->setValue(41);
$cells->get("B3")->setValue(33);
$cells->get("B4")->setValue(28);
$cells->get("B5")->setValue(27);
$cells->get("B6")->setValue(27);
$cells->get("B7")->setValue(20);
$cells->get("B8")->setValue(19);
$cells->get("B9")->setValue(17);
$cells->get("B10")->setValue(17);
$cells->get("B11")->setValue(14);

$chartType = new ChartType();
$color = new Color();

//Create chart
$chartIndex = $sheet->getCharts()->add($chartType->COLUMN, 12, 1, 33, 12);
$chart = $sheet->getCharts()->get($chartIndex);

//Set properties of chart title
$chart->getTitle()->setText("TOP 10: Independent Electricity Distributors with more growth");
$chart->getTitle()->getFont()->setBold(true);
$chart->getTitle()->getFont()->setSize(12);

//Set properties of nseries
$chart->getNSeries()->add("Data!B2:B11", true);
$chart->getNSeries()->setCategoryData("Data!A2:A11");

//Set the legend invisible
$chart->setShowLegend(false);

# Saving the modified Excel file in default (that is Excel 2003) format
$file_format_type = new FileFormatType();
$workbook->save($dataDir . "Chart.xls", $file_format_type->EXCEL_97_TO_2003);
$file = __DIR__ . '/data/Chart.xls';

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

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<DIV class="container-fluid">
  <DIV class="row col-sm-8">
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
      <h2 id="sub1">Create a chart from data in a worksheet - Example 1</h2>
      <p><em>
        Generate a chart.
      </em></p>
      <br/>
      <h4>PHP</h4>
      <pre>
        <code id="phpcode">// Accessing the first worksheet in the book ("Sheet1").
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
$chart->getTitle()->setText("TOP 10: Comercializadoras independientes de electricidad con mayor crecimiento");
$chart->getTitle()->getFont()->setBold(true);
$chart->getTitle()->getFont()->setSize(12);

//Set properties of nseries
$chart->getNSeries()->add("Data!B2:B11", true);
$chart->getNSeries()->setCategoryData("Data!A2:A11");

//Set the legend invisible
$chart->setShowLegend(false);</code>
        <button class="btn" data-clipboard-target="#phpcode" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
        <br/>
      </pre>
<!--      <br/>
      <h4>SQL</h4>
      <pre>
        <code id="sqlcode"></code>
        <button class="btn" data-clipboard-target="#phpcode" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
        <br/>
      </pre>-->
      <form action="charts_action.php">
        <button class="btn btn-lg" type="submit">Run Example</button><br/>
      </form>
      <br>
      <h4>References</h4>
      <lu>
        <li><a href="https://docs.aspose.com/display/cellsjava/Charts">Aspose.Cells for Java - Charts.</a></li>
      </lu>
    </main>
  </DIV>
</DIV>
<?php include "includes/footer.php" ?>

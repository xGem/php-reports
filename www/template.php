<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<DIV class="container-fluid">
  <DIV class="row col-sm-8">
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
      <h2 id="sub1">Template - Example 1</h2>
      <p><em>
        Modify a excel template to complete with some data.
      </em></p>
      <br/>
      <h4>PHP</h4>
      <pre>
        <code id="phpcode">$workbook = new Workbook($dataDir."template.xlsx");

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
}</code>
        <button class="btn" data-clipboard-target="#phpcode" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
        <br/>
      </pre>
      <!--<br/>
      <h4>SQL</h4>
      <pre>
        <code id="sqlcode"></code>
        <button class="btn" data-clipboard-target="#phpcode" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
        <br/>
      </pre>-->
      <form action="template_action.php">
        <button class="btn btn-lg" type="submit">Run Example</button><br/>
      </form>
      <!--<br>
      <h4>References</h4>
      <lu>
        <li><a href="https://docs.aspose.com/display/cellsjava/Import+and+Export+Data#ImportandExportData-ImportingfromArray">Aspose.Cells for Java - Import and Export Data.</a></li>
      </lu>-->
    </main>
  </DIV>
</DIV>
<?php include "includes/footer.php" ?>

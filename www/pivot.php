<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<?php
  require_once("/includes/queries.php");
  $sqlcode = get_code_query("1.sql");


?>
<DIV class="container-fluid">
  <DIV class="row col-sm-8">
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
      <h2 id="sub1">Pivot Tables - Example 1</h2>
      <p><em>
        Generate an Excel file with a pivot tables with data from a database.
      </em></p>
      <br/>
      <h4>PHP</h4>
      <pre>
        <code id="phpcode">$pivotTables = new PivotTableCollection;
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
$file = __DIR__ . '/data/Tables.xlsx';</code>
        <button class="btn" data-clipboard-target="#phpcode" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
        <br/>
      </pre>
      <br/>
      <h4>SQL</h4>
      <pre>
        <code id="sqlcode"><?php echo $sqlcode ?></code>
        <button class="btn" data-clipboard-target="#phpcode" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
        <br/>
      </pre>
      <form action="pivot_action.php">
        <button class="btn btn-lg" type="submit">Run Example</button><br/>
      </form>
      <br>
      <h4>References</h4>
      <lu>
        <li><a href="https://docs.aspose.com/display/cellsjava/Create+Pivot+Table">Aspose.Cells for Java - Create Pivot Table.</a></li>
      </lu>
    </main>
  </DIV>
</DIV>
<?php include "includes/footer.php" ?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<?php
  require_once("/includes/queries.php");
  $sqlcode = get_code_query("1.sql");


?>
<DIV class="container-fluid">
  <DIV class="row col-sm-8">
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
      <h2 id="sub1">Tables - Example 1</h2>
      <p><em>
        Generate a file with tables with data from a database.
      </em></p>
      <br/>
      <h4>PHP</h4>
      <pre>
        <code id="phpcode">$sheet = $workbook->getWorksheets()->get(0);

$data = run_query('exec php_reports_excel;',null);
$result1 = sqlsrv_fetch_array($data,SQLSRV_FETCH_ASSOC);
$sheet->getCells()->importArrayList($result1, 0, 0, false);

sqlsrv_next_result($data);
$result2 = sqlsrv_fetch_array($data,SQLSRV_FETCH_ASSOC);
$sheet->getCells()->importArrayList($result2, 3, 0, false);

sqlsrv_next_result($data);
$count = 0;
while( $row = sqlsrv_fetch_array( $data, SQLSRV_FETCH_ASSOC )) {
  $sheet->getCells()->importArrayList($row, 5+$count, 0, false);
  $count = $count + 1;
}</code>
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
      <form action="tables_action.php">
        <button class="btn btn-lg" type="submit">Run Example</button><br/>
      </form>
      <br>
      <h4>References</h4>
      <lu>
        <li><a href="https://docs.aspose.com/display/cellsjava/Import+and+Export+Data#ImportandExportData-ImportingfromArray">Aspose.Cells for Java - Import and Export Data.</a></li>
      </lu>
    </main>
  </DIV>
</DIV>
<?php include "includes/footer.php" ?>

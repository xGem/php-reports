<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<DIV class="container-fluid">
  <DIV class="row col-sm-8">
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
      <h2 id="sub1">Macros - Example 1</h2>
      <p><em>
        Write and execute a macro in an excel file.
      </em></p>
      <br/>
      <h4>PHP</h4>
      <pre>
        <code id="phpcode">// Accessing the first worksheet in the book ("Sheet1").
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
$file = __DIR__ . '/data/macros.xlsm';</code>
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
      <form action="macros_action.php">
        <button class="btn btn-lg" type="submit">Run Example</button><br/>
      </form>
      <br>
      <h4>References</h4>
      <lu>
        <li><a href="https://docs.aspose.com/display/cellsjava/Adding+VBA+Module+and+Code+using+Aspose.Cells">Aspose.Cells for Java - Adding VBA Module and Code using Aspose.Cells.</a></li>
      </lu>
    </main>
  </DIV>
</DIV>
<?php include "includes/footer.php" ?>

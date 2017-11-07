<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<DIV class="container-fluid">
  <DIV class="row col-sm-8">
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
      <h2 id="sub1">Security - Example 1</h2>
      <p><em>
        Protect a worksheet with a password.
      </em></p>
      <br/>
      <h4>PHP</h4>
      <pre>
        <code id="phpcode">//Creating a new Excel object
$workbook = new Workbook();

//Accessing the first worksheet in the Excel file
$worksheets = $workbook->getWorksheets();
$worksheet = $worksheets->get(0);

//Changing the worksheet's name
$worksheet->setName("Data");

//Get the cells collection in the sheet.
$cells = $worksheet->getCells();

//Put a text indicating what is this about.
$cells->get("A1")->setValue("You can read this data sheet, but can't modify unless you have the password");

$protection = $worksheet->getProtection();

//The following 3 methods are only for Excel 2000 and earlier formats
$protection->setAllowEditingContent(false);
$protection->setAllowEditingObject(false);
$protection->setAllowEditingScenario(false);

//Protects the first worksheet with a password "password"
$protection->setPassword("password");</code>
        <button class="btn" data-clipboard-target="#phpcode" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
        <br/>
      </pre>
      <form action="security_action.php">
        <button class="btn btn-lg" type="submit">Run Example 1</button><br/>
      </form>
      <br>
      <h2 id="sub2">Security - Example 2</h2>
      <p><em>
        Encrypt a workbook with a password.
      </em></p>
      <br/>
      <h4>PHP</h4>
      <pre>
        <code id="phpcode2">//Creating a new Excel object
$workbook = new Workbook();

//Accessing the first worksheet in the Excel file
$worksheets = $workbook->getWorksheets();
$worksheet = $worksheets->get(0);

//Changing the worksheet's name
$worksheet->setName("Data");

//Get the cells collection in the sheet.
$cells = $worksheet->getCells();

//Put a text indicating what is this about.
$cells->get("A1")->setValue("You only can read this if you decrypt this workbook with the password");

//Set the password for protecting the file and the just save the file. It will be encrypted using SHA AES like MS does it.
$workbook->getSettings()->setPassword("password");

//Saving the modified Excel file in default format
//IMPORTANT: This is the only action you need to perform in order to get the file encrypted.
$file_format_type = new FileFormatType();
$workbook->save($dataDir . "encrypted_file.xls", $file_format_type->XLSX);
$file = __DIR__ . '/data/encrypted_file.xls';</code>
        <button class="btn" data-clipboard-target="#phpcode2" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
        <br/>
      </pre>
      <form action="security_action2.php">
        <button class="btn btn-lg" type="submit">Run Example 2</button><br/>
      </form>
      <br>

      <h4>References</h4>
      <lu>
        <li><a href="https://docs.aspose.com/display/cellsjava/Protect+and+Unprotect+Worksheet">Aspose.Cells for Java - Protect and Unprotect Worksheet.</a></li>
      </lu>
    </main>
  </DIV>
</DIV>
<?php include "includes/footer.php" ?>

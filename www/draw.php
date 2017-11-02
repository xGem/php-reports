<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<DIV class="container-fluid">
  <DIV class="row col-sm-8">
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
      <h2 id="sub1">Draw Objects - Example 1</h2>
      <p><em>
        Generate some objects.
      </em></p>
      <br/>
      <h4>PHP</h4>
      <pre>
        <code id="phpcode">// Accessing the first worksheet in the book ("Sheet1").
$sheet = $workbook->getWorksheets()->get(0);

// Get the textbox object.
$textboxIndex = $sheet->getTextBoxes()->add(2, 1, 160, 200);
$textbox0 = $sheet->getTextBoxes()->get($textboxIndex);

// Fill the text.
$textbox0->setText("ASPOSE______PHP-Reports!");

// Set the placement.
$textbox0->setPlacement($placementType->FREE_FLOATING);

// Set the font color.
$textbox0->getFont()->setColor($color->getBlue());</code>
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
      <form action="draw_action.php">
        <button class="btn btn-lg" type="submit">Run Example</button><br/>
      </form>
      <br>
      <h4>References</h4>
      <lu>
        <li><a href="https://docs.aspose.com/display/cellsjava/Managing+Controls#ManagingControls-AddingTextBoxControltotheWorksheet">Aspose.Cells for Java - Managing Controls.</a></li>
      </lu>
    </main>
  </DIV>
</DIV>
<?php include "includes/footer.php" ?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>

<DIV class="container-fluid">
  <DIV class="row col-sm-8">
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
      <h2 id="sub1">Formulas - Example 1</h2>
      <p><em>
        Generate a file applying multiple fonts format, size and colors.
      </em></p><br/>

      <h4>PHP</h4>
      <pre>
        <code id="phpcode">$cell = $sheet->getCells()->get("A1");
$cell->setValue("Times New Roman");
$style = $cell->getStyle();
$font = $style->getFont();
$font->setName("Times New Roman");
$font->setBold(true);
$font->setSize(14);
$cell->setStyle($style);</code>
        <button class="btn" data-clipboard-target="#phpcode" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
        <br/>
      </pre>
        <h4>SQL</h4>
      <pre>
          <code id="sqlcode">
          </code>
          <button class="btn" data-clipboard-target="#sqlcode" style="position:absolute;right:10px">Copy code <img class="clippy" width="13" src="images/clippy.svg" alt="Copy to clipboard"></button>
          <br/>
      </pre>
      <form action="fonts_action.php">
        <button class="btn btn-lg" type="submit">Run Example</button><br/>
      </form>
    </main>
  </DIV>
</DIV>
<?php include "includes/footer.php" ?>

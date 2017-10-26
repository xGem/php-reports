<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<?php
  require_once("/includes/queries.php");
  $sqlcode = get_code_query("BAES-1.sql");


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
        <code id="phpcode"></code>
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
        <li><a href="https://docs.aspose.com/display/cellsjava/Using+Formulas+or+Functions+to+Process+Data">Aspose.Cells for Java - Using Formulas or Functions to Process Data.</a></li>
      </lu>
    </main>
  </DIV>
</DIV>
<?php include "includes/footer.php" ?>

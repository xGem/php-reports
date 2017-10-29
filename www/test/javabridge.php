<?php
 require_once("../includes/Java.inc");
 $System = java("java.lang.System");

 echo '<pre>';
 print_r($System->getProperties());
 echo '</pre>';

 ?>

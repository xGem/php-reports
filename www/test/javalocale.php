<?php

require_once("../includes/Java.inc");
$Locale = java("java.util.Locale");

echo "Java Locale: " . $Locale->getDefault();

 ?>

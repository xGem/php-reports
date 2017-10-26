<?php

function get_queries($filter = "*"){

  $dir = "c://vagrant//data//queries";
  $result = array();
  $files = scandir($dir, 1);
  //filter #TODO

  foreach ($files as $key => $value)
  {
      //echo $value;
      if(!($value==="."||$value==="..")){
        $result[] = $value;
      }
  }

  return $result;
}

function get_code_query($file) {

  $dir = "c://vagrant//data//queries";
  $code = file_get_contents($dir."//".$file);

  return $code;

}

?>

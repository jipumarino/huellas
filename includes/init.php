<?php

$SECTIONS_DIR='sections';

$title = 'Centro de Atención<br />Psicológica Huellas';
$page = $_GET['page'];
$page = str_replace("/","",$page);
$page = str_replace("..","",$page);

if(empty($page))
  $page='inicio';

$title_top = 'Centro de Atención Psicológica Huellas - '.ucwords($page);

$filename = "$SECTIONS_DIR/$page.php";

if(file_exists($filename)) {
  $sec_title = ucwords($page);
  $sec_title = str_replace("_"," ",$sec_title);
} else {
  $filename = "$SECTIONS_DIR/unknown.php";
  $sec_title = 'Página inexistente';
}
  

?>

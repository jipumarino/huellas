<?php

$SECTIONS_DIR='sections';

$title = 'Centro de Atención<br />Psicológica Huellas';
$page = $_GET['page'];

if(empty($page))
  $page='inicio';

$filename = "$SECTIONS_DIR/$page.php";

if(file_exists($filename)) {
  $sec_title = ucwords($page);
} else {
  $filename = "$SECTIONS_DIR/unknown.php";
  $sec_title = 'Página inexistente';
}

$title_top = "Centro de Atención Psicológica Huellas - $sec_title";
  

?>

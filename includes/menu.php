<?php
$menu_items = array(
  'inicio',
  'convenios',
  'programas',
  'profesionales',
  'contacto'
   );

foreach($menu_items as $item) {
  echo  "<li";
  if($item == $page) {
    echo " class='current_page_item'";
  }
  echo "><a href='?page=$item'>".ucwords($item)."</a></li>\n";
}


?>
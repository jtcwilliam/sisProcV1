<?php




$people = array(
  
  0=> array(
    'name' => 'Samuel',
    'fav_color' => 'blue'
  )
);

$found_key = array_search('blue', array_column($people, 'fav_color'));

echo $found_key;



?>
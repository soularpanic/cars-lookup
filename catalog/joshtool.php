<?php
// i don't know if i can make a page in this area /shrug
  require('includes/application_top.php');
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_DEFAULT);

  require(DIR_WS_INCLUDES . 'template_top.php');

?>
<div id="carSelectContainer">
    <label for="carMakeSelect">Select Make:</label>
    <select id="carMakeSelect">
      <?php
    $car_make_query = tep_db_query("SELECT DISTINCT(cars_make) FROM trs.cars ORDER BY cars_make ASC;");

while($car_make_value = tep_db_fetch_array($car_make_query)) {  
  $make = $car_make_value["cars_make"];
  echo("<option value=\"" . $make . "\">" . $make . "</option>");
}

      ?>
    </select>
    <?php
    echo("DEBUG: dumping car_make_query: ");var_dump($car_make_query);
echo("DEBUG: dumping car_make_value: ");var_dump($car_make_value);
 ?>
</div>
<?php

  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
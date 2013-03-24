<?php
  include('includes/application_top.php');
/*$make = (isset($HTTP_GET_VARS['make']) ? $HTTP_GET_VARS['make'] : '');*/

$make = $_GET['make'];
/* echo("DEBUG: \$make = " . $make); */
?>


<label for="carModelSelect">Select Model:</label>
  <select id="carModelSelect">
  <?php
  $car_model_query = tep_db_query("SELECT DISTINCT(cars_model) FROM trs.cars WHERE cars_make = '" . $make . "' ORDER BY cars_model ASC;");

echo("<option>-- Select a Model --</option>");
while($car_model_value = tep_db_fetch_array($car_model_query)) {  
  $model = $car_model_value["cars_model"];
  echo("<option value=\"" . $model . "\">" . $model . "</option>");
}

?>
</select>
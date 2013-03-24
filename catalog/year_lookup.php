<?php
  include('includes/application_top.php');
/*$make = (isset($HTTP_GET_VARS['make']) ? $HTTP_GET_VARS['make'] : '');*/

$make = $_GET['make'];
$model = $_GET['model'];
/* echo("DEBUG: \$make = " . $make); */
?>

<label for="carYearSelect">Select Year:</label>
<select id="carYearSelect">
  <?php
  $car_year_query = tep_db_query("SELECT DISTINCT(cars_year) FROM trs.cars WHERE cars_model = '" . $model . "' AND cars_make = '" . $make . "' ORDER BY cars_year DESC;");

while($car_year_value = tep_db_fetch_array($car_year_query)) {  
  $year = $car_year_value["cars_year"];
  echo("<option value=\"" . $year . "\">" . $year . "</option>");
}

?>
</select>
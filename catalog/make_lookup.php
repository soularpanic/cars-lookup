<?php
//include('includes/application_top.php');
?>

<label for="carMakeSelect">Select Make:</label>
  <select id="carMakeSelect">
  <?php
  $car_make_query = tep_db_query("SELECT DISTINCT(cars_make) FROM trs.cars ORDER BY cars_make ASC;");

echo("<option>-- Select a Make --</option>");
while($car_make_value = tep_db_fetch_array($car_make_query)) {  
  $make = $car_make_value["cars_make"];
  echo("<option value=\"" . $make . "\">" . $make . "</option>");
}

?>
</select>
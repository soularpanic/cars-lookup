<?php
  include('includes/application_top.php');
$model = $_GET['model'];
$make = $_GET['make'];
$year = $_GET['year'];
$products_query = tep_db_query("select p.products_id, products_name, products_description, products_price, products_image, fit_type_id from 
  trs.products_description as pd
  inner join trs.products as p
    on p.products_id = pd.products_id
  inner join trs.cars_to_products as cp
    on p.products_id = cp.products_id
  inner join trs.cars as c
    on c.cars_id = cp.cars_id
  where c.cars_make = '$make' and c.cars_model = '$model' and c.cars_year = $year;");
echo("<table><thead><th>Name</th><th>Price</th></thead>");
while($product = tep_db_fetch_array($products_query)) {
  $NAME = $product["products_name"];
  $PRICE = $product["products_price"];
  echo("<tr><td>$NAME</td><td>$PRICE</td></tr>");
}
echo("</table>");
?>


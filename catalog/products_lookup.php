<?php
  include('includes/application_top.php');
$model = $_GET['model'];
$make = $_GET['make'];
$year = $_GET['year'];
/*
$products_query = tep_db_query("select p.products_id, products_name, products_description, products_price, products_image, fit_type_id from 
  trs.products_description as pd
  inner join trs.products as p
    on p.products_id = pd.products_id
  inner join trs.cars_to_products as cp
    on p.products_id = cp.products_id
  inner join trs.cars as c
    on c.cars_id = cp.cars_id
  where c.cars_make = '$make' and c.cars_model = '$model' and c.cars_year = $year;");
*/
$products_query = tep_db_query("select p.products_id, products_name, products_description, catdesc.categories_id, categories_name, products_price, products_image, fit_type_id from
  trs.products_description as pd
  inner join trs.products as p
    on p.products_id = pd.products_id
  inner join trs.cars_to_products as cp
    on p.products_id = cp.products_id
  inner join trs.cars as c
    on c.cars_id = cp.cars_id
  inner join trs.products_to_categories as ptc
    on p.products_id = ptc.products_id
  inner join trs.categories_description as catdesc
    on catdesc.categories_id = ptc.categories_id
  where c.cars_make = '$make' and c.cars_model = '$model' and c.cars_year = $year
order by categories_name, products_name");

$table_header = "<th>Name</th>
<th>Description</th>
<th>Price</th>
<th>Thumbnail</th>
<th>Fit Type</th>";
echo("<table><thead>$table_header</thead>");
$current_categories_id = "-1";
while($product = tep_db_fetch_array($products_query)) {
  /* $NAME = $product["products_name"]; */
  /* $PRICE = $product["products_price"]; */
  /* var_dump($product); */
$products_id = $product["products_id"];
$products_name = $product["products_name"];
$products_description = $product["products_description"];
$categories_id = $product["categories_id"];
$categories_name = $product["categories_name"];
$products_price = $product["products_price"];
$products_image = $product["products_image"];
$fit_type_id = $product["fit_type_id"];

if ($current_categories_id != $categories_id) {
  $current_categories_id = $categories_id;
  echo("<tr><th colspan='5'>$categories_name</th></tr>");
  echo("<tr>$table_header</tr>");
}

echo("<tr>
<td>$products_name</td>
<td>$products_description</td>
<td>" . $currencies->display_price($products_price) . "</td>
<td>$products_image</td>
<td>$fit_type_id</td>
</tr>");
}
echo("</table>");
?>


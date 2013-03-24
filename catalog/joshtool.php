<?php
// i don't know if i can make a page in this area /shrug
require('includes/application_top.php');
require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_DEFAULT);

require(DIR_WS_INCLUDES . 'template_top.php');

?>

<script src="lookup/scripts/lookup.js"> </script>

  <div id="carSelectContainer">
  <div id="carMakeContainer">
  <?php include('make_lookup.php'); ?>
  </div>
  <div id="carModelContainer"> </div>
  <div id="carYearContainer"> </div>
</div>
<?php
require(DIR_WS_INCLUDES . 'template_bottom.php');
require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
<?php
class cfgm_josh {
  var $code = 'josh';
  var $directory;
  var $language_directory = DIR_FS_CATALOG_LANGUAGES;
  var $key = 'MODULE_JOSH_INSTALLED';
  var $title;
  var $template_integration = false;

  function cfgm_josh() {
    $this->directory = DIR_FS_CATALOG_MODULES . 'payment/';
    $this->title = 'Josh Title!';
  }
}
?>
<?php

  function getConfigs() {

    if (!isset($GLOBALS['config'])) {

      $json_data = file_get_contents('../../config.json');
      $GLOBALS['config'] = json_decode($json_data, true);

    }

  }

?>

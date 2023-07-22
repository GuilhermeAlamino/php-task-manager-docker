<?php

require './session.php';

try {

  $arrayData = router();

  if (isAjax()) {
    die();
  }

  if (!isset($arrayData['data']['title'])) throw new Exception("Indice Title Not Found ");

  if (!isset($arrayData['data'])) throw new Exception("Indice Not Found ");

  if (!isset($arrayData['view'])) throw new Exception("View Not Found In Params");

  if (!file_exists(VIEWS . $arrayData['view'])) throw new Exception("View Not Exists");

  extract($arrayData['data']);

  $view = $arrayData['view'];

  require VIEWS . 'index.php';
} catch (Exception $e) {
  var_dump($e->getMessage());
  die();
}

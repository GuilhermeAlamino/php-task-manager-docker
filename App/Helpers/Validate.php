<?php

function validate($validations, $persistInputs = false, $checkCsrf = false)
{
  if ($checkCsrf) {
    try {
      checkCsrf();
    } catch (\Exception $e) {
      var_dump($e->getMessage());
      die();
    }
  }

  $result = [];
  $param = '';
  foreach ($validations as $field => $validate) {
    $result[$field] = (strpos($validate, '|') == false) ? singleValidation($validate, $field, $param) : multipleValidations($validate, $field, $param);
  }

  if ($persistInputs) {
    setOld();
  }

  if (in_array(false, $result)) {
    return false;
  }

  return $result;
}

function singleValidation($validate, $field, $param)
{
  if (strpos($validate, ':') != false) {
    [$validate, $param] = explode(':', $validate);
  }

  return $validate($field, $param);
}

function multipleValidations($validate, $field, $param)
{
  $explodePipeValidate = explode('|', $validate);
  $result = [];
  foreach ($explodePipeValidate as $validate) {
    if (strpos($validate, ':') != false) {
      [$validate, $param] = explode(':', $validate);
    }

    $result[$field] = $validate($field, $param);

    if (isset($result[$field]) and $result[$field] === false) {
      break;
    }
  }

  return $result[$field];
}

function required($field)
{

  if ($_POST[$field] == '') {
    setFlash($field, 'O campo é obrigatório');
    return false;
  }

  return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
}

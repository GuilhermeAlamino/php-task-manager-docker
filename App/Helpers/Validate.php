<?php

function validate($validations)
{
  $result = [];
  foreach ($validations as $field => $validate) {
    if (strpos($validate, '|') === false) {
      $result[$field] = $validate($field);
    } else {
      // Lógica para lidar com múltiplas validações separadas por '|'
    }
  }

  if (in_array(false, $result)) {
    return false;
  }

  return $result;
}

function required($field)
{
  if ($_POST[$field]  === '') {
    setFlash($field, 'O campo é obrigatório');
    return false;
  }

  return filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS);
}

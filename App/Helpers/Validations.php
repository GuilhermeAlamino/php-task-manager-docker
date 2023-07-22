<?php


function email($field)
{

  $emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

  if (!$emailIsValid) {
    setFlash($field, 'O campo tem que ser um email válido');
    return false;
  }

  return filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);
}

function unique($field, $param)
{
  $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
  $user = listFindBy($field, $data);

  if ($user) {
    setFlash($field, 'Já existe esse valor cadastrado');
    return false;
  }
}

function maxlen($field, $param)
{
  $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

  if (strlen($data) > $param) {
    setFlash($field, "Esse campo não pode passar de {$param} caracteres");
    return false;
  }
}

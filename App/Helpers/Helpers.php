<?php

function isAssociativeArray($arr)
{
  return count($arr) > 0 && array_keys($arr) !== range(0, count($arr) - 1);
}

function isAjax()
{
  return isset($_SERVER['HTTP_HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

function request_input($parameterName, $params)
{
  // Obtém o corpo da solicitação POST como uma string JSON
  $jsonString = file_get_contents('php://input');

  // Decodifica a string JSON para um array associativo
  $request = json_decode($jsonString, true);

  // Verifica se o parâmetro especificado existe e não está vazio
  if (isset($params[$parameterName]) && !empty($params[$parameterName])) {
    // Cria um novo array contendo o parâmetro especificado no início
    $request = [$parameterName => $params[$parameterName]] + $request;
    return $request;
  }

  return array_merge($params, $request);
}

function setOld()
{
  $_SESSION['old'] = $_POST ?? [];
}

function getOld($index)
{
  if (isset($_SESSION['old'][$index])) {
    $old = $_SESSION['old'][$index];
    unset($_SESSION['old'][$index]);

    return $old ?? '';
  }
}

function getCsrf()
{
  $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(8));

  return "<input name='csrf' type='hidden' value=" . $_SESSION["csrf"] . ">";
}

function checkCsrf()
{
  $crsf = filter_input(INPUT_POST, 'csrf', FILTER_SANITIZE_STRING);

  if (!$crsf) {
    throw new Exception("Token Invalido");
  }

  if (!isset($_SESSION['csrf'])) {
    throw new Exception("Token Invalido 2");
  }

  if ($crsf != $_SESSION['csrf']) {
    throw new Exception("Token Invalido 3");
  }

  unset($_SESSION['csrf']);
}

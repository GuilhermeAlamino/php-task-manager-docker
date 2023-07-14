<?php

function Controller($matchedUri, $params)
{

  [$controller, $method] = explode('@', array_values($matchedUri)[0]);

  $controllerWithNamespace = CONTROLLER_PATH . $controller;

  if (!class_exists($controllerWithNamespace)) {
    throw new Exception("Controller *{$controller}* Not Found");
  }

  $controllerInstance = new $controllerWithNamespace;

  if (!method_exists($controllerInstance, $method)) {
    throw new Exception("This Method *{$method}* Not Found in *{$controller}*");
  }

  $controller = $controllerInstance->$method($params);

  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    die();
  }

  return $controller;
}

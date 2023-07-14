<?php

namespace App\Controllers;

class HomeController
{
  function index($params)
  {
    $users = listAll();
    
    return [
      'view' => 'index.php',
      'data' => ['title' => 'Home', "list" => $users]
    ];
  }
}

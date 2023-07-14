<?php

return [
  'POST'=> [
    '/task/create' => 'TaskController@store',
    '/task/edit/[0-9]+' =>'TaskController@update',
    '/task/delete/[0-9]+' =>'TaskController@delete',
  ],
  'GET'=>[
    '/' => 'HomeController@index',
    '/task/[0-9]+/name/[A-Za-z-0-9]+$' =>'TaskController@show'
  ]
];

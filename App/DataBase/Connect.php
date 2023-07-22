<?php

function connect()
{
  return new PDO("mysql:host=mysql;dbname=db_mysql", 'root', 'abc123', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
  ]);
}

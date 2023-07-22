<?php

function listAll($fields = "*", $table = 'list')
{

  try {
    $connect = connect();

    $query = $connect->query("select {$fields} from {$table}");

    return $query->fetchAll();
  } catch (PDOException $e) {
    var_dump($e->getMessage());
    die();
  }
}

function listFindBy($field, $value, $fields = '*', $table = 'list')
{
  try {

    $connect = connect();

    $prepare = $connect->prepare("select {$fields} from {$table} where {$field} = :{$field}");
    $prepare->execute([
      $field => $value
    ]);
    return $prepare->fetch();
  } catch (PDOException $e) {
    var_dump($e->getMessage());
    die();
  }
}

<?php

function UpdateTask($fields, $where, $table = 'list')
{
  try {

    if (!isAssociativeArray($fields) || !isAssociativeArray($where)) {
      throw new Exception("O Array tem que ser associativo para atualização");
    }

    $connect = connect();

    $sql = "update {$table} set ";

    foreach (array_keys($fields) as $field) {
      $sql .= "$field = :{$field}, ";
    }

    $sql = trim($sql, ', ');

    $whereFields = array_keys($where);

    $sql .= " where {$whereFields[0]} = :{$whereFields[0]}";

    $data = array_merge($fields, $where);

    $prepare = $connect->prepare($sql);
    return $prepare->execute($data);
  } catch (PDOException $e) {
    var_dump($e->getMessage());
    die();
  }
}

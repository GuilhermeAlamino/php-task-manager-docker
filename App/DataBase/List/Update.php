<?php

function UpdateTask($fields, $where, $table = 'list')
{
  if (!isAssociativeArray($fields) || !isAssociativeArray($where)) {
    throw new Exception("Error Array tem que ser associativo for update");
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
  $prepare->execute($data);
}

<?php

function DeleteTask($where, $table = 'list')
{
  if (!isAssociativeArray($where)) {
    throw new Exception("Error Array tem que ser associativo for update");
  }

  $connect = connect();

  $whereFields = array_keys($where);

  $sql = "delete from {$table} where";

  $sql .= " {$whereFields[0]} = :{$whereFields[0]}";

  $prepare = $connect->prepare($sql);
  $prepare->execute($where);
  return $prepare->rowCount();
}

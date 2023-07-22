<?php

function DeleteTask($where, $table = 'list')
{

  try {
    if (!isAssociativeArray($where)) {
      throw new Exception("O Array tem que ser associativo para excluir");
    } //code...

    $connect = connect();

    $whereFields = array_keys($where);

    $sql = "delete from {$table} where";

    $sql .= " {$whereFields[0]} = :{$whereFields[0]}";

    $prepare = $connect->prepare($sql);
    $prepare->execute($where);
    return $prepare->rowCount();
  } catch (PDOException $e) {
    var_dump($e->getMessage());
    die();
  }
}

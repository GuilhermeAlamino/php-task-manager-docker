<?php

function createTask($data, $table = 'list')
{

  try {

    if (!isAssociativeArray($data)) {
      throw new Exception("O Array tem que ser associativo para criação");
    }

    $connect = connect();

    $sql = "insert into {$table} (";

    $sql .= implode(',', array_keys($data)) . ") values(";

    $sql .= ':' . implode(',:', array_keys($data)) . ")";

    $prepare = $connect->prepare($sql);
    return $prepare->execute($data);
  } catch (PDOException $e) {
    var_dump($e->getMessage());
    die();
  }
}

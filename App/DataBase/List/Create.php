<?php

function createTask($data, $table = 'list')
{
  try {

    if (!isAssociativeArray($data)) {
      throw new Exception("Array tem que ser associativo");
    }

    $connect = connect();

    $sql = "insert into {$table} (";

    $sql .= implode(',', array_keys($data)) . ") values(";

    $sql .= ':' . implode(',:', array_keys($data)) . ")";

    $prepare = $connect->prepare($sql);
    return $prepare->execute($data);
  } catch (PDOException $e) {
    var_dump($e->getMessage());
  }
}

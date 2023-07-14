<?php

namespace App\Controllers;

class TaskController
{

  public function store($params)
  {

    $validate = validate([
      'task' => 'required'
    ]);

    createTask($validate);
  }

  public function update($params)
  {
    $taskId = $_POST['taskId'];
    $taskValue = $_POST['taskValue'];

    UpdateTask(["task" => $taskValue], ["id" => $taskId]);
  }

  public function show($params)
  {
    var_dump("teste :)");
  }

  public function delete($params)
  {
    $taskId = $_POST['taskId'];

    DeleteTask(["id" => $taskId]);
  }
}

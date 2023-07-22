<?php

namespace App\Controllers;

class TaskController
{

  public function store($params)
  {

    // unique:list
    // required
    // email|unique:list
    // required|maxlen:10
    $validate = validate([
      'task' => 'required',
    ], true, true);

    if (!$validate) {
      return redirect('/');
    }

    $created = createTask($validate);

    if (!$created) {
      setFlash('message-error', "Ocorreu um erro ao cadastrar");
      return redirect('/');
    }

    setFlash('message', "Registrado com sucesso");
    return redirect('/');
  }

  public function update($params)
  {

    $request = request_input('taskValue', $params);

    $update = UpdateTask(["task" => $request['taskValue']], ["id" => $request["edit"]]);

    if (!$update) {
      setFlash('message-error', "Ocorreu um erro ao atualizar");
      return redirect('/');
    }

    // setFlash('message', "Atualizado com sucesso");
    return redirect('/');
  }

  public function show($params)
  {
    var_dump("teste :)");
    die();
  }

  public function delete($params)
  {

    $delete = DeleteTask(["id" => $params['delete']]);

    if (!$delete) {
      setFlash('message-error', "Ocorreu um erro ao excluir");
      return redirect('/');
    }

    // setFlash('message-error', "Deletado com sucesso");
    return redirect('/');
  }
}

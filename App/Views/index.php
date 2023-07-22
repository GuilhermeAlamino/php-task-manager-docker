<?php require 'Components/header.php'; ?>

<body>
  <div class="container">
    <div class=" success-message"></div>

    <form action="/task/create" method="post">
      <?php echo getCsrf() ?>
      <div id="new-task">
        <input type="text" name="task" id="input-create" value="<?php echo getOld('task') ?>" placeholder="Digite aqui uma tarefa..." />
        <button type="submit">Adicionar</button>
        <div class="task_message">
          <?php echo getFlash('task', "background:#ff0000a3;color:white;padding:5px;border-radius: 3px;"); ?>
          <?php echo getFlash('message-error', "background:#ff0000a3;color:white;padding:5px;border-radius: 3px;"); ?>
          <?php echo getFlash('message', "background:#008000b5;color:white;padding:5px;border-radius: 3px;"); ?>
        </div>
      </div>

    </form>

    <div id="tasks">
      <div class="table-wrapper">
        <table class="table">
          <tbody id="body">
            <?php if (empty($list)) { ?>
              <?php echo 'Nenhum registro encontrado ...'; ?>

            <?php } else { ?>
              <?php foreach ($list as $data) : ?>
                <tr>
                  <td class="task-name" data-label="Task">
                    <input type="text" class="editable-input" name="input-edit-save" id="input-edit-save" disabled value="<?= $data->task; ?>" />
                  </td>
                  <td data-label="Actions">
                    <a class="button btn-edit" onclick="enableEdit(this,<?= $data->id; ?>)">Editar</a>
                    <button class="button btn-delete" onclick="verifyDelete(<?= $data->id; ?>)">Deletar</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div id="loading" class="loading d-none">
    <div class="loading-spinner"></div>
  </div>

  <?php require 'Components/footer.php'; ?>
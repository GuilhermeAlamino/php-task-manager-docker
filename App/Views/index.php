<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
  <!-- Stylesheet -->
  <title><?php echo $title ?></title>

</head>

<body>
  <div class="container">
    <div class="success-message"></div>

    <div id="new-task">
      <input type="text" name="task" id="input-create" placeholder="Digite aqui uma tarefa..." />
      <button id="push" onclick="addTask()">Adicionar</button>
    </div>
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
  <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/assets/js/script.js"></script>
</body>

</html>
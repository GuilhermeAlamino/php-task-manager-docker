function enableEdit(button, id) {
  var td = button.parentNode.previousElementSibling;
  var input = td.querySelector("input");

  if (button.innerHTML === "Editar") {
    input.removeAttribute("disabled");
    input.classList.add("focused");
    input.focus();
    button.innerHTML = "Salvar";
  } else {
    var taskValue = input.value;

    if (taskValue.trim() === "") {
      showSuccessMessage("Digite uma tarefa válida.", true);
      return;
    }

    showLoading();

    // Aqui você pode fazer a requisição Ajax para enviar o ID e o valor da tarefa
    $.ajax({
      url: "/task/edit/" + id, // Caminho para a outra rota que receberá o ID e o valor da tarefa
      method: "POST",
      data: {
        taskId: id,
        taskValue: taskValue
      },
      success: function (response) {
        // Insira aqui o código para manipular a resposta do servidor
        console.log(response);

        showSuccessMessage("Tarefa editada com sucesso.", false);
        // Redirecionar para a página inicial após um certo tempo
        setTimeout(function () {
          window.location.href = '/';
          hideLoading();

        }, 2000);

      },
      error: function (xhr, status, error) {
        console.log(error);
        alert("Ocorreu um erro ao salvar a tarefa. Por favor, tente novamente.");
      }
    });

    input.setAttribute("disabled", "disabled");
    input.classList.remove("focused");
    button.innerHTML = "Editar";
  }
}

function addTask() {

  var taskInput = document.getElementById("input-create");
  var taskValue = taskInput.value;

  if (taskValue.trim() === "") {
    showSuccessMessage("Digite uma tarefa válida.", true);

    return;
  }

  console.log(taskValue);
  showLoading();
  $.ajax({
    url: "/task/create", // Caminho para o arquivo PHP que processa a adição da tarefa
    method: "POST",
    data: { task: taskValue },
    success: function (response) {

      console.log(response);

      showSuccessMessage("Tarefa adicionada com sucesso.", false);
      // Redirecionar para a página inicial após um certo tempo
      setTimeout(function () {
        window.location.href = '/';
        hideLoading();

      }, 2000);

    },
    error: function (xhr, status, error) {
      console.log(status);
      alert("Ocorreu um erro ao adicionar a tarefa. Por favor, tente novamente.");
    }
  });

}

function verifyDelete(id) {
  showLoading();

  $.ajax({
    url: "/task/delete/" + id, // Caminho para o arquivo PHP que processa a adição da tarefa
    method: "POST",
    data: { taskId: id },
    success: function (response) {

      console.log(response);
      showSuccessMessage("Tarefa excluída com sucesso.", true);
      // Redirecionar para a página inicial após um certo tempo
      setTimeout(function () {
        window.location.href = '/';
        hideLoading();

      }, 2000);
    },
    error: function (xhr, status, error) {
      console.log(status);
      alert("Ocorreu um erro ao adicionar a tarefa. Por favor, tente novamente.");
    }
  });

}

function showSuccessMessage(message, isDelete) {
  var successMessages = document.getElementsByClassName("success-message");

  // Iterar sobre a coleção de elementos
  for (var i = 0; i < successMessages.length; i++) {
    var successMessage = successMessages[i];
    successMessage.innerHTML = message;

    if (isDelete) {
      successMessage.classList.add("success-message-delete");
    } else {
      successMessage.classList.remove("success-message-delete");
    }

    successMessage.style.display = "block";

    // Ocultar a mensagem de sucesso após um determinado tempo
    setTimeout(function () {
      successMessage.style.display = "none";
    }, 2000); // Tempo em milissegundos (2 segundos neste exemplo)
  }
}

function showLoading() {
  var loadingElement = document.getElementById("loading");
  loadingElement.classList.remove("d-none");
}

function hideLoading() {
  var loadingElement = document.getElementById("loading");
  loadingElement.classList.add("d-none");
}
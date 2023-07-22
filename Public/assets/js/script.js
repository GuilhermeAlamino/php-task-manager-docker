axios.defaults.headers = {
  "Content-Type": 'application/json',
  HTTP_X_REQUESTED_WITH: 'XMLHttpRequest',
}

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

    edit();

    async function edit() {
      try {
        const { data } = await axios.post('/task/edit/' + id, { taskValue });
        setTimeout(function () {
          window.location.href = '/';
          hideLoading();

        }, 2000);
        showSuccessMessage("Atualizado com sucesso.");
        console.log(data);
      } catch (error) {
        console.log(error);
      }
    }

    input.setAttribute("disabled", "disabled");
    input.classList.remove("focused");
    button.innerHTML = "Editar";
  }
}

function verifyDelete(id) {
  showLoading();

  deleteTask();
  async function deleteTask() {
    try {
      const { data } = await axios.post('/task/delete/' + id);
      setTimeout(function () {
        window.location.href = '/';
        hideLoading();
      }, 2000);
      showSuccessMessage("Deletado com sucesso.", true);
      console.log(data);
    } catch (error) {
      console.log(error);
    }
  }

}

function showSuccessMessage(message, isDelete) {
  var successMessages = document.getElementsByClassName("success-message");

  for (var i = 0; i < successMessages.length; i++) {
    var successMessage = successMessages[i];
    successMessage.innerHTML = message;

    if (isDelete) {
      successMessage.classList.add("success-message-delete");
    } else {
      successMessage.classList.remove("success-message-delete");
    }

    successMessage.style.display = "block";

    setTimeout(function () {
      successMessage.style.display = "none";
    }, 2000);
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
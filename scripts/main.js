function postData(url = "", data = {}) {
  return fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.text())
    .then((text) => {
      console.log(text); // Log the raw response
      return JSON.parse(text); // Parse the text as JSON
    });
}

document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("loginForm");
  if (loginForm) {
    loginForm.addEventListener("submit", login);
  }
});

function login(event) {
  event.preventDefault();
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  const data = {
    acessar: 1,
    email: email,
    senha: password,
  };

  console.log(data);

  if (email == "" || password == "") {
    alert("Por favor, preencha todos os campos");
    return false;
  } else {
    postData('./api/login.php', data)
      .then((data) => {
        console.log('Success:', data);
        if (data.codigo === 1) {
          window.location.replace('./home.php')
        } else {
          alert(data.mensagem);
        }
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }
}


document.addEventListener("DOMContentLoaded", function () {
  const forgotPass = document.getElementById("forgotPass");
  if (forgotPass) {
    forgotPass.addEventListener("submit", forgotPass);
  }
})


function forgotPass() {
  const email = document.getElementById("email").value;
  const data = {
    recuperar: 1,
    email: email,
  };

  console.log(data);

  if (email == "") {
    alert("Por favor, preencha o campo de e-mail");
    return false;
  } else {
    postData('./api/forgot.php', data)
      .then((data) => {
        console.log('Success:', data);
        if (data.codigo === 1) {
          alert(data.mensagem);
        } else {
          alert(data.mensagem);
        }
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }

}

document.addEventListener("DOMContentLoaded", function () {
  const registerForm = document.getElementById("registerForm");
  if (registerForm) {
    registerForm.addEventListener("submit", register);
  }
})

function register(){
  const nome = document.getElementById("nome").value;
  const email = document.getElementById("email").value;
  const senha = document.getElementById("password").value;
  const confirmarSenha = document.getElementById("passwordConf").value;
  const telefone = document.getElementById("telefone").value;
  const tipo = document.getElementById("tipo").value;
  const data = {
    cadastrar: 1,
    nome: nome,
    email: email,
    senha: senha,
    confirmarSenha: confirmarSenha,
    telefone: telefone,
    tipo: tipo
  };

  console.log(data);

  if (nome == "" || email == "" || senha == "" || confirmarSenha == "" || telefone == "" || tipo == "") {
    alert("Por favor, preencha todos os campos");
    return false;
  }else if(senha != confirmarSenha){
    alert("As senhas não coincidem");
    return false;
  } else {
    postData('./api/register.php', data)
      .then((data) => {
        console.log('Success:', data);
        if (data.codigo === 1) {
          alert(data.mensagem);
          window.location.replace('./index.php')
        } else {
          alert(data.mensagem);
        }
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }
}



function getReviews() {
  fetch('./api/reviews.php')
    .then((response) => response.json())
    .then((data) => {
      console.log('Success:', data);
      populateTable(data);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

const filters = {
  azulejista: null,
  eletricista: null,
  hidraulica: null
};

document.addEventListener("DOMContentLoaded", function () {
  const tipoEletricaCheckbox = document.getElementById("tipoEletrica");
  tipoEletricaCheckbox.addEventListener("change", function () {
    if (this.checked) {
      filters.eletricista = 2;
      console.log("Checkbox is checked. Value is: " + filters.eletricista);
    } else {
      filters.eletricista = null;
      console.log("Checkbox is unchecked.");
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const tipoAzulejistaCheckbox = document.getElementById("tipoAzulejista");
  tipoAzulejistaCheckbox.addEventListener("change", function () {
    if (this.checked) {
      filters.azulejista = 1;
      console.log("Checkbox is checked. Value is: " + filters.azulejista);
    } else {
      filters.azulejista = null;
      console.log("Checkbox is unchecked.");
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const tipoHidraulicaCheckbox = document.getElementById("tipoHidraulica");
  tipoHidraulicaCheckbox.addEventListener("change", function () {
    if (this.checked) {
      filters.hidraulica = 3;
      console.log("Checkbox is checked. Value is: " + filters.hidraulica);
    } else {
      filters.hidraulica = null;
      console.log("Checkbox is unchecked.");
    }
  });
});

function getJobs() {
  const url = './api/getJobs.php'
  const dados = {
    filtrar: 1,
    azulejista: filters.azulejista,
    eletricista: filters.eletricista,
    hidraulica: filters.hidraulica
  };

  fetch(url,{
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(dados)
  })
    .then((response) => response.json())
    .then((data) => {
      console.log('Success:', data);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

const filterButton = document.getElementById("filterButton");
filterButton.addEventListener("click", function () {
  console.log('Filter button clicked');
  console.log('Filters:', filters); // Debugging log
  getJobs();
});

function createJob(){
  const url = './api/createJob.php';
  const titulo = document.getElementById("titulo").value;
  const descricao = document.getElementById("descricao").value;
  const orcamento = document.getElementById("orcamento").value;
  const tipo = document.getElementById("tipo_servico").value;
  const status = document.getElementById("status").value;
  const dataV = document.getElementById("dataValidade").value;
  const dataC = document.getElementById("dataConclusao").value;

  const dados = {
    criar: 1,
    titulo: titulo,
    descricao: descricao,
    orcamento: orcamento,
    tipo: tipo,
    status: status,
    dataValidade: dataV,
    dataConclusao: dataC
  };

  fetch(url,{
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(dados)
  })
    .then((response) => response.json())
    .then((data) => {
      console.log('Success:', data);
      if(data.codigo === 1){
        alert(data.mensagem);
      } else {
        alert(data.mensagem);
      }
    })
    .catch((error) => {
      console.error('Error:', error);
    });

}


function populateTable(reviews) {
  const tableBody = document.querySelector('#reviewsTable tbody');

  // Clear existing table rows
  tableBody.innerHTML = '';

  // Iterate over the reviews array and create table rows
  reviews.forEach((review, index) => {
    const row = document.createElement('tr');

    const nameCell = document.createElement('td');
    nameCell.textContent = review.nome; // Assuming "nome" is the user's name
    row.appendChild(nameCell);

    const reviewCell = document.createElement('td');
    reviewCell.textContent = review.comentario; // Assuming "comentario" is the review text
    row.appendChild(reviewCell);

    const ratingCell = document.createElement('td');
    ratingCell.textContent = review.media; // Assuming "media" is the rating
    row.appendChild(ratingCell);

    // Append the row to the table body
    tableBody.appendChild(row);
  });
};

$(function() {
  $('.datepicker').datepicker();
});

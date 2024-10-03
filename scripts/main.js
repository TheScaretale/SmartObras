/**
 * Envia dados para uma URL especificada usando o método POST.
 *
 * @param {string} url - A URL para onde os dados serão enviados.
 * @param {Object} data - Os dados a serem enviados.
 * @returns {Promise<Object>} - Uma promessa que resolve com a resposta da API em formato JSON.
 */

/**
 * Adiciona um listener ao formulário de login para tratar o evento de submissão.
 */

/**
 * Função de login que envia os dados para o arquivo login.php.
 *
 * @param {Event} event - O evento de submissão do formulário.
 */

/**
 * Adiciona um listener ao formulário de recuperação de senha para tratar o evento de submissão.
 */

/**
 * Função de recuperação de senha que envia os dados para o arquivo forgot.php.
 */

/**
 * Adiciona um listener ao formulário de cadastro para tratar o evento de submissão.
 */

/**
 * Função de cadastro que envia os dados para o arquivo register.php.
 */

/**
 * Busca as reviews do arquivo reviews.php e chama a função populateTable.
 */

/**
 * Filtros para a busca de serviços, selecionados nas páginas de busca de serviços.
 *
 * @typedef {Object} Filters
 * @property {number|null} azulejista - Filtro para azulejista.
 * @property {number|null} eletricista - Filtro para eletricista.
 * @property {number|null} hidraulica - Filtro para hidráulica.
 */

/**
 * Adiciona um listener ao checkbox de eletricista para atualizar o filtro.
 */

/**
 * Adiciona um listener ao checkbox de azulejista para atualizar o filtro.
 */

/**
 * Adiciona um listener ao checkbox de hidráulica para atualizar o filtro.
 */

/**
 * Adiciona um listener ao botão de filtro de serviços.
 */

/**
 * Popula a tabela de reviews com os dados fornecidos.
 *
 * @param {Array<Object>} reviews - Um array de objetos de review.
 */

/**
 * Cria um elemento de trabalho (job) com base nos dados fornecidos.
 *
 * @param {Object} job - Os dados do trabalho.
 * @returns {HTMLElement} - O elemento de trabalho criado.
 */

/**
 * Busca os trabalhos filtrados do arquivo getJobs.php e os exibe na página.
 */

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
} // Não usar essa função, estamos utilizando fetch diretamente


function login(event) {
  event.preventDefault(); //Evitar erro de CORS

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  // Pegando os dados dos campos acima

  const data = {
    acessar: 1,
    email: email,
    senha: password,
  }; // Criando um objeto com os dados acima

  console.log(data); // Log para debug no console, deve sair até o final do trabalho

  if (email == "" || password == "") {
    alert("Por favor, preencha todos os campos");
    return false;
  } // Verificação dos inputs acima
  else {
    postData("./api/login.php", data) // enviando os dados para o login.php
      .then((data) => {
        console.log("Success:", data); // Log para debug no console, deve sair até o final do trabalho
        if (data.codigo === 1) {
          window.location.replace("./home.php"); // Se o código que a API mandar for 1 é redirecionado ao home
        } else {
          alert(data.mensagem); // Caso contrário ele exibe o motivo do porque não logou
        }
      })
      .catch((error) => {
        console.error("Error:", error); // Log para debug no console, deve sair até o final do trabalho
      });
  }
} // Função de login que envia os dados para o arquivo login.php



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
    postData("./api/forgot.php", data)
      .then((data) => {
        console.log("Success:", data);
        if (data.codigo === 1) {
          alert(data.mensagem);
        } else {
          alert(data.mensagem);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
} // Função de esqueci a senha que envia os dados para o arquivo forgot.php


function register() {
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
    tipo: tipo,
  };

  console.log(data);

  if (
    nome == "" ||
    email == "" ||
    senha == "" ||
    confirmarSenha == "" ||
    telefone == "" ||
    tipo == ""
  ) {
    alert("Por favor, preencha todos os campos");
    return false;
  } else if (senha != confirmarSenha) {
    alert("As senhas não coincidem");
    return false;
  } else {
    postData("./api/register.php", data)
      .then((data) => {
        console.log("Success:", data);
        if (data.codigo === 1) {
          alert(data.mensagem);
          window.location.replace("./index.php");
        } else {
          alert(data.mensagem);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
} // Função de cadastro que envia os dados para o arquivo register.php

function getReviews() {
  fetch("./api/reviews.php")
    .then((response) => response.json())
    .then((data) => {
      console.log("Success:", data);
      populateTable(data);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
} // Função que pega as reviews do arquivo reviews.php e chama a função populateTable, isso vai mudar ainda

const filters = {
  azulejista: null,
  eletricista: null,
  hidraulica: null,
}; // Filtros para a busca de serviços, selecionados nas paginas de busca de serviços

document.addEventListener("DOMContentLoaded", function () {
  const tipoEletricaCheckbox = document.getElementById("tipoEletrica");
  if (tipoEletricaCheckbox) {
    tipoEletricaCheckbox.addEventListener("change", function () {
      if (this.checked) {
        filters.eletricista = 2;
        console.log("Checkbox is checked. Value is: " + filters.eletricista);
      } else {
        filters.eletricista = null;
        console.log("Checkbox is unchecked.");
      }
    });
  }
}); // Instanciação do checkbox de eletricista

document.addEventListener("DOMContentLoaded", function () {
  const tipoAzulejistaCheckbox = document.getElementById("tipoAzulejista");
  if (tipoAzulejistaCheckbox) {
    tipoAzulejistaCheckbox.addEventListener("change", function () {
      if (this.checked) {
        filters.azulejista = 1;
        console.log("Checkbox is checked. Value is: " + filters.azulejista);
      } else {
        filters.azulejista = null;
        console.log("Checkbox is unchecked.");
      }
    });
  }
}); // Instanciação do checkbox de azulejista

document.addEventListener("DOMContentLoaded", function () {
  const tipoHidraulicaCheckbox = document.getElementById("tipoHidraulica");
  if (tipoHidraulicaCheckbox) {
    tipoHidraulicaCheckbox.addEventListener("change", function () {
      if (this.checked) {
        filters.hidraulica = 3;
        console.log("Checkbox is checked. Value is: " + filters.hidraulica);
      } else {
        filters.hidraulica = null;
        console.log("Checkbox is unchecked.");
      }
    });
  }
}); // Instanciação do checkbox de hidraulica

// Slider do filtro:
document.addEventListener("DOMContentLoaded", function () {
  fetch("./api/getJobs.php").then((response) => response.json())
  .then((data) => {
    const valorMax = data.maxValue
    const valorMin = data.minValue
    const input = document.getElementById("slideValor")
    input.min = valorMin
    input.max = valorMax
    input.value = valorMin
    input.nextElementSibling.textContent = valorMin
  })
  .catch((error) => console.error("Erro ao pegar valores:", error));
});

const filterButton = document.getElementById("filterButton");
if (filterButton) {
  filterButton.addEventListener("click", function () {
    console.log("Filter button clicked");
    console.log("Filters:", filters); // Debugging log
    getJobs();
  });
} // Botão de filtrar serviços

function populateTable(reviews) {
  const tableBody = document.querySelector("#reviewsTable tbody");

  // Clear existing table rows
  tableBody.innerHTML = "";

  // Iterate over the reviews array and create table rows
  reviews.forEach((review, index) => {
    const row = document.createElement("tr");

    const nameCell = document.createElement("td");
    nameCell.textContent = review.nome; // Assuming "nome" is the user's name
    row.appendChild(nameCell);

    const reviewCell = document.createElement("td");
    reviewCell.textContent = review.comentario; // Assuming "comentario" is the review text
    row.appendChild(reviewCell);

    const ratingCell = document.createElement("td");
    ratingCell.textContent = review.media; // Assuming "media" is the rating
    row.appendChild(ratingCell);

    // Append the row to the table body
    tableBody.appendChild(row);
  });
} // Função que popula a tabela de reviews

function createJobElement(job) {
  const a = document.createElement("a");
  a.href = "#";
  a.className = "list-group-item list-group-item-action d-flex gap-3 py-3";
  a.setAttribute("aria-current", "true");

  const img = document.createElement("img");
  img.src = "https://github.com/twbs.png"; // Replace with dynamic image URL if available
  img.alt = "twbs";
  img.width = 32;
  img.height = 32;
  img.className = "rounded-circle flex-shrink-0";
  a.appendChild(img);

  const divMain = document.createElement("div");
  divMain.className = "d-flex gap-2 w-100 justify-content-between";
  a.appendChild(divMain);

  const divContent = document.createElement("div");
  divMain.appendChild(divContent);

  const h6 = document.createElement("h6");
  h6.className = "mb-0";
  h6.textContent = job.titulo; // Assuming "titulo" is the job title
  divContent.appendChild(h6);

  const br = document.createElement("br");
  divContent.appendChild(br);

  const divRatings = document.createElement("div");
  divRatings.className = "ratings";
  divContent.appendChild(divRatings);

  const fullStars = Math.floor(job.avaliacao);
  const halfStar = job.avaliacao % 1 !== 0;
  const emptyStars = 5 - fullStars - (halfStar ? 1 : 0);

  for (let i = 0; i < fullStars; i++) {
    const star = document.createElement("i");
    star.className = "fa fa-star checked";
    divRatings.appendChild(star);
  }

  if (halfStar) {
    const star = document.createElement("i");
    star.className = "fa fa-star-half-o checked";
    divRatings.appendChild(star);
  }

  for (let i = 0; i < emptyStars; i++) {
    const star = document.createElement("i");
    star.className = "fa fa-star-outline";
    divRatings.appendChild(star);
  }

  const ratingText = document.createElement("i");
  ratingText.textContent = `(${job.avaliacao})`; // Assuming "avaliacao" is the job rating
  divRatings.appendChild(ratingText);

  const p = document.createElement("p");
  p.className = "mb-0 opacity-75";
  p.textContent = job.descricao; // Assuming "descricao" is the job description
  divContent.appendChild(p);

  const divPrice = document.createElement("div");
  divPrice.className = "flex-direction: column;";
  divMain.appendChild(divPrice);

  const small = document.createElement("small");
  small.className = "opacity-90 text-nowrap";
  small.textContent = `R$${job.orcamento} por hora`; // Assuming "orcamento" is the job price
  divPrice.appendChild(small);

  const pTime = document.createElement("p");
  pTime.className = "text-end";
  pTime.style.opacity = 0.5;
  pTime.textContent = `${job.diasPassados} dias atrás`; // Replace with dynamic time if available
  if (job.diasPassados >= 31) {
    const diaParaMes = Math.floor(job.diasPassados / 31);
    pTime.textContent = `${diaParaMes} meses atrás`;
  }
  divPrice.appendChild(pTime);

  return a;
}

function getJobs() {
  const url = "./api/getJobs.php";
  const dados = {
    filtrar: 1,
    azulejista: filters.azulejista,
    eletricista: filters.eletricista,
    hidraulica: filters.hidraulica,
  };

  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(dados),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Success:", data);
      const container = document.getElementById("jobsContainer"); // Replace with your container ID
      if (container) {
        container.innerHTML = ""; // Clear existing content

        if (Array.isArray(data)) {
          data.forEach((job) => {
            const jobElement = createJobElement(job);
            container.appendChild(jobElement);
          });
        } else {
          console.error("Expected an array but got:", data);
        }
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// Call the function to populate jobs
getJobs();

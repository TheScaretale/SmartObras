const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

function autoResize(textarea){
  textarea.style.height = 'auto';
  textarea.style.height = textarea.scrollHeight + 'px';
}


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

const loginBtn = document.getElementById("btnEntrar");
if (loginBtn) {
  loginBtn.addEventListener("click", login);
} //Carregar o botão de login e garantir que ele funcione

document.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    login(event);
  }
}); // Adicionar evento para a tecla "Enter"

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
          window.location.replace("./home.php"); // Se o código que a API mandar for 1 é redirecionado ao home e armazena alguns dados la no $_SESSION do PHP.
        } else {
          alert(data.mensagem); // Caso contrário ele exibe o motivo do porque não logou, seja usuario ou senha errados ou então que algo deu errado
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
  }; //  Coletando as informações acima.

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
  } // A estrutura acima faz a verificação dos campos.
  else {
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
} // Um simples fetch das avaliações, não sei para que vamos usar ainda.

const filters = {
  azulejista: null,
  eletricista: null,
  hidraulica: null,
  orcamento: null,
  data: null,
}; // Filtros para a busca de serviços, selecionados nas paginas de busca de serviços (trabalhar.php)

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

document.addEventListener("DOMContentLoaded", function () {
  const tipoOrcamento = document.getElementById("orcamento");
  if (tipoOrcamento) {
    tipoOrcamento.addEventListener("change", function () {
      console.log("Elemento do orçamento encontrado");
      if (this.value == "0") {
        filters.orcamento = null;
        console.log("Orcamento selecionado: " + filters.orcamento);
      } else {
        filters.orcamento = this.value;
        console.log("Orcamento selecionado: " + filters.orcamento);
      }
    });
  } else {
    console.log("Elemento do orçamento não encontrado");
  }
}); // Instanciação do campo de orçamento

document.addEventListener("DOMContentLoaded", function () {
  const tipoData = document.getElementById("filtroData");
  if (tipoData) {
    tipoData.addEventListener("change", function () {
      console.log("Elemento da data encontrado");
      filters.data = this.value;
      console.log("Data selecionada: " + filters.data);
    });
  } else {
    console.log("Elemento da data não encontrado");
  }
}); // Instanciação do campo de data

const filterButton = document.getElementById("filterButton");
if (filterButton) {
  filterButton.addEventListener("click", function () {
    console.log("Filter button clicked");
    console.log("Filters:", filters); // Debugging log
    getJobs();
  });
} // Botão de filtrar serviços

function createJobElement(job) {
  const fragment = document.createDocumentFragment(); //cria um fragmento com a intenção de acelerar o processo de renderização da pagina

  const a = document.createElement("a");
  a.href = "trabalho.php?&id_servico=" + job.id_servico;
  a.className = "list-group-item list-group-item-action d-flex gap-3 py-3";
  a.setAttribute("aria-current", "true");
  fragment.appendChild(a);

  const img = document.createElement("img");
  switch (job.id_tipo_servico) {
    case "1":
      img.src = "assets/azulejista1.png";
      break;
    case "2":
      img.src = "assets/eletrica.png";
      break;
    case "3":
      img.src = "assets/hidraulica.png";
      break;
    default:
      img.src = "assets/capacete.png";
  }
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

  const jobId = document.createElement("input");
  jobId.type = "hidden";
  jobId.value = job.id_servico;
  divContent.appendChild(jobId);

  const h6 = document.createElement("h6");
  h6.className = "mb-0";
  h6.textContent = job.titulo;
  divContent.appendChild(h6);

  if (window.location.pathname == "/trabalhar.php") {
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
    ratingText.textContent = `(${job.avaliacao})`;
    divRatings.appendChild(ratingText);
  } else {
    const hr = document.createElement("hr");
    divContent.appendChild(hr);
  }

  const p = document.createElement("p");
  p.className = "mb-0 opacity-75";
  p.textContent = job.descricao;
  divContent.appendChild(p);

  const divPrice = document.createElement("div");
  divPrice.style.flexDirection = "column";
  divMain.appendChild(divPrice);

  const small = document.createElement("small");
  small.className = "opacity-90 text-nowrap";
  small.textContent = `R$${job.orcamento} por hora`;
  divPrice.appendChild(small);

  const pTime = document.createElement("p");
  pTime.className = "text-end";
  pTime.style.opacity = 0.5;
  pTime.textContent = `${job.diasPassados} dias atrás`;
  if (job.diasPassados >= 31) {
    const diaParaMes = Math.floor(job.diasPassados / 31);
    pTime.textContent = `${diaParaMes} meses atrás`;
  }
  divPrice.appendChild(pTime);

  return fragment;
}

function getJobs() {
  const url = "./api/getJobs.php";
  const dados = {
    source: "filtrar",
    azulejista: filters.azulejista,
    eletricista: filters.eletricista,
    hidraulica: filters.hidraulica,
    orcamento: filters.orcamento,
    intervalo: filters.data,
  };

  console.log("Dados:", dados);

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

const jobsContainer = document.getElementById("jobsContainer");
if (jobsContainer) {
  getJobs();
} // Página de busca de serviços

function getJobsProfile() {
  const url = "./api/getJobs2.php";
  const totalJobs = document.getElementById("totalProjetos")
  const dados = {
    getjobs: 1,
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
      const container = document.getElementById("profileJobs"); // Replace with your container ID
      if (container) {
        container.innerHTML = ""; // Clear existing content

        if (Array.isArray(data)) {
          totalJobs.textContent = data.length
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

function getJobsProfile2() {
  const url = "./api/getJobs.php";
  const totalJobs = document.getElementById("totalProjetos")
  const dados = {
    source: "perfil",
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
      const container = document.getElementById("profileJobsCliente"); // Replace with your container ID
      if (container) {
        container.innerHTML = ""; // Clear existing content
        if (Array.isArray(data)) {
          totalJobs.textContent = data.length
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

const profileJobs = document.getElementById("profileJobs");
if (profileJobs) {
  getJobsProfile();
} // Página de perfil para profissional

const profileJobs2 = document.getElementById("profileJobsCliente");
if (profileJobs2) {
  getJobsProfile2();
} //

function createJob() {
  const titulo = document.getElementById("titulo").value;
  const descricao = document.getElementById("descricao").value;
  const orcamento = document.getElementById("orcamento").value;
  const tipoServico = document.getElementById("tipo_servico").value;
  const tipoPagamento = document.getElementById("tipoOrcamento").value;
  const data = {
    criar: 1,
    titulo: titulo,
    descricao: descricao,
    orcamento: orcamento,
    id_tipo_servico: tipoServico,
    tipo_pagamento: tipoPagamento,
  };
  console.log(data);

  if (titulo == "" || descricao == "" || orcamento == "") {
    alert("Por favor, preencha todos os campos");
    return false;
  } else {
    fetch("./api/createJob.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log("Success:", data);
        if (data.codigo === 1) {
          alert(data.mensagem);
        } else {
          alert(data.mensagem);
        }
      });
  }
}

function getURLJob() {
  const urlGET = window.location.search.substring(1).split("&");
  let $_GET = {};
  for (let i = 0; i < urlGET.length; i++) {
    let temp = urlGET[i].split("=");
    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
  }

  return $_GET["id_servico"];
}

function getJobById(id_servico) {
  const url = "./api/jobDetailsById.php";
  const dados = { getId: id_servico };

  return fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(dados),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.codigo && data.codigo !== 1) {
        console.error("Error:", data.mensagem);
        return null;
      } else {
        console.log("Success:", data);
        return data;
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      return null;
    });
}

const jobDetails = document.getElementById("jobDetails");
if (jobDetails) {
  const id_servico = getURLJob();
  getJobById(id_servico).then((jobData) => {
    if (jobData) {
      fillJobDetails(jobData);
    } else {
      console.error("Trabalho não encontrado para o id: ", id_servico);
    }
  });
} else {
  console.log("ID jobDetails não encontrado"); // Página de detalhes do serviço,
}

function fillJobDetails(jobData) {
  const jobDetails = document.getElementById("jobDetails");
  jobDetails.innerHTML = ""; // Clear existing content

  const divRow = document.createElement("div");
  divRow.className = "row";

  const divCol = document.createElement("div");
  divCol.className = "col-md-8";
  divRow.appendChild(divCol); // Coluna da esquerda, a maior coluna

  const divCard = document.createElement("div");
  divCard.className = "card";
  divCol.appendChild(divCard); //Card 1

  const divCardBody = document.createElement("div");
  divCardBody.className = "card-body";
  divCard.appendChild(divCardBody);

  const h5 = document.createElement("h3");
  h5.className = "card-title";
  h5.textContent = jobData.titulo;
  divCardBody.appendChild(h5);

  const hr3 = document.createElement("hr");
  divCardBody.appendChild(hr3);

  const descriptionTitle = document.createElement("h5");
  descriptionTitle.className = "card-title";
  descriptionTitle.textContent = "Descrição:";
  divCardBody.appendChild(descriptionTitle);

  const p = document.createElement("p");
  p.className = "card-text";
  p.textContent = jobData.descricao;
  divCardBody.appendChild(p);

  //Card 4 Começa aqui

  /* const divCard4 = document.createElement("div");
  divCard4.className = "card";
  divCol.appendChild(divCard4);

  const divCardBody4 = document.createElement("div");
  divCardBody4.className = "card-body";
  divCard4.appendChild(divCardBody4);

  const h5_4 = document.createElement("h5");
  h5_4.className = "card-title text-center";
  h5_4.textContent = "Propostas realizadas:";
  divCardBody4.appendChild(h5_4); */

  // Coluna da direita

  const divCol2 = document.createElement("div");
  divCol2.className = "col-md-4";
  divRow.appendChild(divCol2);

  // Card 2 começa aqui

  const divCard2 = document.createElement("div");
  divCard2.className = "card";
  divCol2.appendChild(divCard2);

  const divCardBody2 = document.createElement("div");
  divCardBody2.className = "card-body";
  divCard2.appendChild(divCardBody2);

  const h5_2 = document.createElement("h5");
  h5_2.className = "card-title text-end";
  h5_2.textContent = `Orçamento do cliente: R$ ${jobData.orcamento}`;
  divCardBody2.appendChild(h5_2);

  const dGrid = document.createElement("div");
  dGrid.className = "d-grid gap-2";
  divCardBody2.appendChild(dGrid);

  if (jobData.propostaAceita == "1") {
    const bidBtn = document.createElement("button");
    bidBtn.className = "btn btn-primary";
    bidBtn.textContent = "Trabalho em andamento ou encerrado";
    bidBtn.setAttribute("data-bs-toggle", "modal");
    bidBtn.setAttribute("data-bs-target", "#propostaModal");
    dGrid.appendChild(bidBtn);
    bidBtn.disabled = true;
  } else {
    const bidBtn = document.createElement("button");
    bidBtn.className = "btn btn-primary";
    bidBtn.textContent = "Fazer uma proposta";
    bidBtn.setAttribute("data-bs-toggle", "modal");
    bidBtn.setAttribute("data-bs-target", "#propostaModal");
    dGrid.appendChild(bidBtn);
  }
  const hr = document.createElement("hr");
  divCardBody2.appendChild(hr);

  const divFlex = document.createElement("div");
  divFlex.className = "d-flex justify-content-between align-items-center mt-3";
  divCardBody2.appendChild(divFlex);

  // Card interno do card 2

  const divCard3 = document.createElement("div");
  divCard3.className = "card";
  divCardBody2.appendChild(divCard3);

  const internalCard = document.createElement("div");
  internalCard.className = "card-body";
  divCard3.appendChild(internalCard);

  const p_3 = document.createElement("p");
  p_3.className = "card-text";
  p_3.textContent = `Quem criou este trabalho: ${jobData.nomeCriador}`;
  internalCard.appendChild(p_3);

  const hr2 = document.createElement("hr");
  divCard2.appendChild(hr2);

  const atividades = document.createElement("h6");
  atividades.className = "card-title text-center";
  atividades.textContent = "Total de propostas neste trabalho:";
  divCard2.appendChild(atividades);

  const activityNumber = document.createElement("p");
  activityNumber.className = "card-text text-center";
  activityNumber.textContent = jobData.totalPropostas;
  divCard2.appendChild(activityNumber);

  jobDetails.appendChild(divRow);
}

const jobDetailsClient = document.getElementById("jobDetailsClient");
if (jobDetailsClient) {
  const id_servico = getURLJob();
  getJobById(id_servico).then((jobData) => {
    if (jobData) {
      fillJobDetailsClient(jobData);
    } else {
      console.error("Trabalho não encontrado para o id: ", id_servico);
    }
  });
} else {
  console.log(`ID ${jobDetailsClient} não encontrado`); // Página de detalhes do serviço,
}

const screenSize = window.matchMedia("(max-width: 768px)");

function fillJobDetailsClient(jobData) {
  const jobDetails = document.getElementById("jobDetailsClient");
  jobDetails.innerHTML = ""; // Clear existing content

  const divRow = document.createElement("div");
  divRow.className = "row d-flex";

  // Left column, the larger column
  const divCol = document.createElement("div");
  divCol.className = "col-md-8";
  divRow.appendChild(divCol);

  const order1 = document.createElement("div");
  order1.className = "order-1 order-md-1";
  divCol.appendChild(order1);

  const divCard = document.createElement("div");
  divCard.className = "card";
  order1.appendChild(divCard); // Card 1

  const divCardBody = document.createElement("div");
  divCardBody.className = "card-body";
  divCard.appendChild(divCardBody);

  const h5 = document.createElement("h3");
  h5.className = "card-title";
  h5.textContent = jobData.titulo;
  h5.id = "titulo";
  divCardBody.appendChild(h5);

  const hr3 = document.createElement("hr");
  divCardBody.appendChild(hr3);

  const descriptionTitle = document.createElement("h5");
  descriptionTitle.className = "card-title";
  descriptionTitle.textContent = "Descrição:";
  divCardBody.appendChild(descriptionTitle);

  const p = document.createElement("p");
  p.className = "card-text";
  p.id = "descricao";
  p.textContent = jobData.descricao;
  divCardBody.appendChild(p);

  // Right column
  const divCol2 = document.createElement("div");
  divCol2.className = "col-md-4";
  divRow.appendChild(divCol2);

  // Card 2 starts here
  const divCard2 = document.createElement("div");
  divCard2.className = "card";
  divCol2.appendChild(divCard2);

  const divCardBody2 = document.createElement("div");
  divCardBody2.className = "card-body";
  divCard2.appendChild(divCardBody2);

  const h5_2 = document.createElement("h5");
  h5_2.className = "card-title text-end";
  h5_2.textContent = `Orçamento do cliente: R$ ${jobData.orcamento}`;
  h5_2.id = "orcamento";
  divCardBody2.appendChild(h5_2);

  const dGrid = document.createElement("div");
  dGrid.className = "d-grid gap-2";
  divCardBody2.appendChild(dGrid);

  const bidBtn = document.createElement("button");
  bidBtn.className = "btn btn-primary";
  bidBtn.textContent = "Editar trabalho";
  bidBtn.setAttribute("data-bs-toggle", "modal");
  bidBtn.setAttribute("data-bs-target", "#editarTrabalho");
  bidBtn.onclick = loadJobData;
  dGrid.appendChild(bidBtn);

  const hr = document.createElement("hr");
  divCardBody2.appendChild(hr);

  const divFlex = document.createElement("div");
  divFlex.className = "d-flex justify-content-between align-items-center mt-3";
  divCardBody2.appendChild(divFlex);

  // Internal card of card 2
  const divCard3 = document.createElement("div");
  divCard3.className = "card";
  divCardBody2.appendChild(divCard3);

  const internalCard = document.createElement("div");
  internalCard.className = "card-body";
  divCard3.appendChild(internalCard);

  const p_3 = document.createElement("p");
  p_3.textContent = `Quem criou este trabalho: ${jobData.nomeCriador}`;
  internalCard.appendChild(p_3);

  const hr2 = document.createElement("hr");
  divCard2.appendChild(hr2);

  const atividades = document.createElement("h6");
  atividades.className = "card-title text-center";
  atividades.textContent = "Total de propostas neste trabalho:";
  divCard2.appendChild(atividades);

  const activityNumber = document.createElement("p");
  activityNumber.className = "card-text text-center";
  activityNumber.textContent = jobData.totalPropostas;
  divCard2.appendChild(activityNumber);

  // Card 4 starts here

  if (screenSize.matches) {
    const col3 = document.createElement("div");
    col3.className = "col-md-8";
    divRow.appendChild(col3);

    const divCard4 = document.createElement("div");
    divCard4.className = "card";
    col3.appendChild(divCard4);

    const divCardBody4 = document.createElement("div");
    divCardBody4.className = "card-body";
    divCard4.appendChild(divCardBody4);

    const h5_4 = document.createElement("h5");
    h5_4.className = "card-title text-center";
    h5_4.textContent = "Propostas realizadas:";
    divCardBody4.appendChild(h5_4);

    jobData.propostas.forEach((proposta) => {
      const divCard5 = document.createElement("div");
      divCard5.className = "card";
      divCardBody4.appendChild(divCard5);

      const divCardBody5 = document.createElement("div");
      divCardBody5.className = "card-body";
      divCard5.appendChild(divCardBody5);

      const offerId = document.createElement("input");
      offerId.type = "hidden";
      offerId.id = "offerId";
      offerId.value = proposta.id_proposta;

      const h5_5 = document.createElement("h5");
      h5_5.className = "card-title";
      h5_5.textContent = `Proposta de ${proposta.nomeUsuario}`;
      divCardBody5.appendChild(h5_5);

      const p_4 = document.createElement("p");
      p_4.className = "card-text";
      p_4.textContent = proposta.mensagem;
      divCardBody5.appendChild(p_4);

      if (jobData.status == "3" || jobData.status == "2") {
        const acptBtn = document.createElement("button");
        acptBtn.className = "btn btn-primary";
        acptBtn.textContent = "Aceitar proposta";
        acptBtn.onclick = () => acceptOffer(proposta.id_proposta);
        divCardBody5.appendChild(acptBtn);
      } else if (
        jobData.status == "1" &&
        proposta.id_proposta == jobData.propostaAceita
      ) {
        const h6Status = document.createElement("h6");
        h6Status.className = "card-title";
        h6Status.textContent = "Proposta aceita";
        divCardBody5.appendChild(h6Status);
      }
    });
  } else {
    const divCard4 = document.createElement("div");
    divCard4.className = "card";
    divCol.appendChild(divCard4);

    const divCardBody4 = document.createElement("div");
    divCardBody4.className = "card-body";
    divCard4.appendChild(divCardBody4);

    const h5_4 = document.createElement("h5");
    h5_4.className = "card-title text-center";
    h5_4.textContent = "Propostas realizadas:";
    divCardBody4.appendChild(h5_4);

    jobData.propostas.forEach((proposta) => {
      const divCard5 = document.createElement("div");
      divCard5.className = "card";
      divCardBody4.appendChild(divCard5);

      const divCardBody5 = document.createElement("div");
      divCardBody5.className = "card-body";
      divCard5.appendChild(divCardBody5);

      const row2 = document.createElement("div");
      row2.className = "row";
      divCardBody5.appendChild(row2);

      const colCard1 = document.createElement("div");
      colCard1.className = "col-md-9";
      row2.appendChild(colCard1);

      const offerId = document.createElement("input");
      offerId.type = "hidden";
      offerId.id = "offerId";
      offerId.value = proposta.id_proposta;

      const h5_5 = document.createElement("h5");
      h5_5.className = "card-title";
      h5_5.textContent = `Proposta de ${proposta.nomeUsuario}`;
      colCard1.appendChild(h5_5);

      const p_4 = document.createElement("p");
      p_4.className = "card-text";
      p_4.textContent = proposta.mensagem;
      colCard1.appendChild(p_4);

      const colCard2 = document.createElement("div");
      colCard2.className = "col-md-3";
      row2.appendChild(colCard2);

      if (jobData.status == "3" || jobData.status == "2") {
        const acptBtn = document.createElement("button");
        acptBtn.className = "btn btn-primary";
        acptBtn.textContent = "Aceitar proposta";
        acptBtn.onclick = () => acceptOffer(proposta.id_proposta);
        colCard2.appendChild(acptBtn);
      } else if (
        jobData.status == "1" &&
        proposta.id_proposta == jobData.propostaAceita
      ) {
        const h5Status = document.createElement("h5");
        h5Status.className = "card-title";
        h5Status.textContent = "Proposta aceita";
        colCard2.appendChild(h5Status);

        bidBtn.disabled = true;
      }
    });
  }

  jobDetails.appendChild(divRow);
}

function makeOffer() {
  const id_servico = getURLJob();
  const mensagemProposta = document.getElementById("mensagemProposta").value;
  const orcamentoProposta = document.getElementById("orcamentoProposta").value;

  console.log(id_servico, mensagemProposta.value, orcamentoProposta.value);

  const data = {
    proposta: 1,
    id_servico: id_servico,
    mensagemProposta: mensagemProposta,
    orcamentoProposta: orcamentoProposta,
  };

  fetch("./api/makeOffer.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Success:", data);
      if (data.codigo === 1) {
        alert(data.mensagem);
      } else {
        alert(data.mensagem);
      }
    });
}

function acceptOffer(idProposta) {
  const id_servico = getURLJob();

  const data = {
    aceitar: 1,
    id_servicoProposta: idProposta,
    id_servico: id_servico,
  };
  fetch("./api/acceptOffer.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Success:", data);
      if (data.codigo === 1) {
        alert(data.mensagem);
      } else {
        alert(data.mensagem);
      }
    });
}

function loadJobData() {
  const idServico = document.getElementById("idServico");
  idServico.value = getURLJob();
  const tituloServico = document.getElementById("tituloTrabalho");
  tituloServico.value = document.getElementById("titulo").textContent;
  const descricaoServico = document.getElementById("descricaoTrabalho");
  descricaoServico.value = document.getElementById("descricao").textContent;
  const orcamentoTrabalho = document.getElementById("orcamentoTrabalho");
  orcamentoTrabalho.value = document.getElementById("orcamento").textContent;
  const orcamentoNumeros = orcamentoTrabalho.value.match(/\d+/g).join("");
  orcamentoTrabalho.value = orcamentoNumeros;
}

function editJob() {
  const id_servico = document.getElementById("idServico").value;
  const titulo = document.getElementById("tituloTrabalho").value;
  const descricao = document.getElementById("descricaoTrabalho").value;
  const orcamento = document.getElementById("orcamentoTrabalho").value;

  const data = {
    editar: 1,
    id_servico: id_servico,
    titulo: titulo,
    descricao: descricao,
    orcamento: orcamento,
  };

  fetch("./api/editJob.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Success:", data);
      if (data.codigo === 1) {
        alert(data.mensagem);
      } else {
        alert(data.mensagem);
      }
    });
}

function retrieveMessage() {

}

function sendMessage() {}


function editProfile(){

  
}
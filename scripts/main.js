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

document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("loginForm");
  if (loginForm) {
    loginForm.addEventListener("submit", login);
  }
}); //Carregar o botão de login e garantir que ele funcione

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

const filterButton = document.getElementById("filterButton");
if (filterButton) {
  filterButton.addEventListener("click", function () {
    console.log("Filter button clicked");
    console.log("Filters:", filters); // Debugging log
    getJobs();
  });
} // Botão de filtrar serviços

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

const jobsContainer = document.getElementById("jobsContainer");
if (jobsContainer) {
  getJobs();
} // Página de busca de serviços

function getJobsProfile() {
  const url = "./api/getJobs2.php";
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
}//

function createJob(){
  const titulo = document.getElementById("titulo").value;
  const descricao = document.getElementById("descricao").value;
  const orcamento = document.getElementById("orcamento").value;
  const tipoServico = document.getElementById("tipo_servico").value;
  const data = {
    criar: 1,
    titulo: titulo,
    descricao: descricao,
    orcamento: orcamento,
    id_tipo_servico: tipoServico,
  };
  console.log(data);

  if (titulo == "" || descricao == "" || orcamento == "") {
    alert("Por favor, preencha todos os campos");
    return false;
  } else {
    fetch("./api/createJob.php", {
      method:"POST",
      headers:{
        "Content-Type":"application/json",
      },
      body: JSON.stringify(data),
    })
    .then((response) => response.json())
    .then((data) => {
      console.log("Success:", data);
      if(data.codigo === 1){
        alert(data.mensagem);
      }else{
        alert(data.mensagem);
      }
    })
  }
}
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
    postData('http://localhost/TCC/SmartObras/api/login.php', data)
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
document.getElementById('btnEntrar').addEventListener('click', login);


function forgotPass(event) {
  event.preventDefault();
  const email = document.getElementById("email").value;
  const data = {
    recuperar: 1,
    email: email,
  };

  if (email == "") {
    alert("Por favor, preencha o campo de e-mail");
    return false;
  } else {
    postData('http://localhost/TCC/SmartObras/api/forgot.php', data)
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

function register(event){
  event.preventDefault();
  const nome = document.getElementById("nome").value;
  const email = document.getElementById("email").value;
  const senha = document.getElementById("senha").value;
  const confirmarSenha = document.getElementById("confirmarSenha").value;
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

  if (nome == "" || email == "" || senha == "" || confirmarSenha == "" || telefone == "" || tipo == "") {
    alert("Por favor, preencha todos os campos");
    return false;
  }else if(senha != confirmarSenha){
    alert("As senhas não coincidem");
    return false;
  } else {
    postData('http://localhost/TCC/SmartObras/api/register.php', data)
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

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


const btnRecuperar = document.getElementById("btnRecuperar");
function forgotPass() {}

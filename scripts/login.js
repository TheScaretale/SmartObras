function postData(url = "", data = {}) {
  return fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  }).then((response) => response.text()) .then(text => {
    console.log(text); // Log the raw response
    return JSON.parse(text); // Parse the text as JSON
});
}

const btnEntrar = document.getElementById("btnEntrar");
btnEntrar.addEventListener("click", event=> {
  event.preventDefault();
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  if (email == "" || password == "") {
    alert("Por favor, preencha todos os campos");
    return false;
  }
  postData("../api/login.php", { 
    acessar: 1,
    email: email,
    password: password
   }).then((data) => {
    console.log(data);
    if(data.codigo == 1){
      window.location.replace("../home.php");
    }else{
      alert(data.mensagem);
    }
  });
})
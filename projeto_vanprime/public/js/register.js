function validateRegisterUser(campo,label) {

  let n = document.getElementById(campo);
  let aux=0;
  if (( n.value.length == 0 ) ||(campo == "cpf" && n.value.length!=14) || (campo == "name" && n.value=="")
  ||(campo=="email" && n.value.length<6)||(campo=="password" && n.value.length<3) ||(campo=="password" && n.value.length<3)
  ||(campo=="phone" && n.value.length<11 && n.value.length>14) || (campo == "username" && (n.value.indexOf(" ") >= 0)
  ||(n.value.length<3 && n.value.length>10))){

    // Erro

    // Reporte o campo como inválido
    n.classList.add("is-invalid");

    // Reportar o label como inválido/atenção:
    document.getElementById(label).classList.add("text-danger");


    // Finalizar
    //n.value = "";
    n.focus();
    return false;
  }

  // Tudo correto
  n.classList.remove("is-invalid");
  n.classList.add("is-valid");

  document.getElementById(label).classList.remove("text-danger");

  document.getElementById(label).classList.add("text-success");

  return true;

}

function validateRegisterCompany(campo,label) {

  let n = document.getElementById(campo);
  let aux=0;
  if (( n.value.length == 0 ) ||(campo == "number" && n.value.length>10 && isNaN(parseInt(n.value.substr(0)))) || (campo == "name" && n.value.length<3)
  ||(campo=="email" && n.value.length<6)||(campo=="content" && n.value.length>255)){

    // Erro

    // Reporte o campo como inválido
    n.classList.add("is-invalid");

    // Reportar o label como inválido/atenção:
    document.getElementById(label).classList.add("text-danger");


    // Finalizar
    n.value = "";
    n.focus();
    return false;
  }

  // Tudo correto
  n.classList.remove("is-invalid");
  n.classList.add("is-valid");

  document.getElementById(label).classList.remove("text-danger");

  document.getElementById(label).classList.add("text-success");

  return true;

}

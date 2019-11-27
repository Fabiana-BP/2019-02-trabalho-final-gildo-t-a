function validar(campo,label) {

  let n = campo.value;

  if ( n.length == 0 || isNaN( parseFloat(n) )  ) {

    // Erro

    // Reporte o campo como inválido
    campo.classList.add("is-invalid");

    // Reportar o label como inválido/atenção:
    document.getElementById(label).classList.add("text-danger");


    // Finalizar
    campo.value = "";
    campo.focus();
    return false;

  }

  // Tudo correto
  campo.classList.remove("is-invalid");
  campo.classList.add("is-valid");

  document.getElementById(label).classList.remove("text-danger");

  document.getElementById(label).classList.add("text-success");

  return true;

}

function validaTodosCadastro(){
  if(!(validar("username","label1") && validar("name","label2") && validar("cpf","label3") &&
   validar("email","label5") && validar("phone_no","label6") && validar("password","label7"))){
     document.getElementById("alerta").style.display = "block";
     return false;
   } else{
     document.getElementById("alerta").style.display = "none";
     return true;
   }
}

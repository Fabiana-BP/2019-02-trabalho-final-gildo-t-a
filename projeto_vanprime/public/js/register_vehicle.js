/*$(function() {
$('input[@name=cep]').mask('99999-999');
$('input[@name=cpf]').mask('999.999.999-99');
$('input[@name=board]').mask('AAA-9999');
});*/

function validateRegisterVehicle(campo,label) {

  let n = document.getElementById(campo);
  let aux=0;
  var er = /[a-z]{3}-?\d{4}/gim;
  er.lastIndex = 0;

  if (( n.value.length == 0 ) ||(campo == "board" && !er.test(n.value)) && n.value.length>4 || (campo == "category_id" && n.value<1)
  ||(campo=="max_seats" && isNaN(parseInt(n.value)))){

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

function validadeVehicles(){
  if(validateRegisterVehicle('board','label1') && validateRegisterVehicle('category_id','label2')
  && validateRegisterVehicle('max_seats','label3')){
    return true;
  }else{
    return false;
  }
}

function calculaValor(){
  let passengers=document.getElementById('passenger').value;
  let valor=document.getElementById('price').value;
  let total=passengers*valor;
  document.getElementById('cost').value=total;
}

function verificaTipoPagamento(){
  let type_pay=document.getElementById('type_pay').value;
  if(type_pay == "credito"){
    document.getElementById('cred').style.display = "block";
  }else{
    document.getElementById('cred').style.display = "none";
  }
}

  function validaCredito(){
    if(isNaN(parseInt(document.getElementById('cred_card_number').value)) && isFinite(document.getElementById('cred_card_number').value)){
      document.getElementById('label6').classList.add('text-success');
      document.getElementById('cred_card_number').classList.add('is-valid');
      document.getElementById('label6').classList.remove('text-danger');
      document.getElementById('cred_card_number').classList.remove('is-invalid');
    }else{
      document.getElementById('label6').classList.remove('text-success');
      document.getElementById('cred_card_number').classList.remove('is-valid');
      document.getElementById('label6').classList.add('text-danger');
      document.getElementById('cred_card_number').classList.add('is-invalid');
      document.getElementById('cred_card_number').value="";
    }
  }

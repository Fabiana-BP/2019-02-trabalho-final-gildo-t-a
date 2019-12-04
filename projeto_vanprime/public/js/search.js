
function search_routes(){
  let s=document.getElementById('source');
  let d=document.getElementById('destination');
  let data=document.getElementById('date_trip');
  let p=document.getElementById('passenger');
  let aux=0;
  if(s.value == 0){
    s.classList.add("is-invalid");
    aux=1;
  }else{
    s.classList.remove("is-invalid");
  }
  if(d.value == 0){
    d.classList.add("is-invalid");
    aux=1;
  }else{
    d.classList.remove("is-invalid");
  }
  if(data.value == ""){
    data.classList.add("is-invalid");
    aux=1;
  }else{
    data.classList.remove("is-invalid");
  }

  if(aux==0){
    if(p.value.length == 0){
      p.value=0;
    }
    let pg="/rotasfiltradas/"+s.value+"/"+d.value+"/"+data.value+"/"+p.value;
    window.location.href=pg;
  }
aux=0;

}

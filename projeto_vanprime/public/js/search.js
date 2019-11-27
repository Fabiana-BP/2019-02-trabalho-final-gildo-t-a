function search_routes(){
  let s=document.getElementById('source').value;
  let d=document.getElementById('destination').value;
  let data=document.getElementById('date_trip').value;
  let p=document.getElementById('passenger').value;
  let pg="/rotasfiltradas/"+s+"/"+d+"/"+data+"/"+p;
  window.location.href=pg;

}

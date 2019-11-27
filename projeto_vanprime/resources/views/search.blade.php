
  <div class="well">
    <h4>Buscar</h4>
    <form >
      <input id= "source" name="source" type="text" class="form-control" placeholder="Origem">
      <input id="destination" name="destination" type="text" class="form-control box_style" placeholder="Destino">
      <input id="date_trip" name="date_trip" type="date" min=<?php echo date('Y-m-d');?>
        max=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 29 days'));?>
        name="date" class="form-control box_style" id="date" placeholder="dd/mm/yyyy" >

      <input id="passenger" type="number" name="passenger" placeholder="Passageiros"class="form-control box_style">
      <input type="button" class="btn btn-primary box_style"  value="Buscar" onclick="search_routes()">
    </form>
  </div>

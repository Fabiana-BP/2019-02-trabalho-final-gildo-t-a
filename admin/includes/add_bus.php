<?php

	if (isset($_POST['insert-bus'])) {
		$admin = addslashes($_POST['admin']);
		$category = addslashes($_POST['category']);
		$source = addslashes($_POST['source']);
		$destination = addslashes($_POST['destination']);
		$title = $source . " - " . $destination;
		$intermediate = addslashes($_POST['intermediate']);
		$date = addslashes($_POST['date']);
		$via_time = addslashes($_POST['via-time']);
		$bus_detail = addslashes($_POST['bus-detail']);
		$max_seats = addslashes($_POST['max_seats']);

		$image = $_FILES['image']['name'];
		$tmp_image = $_FILES['image']['tmp_name'];

		if ($admin=="" || $category=="" || $source=="" || $destination=="" || $title=="" || $intermediate=="" || $date=="" || $via_time=="" || $bus_detail=="" || $max_seats=="") {
			echo "**Todos os campos são obrigatórios!";
		}
		else {
			move_uploaded_file($tmp_image, "../images/$image");

			$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_source, post_destination, post_via, post_via_time, post_query_count, max_seats, available_seats)
				VALUES ($category, '$title', '$admin', '$date', '$image', '$bus_detail', '$source', '$destination', '$intermediate', '$via_time', 0, $max_seats, $max_seats)";

			$bus_entry = mysqli_query($connection, $query);

			if (!$bus_entry) {
				die("Falha na solicitação!");
			}
		}
	}

?>


<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="admin">Empresa</label>
		<input type="text" class="form-control" name="admin">
	</div>

	<div class="form-group">
		<select name="category">
			
			<?php 

			$query = "SELECT * FROM categories";
			$select_category = mysqli_query($connection, $query);

			if (!$select_category) {
				die("Falha na requisição!" . mysqli_error($connection));
			}

			while ($row = mysqli_fetch_assoc($select_category)) {
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
			
				echo "<option value='$cat_id'>$cat_title</option>";
			}

			?>

		</select>
	</div>

	<div class="form-group">
		<label for="source">Estação de origem</label>
		<input type="text" class="form-control" name="source">
	</div>

	<div class="form-group">
		<label for="destination">Estação de destino</label>
		<input type="text" class="form-control" name="destination">
	</div>

	<div class="form-group">
		<label for="bus-date">Data</label>
		<input type="date" style="margin-top: 10px;" min=<?php echo date('Y-m-d');?> max=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 29 days'));?> name="date" class="form-control" id="date" placeholder="dd/mm/yyyy" >
	</div>

	<div class="form-group">
		<label for="intermediate-station">Estação intermediária</label>
		<input type="text" class="form-control" name="intermediate">
	</div>
	
	<div class="form-group">
		<label for="via-time">Horários de Viagem</label>
		<input type="text" class="form-control" name="via-time" placeholder="Horários separados por espaço">
	</div>

	<div class="form-group">
		<label for="Max Seats">Número máximo de assentos</label>
		<input type="text" class="form-control" name="max_seats" placeholder="Total de assentos disponíveis">
	</div>

	<div class="form-group">
		<label for="bus-image">Imagem do veículo</label>
		<input type="file" name="image" >
	</div>

	<div class="form-group">
		<label for="bus-detail">Detalhes</label>
		<textarea class="form-control" name="bus-detail" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="insert-bus" value="Add Bus">
	</div>
</form>






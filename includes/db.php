<?php
	$connection = mysqli_connect("localhost", 'root', '', 'bus');

	if(!$connection) {
		die("Erro na conexão!" . mysqli_error($connection));
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DUMP converter 1.0</title>
	<link rel="stylesheet" href="libs/bootstrap.min.css" />
</head>
<body>
	<div class="container">
		<form name="submitFile" name="saveFile" id="saveFile" action="convertFile.php" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-xs-12 col-lg-8 col-lg-offset-2">
					<h2>Esta herramienta optimiza archivos SQL para MySQL</h2>
					<p>1. Convierte todos los insert individuales a multi-insert</p>
					<p>2. Secciona los insert en rangos personalizados para que no tenga problemas en la ejecuci&oacute;n</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6 col-lg-4 col-lg-offset-2">
					<label>Cantidad de rows por bloque</label>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<input type="number" name="rowsPerBlock" id="rowsPerBlock" class="form-control" placeholder="Rows per block" value="500" />
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6 col-lg-4 col-lg-offset-2">
					<label>Seleccione archivo</label>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<input type="file" id="file" name="file" class="form-control" placeholder="Seleccione archivo" accept=".sql,.SQL" />
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-lg-4 col-lg-offset-4 text-center">
					<button type="submit" id="submit" class="form-control btn btn-primary">Convertir</button>
				</div>
			</div>
		</form>

		<?php if(isset($_GET['file'])) { ?>
		<div class="row">
			<div class="col-xs-12 col-lg-4 col-lg-offset-4 text-center">
				<a href="output/<?php echo $_GET['file']; ?>">Descargar</a>
			</div>
		</div>
		<?php } ?>
	</div>
	<script type="text/javascript" src="js/file.js"></script>
</body>
</html>
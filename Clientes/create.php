<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			<?php 
				if (!empty($page_title)) {
					echo remove_junk($page_title);
				} else {
                	echo "Crear Cliente";
            	}
            ?>
        </title>
        <link rel="icon" href="img/icon/add-user.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
		<link rel="stylesheet" href="css/style.css">
		<style type="text/css">
			.centered-form{
				margin-top: 60px;
			}
			.centered-form .panel{
				background: rgba(255, 255, 255, 0.8);
				box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row centered-form">
				<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="fas fa-user-plus"></i> Agregar un Cliente
								<small><b><font color="red"> Completa el formulario! </font></b></small></h3>
						</div>
						<?php
							include ("database/database.php");
							$clientes= new Database();
							if(isset($_POST) && !empty($_POST)){
								$nombres = $clientes->sanitize($_POST['nombres']);
								$apellidos = $clientes->sanitize($_POST['apellidos']);
								$telefono = $clientes->sanitize($_POST['telefono']);
								$direccion = $clientes->sanitize($_POST['direccion']);
								$correo_electronico = $clientes->sanitize($_POST['correo_electronico']);
								$res = $clientes->create($nombres, $apellidos, $telefono, $direccion, $correo_electronico);
								if($res){
									$message= "Datos insertados con éxito";
									$class="alert alert-success";
								}else{
									$message="No se pudieron insertar los datos";
									$class="alert alert-danger";
								}
						?>
						<div class="<?php echo $class?>">
							<?php echo $message;?>
						</div>
						<div class="panel-body">
							<?php
								}
							?>
							<form method="post" role="form">
								<br>
								<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="nombres" id="nombres" class='form-control' maxlength="100" placeholder="Nombres" required>
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="100" placeholder="Apellidos" required>
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="email" name="correo_electronico" id="correo_electronico" class='form-control' maxlength="64" placeholder="Correo Electrónico" required>
								</div>
								<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<textarea  name="direccion" id="direccion" class='form-control' maxlength="255" placeholder="Dirección del cliente" required></textarea>
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" placeholder="Teléfono" required>
										</div>
									</div>
								</div>
								<div>
									<div class="center">
										<div class="form-group">
											<button type="submit" class="btn btn-success"> Guardar datos <i class="fas fa-check-circle"></i></button>
											<a href="index.php" class="btn btn-info add-new"> Regresar <i class="fas fa-reply-all"></i></a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	</body>
</html>
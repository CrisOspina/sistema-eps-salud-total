<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="sistema de administración de citas">
  <meta name="author" content="Cristian Ospina - Valentina Rua">

  <title>Salud total</title>

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>/assets/img/favicon.png">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Estilos personales -->
  <link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet">

</head>

<body class="body-fondo">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center mb-3">
										<img class="img-fluid" src="<?php echo base_url();?>/assets/img/logo.png" alt="">
									</div>

									<!--Validación de usuario al entrar al sistema-->
									<?php echo form_open('login/acceso/');?>
									
									<form class="user">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="pacienteid" id="pacienteid" placeholder="Identificación" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" name="clave" id="clave" placeholder="Contraseña" required>
										</div>
										<button class="btn btn-primary btn-user btn-block">Ingresar</button>
								  </form>
								
								<!--Mensaje de verificación-->
								<div class="card text-center text-dark mt-2">
									<div class="card-body">
										<p class="card-text"><?php if (isset($mensaje)) echo "<h4>" . $mensaje. "</h4>";?>
										<p class="card-text"><?php if (isset($validacion)) echo "<h4>" . $validacion. "</h4>";?>
										<img src="https://img.icons8.com/windows/32/000000/spinner-frame-1.png">
									</div>
								</div>

								<div class="text-center mt-2">
									<a href="" data-target="#registro" data-toggle="modal">Registrarse</a>
								</div>
							</div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>


	<!-- Modal para el registro -->
	<div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Formulario de ingreso</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				<!--Registrar usuarios en la base de datos-->
				<?php echo form_open('registro/nuevo/');?>
				
				<form>
					<div class="form-row">
						<div class="col-6">
							<label class="m-2" for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="nombre" required>
						</div>
						<div class="col-6">
							<label class="m-2" for="apellido">Apellido</label>
							<input type="text" class="form-control" name="apellido" id="apellido" required>
						</div>
					</div>

					<div class="form-row">
						<div class="col-6">
							<label class="m-2" for="telefono">Telefono</label>
							<input type="text" class="form-control" name="telefono" id="telefono">
						</div>
						<div class="col-6">
							<label class="m-2" for="correo">Correo</label>
							<input type="email" class="form-control" name="email" id="email">
						</div>
					</div>

					<div class="form-row">
						<div class="col-6">
							<label class="m-2" for="direcciooon">Dirección</label>
							<input type="text" class="form-control" name="direccion" id="direccion">
						</div>
						<div class="col-6">
							<label class="m-2" for="ciudad">Ciudad</label>
							<input type="text" class="form-control" name="ciudad" id="ciudad">
						</div>
					</div>
					<hr>
					<div class="form-row">
						<h5 class="m-2">Digita tu Identificación y tu contraseña</h5>
						<div class="col-12">
							<label class="m-2" for="pacienteid">Identificación</label>
							<input type="text" class="form-control" name="pacienteid" id="pacienteid" required>
						</div>
						<div class="col-12">
							<label class="m-2" for="clave">Contraseña</label>
							<input type="password" class="form-control" name="clave" id="clave" required>
						</div>
					</div>
						
					<div class="col-12 m-2">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
							<label class="form-check-label" for="invalidCheck2">
								Acepto terminos y condiciones
							</label>
						</div>
					</div> 
					<div class="modal-footer">
						<button class="btn btn-primary" type="submit">Registrarse</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
					</div>
				</form>
			</div>
		</div>
	</div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>/assets/js/sb-admin-2.min.js"></script>

</body>

</html>

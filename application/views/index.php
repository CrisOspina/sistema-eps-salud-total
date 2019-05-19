<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Cristian Ospina - Valentina Rua">

  <title><?php echo $titulo?></title>

 <!--Archivos css y font -->
 <?php include("css-principal/css-pages.php");?>

</head>

<body id="page-top">
    <div id="wrapper"> <!-- Page Wrapper -->
        <?php include("componentes/sidebar.php");?> <!-- Sidebar - barra lateral-->
        
        <div id="content-wrapper" class="d-flex flex-column"> <!-- Content Wrapper -->
      
            <div id="content"> <!-- Main Content -->
                <?php include("componentes/navbar.php");?> <!--Navbar-->
                <?php include("componentes/contenedor-principal.php");?> <!--Contenedor principal - corusel-->
            </div>
            
            <?php include("componentes/footer.php");?> <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!--Modal de usuario - salir de cuenta-->
    <?php include("componentes/modal-user.php");?> 


    <!--Archivos js-->
    <?php include("js-principal/js-pages.php");?>
</body>

</html>

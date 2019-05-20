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

    <?php
    foreach($css_files as $css) 
    {
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $css?>">
        <?php
    }
    ?>

</head>

<body id="page-top">
    <div id="wrapper"> <!-- Page Wrapper -->
        <?php include("componentes/sidebar.php");?> <!-- Sidebar - barra lateral-->
        
        <div id="content-wrapper" class="d-flex flex-column"> <!-- Content Wrapper -->
      
            <div id="content"> <!-- Main Content -->
                <?php include("componentes/navbar.php");?> <!--Navbar-->

                <!--Crud-->
                <div class="breadcome-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcome-list">
                                    <div class="row">
                                        <?php echo $contenido;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

    <?php
    foreach($js_files as $js)
    {
        ?>
            <script type="text/javascript" src="<?php echo $js?>"></script>
        <?php
    }
    ?>
</body>

</html>

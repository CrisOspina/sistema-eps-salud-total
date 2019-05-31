<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>/index.php/principal">
        <div class="sidebar-brand-icon rotate-n-15"></div>
        <div class="sidebar-brand-text mx-3"><img class="img-fluid" src="<?php echo base_url();?>/assets/img/logo.png" alt=""></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>/index.php/principal">
            <i class="fas fa-fw fa-home "></i>
            <span>Salud total</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    Servicios
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fas fa-book"></i>
          <span>Informes</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Listado:</h6>
                <a class="collapse-item" href="<?php echo base_url();?>./index.php/informes/informeCitas" aria-expanded="true">Citas</a>

                <a class="collapse-item" href="<?php echo base_url();?>./index.php/informes/informePacientes">Pacientes</a>

                <a class="collapse-item" href="<?php echo base_url();?>./index.php/informes/informeFormulas">Formulas médicas</a>

                <a class="collapse-item" href="<?php echo base_url();?>./index.php/informes/InformeHistoria">Historia clinica</a>
          </div>
        </div>
      </li>



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>./index.php/pacientes" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-wheelchair"></i>
                <span>Pacientes</span> - 
                <span>( <?php echo $total_pacientes?> )</span>
        </a>
    </li>


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>./index.php/medicos" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user-md "></i>
            <span>Médicos</span> -
            <span>( <?php echo $total_medicos?> )</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>./index.php/medicamentos" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-medkit "></i>
            <span>Medicamentos</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>./index.php/historial" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-heartbeat"></i>
            <span>Historial</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>./index.php/citas/" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-ambulance"></i>
            <span>Citas</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
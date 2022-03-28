<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element text-center">
                        <div>
                            <h1 class='site_title'><i class='fa fa-envelope'></i></h1>
                        </div>
                        <div data-toggle="dropdown" class="dropdown-toggle" href="#">
                            
                        </div>
                    </div>
                    <div class="logo-element">
                    <i class='fa fa-envelope-o'></i>
                    </div>
                </li>
                <li>
                    <!-- <a href="<?= site_url(); ?>/Dashboard"><i class="fa fa-line-chart"></i> <span class="nav-label">Dashboard</span></a> -->
                </li>
                <?php if(in_array(6, $this->session->userdata('privileges'))): ?>
                <li>
                    <a href="<?= site_url(); ?>/Courrier"><i class="fa fa-envelope"></i> <span class="nav-label">Courrier</span></a>
                </li>
                <?php endif ?>
                <?php if(in_array(9, $this->session->userdata('privileges'))): ?>
                <li>
                    <a href="<?= site_url(); ?>/Contact"><i class="fa fa-user-o"></i> <span class="nav-label">Contacts</span></a>
                </li>
                <?php endif ?>
                <?php if(in_array(7, $this->session->userdata('privileges'))): ?>
                <li>
                    <a href="<?= site_url(); ?>/Users"><i class="fa fa-users"></i> <span class="nav-label">Utilisateurs</span></a>
                </li>
                <?php endif ?>
                <?php if(in_array(8, $this->session->userdata('privileges'))): ?>
                <li>
                    <a href="<?= site_url(); ?>/Corbeille"><i class="fa fa-trash"></i> <span class="nav-label">Corbeille</span></a>
                </li>
                <?php endif ?>
                <li>
                    <a href="<?= site_url(); ?>/Profil"><i class="fa fa-user-circle"></i> <span class="nav-label">Profil</span></a>
                </li>
            </ul>

        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?= site_url(); ?>/Profil">
                        <i class="fa fa-user-circle"></i> <?= $this->session->userdata('nom').' '.$this->session->userdata('prenoms') ?>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url(); ?>/Login/deconnexion">
                        <i class="fa fa-sign-out"></i>Déconnexion
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- BEGIN: Sidebar-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="<?php echo base_url() ?>dashboard">
                        <div class="brand-logo"></div>
                        <h6 class="brand-text mb-0 text-center">Dreamworld</h6><br>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                        <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header">
                    <span>Main Menu</span>
                </li>
                <!-- <li class="nav-item <?= ($sidebarActive=='dashboard' ? 'active' : null)?>">
                    <a href="<?= base_url() . 'dashboard' ?>"><i class="fa fa-tachometer fa-fw"></i>Dashboard</a>
                </li> -->
                <li class="nav-item <?= ($sidebarActive=='simulasiBiaya' ? 'active' : null)?>">
                    <a href="<?= base_url() . 'simulasiBiaya' ?>"><i class="fa fa-calculator fa-fw"></i>Simulasi Biaya</a>
                </li>
                <li class="navigation-header">
                    <span>Olah Data</span>
                </li>
                <li class="nav-item <?= ($sidebarActive=='hotel' ? 'active' : null)?>">
                    <a href="<?= base_url() . 'hotel' ?>"><i class="fa fa-hotel fa-fw"></i>Data Hotel</a>
                </li>
                <li class="nav-item <?= ($sidebarActive=='kota' ? 'active' : null)?>">
                    <a href="<?= base_url() . 'kota' ?>"><i class="fa fa-building fa-fw"></i>Data Kota</a>
                </li>
                <li class="nav-item <?= ($sidebarActive=='pelayanan' ? 'active' : null)?>">
                    <a href="<?= base_url() . 'pelayanan' ?>"><i class="fa fa-heart"></i>Pelayanan</a>
                </li>
                <li class=" navigation-header">
                    <span>Other</span>
                </li>
                <li class=" nav-item"><a href="<?php echo base_url() ?>logout"><i class="feather icon-log-out"></i>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Sidebar-->
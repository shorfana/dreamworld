<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Header-->
<?php if (isset($header)) {
    $this->load->view($header);
} ?>
<!-- END: Header-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- BEGIN: Navbar-->
    <?php if (isset($navbar)) {
        $this->load->view($navbar);
    } ?>
    <!-- END: Navbar-->

    <!-- BEGIN: Sidebar-->
    <?php if (isset($sidebar)) {
        $this->load->view($sidebar);
    } ?>
    <!-- END: Sidebar-->

    <!-- BEGIN: Content-->
    <?php if (isset($content)) {
        $this->load->view($content);
    } ?>

    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    
    <!-- BEGIN: Footer-->
    <?php if (isset($footer)) {
        $this->load->view($footer);
    } ?>
    <!-- END: Footer-->

    <!-- BEGIN: JS-->
    <?php if (isset($js)) {
        $this->load->view($js);
    } ?>
    <!-- END: JS-->

    <!-- BEGIN: Script-->
    <?php if (isset($script)) {
        $this->load->view($script);
    } ?>
    <!-- END: Script-->
</body>

</html>
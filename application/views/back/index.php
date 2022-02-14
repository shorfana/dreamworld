<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Header-->
<?php if (isset($header)) {
    $this->load->view($header);
} ?>
<!-- END: Header-->

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

</html>
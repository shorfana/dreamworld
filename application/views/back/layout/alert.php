<!-- Failed Login-->
<?php if ($this->session->flashdata('FailedLogin')) { ?>
  <div class="alert alert-danger" role="alert">
    <strong>Failed!</strong> Wrong Email/Username or Password 
  </div>
<?php } ?>

<!-- Email Not Registered -->
<?php if ($this->session->flashdata('EmailNotRegistered')) { ?>
  <div class="alert alert-danger" role="alert">
    <strong>Failed!</strong> Email Not Registered! 
  </div>
<?php } ?>

<!-- Send Email Success -->
<?php if($this->session->flashdata('EmailSent')) {?>
  <div class="alert alert-success text-center mb-0" role="alert">
    <strong>Success!</strong> Check Your Email!
  </div><br>
<?php }?>

<!-- Send Email Failed -->
<?php if($this->session->flashdata('EmailNotSent')) {?>
  <div class="alert alert-danger text-center mb-0" role="alert">
    <strong>Failed!</strong> Something Wrong!
  </div><br>
<?php }?>

<!-- Send Email Failed -->
<?php if($this->session->flashdata('SuccessResetPassword')) {?>
  <div class="alert alert-success text-center mb-0" role="alert">
    <strong>Success!</strong> Password Succesfully Reset
  </div><br>
<?php }?>
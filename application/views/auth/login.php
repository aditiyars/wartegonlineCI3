<!DOCTYPE html>
<html lang="en">
<head>

<title>Warteg Online</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fa-css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body style="background-image : url('<?php echo base_url()?>assets/images/bg-login.png')" >
    
    <form action="<?= base_url('Auth/login');?>" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="banner" src="<?= base_url(); ?>assets/images/banner.jpg" alt="" srcset="">
                </div>

                <div class="col-md-2">

                </div>
                
                <div class="col-md-4 login shadow-lg kanan">
                    <h3>Log in</h3>
                    <?= $this->session->flashdata('message') ?>
                    <div class="input-group mb-3 username">
                        <span class="input-group-text material-icons" id="basic-addon1">
                            person
                        </span>
                        <input type="text" name="username" class="form-control" placeholder="Username" 
                        aria-label="Username" aria-describedby="basic-addon1" value="<?= set_value('username');?>">
                    </div> 
                    <small class="text-danger"><?= form_error('username');?></small>
                    
                    <div class="input-group mb-3 password">
                        <span class="input-group-text material-icons" id="basic-addon1">
                            lock
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="Passsword" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <small class="text-danger"><?= form_error('password');?></small>

                    <button type="submit" id="bt_login" class="btn-dark shadow" name="bt_login">Log-in</button>
                    
                    <hr>
                    
                    <div class="text-center">
                        <p>Dont have account? <a href="<?= base_url(); ?>auth/registration" class="daftar">Sign-up</a> </p>
                    </div>

                </div>
            </div>
        </div>
    </form>

</body>
</html>

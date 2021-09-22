<!DOCTYPE html>
<html lang="en">
<head>

<title>Warteg Online</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fa-css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
</head>
<body style="background-image: url('<?php echo base_url(); ?>assets/images/bg-login.png');">
   <div class="container">
       <div class="row">
           <div class="col-lg-4 shadow-lg kotak mx-auto">
                <h3 class="title">Sign Up</h3>
                <form action="<?= base_url('Auth/registration');?> " method="post">
            
                    <div class="input-group mb-3 name">
                        <span class="input-group-text material-icons" id="basic-addon1">
                            person
                        </span>
                        <input type="text" name="name" class="form-control" placeholder="Full Name" 
                        aria-label="Full Name" aria-describedby="basic-addon1" value="<?= set_value('name');?>">
                    </div>
                    <small class="text-danger"><?= form_error('name');?></small>
                    
                    <div class="input-group mb-3 username">
                        <span class="input-group-text material-icons" id="basic-addon1">
                            alternate_email
                        </span>
                        <input type="text" name="username" class="form-control" placeholder="Username" 
                        aria-label="Username" aria-describedby="basic-addon1" value="<?= set_value('username');?>">
                    </div> 
                    <small class="text-danger"><?= form_error('username');?></small>

                    <div class="input-group mb-3 password">
                        <span class="input-group-text material-icons" id="basic-addon1">
                            lock
                        </span>
                        <input type="password" name="password1" class="form-control" placeholder="Passsword" 
                        aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <small class="text-danger"><?= form_error('password1');?></small> 

                    <div class="input-group mb-3 password">
                        <span class="input-group-text material-icons" id="basic-addon1">
                            lock
                        </span>
                        <input type="password" name="password2" class="form-control" 
                        placeholder="Repeat Passsword" aria-label="Password" aria-describedby="basic-addon1">
                    </div>

                    <button type="submit" id="bt_signup" class="btn-dark shadow" name="bt_signup">Sign-up</button>
                </form>
                <hr>
                <div class="text-center">
                    <p>Already have an account? <a href="<?= base_url(); ?>auth/index">Login</a></p>
                </div>

           </div>
       </div>
   </div>
</body>
</html>
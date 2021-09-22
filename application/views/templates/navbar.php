    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/menu.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>
    <nav class="navbar sticky-top navbar-dark bg-dark" id="navbar" style="height: 60px;">
        <a class="navbar-brand mx-3" href="<?= base_url()?>User">Warteg Online</a>

        <ul class="nav justify-content-end mx-3">

            <li class="nav-item mx-3" style="margin-bottom: -2px !important;">
                <a class="nav-link active" href="<?=base_url()?>User/keranjang" style="text-decoration: none;color:white;">
                <span class="material-icons" style="font-size: 32px !important;">
                    shopping_cart
                </span>
                </a>
            </li>

            <li class="nav-item">
                <?php if($this->session->userdata('username') != null){ ?>
                <button type="button" class="btn btn-danger nav-link">
                    <a href="<?=base_url()?>User/logout" style="text-decoration: none;color:white;">Log out</a>
                </button>
                <?php }
                else{?>
                <button type="button" class="btn btn-primary nav-link">
                    <a href="<?=base_url()?>Auth/login" style="text-decoration: none;color:white;">Log in</a>
                </button>
                <?php } ?>
            </li>
  
        </ul>
    </nav>
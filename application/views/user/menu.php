    <div class="container p-0">
     
        <div class="row">
               <div class="col jumbotron">
                   <div class="text-center flashdata">
                        <?= $this->session->flashdata('message') ?>
                    </div>  
               </div>
            </div>
        </div>
    
           
        <form action="<?= base_url()?>/User/pesan" method="post">
            <div class="row m-0 p-5 justify-content-center">
                <h3 class="text-center">Pilihan Menu</h3>
                <?php $i = 1 ?>
                <?php foreach($menu as $m){ ?>

                <div class="col-lg-4 col-sm-3 my-3">
                    <div class="card shadow-lg" style="width: 18rem;">
                        <img class="card-img-top" src="<?= base_url(); ?>assets/images/makanan/<?=$i?>.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $m['name'] ?></h5>
                            <p class="card-text"><?= $m['description'] ?></p>
                            <p class="card-text">Rp<?= $m['price'] ?></p>

                            <p class="card-text" style="color: #777777;">
                                Stock 
                                <span style="color: black; font-weight:bold;"><?= $m['stock'] ?></span>
                            </p>

                            <div class="d-flex justify-content-end text-end">

                               <button class="minus kurang btn btn-dark" type="button">
                                   <span class="material-icons shadow-sm ">
                                       remove_circle
                                    </span>
                               </button>

                                <input type="text" class="jumlah" name="jmlh<?=$i?>" id="jmlh<?=$i?>" value="0">
                                
                                <button class="plus tambah btn btn-dark" type="button">
                                    <span class="material-icons shadow-sm ">add_circle</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <?php  $i++; }?>
                <button class="btn btn-primary" type="submit">Buat Pesanan</button>
            </div>
        </form>

    <script>
        
        let inputs = document.getElementsByClassName("jumlah");
        let plusButtons = document.getElementsByClassName("tambah");
        let minusButtons = document.getElementsByClassName("kurang") ;
        
        for(let i = 0; i<inputs.length ; i++){
            plusButtons[i].addEventListener("click",()=> tambah(i));
            minusButtons[i].addEventListener("click", ()=> kurang(i));
        
        }
        
        function tambah(i){
            inputs[i].value = parseInt(inputs[i].value) + parseInt(1);
            //`${inputs[i].value+1}`;
            
            if(inputs[i].value > 0){
                minusButtons[i].style.visibility = "visible";
            }else{
                minusButtons[i].style.dipslay = "hidden";
            }
        }

        function kurang(i){
           inputs[i].value = parseInt(inputs[i].value) - parseInt(1);
           //`${inputs[i].value+1}`;
           if(inputs[i].value <= 0){
                minusButtons[i].style.visibility = "hidden";
            }
        }
        
    </script>
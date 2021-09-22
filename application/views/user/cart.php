<h3 class="my-5 mx-5">Pesanan Saya</h3>

<h5 class="d-flex justify-content-end mx-5">
    <?= $this->session->userdata('username'); ?>
</h5>

<div class="container my-5">
<table class="table table-striped table-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga Satuan</th>
      <th scope="col">Harga</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    $ttl = 0;
    foreach($pesanan as $p){?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $p['name'] ?></td>
      <td><?= $p['jumlah'] ?></td>
      <td>Rp<?= $p['price'] ?></td>
      <td>Rp<?= $ttlTemp = $p['jumlah'] * $p['price'];?></td>
      <form action="<?= base_url()?>User/hapus" method="post">
        <td>
          <button class = "btn btn-danger" name="hapus">Hapus Pesanan</button>
        </td>
        <input type="hidden" name ="id" value="<?= $i ?>">
      </form>  
    
    </tr>
    <?php 
    $ttl += $ttlTemp;
    $i++;} ?>
    <tr>
      <th colspan="4"></th>
      <th scope="col"> Total Rp<?= $ttl;?>,-</th>
      <th></th>
    </tr>
  </tbody>
</table>

</div>
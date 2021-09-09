<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">
        <a href="<?=base_url('anggota/tambah/');?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</a>          
        <a href="<?=base_url('');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>  

      <div class="card">
        <div class="card-header bg-info">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="simple-full-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Identitas</th>
              <th>Kontak</th>
              <th>Alamat</th>
              <th>#</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
              <tr>
                <td scope="row">
                  <?= $data->jenis = 'kader' ? '<span class="badge badge-info">Kader</span>' : '<span class="badge badge-success">Alumni</span>'?></span>
                  <p> <?= $data->nama?> <br> <small><?= $data->nik?></small> </p>                  
                </td>
                <td>
                  <a href="http://wa.me/+62<?= $data->hp?>" class="btn btn-sm btn-success" target="blank"><i class="fab fa-whatsapp"></i></a>
                  <a href="http://instagram.com/<?= $data->ig?>" class="btn btn-sm btn-info" target="blank"><i class="fab fa-instagram"></i></a>
                  <a href="http://fb.com/<?= $data->fb?>" class="btn btn-sm btn-primary" target="blank"><i class="fab fa-facebook"></i></a>
                  <a href="http://fb.com/<?= $data->email?>" class="btn btn-sm btn-warning" target="blank"><i class="fas fa-envelope"></i></a>
                </td>
                <td>
                  <?= $data->domisili ?>
                </td>
                <td>                    
                  <a href="<?= site_url('anggota/detail/'.$data->id);?>" class="btn btn-sm btn-secondary"><i class='fas fa-list'></i></a>
                  <?php if ($this->session->tipe_user < 4) { ?>
                  <a href="<?= site_url('anggota/edit/'.$data->id);?>" class="btn btn-sm btn-info"><i class='fas fa-edit'></i></a>
                  <a href="<?= site_url('anggota/hapus/'.$data->id);?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin mau dihapus?')"><i class='fas fa-trash'></i></a>
                  <?php } ?>
                </td>
          	  </tr>
            	<?php }?>
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content --
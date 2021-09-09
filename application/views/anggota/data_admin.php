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
              <th>Level</th>
              <th>Nama</th>
              <th>Lembaga</th>
              <th>#</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
              <tr>
                <td>
                  <?= $data->tipe_user == '2' ? '<span class="badge badge-info">Rayon</span>' : '<span class="badge badge-warning">Komisariat</span>'?></span>
                </td>
                <td scope="row">
                  <p> <?= $data->nama?> <br> <small><?= $data->email?></small> </p>                  
                </td>
                <td>
                  <?= $this->fungsi->get_deskripsi("tb_komisariat",$data->komisariat_id) ?> / <?= $this->fungsi->get_deskripsi("tb_rayon",$data->rayon_id) ?>
                </td>
                <td>                    
                  <a href="<?= site_url('anggota/edit/'.$data->id);?>" class="btn btn-sm btn-info"><i class='fas fa-edit'></i></a>
                  <a href="<?= site_url('anggota/detail/'.$data->id);?>" class="btn btn-sm btn-secondary"><i class='fas fa-list'></i></a>
                  <a href="<?= site_url('anggota/hapus/'.$data->id);?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin mau dihapus?')"><i class='fas fa-trash'></i></a>
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
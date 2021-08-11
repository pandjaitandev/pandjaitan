<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">
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
                  <p> <small><?= $data->nik?></small> <br> <?= $data->nama?><br>
                  <?= $data->jenis = 'kader' ? '<span class="badge badge-info">Kader</span>' : '<span class="badge badge-success">Alumni</span>'?></span> <small><a href="http://wa.me/+62<?= $data->hp?>"><i class="fab fa-whatsapp"></i> +62 <?= $data->hp?></a></small><br>
                  </p>                  
                </td>                
                <td>                    
                  <a href="<?= site_url('pendaftaran/detail/'.$data->id);?>" class="btn btn-sm btn-info"><i class='fas fa-list'></i></a>
                  <a href="<?= site_url('pendaftaran/hapus/'.$data->id);?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin mau dihapus?')"><i class='fas fa-trash'></i></a>
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
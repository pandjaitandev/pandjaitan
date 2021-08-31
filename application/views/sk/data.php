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
              <th>No</th>
              <th>Keterangan</th>
              <th>Periode</th>
              <th>Created</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
              <tr>
                <td scope="row"><?= $no++?></td>
                <td><?= $data->keterangan ?></td>
                <td><?= $data->periode ?></td>
                <td><?= $data->created ?> <br> <?= $data->acc ?></td>
                <td>                    
                  <a href="<?= site_url('sk/upload/'.$data->id);?>" class="btn btn-sm btn-info"><i class='fas fa-upload'></i></a>
                  <a href="<?= site_url('assets/dist/files/sk/'.$data->download);?>" class="btn btn-sm btn-warning" <?= $data->download == null ? "hidden" : "" ?>><i class='fas fa-download'></i></a>
                  <a href="<?= site_url('assets/dist/files/sk/'.$data->file);?>" class="btn btn-sm btn-secondary"><i class='fas fa-list'></i></a>
                  <a href="<?= site_url('sk/hapus/'.$data->id);?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin mau dihapus?')"><i class='fas fa-trash'></i></a>
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
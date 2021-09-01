<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">     
    <div class="col-12">     
      <div class="card-header">
        <a href="<?=site_url('ideologis/tambah/')?>" class="btn btn-success btn-sm"><i class='fas fa-plus'></i> Tambah</a>
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
              <th>TGL</th>
              <th>Kategori</th>
              <th>Pemohon</th>
              <th>Petugas</th>
              <th>Lokasi</th>
              <th>#</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
              <tr <?= date("ymd",strtotime($data->tgl)) < date("ymd") ? 'class="table-danger"' : ""?> <?= $data->petugas != null ? 'class="table-success"' : ""?>>
                <td><?= $no++?></td>                
                <td><?= date("d-m-y",strtotime($data->tgl))?></td>
                <td><?= $data->kategori?></td>
                <td><?= $data->pemohon?></td>
                <td><?= $data->petugas?></td>
                <td><?= $data->lokasi?></td>
                <td>
                  <a href="https://wa.me/62<?=$data->cp?>" class="btn btn-sm btn-success text-white" <?= $data->cp == null ? "hidden" : ""?>><i class='fab fa-whatsapp'></i></a>
                  <a href="<?= site_url('ideologis/edit/'.$data->id);?>" class="btn btn-sm btn-info"><i class='fas fa-edit'></i></a>
                  <a href="<?= site_url('ideologis/hapus/'.$data->id);?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin mau dihapus?')"><i class='fas fa-trash'></i></a>
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
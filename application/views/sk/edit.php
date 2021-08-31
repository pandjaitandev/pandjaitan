<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('sk');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
          <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
          <div class="card-body">                        
            <div class="form-group">
            <?php if($row->download != null) {?>
            <div>
              <h4>File : <a href="<?= base_url('assets/dist/files/sk/'.$row->download)?>" class="text-primary"><?= $this->input->post('download') ?? $row->download; ?></h4>
              <a href="<?= site_url('sk/hapusfile/'.$row->id);?>"><small>Hapus file?</small></a> 
            </div>
            <?php } else {  ?>             
            <div class="form-group">
              <label>File</label>
              <input type="file" class="form-control" accept=".pdf" name="download" required="">
              <small>Maksimal ukuran file 4 mb</small>
              <br>                     
            </div>            
            <?php } ?>
            </div>                                    
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>          
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Edit</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
    </div>
    </div>
  </div>
</section>

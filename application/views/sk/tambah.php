<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('')?>
          <div class="card-body">
            <div class="form-group">
              <label>Periode</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="periode" placeholder="2018 - 2019" value="<?= set_value('periode');?>" required>
              </div>                            
              <?php echo form_error('periode')?>                        
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="keterangan" placeholder="Pengajuan Rayon Al Ghozali 2019 - 2020" value="<?= set_value('keterangan');?>" required>
              </div>                            
              <?php echo form_error('keterangan')?>                        
            </div>            
            <div class="form-group">
              <label>File</label>
              <input type="file" class="form-control" accept=".doc,.docx,.pdf,.ppt,.pptx" name="file" required="">
              <small>Maksimal ukuran file 4 Mb</small>                     
            </div>                                    
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Tambah</button>
            <button type="reset" class="btn btn-danger">Ulangi</button>            
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.card -->
      <div class="card">
        <div class="card-header bg-info">
          <h3 class="card-title">Riwayat SK</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table id="simple-full-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Keterangan</th>
              <th>Periode</th>
              <th>Diajukan</th>
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
                  <p> <?= $data->keterangan?></p>                  
                </td>
                <td scope="row">
                  <p> <?= $data->periode?></p>                  
                </td>
                <td>
                  <p> <?= $data->created?></p>                  
                </td>                
                <td>                    
                  <?php if ($data->download == null) { echo "diproses"; } ?>
                  <a href="<?= site_url('assets/dist/files/sk/'.$data->download);?>" class="btn btn-sm btn-warning" <?= $data->download == null ? "hidden" : "" ?>><i class='fas fa-download'></i></a>
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
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <?php $this->view('message') ?>
      <div class="card-header">
        <a href="<?=base_url('ideologis')?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
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
              <label>Kategori</label>
              <select name="kategori" class="form-control" id="kategori" required>
                <option value="<?= $this->input->post('kategori') ?? $row->kategori ?>">Pilihan : <?= $this->input->post('kategori') ?? $row->kategori ?></option>
                <option value="pembaiatan">Pembaiatan</option>
                <option value="pendemisioneran">Pendemisioneran</option>
                <option value="pembukaan">Membuka Acara</option>
                <option value="penutupan">Menutup Acara</option>
                <option value="pindang">Pimpinan Sidang</option>
              </select>
              <?php echo form_error('kategori')?>
            </div>
            <div class="form-group">
              <label>Pemohon</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="pemohon" placeholder="Ex: Rayon Al Farisi Komisariat Sunan Kalijaga" value="<?= $this->input->post('pemohon') ?? $row->pemohon ?>" minlength="6" maxlenght="50" required>
              </div>                            
              <?php echo form_error('pemohon')?>                        
            </div> 
            <div class="form-group">
              <label>Tanggal</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span><i class="fas fa-building"></i></span></div></div>
                <input type="date" class="form-control" name="tgl" placeholder="Ex: 09/01/1998" value="<?= $this->input->post('tgl') ?? $row->tgl ?>" required>
              </div>                            
              <?php echo form_error('tgl')?>                        
            </div>
            <div class="form-group">
              <label>Waktu</label>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-book-open"></span>
                  </div>
                </div>
                <select class="form-control" name="waktu_mulai" required="">
                    <option value="<?= $this->input->post('waktu_mulai') ?? $row->waktu_mulai ?>">Waktu Mulai : <?= $this->input->post('waktu_mulai') ?? $row->waktu_mulai ?></option>
                    <?php
                        for ($i=0; $i<=23 ; $i++) {
                    ?>
                      <option value="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT).":00"; ?>"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT).":00"; ?></option>
                    <?php
                        }
                    ?>
                </select>                
                <?php echo form_error('waktu_mulai')?>                        
                <select class="form-control" name="waktu_selesai" required="">
                    <option value="<?= $this->input->post('waktu_selesai') ?? $row->waktu_selesai ?>">Waktu Selesai : <?= $this->input->post('waktu_selesai') ?? $row->waktu_selesai ?></option>
                    <?php
                        for ($i=0; $i<=23 ; $i++) {
                    ?>
                      <option value="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT).":00"; ?>"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT).":00"; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <?php echo form_error('waktu_selesai')?>                        
              </div>                            
            </div>                                   
            <div class="form-group">
              <label>Petugas</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="petugas" placeholder="Ex: Fitrah Izul Falaq" value="<?= $this->input->post('petugas') ?? $row->petugas ?>" minlength="6" maxlenght="50">
              </div>                            
              <?php echo form_error('petugas')?>                        
            </div>
            <div class="form-group">
              <label>CP Narahubung</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><i class="fab fa-whatsapp"></i></div></div>
                <input type="number" class="form-control" name="cp" placeholder="Ex: 85231519519" value="<?= $this->input->post('cp') ?? $row->cp ?>" minlength="11" maxlenght="15">
              </div>                            
              <?php echo form_error('cp')?>                        
            </div>
            <div class="form-group">
              <label>Lokasi</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-building"></span></div></div>
                <input type="text" class="form-control" name="lokasi" placeholder="Ex: Jl. Mayjen Pandjaitan No. 164, Kec. Penanggungan, Kota Malang"  minlength="5" maxlenght="100" value="<?= $this->input->post('lokasi') ?? $row->lokasi ?>" required>
              </div>                            
              <?php echo form_error('lokasi')?>                        
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
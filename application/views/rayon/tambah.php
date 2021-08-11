<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
      <div class="card-header">
        <a href="<?=base_url('rayon');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
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
              <label>Komisariat</label>
              <select name="komisariat_id" class="form-control" id="komisariat_id" required>
                <option value="<?= set_value('komisariat_id');?>">Pilihan : </option>
                <?php
                  foreach ($this->fungsi->pilihan("tb_komisariat")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->id?>"><?= $pilihan->deskripsi?></option>
                <?php }?>
              </select>
              <?php echo form_error('komisariat_id')?>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="deskripsi" placeholder="Ex: Nama Rayon" value="<?= set_value('deskripsi');?>" minlength="6" maxlenght="100" required>
              </div>                            
              <?php echo form_error('deskripsi')?>                        
            </div>
            <div class="form-group">
              <label>Fakultas</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="fakultas" placeholder="Ex: Universitas Negeri Malang" value="<?= set_value('fakultas')?>" minlength="6" maxlenght="100" required>
              </div>                            
              <?php echo form_error('fakultas')?>                  
            </div>
            <div class="form-group">
              <label>Rumpun Ilmu</label>
              <select name="rumpun_id" class="form-control" id="rumpun_id" required>
                <option value="<?= set_value('rumpun_id');?>">Pilihan : </option>
                <?php
                  foreach ($this->fungsi->pilihan("ls_rumpun")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->id?>"><?= $pilihan->deskripsi?></option>
                <?php }?>
              </select>
              <?php echo form_error('rumpun_id')?>
            </div>            
            <div class="form-group">
              <label>Alamat</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-building"></span></div></div>
                <input type="text" class="form-control" name="alamat" placeholder="Ex: Jl. Semarang No. 5, Sumbersari, Klojen, Kota Malang" value="<?= set_value('alamat');?>" minlength="6" maxlenght="100" required>
              </div>                            
              <?php echo form_error('alamat')?>                  
            </div>
            <div class="form-group">
              <label>Contact</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fab fa-whatsapp"></span></div></div>
                <input type="text" class="form-control" name="hp" placeholder="Ex: 081231390340" value="<?= set_value('hp');?>" minlength="6" maxlenght="100" required>
              </div>                            
              <?php echo form_error('hp')?>                  
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>
                <input type="text" class="form-control" name="email" placeholder="Ex: kom.pmiiliga@gmail.com" value="<?= set_value('email');?>" minlength="6" maxlenght="100" required>
              </div>                            
              <?php echo form_error('email')?>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-globe"></span></div></div>
                <input type="text" class="form-control" name="web" placeholder="Ex: https://pmiiliga.or.id" value="<?= set_value('web');?>" minlength="6" maxlenght="100" required>
              </div>                            
              <?php echo form_error('web')?>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fab fa-instagram"></span></div></div>
                <input type="text" class="form-control" name="ig" placeholder="Ex: pmii_um" value="<?= set_value('ig');?>" minlength="6" maxlenght="100" required>
              </div>                            
              <?php echo form_error('ig')?>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fab fa-facebook"></span></div></div>
                <input type="text" class="form-control" name="fb" placeholder="Ex: PMII UM Malang" value="<?= set_value('fb');?>" minlength="6" maxlenght="100" required>
              </div>                            
              <?php echo form_error('fb')?>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fab fa-twitter"></span></div></div>
                <input type="text" class="form-control" name="twitter" placeholder="Ex: pmii_um" value="<?= set_value('twitter');?>" minlength="6" maxlenght="100" required>
              </div>                            
              <?php echo form_error('twitter')?>
            </div>
            <div class="form-group">
              <label>Berdiri</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-calendar"></span></div></div>
                <select class="form-control" name="berdiri" required="">
                    <option value="<?= set_value('berdiri') ?? $row->berdiri?>">Tahun : <?= set_value('berdiri');?></option>
                    <?php
                        for ($i=date('Y'); $i>=1960 ; $i--) {
                    ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
                        }
                    ?>
                </select>
              </div>                            
              <?php echo form_error('berdiri')?>                        
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
    </div>
    </div>
  </div>
</section>


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">     
      <?php $this->view('template/message/info_pendaftaran') ?>
      <?php $this->view('message') ?>
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title"><?=$menu?></h3>
        </div>
        <?= form_open_multipart('')?>
          <div class="card-body">
            <div class="form-group">
              <label>Komisariat</label>
              <select name="komisariat_id" class="form-control select2" id="komisariat_id" required>
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
              <label>Rayon</label>
              <select class="form-control" name="rayon_id" id="rayon_id" required>
                <option value="<?= set_value('rayon_id');?>">Pilihan : </option>                
              </select>                
              <?php echo form_error('rayon_id')?>
            </div>
            <div class="form-group">
              <label>Nomor Induk Kader</label><small> (No KTP)</small>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-id-card"></span></div></div>
                <input type="text" class="form-control" name="nik" placeholder="NIK akan menjadi username" value="<?= set_value('nik');?>" minlength="16" maxlenght="16" required>
              </div>                            
              <?php echo form_error('nik')?>                        
            </div>
            <div class="form-group">
              <label>Nama</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="nama" placeholder="Ex: Fitrah Izul Falaq" value="<?= set_value('nama');?>" minlength="6" maxlenght="50" required>
              </div>                            
              <?php echo form_error('nama')?>                        
            </div>
            <div class="form-group">
              <label>Tempat Kelahiran</label>
              <input type="text" class="form-control" name="tempat_lahir" placeholder="Ex: Kota Probolinggo" minlength="3" maxlenght="50" value="<?= set_value('tempat_lahir');?>" required>
            </div>
            <div class="form-group">
              <label>Tanggal lahir</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span><i class="fas fa-building"></i></span></div></div>
                <input type="date" class="form-control" name="tgl_lahir" placeholder="Ex: 09/01/1998" value="<?= set_value('tgl_lahir');?>" required>
              </div>                            
              <?php echo form_error('tgl_lahir')?>                        
            </div>
            <div class="form-group">
              <label>HP / WA</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><i class="fab fa-whatsapp"></i></div></div>
                <input type="number" class="form-control" name="hp" placeholder="Ex: 85231519519" value="<?= set_value('hp');?>" minlength="11" maxlenght="50" required>
              </div>                            
              <?php echo form_error('hp')?>                        
            </div>
            <div class="form-group">
              <label>Email</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>
                <input type="email" class="form-control" name="email" placeholder="Ex: pc.pmiikotamalang@gmail.com" value="<?= set_value('email');?>" minlength="8" maxlenght="50" required>
              </div>                            
              <?php echo form_error('email')?>                        
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="kelamin" class="form-control" required>
                <option value="<?= set_value('kelamin');?>">Pilihan : <?= set_value('kelamin');?></option>
                <option value="Laki - Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <?php echo form_error('kelamin')?>
            </div>
            <div class="form-group">
              <label>Asal Daerah</label>
              <select name="provinsi" class="form-control" id="provinsi" required>
                <option value="<?= set_value('provinsi');?>">Provinsi :</option>
                <?php
                  $this->db->order_by('name','ASC');
                  foreach ($this->fungsi->pilihan("provinces")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->id?>"><?= $pilihan->name?></option>
                <?php }?>
              </select>
              <?php echo form_error('provinsi')?>
            </div>
            <div class="form-group">
              <select name="kota" class="kota form-control" id="kota" required>
                <option value="<?= set_value('kota');?>">Kota : </option>
              </select>
              <?php echo form_error('kota')?>
            </div>
            <div class="form-group">
              <select name="kecamatan" class="kecamatan form-control" id="kecamatan" required>
                <option value="<?= set_value('kecamatan');?>">Kecamatan : </option>
              </select>
              <?php echo form_error('kecamatan')?>
            </div>
            <div class="form-group">
              <select name="kelurahan" class="kelurahan form-control" id="kelurahan" required>
                <option value="<?= set_value('kelurahan');?>">Kelurahan : </option>
              </select>
              <?php echo form_error('kelurahan')?>
            </div>            
            <div class="form-group">
              <label>Alamat Asal Lengkap</label><small> (Sesuai KTP)</small>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="domisili" placeholder="Ex: Jl. Mayjen Pandjaitan No. 164, Kec. Penanggungan, Kota Malang"  minlength="30" maxlenght="100" value="<?= set_value('domisili');?>" required>
              </div>                            
              <?php echo form_error('domisili')?>                        
            </div>
            <div class="form-group">
              <label>Rumpun Ilmu</label>
              <select name="rumpun" class="form-control select2" id="komisariat_id" required>
                <option value="<?= set_value('rumpun');?>">Pilihan : </option>
                <?php
                  foreach ($this->fungsi->pilihan("ls_rumpun")->result() as $key => $pilihan) {;
                ?>
                <option value="<?= $pilihan->id?>"><?= $pilihan->deskripsi?></option>
                <?php }?>
              </select>
              <?php echo form_error('rumpun')?>
            </div>
            <div class="form-group">
              <label>Sosial Media</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fab fa-instagram"></span></div></div>
                <input type="text" class="form-control" name="ig" placeholder="Ex: fitrahizulfalaq"  minlength="5" maxlenght="30" value="<?= set_value('ig');?>" required>
              </div>                            
              <?php echo form_error('ig')?>                        
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fab fa-facebook"></span></div></div>
                <input type="text" class="form-control" name="fb" placeholder="Ex: Sai Yusuf"  minlength="5" maxlenght="30" value="<?= set_value('fb');?>" required>
              </div>                            
              <?php echo form_error('fb')?>                        
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fab fa-twitter"></span></div></div>
                <input type="text" class="form-control" name="twitter" placeholder="Ex: zulaibam.h.ali"  minlength="5" maxlenght="30" value="<?= set_value('twitter');?>">
              </div>                            
              <?php echo form_error('twitter')?>                        
            </div>
            <div class="form-group">
              <label>Angkatan</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-calendar"></span></div></div>
                <select class="form-control" name="angkatan" required="">
                    <option value="<?= set_value('angkatan');?>">Tahun : <?= set_value('angkatan');?></option>
                    <?php
                        for ($i=date('Y'); $i>=1960 ; $i--) {
                    ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
                        }
                    ?>
                </select>
              </div>                            
              <?php echo form_error('angkatan')?>                        
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="jenis" class="form-control" required>
                <option value="<?= set_value('jenis');?>">Pilihan : <?= set_value('jenis');?></option>
                <option value="kader">Kader</option>
                <option value="alumni">Alumni</option>
              </select>
              <?php echo form_error('jenis')?>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" required>
              <label class="form-check-label" for="exampleCheck1">Data yang saya inputkan sudah benar</label>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Daftar</button>
            <!-- <button type="reset" class="btn btn-danger">Ulangi</button>             -->
          </div>
        <?= form_close() ?>
      </div>
    </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


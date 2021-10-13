<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">     
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
              <label>Nama</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-plus"></span></div></div>
                <input type="text" class="form-control" name="nama" placeholder="Ex: Rayon Al Ghozali" value="<?= set_value('nama');?>" minlength="6" maxlenght="50" required>
              </div>                            
              <?php echo form_error('nama')?>                        
            </div>            
            <div class="form-group">
              <label>Email</label>
              <div class="input-group mb-3">
                <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>
                <input type="email" class="form-control" name="email" placeholder="Ex: pc.pmiikotamalang@gmail.com" value="<?= set_value('email');?>" minlength="8" maxlenght="50" required>
              </div>                            
              <?php echo form_error('email')?>                        
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


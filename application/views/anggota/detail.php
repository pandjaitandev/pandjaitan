<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= base_url('anggota/data/');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>

    <?php $this->view('message'); ?>

    <div class="row">
      <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-info card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?=base_url()?>/assets/dist/img/foto-user/foto-default.png">
            </div>

            <h3 class="profile-username text-center"><?=$row->nama?></h3>
            <p class="text-muted text-center"><?= ucfirst($row->jenis)?></p>
            <!-- Biodata Diri -->
            <h5>Biodata Diri</h5>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>NIK</b> <a class="float-right"> <?=$row->nik?></a>
              </li>
              <li class="list-group-item">
                <b>TTL</b> <a class="float-right"><?=$row->tempat_lahir?>, <?= date('d-m-Y',strtotime($row->tgl_lahir))?></a>
              </li>
              <li class="list-group-item">
                <b>Kelamin</b> <a class="float-right"><?= $row->kelamin ?></a>
              </li>
              <li class="list-group-item">
                <b>HP</b> <a class="float-right text-muted" href="http://wa.me/+62<?=$row->hp?>">+62 <?=$row->hp?></a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right"><?=$row->email?></a>
              </li>
              <li class="list-group-item">
                <b>Asal</b> <a class="float-right"><?= $this->fungsi->get_deskripsi_advanced("villages","id",$row->kelurahan,"name")?>, <?= $this->fungsi->get_deskripsi_advanced("districts","id",$row->kecamatan,"name")?> , <?= $this->fungsi->get_deskripsi_advanced("regencies","id",$row->kota,"name")?> , <?= $this->fungsi->get_deskripsi_advanced("provinces","id",$row->provinsi,"name")?></a>
              </li>
            </ul>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Lengkap Domisili</strong>
            <p class="text-muted"><?=$row->domisili?> <br> <a class="btn btn-sm btn-info" href="https://www.google.com/maps/search/<?=$row->domisili?>">Lihat Maps</a></p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Angkatan</b> <a class="float-right"><?= $row->angkatan?></a>
              </li>
              <li class="list-group-item">
                <b>IG</b> <a class="float-right"><?= $row->ig?></a>
              </li>
              <li class="list-group-item">
                <b>FB</b> <a class="float-right"><?= $row->fb?></a>
              </li>
              <li class="list-group-item">
                <b>Twitter</b> <a class="float-right"><?= $row->twitter?></a>
              </li>
              <li class="list-group-item">
                <b>Diajukan tanggal</b> <a class="float-right"><?= date('d - m - Y',strtotime($row->created))?></a>
              </li>                                         
            </ul>
            <!-- End Biodata Diri -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->        
      </div>      
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

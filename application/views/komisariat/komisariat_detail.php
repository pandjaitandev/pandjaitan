<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= base_url('komisariat');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>

    <?php $this->view('message'); ?>

    <div class="row">
      <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-info card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="<?=base_url()?>/assets/dist/img/foto-user/foto-default.png" alt="User profile picture" style="width: 150px; height: 150px">
            </div>

            <h3 class="profile-username text-center"><?=$row->deskripsi?></h3>
            <p class="text-muted text-center"><?= ucfirst($row->kampus)?></p>
            <!-- Biodata Diri -->
            <ul class="list-group list-group-unbordered mb-3">              
              <li class="list-group-item">
                <span class="fas fa-globe"></span> Web <a class="float-right text-muted" href="<?=$row->web?>"><?=$row->web?></a>
              </li>
              <li class="list-group-item">
                <span class="fab fa-whatsapp"></span> <b>WA</b> <a class="float-right text-muted" href="http://wa.me/+62<?=$row->hp?>">+62 <?=$row->hp?></a>
              </li>
              <li class="list-group-item">
                <span class="fab fa-instagram"></span> <b>IG</b> <a class="float-right text-muted" href="http://instagram.com/<?=$row->ig?>"><?=$row->ig?></a>
              </li>
              <li class="list-group-item">
                <span class="fab fa-facebook"></span> <b>FB</b> <a class="float-right text-muted"><?=$row->fb?></a>
              </li>
              <li class="list-group-item">
                <span class="fab fa-twitter"></span> <b>Twitter</b> <a class="float-right text-muted"><?=$row->twitter?></a>
              </li>
              <li class="list-group-item">
                <span class="fas fa-envelope"></span> <b>Email</b> <a class="float-right"><?=$row->email?></a>
              </li>
            </ul>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Sekretariat</strong>
            <p class="text-muted"><?=$row->alamat?> <br> <a class="btn btn-sm btn-info" href="https://www.google.com/maps/search/<?=$row->alamat?>">Lihat Maps</a></p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Tahun Berdiri</b> <a class="float-right"><?= $row->berdiri?></a>
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

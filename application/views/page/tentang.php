<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= base_url('');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>
    <?php $this->view('message'); ?>
    <div class="row">
      <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-info card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="img-fluid" src="<?=base_url()?>/assets/dist/img/login-logo.png" width="400px">
            </div>
            <br>
            <div class="text-left">
              <h5>
                E-Movement Apps dipelopori oleh Pengurus PC PMII Kota Malang Periode 2021-2021. Aplikasi ini dikembangkan secara mandiri dan independent untuk transformasi organisasi. E-Movement ini nanti mencakup database, e-kaderisasi, dan pengembangan bakat dan minat kader PMII Kota Malang. 
              </h5>
            </div>

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

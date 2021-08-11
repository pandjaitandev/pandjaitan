<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <!-- interactive chart -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Tabel Rangkungan Komoditas</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table width="100%" class="table table-bordered">
                <thead>
                  <tr>
                    <td width="7%">No</td>
                    <td width="60%">Indikator</td>
                    <td width="33%">Nilai / Prosentase</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Total Luasan lahan SNI</td>
                    <td><?= $this->fungsi->sum("tb_lahan","luasan_sni")?> ha</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Total Luasan sertifikat internasional</td>
                    <td><?= $this->fungsi->sum("tb_lahan","luasan_sertifikat_internasional")?> ha</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Total jumlah lahan</td>
                    <td><?= $this->fungsi->sum("tb_lahan","jumlah_lahan")?> ha</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Total Petani Terdaftar di Database</td>
                    <td><?= $this->fungsi->hitung_rows("tb_user","tipe_user <","4")?> orang</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Total Kelompok Petani</td>
                    <td><?= $this->fungsi->pilihan("tb_kelompok")->num_rows(); ?> kelompok / koperasi</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


    <div class="row">
      <div class="col-12">
        <!-- interactive chart -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Berdasarkan <b>Komoditas yang Dihasilkan</b></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="komoditasItemChart" style="min-height: 250px; height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    
    <div class="row">
      <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-warning card-outline">
          <div class="card-header">
            <h3 class="card-title">Presentase <b>Pelatihan Koperasi</b></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="pelatihanKoperasiChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-warning card-outline">
          <div class="card-header">
            <h3 class="card-title">Presentase <b>Berdasarkan Pelatihan Sertifikasi</b></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="pelatihanSertifikasiChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-warning card-outline">
          <div class="card-header">
            <h3 class="card-title">Presentase <b>Petani ICS</b></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="petaniIcsChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">
        <!-- PIE CHART -->
        <div class="card card-warning card-outline">
          <div class="card-header">
            <h3 class="card-title">Presentase <b>Petani SNI</b></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="petaniSniChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
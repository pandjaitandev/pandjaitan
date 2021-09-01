<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="callout callout-info">
          <div class="table-responsive">
          <table id="simple-full-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Tgl</th>
              <th>Kategori</th>
              <th>Pemohon</th>
              <th>Petugas</th>
              <th>Tempat</th>
              <th>#</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
              ?>
              <tr>
                <td><?= date("d-m-y",strtotime($data->tgl))?></td>                
                <td><?= $data->kategori?></td>
                <td><?= $data->pemohon?></td>
                <td>
                  <?= $data->petugas?>
                </td>                               
                <td><?= $data->lokasi?></td>
                <td>
                  <a href="https://wa.me/62<?=$data->cp?>" class="btn btn-sm btn-success text-white" <?= $data->cp == null ? "hidden" : ""?>><i class='fab fa-whatsapp'></i></a>                
                </td> 
              </tr>
              <?php }?>
            </tbody>
          </table>
          </div>
        </div>               
      </div>      
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

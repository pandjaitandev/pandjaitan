<!-- ChartJS -->
<script src="<?= base_url('')?>/assets/plugins/chart.js/Chart.min.js"></script>
<!-- page script -->
<script type="text/javascript">


    var ctx = document.getElementById('kelaminChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          'Laki - Laki',
          'Perempuan',          
        ],
        datasets: [{
            label: 'Jumlah User',
            backgroundColor : [
              <?php
                for ($x = 0; $x <= 10; $x++) {
                  echo "dynamicColors(),";
                }
              ?>
            ],
            data: [
              <?php 
                $this->db->where("tipe_user",'1');
                echo $this->fungsi->hitung_rows("tb_user","kelamin","Laki - Laki")?>,
              <?php 
                $this->db->where("tipe_user",'1');
                echo $this->fungsi->hitung_rows("tb_user","kelamin","Perempuan")?>,
            ]
        }]
      },
      options: {
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var allData = data.datasets[tooltipItem.datasetIndex].data;
                  var tooltipLabel = data.labels[tooltipItem.index];
                  var tooltipData = allData[tooltipItem.index];
                  var total = 0;
                  var i;
                  for (i in allData) {
                    total += parseFloat(allData[i]);
                  }
                  console.log(total);
                  var tooltipPercentage = Math.round((tooltipData / total) * 100);
                  return tooltipLabel + ': ' + tooltipData + ' orang (' + tooltipPercentage + '%)';
                }
              }
            }
          }
    });

    /*
      Berdasarkan Jenis
    */

    var ctx = document.getElementById('jenisChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
          'Kader',
          'Alumni',
        ],
        datasets: [{
            label: 'Jumlah User',
            backgroundColor : [
              <?php
                for ($x = 0; $x <= 10; $x++) {
                  echo "dynamicColors(),";
                }
              ?>
            ],
            data: [
              <?php
                $this->db->where("tipe_user",'1');
                echo $this->fungsi->hitung_rows("tb_user","jenis","kader")?>,
              <?php 
                $this->db->where("tipe_user",'1');
                echo $this->fungsi->hitung_rows("tb_user","jenis","alumni")?>,

            ]
        }]
      },
      options: {
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var allData = data.datasets[tooltipItem.datasetIndex].data;
                  var tooltipLabel = data.labels[tooltipItem.index];
                  var tooltipData = allData[tooltipItem.index];
                  var total = 0;
                  var i;
                  for (i in allData) {
                    total += parseFloat(allData[i]);
                  }
                  console.log(total);
                  var tooltipPercentage = Math.round((tooltipData / total) * 100);
                  return tooltipLabel + ': ' + tooltipData + ' orang (' + tooltipPercentage + '%)';
                }
              }
            }
          }
    });


    /*
        Berdasarkan sebaran Provinsi
    */

    var ctx = document.getElementById('provinsiChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php
            $x = $this->fungsi->pilihan("provinces");
            foreach ($x->result() as $key => $data) {
              echo "'" . $data->name ."',";
            }
          ?>          
        ],

        datasets: [{
            label: 'Persebaran Kader Berdasarkan Provinsi :',
            backgroundColor: '#ADD8E6',
            backgroundColor : [
              <?php
                $maksimal_warna = $this->fungsi->pilihan("provinces")->num_rows(); 
                for ($x = 0; $x <= $maksimal_warna; $x++) {
                  echo "dynamicColors(),";
                }
              ?>
            ],
            colorPool:['red','green','orange'],
            useRandomColors: true,
            data: [
              <?php
                  $x = $this->fungsi->pilihan("provinces");
                  foreach ($x->result() as $key => $data) {
                    if ($this->session->tipe_user == 3) {
                      $this->db->where("komisariat_id",$this->session->komisariat_id);
                    } elseif ($this->session->tipe_user == 2) {
                      $this->db->where("rayon_id",$this->session->rayon_id);
                    }
                    $this->db->where("tipe_user",'1');
                    echo "'" . $this->fungsi->pilihan_advanced("tb_user","provinsi",$data->id)->num_rows() ."',";
                  }
              ?>
            ]
        }]
    },
    options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        },
    options: {
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var allData = data.datasets[tooltipItem.datasetIndex].data;
                  var tooltipLabel = data.labels[tooltipItem.index];
                  var tooltipData = allData[tooltipItem.index];
                  var total = 0;
                  var i;
                  for (i in allData) {
                    total += parseFloat(allData[i]);
                  }
                  console.log(total);
                  var tooltipPercentage = Math.round((tooltipData / total) * 100);
                  return tooltipLabel + ': ' + tooltipData + ' orang (' + tooltipPercentage + '%)';
                }
              }
            }
          }
    });

    /*
        Berdasarkan sebaran Komisariat
    */

    var ctx = document.getElementById('komisariatChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
          <?php
            $x = $this->fungsi->pilihan("tb_komisariat");
            foreach ($x->result() as $key => $data) {
              // echo "'" . substr($data->deskripsi, 11) ."',";
              echo "'" . str_replace("'","",substr($data->deskripsi, 11)) ."',";
            }
          ?>          
        ],

        datasets: [{
            label: 'Persebaran Kader Berdasarkan Komisariat :',
            backgroundColor: '#ADD8E6',
            backgroundColor : [
              <?php
                $maksimal_warna = $this->fungsi->pilihan("tb_komisariat")->num_rows(); 
                for ($x = 0; $x <= $maksimal_warna; $x++) {
                  echo "dynamicColors(),";
                }
              ?>
            ],
            colorPool:['red','green','orange'],
            useRandomColors: true,
            data: [
              <?php
                  $x = $this->fungsi->pilihan("tb_komisariat");
                  foreach ($x->result() as $key => $data) {
                    $this->db->where("tipe_user",'1');
                    echo "'" . $this->fungsi->pilihan_advanced("tb_user","komisariat_id",$data->id)->num_rows() ."',";
                  }
              ?>
            ]
        }]
    },
    options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        },
    options: {
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var allData = data.datasets[tooltipItem.datasetIndex].data;
                  var tooltipLabel = data.labels[tooltipItem.index];
                  var tooltipData = allData[tooltipItem.index];
                  var total = 0;
                  var i;
                  for (i in allData) {
                    total += parseFloat(allData[i]);
                  }
                  console.log(total);
                  var tooltipPercentage = Math.round((tooltipData / total) * 100);
                  return tooltipLabel + ': ' + tooltipData + ' orang (' + tooltipPercentage + '%)';
                }
              }
            }
          }
    });

    /*
        Berdasarkan sebaran Per Tahun
    */

    var ctx = document.getElementById('perkembanganChart').getContext('2d');
    var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
          <?php
            for ($i=2010; $i<=date('Y') ; $i++) {
              echo "'" . $i ."',";
            }
          ?>          
        ],

        datasets: [{
            label: 'Persebaran Kader Per Tahun',
            borderColor: 'red',
            fill: false,
            data: [
              <?php
                  for ($i=2010; $i<=date('Y') ; $i++) {
                    $this->db->where("tipe_user",'1');
                    echo "'" . $this->fungsi->pilihan_advanced("tb_user","angkatan",$i)->num_rows() ."',";
                  }                  
              ?>
            ]
        }]
    },
    options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        },
    options: {
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var allData = data.datasets[tooltipItem.datasetIndex].data;
                  var tooltipLabel = data.labels[tooltipItem.index];
                  var tooltipData = allData[tooltipItem.index];
                  var total = 0;
                  var i;
                  for (i in allData) {
                    total += parseFloat(allData[i]);
                  }
                  console.log(total);
                  var tooltipPercentage = Math.round((tooltipData / total) * 100);
                  return tooltipLabel + ': ' + tooltipData + ' orang (' + tooltipPercentage + '%)';
                }
              }
            }
          }
    });


    function dynamicColors() {
        var hex = "0123456789ABCDEF",
            color = "#";
        for (var i = 1; i <= 6; i++) {
          color += hex[Math.floor(Math.random() * 16)];
        }
        return color;
    }

</script>
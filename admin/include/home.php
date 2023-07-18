<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Hoşgeldiniz</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
            <li class="breadcrumb-item active">Hoşgeldiniz</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <?php
  $buguntekil = 0;
  $buguncogul = 0;
  $geneltekil = 0;
  $genelcogul = 0;
  $buguntekilSorgu = $VT->VeriGetir("ziyaretciler", "WHERE tarih=?", array(date("Y-m-d")), "ORDER BY ID ASC");
  if ($buguntekilSorgu != false) {
    $buguntekil = count($buguntekilSorgu);
    for ($x = 0; $x < count($buguntekilSorgu); $x++) {
      $buguncogul += $buguntekilSorgu[$x]["cogul"];
    }
  }
  $geneltekilSorgu = $VT->VeriGetir("ziyaretciler", "", "", "ORDER BY ID ASC");
  if ($geneltekilSorgu != false) {
    $geneltekil = count($geneltekilSorgu);
    for ($x = 0; $x < count($geneltekilSorgu); $x++) {
      $genelcogul += $geneltekilSorgu[$x]["cogul"];
    }
  }
  ?>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <?= $buguntekil ?>
              </h3>

              <p>Bugün Tekil Ziyaretçiniz</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                <?= $buguncogul ?>
              </h3>

              <p>Bugün Çoğul Ziyaretçiniz</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>
                <?= $geneltekil ?>
              </h3>

              <p>Toplam Tekil Ziyaretçiniz</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>
                <?= $genelcogul ?>
              </h3>

              <p>Toplam Çoğul Ziyaretçiniz</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->

        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <div class="panel panel-default card-view">
            <div class="panel-heading">
              <div class="card-header" style="background: #fff;">
                <h6 class="panel-title txt-dark">Genel Tarayıcı İstatistiği</h6>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper">
              <div class="panel-body" style="background:#fff; padding:8px;">
                <?php
                $trycilr = $VT->VeriGetir("ziyarettarayici", "WHERE ID<>?", array(5), "ORDER BY ID ASC");

                ?>
                <div>
                  <span class="badge badge-danger" style="width:40%;">
                    Google Chrome
                  </span>
                  <span class="label label-warning pull-right"
                    style="font-size: 16px; background: #eee; border: 1px solid #ddd; padding: 4px 9px; border-radius: 10px; float: right;">
                    <?php if ($trycilr != false && $trycilr[0]["ziyaret"]) {
                      echo $trycilr[0]["ziyaret"];
                    } else {
                      echo "-";
                    } ?>
                  </span>
                  <div class="clearfix"></div>
                  <hr class="light-grey-hr" />
                  <span class="badge badge-warning" style="width:40%;">
                    Mozila Firefox
                  </span>
                  <span class="label label-danger pull-right"
                    style="font-size: 16px; background: #eee; border: 1px solid #ddd; padding: 4px 9px; border-radius: 10px; float: right;">
                    <?php if ($trycilr != false && $trycilr[2]["ziyaret"]) {
                      echo $trycilr[2]["ziyaret"];
                    } else {
                      echo "-";
                    } ?>
                  </span>
                  <div class="clearfix"></div>
                  <hr class="light-grey-hr row " />
                  <span class="badge badge-primary" style="width:40%;">
                    Internet Explorer
                  </span>
                  <span class="label label-success pull-right"
                    style="font-size: 16px; background: #eee; border: 1px solid #ddd; padding: 4px 9px; border-radius: 10px; float: right;">
                    <?php if ($trycilr != false && $trycilr[1]["ziyaret"]) {
                      echo $trycilr[1]["ziyaret"];
                    } else {
                      echo "-";
                    } ?>
                  </span>
                  <div class="clearfix"></div>
                  <hr class="light-grey-hr row " />
                  <span class="badge badge-info" style="width:40%;">
                    Diğer
                  </span>
                  <span class="label label-primary pull-right"
                    style="font-size: 16px; background: #eee; border: 1px solid #ddd; padding: 4px 9px; border-radius: 10px; float: right;">
                    <?php if ($trycilr != false && $trycilr[3]["ziyaret"]) {
                      echo $trycilr[3]["ziyaret"];
                    } else {
                      echo "-";
                    } ?>
                  </span>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>


        </section>
        <div class="col-md-12">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Sipariş Raporları</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChart"
                  style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


        </div>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php
$krediKartiAylar = array();
$havaleay = array();
$KapidaAylar = array();
for ($i = 1; $i < 13; $i++) {
  if ($i < 10) {$ay = "0" . $i;}else {$ay = $i;}

  $baslamatarih = date("Y") . "-" . $ay  . "-01"; /*2020-02-01 */
  $bitistarih = date("Y") . "-" . $ay. "-31"; /*2020-02-01 */
  $siparisraporKrediKarti =$VT->VeriGetir("siparisler", "WHERE odemetipi=? AND tarih BETWEEN ? AND ?", array(1, $baslamatarih, $bitistarih), "ORDER BY ID ASC");
  if ($siparisraporKrediKarti!=false) {
    $toplamdeger = 0;
    for ($x = 0; $x < count($siparisraporKrediKarti); $x++) {
      $toplamdeger = ($toplamdeger + $siparisraporKrediKarti[$x]["odenentutar"]);
    }
    $krediKartiAylar[] = $toplamdeger;
  } else {
    $krediKartiAylar[] = 0;
  }

  $siparisraporHavale =$VT->VeriGetir("siparisler", "WHERE odemetipi=? AND tarih BETWEEN ? AND ?", array(2, $baslamatarih, $bitistarih), "ORDER BY ID ASC");
  if ($siparisraporHavale != false) {
    $toplamdeger = 0;
    for ($x = 0; $x < count($siparisraporHavale); $x++) {
      $toplamdeger = ($toplamdeger + $siparisraporHavale[$x]["odenentutar"]);
    }
    $havaleay[] = $toplamdeger;
  } else {
    $havaleay[] = 0;
  }

  $siparisraporKapida =$VT->VeriGetir("siparisler", "WHERE odemetipi=? AND tarih BETWEEN ? AND ?", array(3, $baslamatarih, $bitistarih), "ORDER BY ID ASC");
  if ($siparisraporKapida != false) {
    $toplamdeger = 0;
    for ($x = 0; $x < count($siparisraporKapida); $x++) {
      $toplamdeger = ($toplamdeger + $siparisraporKapida[$x]["odenentutar"]);
    }
    $KapidaAylar[] = $toplamdeger;
  } else {
    $KapidaAylar[] = 0;
  }
  
}

?>

<script type="text/javascript">
  $(function () {
    var areaChartData = {
      labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
      datasets: [
        {
          label: 'Kredi Kartı İle Satışlar (TL)',
          backgroundColor: 'rgba(220, 53, 69, 0.9)',
          borderColor: 'rgba(220, 53, 69, 0.8)',
          pointRadius: false,
          pointColor: '#e91e63',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [<?=$krediKartiAylar[0]?>, <?= $krediKartiAylar[1] ?>, <?=$krediKartiAylar[2] ?>, <?= $krediKartiAylar[3] ?>, <?= $krediKartiAylar[4] ?>, <?= $krediKartiAylar[5] ?>, <?= $krediKartiAylar[6] ?>, <?= $krediKartiAylar[7] ?>, <?= $krediKartiAylar[8] ?>, <?= $krediKartiAylar[9] ?>, <?= $krediKartiAylar[10] ?>, <?= $krediKartiAylar[11] ?>]
        },
        {
          label: 'Havale/EFT ile Satışlar (TL)',
          backgroundColor: 'rgba(210, 214, 222, 1)',
          borderColor: 'rgba(210, 214, 222, 1)',
          pointRadius: false,
          pointColor: 'rgba(210, 214, 222, 1)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: [<?=$havaleay[0]?>, <?= $havaleay[1] ?>, <?= $havaleay[2] ?>, <?= $havaleay[3] ?>, <?= $havaleay[4] ?>, <?= $havaleay[5] ?>, <?= $havaleay[6] ?>, <?= $havaleay[7] ?>, <?= $havaleay[8] ?>, <?= $havaleay[9] ?>, <?= $havaleay[10] ?>, <?= $havaleay[11] ?>]
        },
        {
          label: 'Kapıda Ödeme ile Satışlar (TL)',
          backgroundColor: 'rgba(127, 17, 224, 0.9)',
          borderColor: 'rgba(127, 17, 224, 0.8)',
          pointRadius: false,
          pointColor: 'rgba(127, 17, 224, 1)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(127, 17, 224, 1)',
          data: [<?=$KapidaAylar[0]?>, <?= $KapidaAylar[1] ?>, <?= $KapidaAylar[2] ?>, <?= $KapidaAylar[3] ?>, <?= $KapidaAylar[4] ?>, <?= $KapidaAylar[5] ?>, <?= $KapidaAylar[6] ?>, <?= $KapidaAylar[7] ?>, <?= $KapidaAylar[8] ?>, <?= $KapidaAylar[9] ?>, <?= $KapidaAylar[10] ?>, <?= $KapidaAylar[11] ?>]
        },
      ]
    }


    var areaChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          gridLines: {
            display: false,
          }
        }]
      }
    }


    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    });
  });

</script>
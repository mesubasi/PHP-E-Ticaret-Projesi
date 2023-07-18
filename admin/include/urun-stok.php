<?php
include_once(SINIF."VT.php");
if(!empty($_GET["ID"]))
{
  $ID=$VT->filter($_GET["ID"]);
  $urunBilgisi=$VT->VeriGetir("urunler","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
  if($urunBilgisi!=false)
  {
    ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ürün Stok Yönetimi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürün Stok Yönetimi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
    <section class="content">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
      <a href="<?=SITE?>urun-liste" class="btn btn-info" style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fas fa-bars"></i> LİSTE</a> 
       <a href="<?=SITE?>urun-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
       </div>
       </div>
       <?php
     if($_POST)
     {
       if(!empty($_POST["stok"]) && !empty($_POST["stokID"]) && count($_POST["stok"])== count($_POST["stokID"]))
       {
 
        $toplamStokMiktari=0;
        for($e=0;$e<count($_POST["stok"]);$e++)
        {
           $stokID=$VT->filter($_POST["stokID"][$e]);
         $stokmiktari=$VT->filter($_POST["stok"][$e]);
         $toplamStokMiktari=($toplamStokMiktari+$stokmiktari);
         $guncelle=$VT->SorguCalistir("UPDATE urunvaryasyonstoklari","SET stok=? WHERE ID=?",array($stokmiktari,$stokID),1);
 
        }
        $guncelle2=$VT->SorguCalistir("UPDATE urunler","SET stok=? WHERE ID=?",array($toplamStokMiktari,$urunBilgisi[0]["ID"]),1);
              
       
          
         if($guncelle!=false)
         {
           $urunBilgisi=$VT->VeriGetir("urunler","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
 
            ?>
                   <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
                   <?php
         }
         else
         {
            ?>
                   <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
                   <?php
         }
       }
       else if(!empty($_POST["genelstok"]))
       {
           $genelstokmiktari=$VT->filter($_POST["genelstok"]);
            $guncelle=$VT->SorguCalistir("UPDATE urunler","SET stok=? WHERE ID=?",array($genelstokmiktari,$urunBilgisi[0]["ID"]),1);
            if($guncelle!=false)
             {
                 $urunBilgisi=$VT->VeriGetir("urunler","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
                ?>
                       <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
                       <?php
             }
             else
             {
                ?>
                       <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
                       <?php
             }
       }
       else
       {
         ?>
               <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
               <?php
       }
     }
     ?>
       <form action="#" method="post" class="urunEklemeFormu" enctype="multipart/form-data">
        <div class="row">
       <div class="col-md-12">
       <div class="card-body card card-primary">
            <div class="row">
             <div class="col-md-4">
                <div class="form-group">
                <label>Genel Stok</label>
                <input type="text" class="form-control" placeholder="Stok" name="genelstok" value="<?=$urunBilgisi[0]["stok"]?>">
                </div>
            </div>
            <?php
            $varyasyonlar=$VT->VeriGetir("urunvaryasyonlari","WHERE urunID=?",array($urunBilgisi[0]["ID"]),"ORDER BY ID ASC");
            if($varyasyonlar!=false)
            {
              ?>
              <table class="table">
                <tr>
                  <th>Özellikler</th>
                  <th>Stok Miktarı</th>
                </tr>
              <?php
              $toplamvaryasyonSayisi=count($varyasyonlar);
              switch ($toplamvaryasyonSayisi) {
                case 1:
                  $varyasyonID=$varyasyonlar[0]["ID"];
                  $varyasyonADI=$varyasyonlar[0]["baslik"];
                  $kontrol=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE urunID=? AND varyasyonID=?",array($urunBilgisi[0]["ID"],$varyasyonID),"ORDER BY ID ASC");
                  if($kontrol!=false)
                  {
 
                    for($i=0;$i<count($kontrol);$i++)
                    {
                         $secenekID=$kontrol[$i]["ID"];
                         $secenekADI=$kontrol[$i]["baslik"];
                         $varyasyonStoklari=$VT->VeriGetir("urunvaryasyonstoklari","WHERE urunID=? AND varyasyonID=? AND secenekID=?",array($urunBilgisi[0]["ID"],$varyasyonID,$secenekID),"ORDER BY ID ASC",1);
 
                         if($varyasyonStoklari!=false)
                         {
                          if($varyasyonStoklari[0]["stok"]<10){$arkaplanrengi="#ffe0de;";}else{$arkaplanrengi="#fff;";}
                            ?>
                            <tr style="background: <?=$arkaplanrengi?>">
                            <td><?=$secenekADI?> <?=$varyasyonADI?></td>
                            <td> <input type="text" class="form-control" placeholder="Stok" name="stok[]" value="<?=$varyasyonStoklari[0]["stok"]?>">
                              <input type="hidden" class="form-control" name="stokID[]" value="<?=$varyasyonStoklari[0]["ID"]?>"></td>
                          </tr>
                            <?php
                         }
                    }
                  }
                  break;
                  case 2:
                   $varyasyonID=$varyasyonlar[0]["ID"];
                  $varyasyonADI=$varyasyonlar[0]["baslik"];
                  $varyasyonID2=$varyasyonlar[1]["ID"];
                  $varyasyonADI2=$varyasyonlar[1]["baslik"];
                  $kontrol=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE urunID=? AND varyasyonID=?",array($urunBilgisi[0]["ID"],$varyasyonID),"ORDER BY ID ASC");
                  $kontrol2=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE urunID=? AND varyasyonID=?",array($urunBilgisi[0]["ID"],$varyasyonID2),"ORDER BY ID ASC");
                  if($kontrol!=false && $kontrol2!=false)
                  {
 
                    for($i=0;$i<count($kontrol);$i++)
                    {
                         $secenekID=$kontrol[$i]["ID"];
                         $secenekADI=$kontrol[$i]["baslik"];
                         for($y=0;$y<count($kontrol2);$y++)
                         {
                           $secenekID2=$kontrol2[$y]["ID"];
                            $secenekADI2=$kontrol2[$y]["baslik"];
 
                             $varyasyonStoklari=$VT->VeriGetir("urunvaryasyonstoklari","WHERE urunID=? AND varyasyonID=? AND secenekID=?",array($urunBilgisi[0]["ID"],$varyasyonID.'@'.$varyasyonID2,$secenekID.'@'.$secenekID2),"ORDER BY ID ASC",1);
 
                         if($varyasyonStoklari!=false)
                         {
                          if($varyasyonStoklari[0]["stok"]<10){$arkaplanrengi="#ffe0de;";}else{$arkaplanrengi="#fff;";}
                            ?>
                            <tr style="background: <?=$arkaplanrengi?>">
                            <td><?=$secenekADI?> <?=$varyasyonADI?> <?=$secenekADI2?> <?=$varyasyonADI2?></td>
                            <td> <input type="text" class="form-control" placeholder="Stok" name="stok[]" value="<?=$varyasyonStoklari[0]["stok"]?>">
                              <input type="hidden" class="form-control" name="stokID[]" value="<?=$varyasyonStoklari[0]["ID"]?>"></td>
                          </tr>
                            <?php
                         }
 
                         }
                     }
                   }
                  break;
                
              }
              ?>
 
              </table>
              <?php
            }
            ?>
            
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        </div>
          <div class="col-md-12">
            <div class="col-md-12">
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">ÜRÜN STOKLARINI GÜNCELLE</button>
                </div>
            </div>
        </div>
     
        </div>
       
      </div>
       </form>
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <?php
  }
}
?>
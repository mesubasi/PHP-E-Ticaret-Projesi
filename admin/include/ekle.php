<?php
if(!empty($_GET["tablo"]))
{
	$tablo=$VT->filter($_GET["tablo"]);
	$kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
	if($kontrol!=false)
	{
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=$kontrol[0]["baslik"]?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active"><?=$kontrol[0]["baslik"]?></li>
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
      <a href="<?=SITE?>liste/<?=$kontrol[0]["tablo"]?>" class="btn btn-info" style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fas fa-bars"></i> LİSTE</a> 
       <a href="<?=SITE?>ekle/<?=$kontrol[0]["tablo"]?>" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
       </div>
       </div>
       <?php
	   if($_POST)
	   {
		   if(!empty($_POST["kategori"]) && !empty($_POST["baslik"]) && !empty($_POST["anahtar"]) && !empty($_POST["description"]) && !empty($_POST["sirano"]))
		   {
			   $kategori=$VT->filter($_POST["kategori"]);
			   $baslik=$VT->filter($_POST["baslik"]);
			   $anahtar=$VT->filter($_POST["anahtar"]);
			   $seflink=$VT->seflink($baslik);
			   $description=$VT->filter($_POST["description"]);
			   $sirano=$VT->filter($_POST["sirano"]);
			   $metin=$VT->filter($_POST["metin"],true);
			   if(!empty($_FILES["resim"]["name"]))
			   {
				   $yukle=$VT->upload("resim","../images/".$kontrol[0]["tablo"]."/");
				   if($yukle!=false)
				   {
					   $ekle=$VT->SorguCalistir("INSERT INTO ".$kontrol[0]["tablo"],"SET baslik=?, seflink=?, kategori=?, metin=?, resim=?, anahtar=?, description=?, durum=?, sirano=?, tarih=?",array($baslik,$seflink,$kategori,$metin,$yukle,$anahtar,$description,1,$sirano,date("Y-m-d")));
				   }
				   else
				   {
					    ?>
                   <div class="alert alert-info">Resim yükleme işleminiz başarısız.</div>
                   <?php
				   }
			   }
			   else
			   {
				   $ekle=$VT->SorguCalistir("INSERT INTO ".$kontrol[0]["tablo"],"SET baslik=?, seflink=?, kategori=?, metin=?, anahtar=?, description=?, durum=?, sirano=?, tarih=?",array($baslik,$seflink,$kategori,$metin,$anahtar,$description,1,$sirano,date("Y-m-d")));
			   }
			   
			   if($ekle!=false)
			   {
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
       <form action="#" method="post" enctype="multipart/form-data">
       <div class="col-md-8">
       <div class="card-body card card-primary">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kategori Seç</label>
                  <select class="form-control select2" style="width: 100%;" name="kategori">
                    <?php
					$sonuc=$VT->kategoriGetir($kontrol[0]["tablo"],"",-1);
					if($sonuc!=false)
					{
						echo $sonuc;
					}
					else
					{
						$VT->tekKategori($kontrol[0]["tablo"]);
					}
					?>
                  </select>
                </div>
              <!-- /.col -->
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>Başlık</label>
                <input type="text" class="form-control" placeholder="Başlık ..." name="baslik">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>Açıklama</label>
                <textarea class="textarea" placeholder="Açıklama alanıdır." name="metin"
                          style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </div>
             <div class="col-md-12">
                <div class="form-group">
                <label>Anahtar</label>
                <input type="text" class="form-control" placeholder="Anahtar ..." name="anahtar">
                </div>
            </div>
             <div class="col-md-12">
                <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Description ..." name="description">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>Resim</label>
                <input type="file" class="form-control" placeholder="Resim Seçiniz ..." name="resim">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>Sıra No</label>
                <input type="number" class="form-control" placeholder="Sıra No ..." name="sirano" style="width:100px;" value="<?php $sirano
                =$VT->IDGetir($kontrol[0]["tablo"]);
                if($sirano!=false){ //Sıra Numarası İle İlgili Problem Kontrolü
                    echo $sirano;
                }
                else{
                    echo "1";
                }
                
                ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">KAYDET</button>
                </div>
            </div>
            
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        </div>
       </form>
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
 <?php
	}
	else
	{
		?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
	}
}
else
{
	?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
}
 ?>
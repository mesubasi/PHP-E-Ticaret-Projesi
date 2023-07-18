<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Yorumlar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Yorumlar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
      
       <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:50px;">Sıra</th>
                  <th>Açıklama</th>
                  <th style="width:50px;">Durum</th>
                  <th style="width:80px;">Tarih</th>
                  <th style="width:120px;">İşlem</th>
                </tr>
                </thead>
                <tbody>
                <?php
                
				$veriler=$VT->VeriGetir("yorumlar","","","ORDER BY ID DESC");
				if($veriler!=false)
				{
					$sira=0;
					for($i=0;$i<count($veriler);$i++)
					{
						$sira++;
						if($veriler[$i]["durum"]==1){$aktifpasif=' checked="checked"';}else{$aktifpasif='';}
						$uyelikbilgisi=$VT->VeriGetir("uyeler","WHERE ID=?",array($veriler[$i]["uyeID"]),"ORDER BY ID ASC",1);
                        if($uyelikbilgisi!=false)
                        {
                            $uyeadsoyad=$uyelikbilgisi[0]["ad"]." ".$uyelikbilgisi[0]["soyad"];
                        }
                        else
                        {
                            $uyeadsoyad="Üye Bilgisi Bulunamadı.";
                        }
                        ?>
                        <tr>
                          <td><?=$sira?></td>
                          <td>
                            <?=mb_substr(stripslashes($veriler[$i]["metin"]),0,200,"UTF-8")."...."?><br>
                            Üye Bilgisi : <?=$uyeadsoyad?>
                        </td>
                          <td>
                          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input aktifpasif<?=$veriler[$i]["ID"]?>" id="customSwitch3<?=$veriler[$i]["ID"]?>"<?=$aktifpasif?> value="<?=$veriler[$i]["ID"]?>" onclick="aktifpasif(<?=$veriler[$i]["ID"]?>,'yorumlar');">
                      <label class="custom-control-label" for="customSwitch3<?=$veriler[$i]["ID"]?>"></label>
                    </div>
                          </td>
                          <td><?=$veriler[$i]["tarih"]?></td>
                          <td>
                            
                          <a href="<?=SITE?>yorum-sil/<?=$veriler[$i]["ID"]?>" class="btn btn-danger btn-sm silmeAlani">Sil</a>
                          <meta http-equiv="refresh" content="0;url<?=SITE?>yorum-liste">
                          </td>
                        </tr>
                        <?php
					}
				}
				?>               
                </tbody>
                <tfoot>
                <tr>
                  <th>Sıra</th>
                  <th>Açıklama</th>
                  <th>Durum</th>
                  <th>Tarih</th>
                  <th>İşlem</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
       
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
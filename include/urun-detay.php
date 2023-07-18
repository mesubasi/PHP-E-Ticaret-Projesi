<?php
if (!empty($_GET["seflink"])) {
    $seflink = $VT->filter($_GET["seflink"]);
    $urunbilgisi = $VT->VeriGetir("urunler", "WHERE durum=? AND seflink=?", array(1, $seflink), "ORDER BY ID ASC");
    if ($urunbilgisi != false) {
        ?>
        <link href="<?= SITE ?>css/product_page.css" rel="stylesheet">
        <link href="<?=SITE?>css/leave_review.css" rel="stylesheet">
        <main>
            <div class="container margin_30">
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="all">
                            <div class="slider">
                                <div class="owl-carousel owl-theme main">
                                    
                                <div style="background-image: url(<?=SITE?>images/urunler/<?=$urunbilgisi[0]["resim"]?>);" class="item-box"></div>
                                    <?php
                                    $resimler=$VT->VeriGetir("resimler","WHERE tablo=? AND KID=?",array("urunler",$urunbilgisi[0]["ID"]),"ORDER BY ID ASC");
                                    if($resimler!=false)
                                    {
                                        for ($x=0; $x < count($resimler); $x++) { 
                                            ?>
                                             <div style="background-image: url(<?=SITE?>images/resimler/<?=$resimler[$x]["resim"]?>);" class="item-box"></div>
                                            <?php
                                        }
                                    }
                                    
                                    ?>


                                   
                                </div>
                                <div class="left nonl"><i class="ti-angle-left"></i></div>
                                <div class="right"><i class="ti-angle-right"></i></div>
                            </div>
                            <div class="slider-two">
                                <div class="owl-carousel owl-theme thumbs">
                                    
                                <div style="background-image: url(<?=SITE?>images/urunler/<?=$urunbilgisi[0]["resim"]?>);" class="item active"></div>
                                    

                                <?php
                                if($resimler!=false)
                                {
                                    for ($x=0; $x < count($resimler); $x++) { 
                                        ?>
                                         <div style="background-image: url(<?=SITE?>images/resimler/<?=$resimler[$x]["resim"]?>);" class="item"></div>
                                        <?php
                                    }
                                }
                                
                                ?>
                                    
                                  
                                </div>
                                <div class="left-t nonl-t"></div>
                                <div class="right-t"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- /page_header -->
                        <div class="prod_info">
                            <h1><?=stripslashes($urunbilgisi[0]["baslik"])?></h1>
                           
                            <p><small>ÜRÜN KODU: <?=stripslashes($urunbilgisi[0]["urunkodu"])?></small><br></p>
                            <div class="prod_options">
                                <form action="#" method="post" id="urunbilgisi" class="urunbilgisi">
                            <?php
                            $varyasyonlar=$VT->VeriGetir("urunvaryasyonlari","WHERE urunID=?", array($urunbilgisi[0]["ID"]),"ORDER BY ID ASC");
                            if($varyasyonlar!=false)
                            {
                                for ($e=0; $e < count($varyasyonlar); $e++) { 
                                   ?>
                                     <div class="row">
                                    <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong><?=stripslashes($varyasyonlar[$e]["baslik"])?></strong>
                                          </label>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                        <div class="custom-select-form">
                                            <select class="wide" name="varyasyon[]">
                                                <?php
                                                $secenekler=$VT->VeriGetir("urunvaryasyonsecenekleri", "WHERE urunID=? AND varyasyonID=?",array($urunbilgisi[0]["ID"],$varyasyonlar[$e]["ID"]),"ORDER BY ID ASC");
                                                if($secenekler!=false)
                                                {
                                                    for ($t=0; $t < count($secenekler) ; $t++) { 
                                                        

                                                        ?>
                                                     <option value="<?=$secenekler[$t]["ID"]?>"><?=stripslashes($secenekler[$t]["baslik"])?></option>
                                                        <?php
                                                    }
                                                }
                                                
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                   <?php
                                }
                            }
                            
                            ?>
                               
                                <div class="row">
                                    <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Adet</strong></label>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                        <div class="numbers-row">
                                            <input type="text" value="1" id="adet" class="qty2 adet" name="adet">
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    
                                    <?php
                                    $indirimOranBilgisi="";
                                    if(!empty($urunbilgisi[0]["indirimlifiyat"]))
                                    {
                                        $indirimlifiyat=$urunbilgisi[0]["indirimlifiyat"].".".$urunbilgisi[0]["indirimlikurus"];
                                        $normalfiyat=$urunbilgisi[0]["fiyat"].".".$urunbilgisi[0]["kurus"];
                                        $hesapla=(($indirimlifiyat/$normalfiyat)*100);
                                        $indirimorani=round(100-$hesapla);
                                        /* İndirim Oranı Hesaplaması*/
                                        $indirimOranBilgisi='<span class="percentage">%'.$indirimorani.' İndirimli</span> ';
                                        

                                    }
                                    ?>
                                    <?php
if(!empty($urunbilgisi[0]["indirimlifiyat"]))
{
    $fiyat=$urunbilgisi[0]["indirimlifiyat"].".".$urunbilgisi[0]["indirimlikurus"];
    $normalfiyat=$urunbilgisi[0]["fiyat"].".".$urunbilgisi[0]["kurus"];
   
								if($urunbilgisi[0]["kdvdurum"]==1)
							{
								if($urunbilgisi[0]["kdvoran"]>9)
								{
									$oran="1.".$urunbilgisi[0]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunbilgisi[0]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
								$normalfiyat=($normalfiyat/$oran);
							}
    ?>
    <span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
<?=$indirimOranBilgisi?>
    <span class="old_price"><?=number_format($normalfiyat,2,",",".")?> TL</span>
    <?php
}
else
{
    $fiyat=$urunbilgisi[0]["fiyat"].".".$urunbilgisi[0]["kurus"];
    if($urunbilgisi[0]["kdvdurum"]==1)
							{
								if($urunbilgisi[0]["kdvoran"]>9)
								{
									$oran="1.".$urunbilgisi[0]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunbilgisi[0]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
								
							}
    ?>
    <span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
    <?php
}
                                    ?>
                                            
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="btn_add_to_cart"><a onclick="sepeteEkle('<?=SITE?>',<?=$urunbilgisi[0]['ID']?>);" class="btn_1">Sepete Ekle</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- /prod_info -->
                        <div class="product_actions">
                            <ul>
                                <li>
                                    <a onclick="favoriyeEkle('<?=SITE?>','<?=$urunbilgisi[0]["ID"]?>','<?=md5(sha1($urunbilgisi[0]["ID"]))?>');"><i class="ti-heart"></i><span>Favoriye Ekle</span></a>
                                </li>

                            </ul>
                        </div>
                        <!-- /product_actions -->
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->

            <div class="tabs_product">
                <div class="container">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Açıklama</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Yorumlar</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab">Yorum Yap</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /tabs_product -->
            <div class="tab_content_wrapper">
                <div class="container">
                    <div class="tab-content" role="tablist">
                        <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                            <div class="card-header" role="tab" id="heading-A">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false"
                                        aria-controls="collapse-A">
                                        Açıklama
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-lg-12">
                                           <?=stripslashes($urunbilgisi[0]["metin"])?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /TAB A -->
                        <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                            <div class="card-header" role="tab" id="heading-B">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false"
                                        aria-controls="collapse-B">
                                        Yorumlar
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                                <div class="card-body">
                                <div class="row justify-content-between">
                                <?php
                                $yorumlar=$VT->VeriGetir("yorumlar","WHERE durum=? AND urunID=?",array(1,$urunbilgisi[0]["ID"]),"ORDER BY ID DESC");
                                if($yorumlar!=false)
                                {
                                    for($i=0;$i<count($yorumlar);$i++)
                                    {
                                        $yorumyapanuye=$VT->VeriGetir("uyeler","WHERE ID=?",array($yorumlar[$i]["uyeID"]),"ORDER BY ID ASC",1);
                                        if($yorumyapanuye!=false)
                                        {
                                         $uyeadsoyad=$yorumyapanuye[0]["ad"]." ".mb_substr($yorumyapanuye[0]["soyad"],0,1,"UTF-8");
                                        }
                                        else
                                        {
                                            $uyeadsoyad="Üye Adı Gizlendi";
                                        }
                                        ?>
                                        <div class="col-lg-4">
	                                    <div class="review_content">
	                                        <div class="clearfix add_bottom_10">
	                                            <span class="rating">
                                                    <?php
                                                    if($yorumlar[$i]["puan"]==1)
                                                    {
                                                        ?>
                                                            <i class="icon-star"></i>
                                                <i class="icon-star empty"></i>
                                                <i class="icon-star empty"></i>
                                                <i class="icon-star empty"></i>
                                                <i class="icon-star empty">
                                                        <?php
                                                    }
                                                    else if($yorumlar[$i]["puan"]==2)
                                                    {
                                                        ?>
                                                            <i class="icon-star"></i>
                                                <i class="icon-star "></i>
                                                <i class="icon-star empty"></i>
                                                <i class="icon-star empty"></i>
                                                <i class="icon-star empty">
                                                        <?php
                                                    }
                                                    else if($yorumlar[$i]["puan"]==3)
                                                    {
                                                        ?>
                                                            <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star empty"></i>
                                                <i class="icon-star empty">
                                                        <?php
                                                    }
                                                    else if($yorumlar[$i]["puan"]==4)
                                                    {
                                                        ?>
                                                            <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star empty">
                                                        <?php
                                                    }
                                                    else if($yorumlar[$i]["puan"]==5)
                                                    {
                                                        ?>
                                                            <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star">
                                                        <?php
                                                    }
                                                    ?>
                                                
                                                </i><em><?=$yorumlar[$i]["puan"]?>/5</em></span>
	                                            <em><?=date("d.m.Y",strtotime($yorumlar[$i]["tarih"]))?></em>
	                                        </div>
	                                        <h4><?=$uyeadsoyad?>.</h4>
	                                        <p><?=$yorumlar[$i]["metin"]?></p>
	                                    </div>
	                                </div>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <p>Bu ürüne hiç yorum yapılmamış. Bu ürüne ilk yorum yapan sen ol.</p>
                                    <?php
                                }
                                ?>
                               
	                                
	                               
	                            </div>
                                 </div>
                                <!-- /card-body -->
                            </div>
                        </div>
                        <div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                            <div class="card-header" role="tab" id="heading-C">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false"
                                        aria-controls="collapse-C">
                                        Yorum Yap
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                                <div class="card-body">
                               <?php
                               $yorumyapma=false;
if (!empty($_SESSION["uyeID"])) {
    $uyeID = $VT->filter($_SESSION["uyeID"]);
    $uyelikbilgisi = $VT->VeriGetir("uyeler", "WHERE ID=? AND durum=?", array($uyeID, 1), "ORDER BY ID ASC", 1);
    if ($uyelikbilgisi != false) {

        if($_POST)
        {
            if(!empty($_POST["rating-input"]) && !empty($_POST["metin"]) && ctype_digit($_POST["rating-input"])) 
            {
                $puan=$VT->filter($_POST["rating-input"]);
                $metin=$VT->filter($_POST["metin"]);

                $ekle=$VT->SorguCalistir("INSERT INTO yorumlar","SET uyeID=?,urunID=?,puan=?,metin=?,durum=?,tarih=?",array($uyelikbilgisi[0]["ID"],$urunbilgisi[0]["ID"],$puan,$metin,2,date("Y-m-d")));
            $yorumyapma=true;
            }
        }
        else
        {

        }
        if($yorumyapma!=false)
        {
            ?>
                <div class="alert alert-success">Yorum Başarıyla İletildi</div>
                <meta http-equiv="refresh" content="3">

            <?php
        }
        else
        {

        
        ?>

        <form action="#" method="post">
        <div class="write_review">
						
						<div class="rating_submit">
							<div class="form-group">
							<label class="d-block">Puan Ver</label>
							<span class="rating mb-0">
								<input type="radio" class="rating-input" id="5_star" name="rating-input" value="5"><label for="5_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="4_star" name="rating-input" value="4"><label for="4_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="3_star" name="rating-input" value="3"><label for="3_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="2_star" name="rating-input" value="2"><label for="2_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="1_star" name="rating-input" value="1"><label for="1_star" class="rating-star"></label>
							</span>
							</div>
						</div>
						<!-- /rating_submit -->
						
						<div class="form-group">
							<label>Yorumunuz</label>
							<textarea class="form-control" style="height: 180px;" placeholder="Yorum yazarak ürün ile ilgili düşüncelerinizi paylaşabilirsiniz." name="metin"></textarea>
						</div>
						
						
						<input type="submit" value="Yorum Yap" name="yorumilet" class="btn_1">
					</div>
                    </form>
        <?php
        }
    }

}
else
{
    ?>
<p>Yorum yapabilmeniz için üye olun veya giriş yapın.</p>
    <?php
}
?>
                                </div>
                                <!-- /card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /container -->
            </div>
            <!-- /tab_content_wrapper -->

            <div class="container margin_60_35">
		<div class="main_title">
			<h2>Sizin İçin Seçtiklerimiz</h2>
			<p>Size özel ürünlerimizi keşfedin.</p>
		</div>
		<div class="owl-carousel owl-theme products_carousel">

			<?php
			$urunler = $VT->VeriGetir("urunler", "WHERE durum=? AND kategori=? AND ID<>?", array(1,$urunbilgisi[0]["kategori"],$urunbilgisi[0]["ID"]), "ORDER BY RAND() ASC",10);
			if ($urunler != false) {
				for ($i = 0; $i < count($urunler); $i++) {

					?>

					<div class="item">
						<div class="grid_item">
							
							<figure>
								<a href="<?=SITE?>urun/<?=$urunler[$i]["seflink"]?>">
									<img class="owl-lazy" src="<?=SITE?>images/urunler/<?=$urunler[$i]["resim"]?>"
										data-src="<?=SITE?>images/urunler/<?=$urunler[$i]["resim"]?>" alt="<?=stripslashes($urunler[$i]["baslik"])?>">
								</a>
							</figure>
							
							<a href="<?=SITE?>urun/<?=$urunler[$i]["seflink"]?>">
								<h3><?=stripslashes($urunler[$i]["baslik"])?></h3>
							</a>
							<div class="price_box">
								<?php
									if(!empty($urunler[$i]["indirimlifiyat"]))
									{
										$fiyat=$urunler[$i]["indirimlifiyat"].".".$urunler[$i]["indirimlikurus"];
										
									}
									else
									{
										$fiyat=$urunler[$i]["fiyat"].".".$urunler[$i]["kurus"];
							
									}
								?>


								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
							</div>
							<ul>
								<li><a onclick="favoriyeEkle('<?=SITE?>','<?=$urunbilgisi[0]["ID"]?>','<?=md5(sha1($urunbilgisi[0]["ID"]))?>');" class="tooltip-1" data-toggle="tooltip" data-placement="left"
										title="Favoriye Ekle"><i class="ti-heart"></i><span>Favoriye Ekle</span></a></li>
							</ul>
						</div>
						<!-- /grid_item -->
					</div>
					<?php
				}
			}
			?>
			<!-- /item -->

			<!-- /item -->
		</div>
		<!-- /products_carousel -->
	</div>
	<!-- /container -->

            <div class="feat">
                <div class="container">
                    <ul>
                        <li>
                            <div class="box">
                                <i class="ti-gift"></i>
                                <div class="justify-content-center">
                                    <h3>Ücretsiz Kargo</h3>
                                    <p>Tüm Ürünlerde Ücretsiz Kargo :)</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <i class="ti-wallet"></i>
                                <div class="justify-content-center">
                                    <h3>Güvenli Ödeme</h3>
                                    <p>100% Şifreli Alışveriş</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <i class="ti-headphone-alt"></i>
                                <div class="justify-content-center">
                                    <h3>7/24 Destek</h3>
                                    <p>Sorularınız için Bize Ulaşın</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/feat-->

        </main>
        <!-- /main -->
        <?php
    }
    else
    {
        ?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
        exit();
    }
    
}
else
    {
        ?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
        exit();
    }
?>
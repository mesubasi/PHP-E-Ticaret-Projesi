<link href="<?=SITE?>css/error_track.css" rel="stylesheet">
<style>
    /* Tablo stilleri */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px solid #ddd;
    }
    
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    th {
        background-color: #f2f2f2;
        font-weight: bold;
        border-right: 1px solid #ddd;
    }
    
    /* Sipariş detayları tablosu stilleri */
    .siparis-tablosu {
        margin-bottom: 40px;
    }
    
    .siparis-tablosu th {
        text-align: center;
    }
    
    .siparis-tablosu th,
    .siparis-tablosu td {
        padding: 15px;
        border: 1px solid #ddd;
    }
    
    /* Ödeme durumu stilleri */
    .odeme-durumu {
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
    }
    
    .odeme-durumu.odendi {
        color: #4caf50;
        background-color: #dff0d8;
    }
    
    .odeme-durumu.odeme-bekliyor {
        color: #ff9800;
        background-color: #fbe5d6;
    }
</style>


<main class="bg_gray">
		<div id="track_order">
			<div class="container">
				<div class="row justify-content-center text-center">
					
						<?php
						$islemdurumu=false;
							if($_POST)
							{
								if(!empty($_POST["sipariskodu"]))
								{
									$sipariskodu=$VT->filter($_POST["sipariskodu"]);
									$siparisler=$VT->VeriGetir("siparisler","WHERE sipariskodu=?",array($sipariskodu),"ORDER BY ID ASC",1);
									if($siparisler!=false)
									{
										$islemdurumu=true;
									}
								}
							}
							
							if($islemdurumu!=false)
							{
								$uyelikbilgisi = $VT->VeriGetir("uyeler", "WHERE ID=? AND durum=?", array($siparisler[0]["uyeID"],1), "ORDER BY ID ASC", 1);
								if ($uyelikbilgisi != false) {
									?>
									<div class="row">
										<div class="col-md-12">
								<form action="#" method="post">
                                <table class="table siparis-tablosu">
                                    <tr>
                                        <th>
                                            SİPARİŞ KODU
                                        </th>
                                        <th>ALICI BİLGİSİ</th>
                                        <th>ADRES Bilgisi</th>
                                        <th>
                                            KDV HARİÇ TUTAR
                                        </th>
                                        <th>
                                            KDV TUTAR
                                        </th>
                                        <th>
                                            ÖDENEN TUTAR
                                        </th>
                                        <th>
                                            ÖDEME TİPİ
                                        </th>
                                        <th class="odeme-durumu odendi odeme-bekliyor">
                                            ÖDEME DURUMU
                                        </th>
                                        <th>KARGO BİLGİSİ</th>
                                        
                                        <th>
                                            TARİH
                                        </th>

                                    </tr>
                               
                                    <?php



                                    if ($siparisler[0]["odemetipi"] == 1) {
                                        $odemetipi = "Kredi Kartı";
                                    }
                                    if ($siparisler[0]["odemetipi"] == 2) {
                                        $odemetipi = "Havale / EFT";
                                    }
                                    if ($siparisler[0]["odemetipi"] == 3) {
                                        $odemetipi = "Kapıda Ödeme";
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $siparisler[0]["sipariskodu"] ?>
                                        </td>
                                        <td><?php echo stripslashes(mb_substr($uyelikbilgisi[0]["ad"],0,3,"UTF-8")."****** ".mb_substr($uyelikbilgisi[0]["soyad"],0,3,"UTF-8")."****** ")?></td>
                                        <td><?php $ilBilgisi=$VT->VeriGetir("il","WHERE ID=?",array($uyelikbilgisi[0]["ilID"]),"ORDER BY ID ASC",1); echo stripslashes(mb_substr($uyelikbilgisi[0]["adres"],0,1,"UTF-8"). "****** ".$uyelikbilgisi[0]["ilce"])?>
                                         <?php  echo "/".mb_convert_case($ilBilgisi[0]["ADI"],MB_CASE_UPPER,"UTF-8");?>
                                    </td>
                                        <td>
                                            <?= number_format($siparisler[0]["kdvharictutar"], 2, ".", ",") ?> TL
                                        </td>
                                        <td>
                                            <?= number_format($siparisler[0]["kdvtutar"], 2, ".", ",") ?> TL
                                        </td>
                                        <td>
                                            <?= number_format($siparisler[0]["odenentutar"], 2, ".", ",") ?> TL
                                        </td>
                                        <td>
                                            <?= $odemetipi ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($siparisler[0]["durum"] == 1) {
                                                ?>
                                                <strong style="color: #4caf50;">*****</strong>
                                                <?php
                                            } else {
                                                ?>
                                                <strong style="color: #ff9800;">*****</strong>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        
                                    </td>
                                    <td> <?php
                                                    if(!empty($siparisler[0]["kargoadi"]))
                                                    {
                                                        echo $siparisler[0]["kargoadi"]."<br>Takip Numarası: ".$siparisler[0]["takipno"];
                                                    }
                                            ?></td>
                                        <td>
                                            <?= date("d.m.Y", strtotime($siparisler[0]["tarih"])) ?>
                                        </td>

                                    </tr>




                                </table>


                                <h3>SİPARİŞ VERİLEN ÜRÜNLER</h3>
                                <table class="table siparis-tablosu">
                                            <tr>
                                                <th>ÜRÜN KODU</th>
                                                <th>RESİM</th>
                                                <th>AÇIKLAMA</th>
                                                <th>ÜRÜN FİYATI</th>
                                                <th>ADET</th>
                                                <th>TOPLAM TUTAR</th>
                                            </tr>

                                    <?php
                                    $siparisurunler = $VT->VeriGetir("siparisurunler", "WHERE siparisID=?", array($siparisler[0]["ID"]), "ORDER BY ID ASC");
                                    if ($siparisurunler != false) {
                                        for ($i = 0; $i < count($siparisurunler); $i++) {
                                            $urunler = $VT->VeriGetir("urunler", "WHERE ID=?", array($siparisurunler[$i]["urunID"]), "ORDER BY ID ASC", 1);
                                            if ($urunler != false) {
                                                $ozellikler="";
                                                if(!empty($siparisurunler[$i]["varyasyonID"]))
                                                {
                                                    $varyasyonKontrol=$VT->VeriGetir("urunvaryasyonstoklari","WHERE ID=?",array($siparisurunler[$i]["varyasyonID"]),"ORDER BY ID ASC",1);
                                                    if($varyasyonKontrol!=false)
                                                    {
                                                        $varyasyonID=$varyasyonKontrol[0]["varyasyonID"];
                                                        $secenekID=$varyasyonKontrol[0]["secenekID"];
                                                        if(strpos($varyasyonID,"@")>0)
                                                        {
                                                            $varyasyonDizi=explode("@",$varyasyonID);
                                                            $secenekDizi=explode("@",$secenekID);  
                                                            for($x=0;$x<count($varyasyonDizi);$x++)
                                                            {
                                                                $varyasyonBilgisi=$VT->VeriGetir("urunvaryasyonlari","WHERE ID=?",array($varyasyonDizi[$x]),"ORDER BY ID ASC",1);
                                                                $secenekBilgisi=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE ID=?",array($secenekDizi[$x]),"ORDER BY ID ASC",1);
                                                                if($varyasyonBilgisi!=false && $secenekBilgisi!=false)
                                                                {
                                                                    $ozellikler=$ozellikler.stripslashes($secenekBilgisi[0]["baslik"])." ".stripslashes($varyasyonBilgisi[0]["baslik"])." ";
                                                                }
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $varyasyonBilgisi=$VT->VeriGetir("urunvaryasyonlari","WHERE ID=?",array($varyasyonID),"ORDER BY ID ASC",1);
                                                            $secenekBilgisi=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE ID=?",array($secenekID),"ORDER BY ID ASC",1);
                                                            if($varyasyonBilgisi!=false && $secenekBilgisi!=false)
                                                            {
                                                                $ozellikler=stripslashes($secenekBilgisi[0]["baslik"])." ".stripslashes($varyasyonBilgisi[0]["baslik"]);
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $urunler[0]["urunkodu"] ?>
                                                    </td>
                                                    <td><img src="<?= SITE ?>images/urunler/<?= $urunler[0]["resim"] ?>"
                                                            style="height: 50px; width: auto; display: block;"></td>
                                                    <td>
                                                        <?= stripslashes($urunler[0]["baslik"]) ?><br>  <small style="color: #009688; font-size: 13px;">  <?=$ozellikler?></small>
                                                    </td>
                                                    <td>
                                                        <?= number_format($siparisurunler[$i]["uruntutar"], 2, ",", ".") ?>
                                                    </td>
                                                    <td>
                                                        <?= $siparisurunler[$i]["adet"] ?>
                                                    </td>
                                                    <td>
                                                        <?= number_format($siparisurunler[$i]["toplamtutar"], 2, ",", ".") ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </table>

                            </form>
							</div>
							</div>
									<?php

								}
							}
							else
							{
								?>
								<div class="col-xl-7 col-lg-9">
						<img src="<?=SITE?>img/track_order.svg" alt="" class="img-fluid add_bottom_15" width="200" height="177">
						<p>Sipariş Takibi</p>
							<form action="#" method="post">
							<div class="search_bar">
								<input type="text" class="form-control" name="sipariskodu" placeholder="Sipariş Kodu">
								<input type="submit" value="Sorgula">
							</div>
						</form>
						</div>
								<?php
							}
						?>
						
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /track_order -->
		
		<div class="bg_white">
		<div class="container margin_60_35">
		<div class="main_title">
			<h2>Vitrin Ürünlerimiz</h2>
			<p>Size özel vitrin ürünlerimizi keşfedin</p>
		</div>
		<div class="owl-carousel owl-theme products_carousel">

			<?php
			$urunler = $VT->VeriGetir("urunler", "WHERE durum=? AND vitrindurum=?", array(1, 1), "ORDER BY sirano ASC");
			if ($urunler != false) {
				for ($i = 0; $i < count($urunler); $i++) {

					?>

					<div class="item">
						<div class="grid_item">

							<figure>

								<?php
								if (!empty($urunler[$i]["indirimlifiyat"])) {
									$indirimlifiyat = $urunler[$i]["indirimlifiyat"] . "." . $urunler[$i]["indirimlikurus"];
									$normalfiyat = $urunler[$i]["fiyat"] . "." . $urunler[$i]["kurus"];
									$hesapla = (($indirimlifiyat / $normalfiyat) * 100);
									$indirimorani = round(100 - $hesapla);
									/* İndirim Oranı Hesaplaması*/
									?>
									<span class="ribbon off">%
										<?= $indirimorani ?> İndirimli
									</span>

									<?php

								}
								?>

								<a href="<?= SITE ?>urun/<?= $urunler[$i]["seflink"] ?>">
									<img class="owl-lazy" src="<?= SITE ?>images/urunler/<?= $urunler[$i]["resim"] ?>"
										data-src="<?= SITE ?>images/urunler/<?= $urunler[$i]["resim"] ?>"
										alt="<?= stripslashes($urunler[$i]["baslik"]) ?>">
								</a>
							</figure>

							<a href="<?= SITE ?>urun/<?= $urunler[$i]["seflink"] ?>">
								<h3>
									<?= stripslashes($urunler[$i]["baslik"]) ?>
								</h3>
							</a>
							<div class="price_box">
							<?php
								if (!empty($urunler[$i]["indirimlifiyat"])) {
									$fiyat = $urunler[$i]["indirimlifiyat"] . "." . $urunler[$i]["indirimlikurus"];
									$normalfiyat = $urunler[$i]["fiyat"] . "." . $urunler[$i]["kurus"];
									?>
									
									
									
									
									<?php
									
									
								} else {
									$fiyat = $urunler[$i]["fiyat"] . "." . $urunler[$i]["kurus"];
									
								}
								if($urunler[$i]["kdvdurum"]==1)
							{
								if($urunler[$i]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$i]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$i]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
								$normalfiyat=($normalfiyat/$oran);

								
							}
								?>
								<span class="old_price">
										<?= number_format($normalfiyat, 2, ",", ".") ?> TL
									</span>
									<span class="new_price">
										<?= number_format($fiyat, 2, ",", ".") ?> TL
									</span>
									<?php
								?>


								
							</div>
							<ul>
								<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
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

		<!-- /container -->
		</div>
		<!-- /bg_white -->
	</main>
	<!--/main-->
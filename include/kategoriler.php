<?php
if(!empty($_GET["seflink"]))
{
	$seflink=$VT->filter($_GET["seflink"]);
	$kategoriler=$VT->VeriGetir("kategoriler","WHERE durum=? AND seflink=?",array(1,$seflink),"ORDER BY ID ASC",1);
	if($kategoriler!=false)
	{


?>

<main>
		<div class="top_banner">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
				<div class="container">
					<h1><?=stripslashes($kategoriler[0]["baslik"])?></h1>
				</div>
			</div>
			<img src="<?=SITE?>images/kategori.jpg" class="img-fluid" alt="">
		</div>
		<!-- /top_banner -->
			<div id="stick_here"></div>		
			<div class="toolbox elemento_stick">
				<div class="container">
				<ul class="clearfix">
					<li>
						
					</li>
					<li>
						<a href="<?=SITE?>kategori/<?=$kategoriler[0]["seflink"]?>?view=grid"><i class="ti-view-grid"></i></a>
						<a href="<?=SITE?>kategori/<?=$kategoriler[0]["seflink"]?>?view=list"><i class="ti-view-list"></i></a>
					</li>
					<li>
						<a href="#0" class="open_filters">
							<i class="ti-filter"></i><span>Filters</span>
						</a>
					</li>
				</ul>
				</div>
			</div>
			<!-- /toolbox -->
			
			<div class="container margin_30">
			
			<div class="row">
				<aside class="col-lg-3" id="sidebar_fixed">
				    <div class="filter_col">
				    	<form action="<?=SITE?>kategori/<?=$kategoriler[0]["seflink"]?>" method="get">
				        <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
				        <div class="filter_type version_2">
				            <h4><a href="#filter_1" data-toggle="collapse" class="opened">Kategoriler</a></h4>
				            <div class="collapse show" id="filter_1">
				                <ul>
				                	<?php
				                	if($kategoriler[0]["tablo"]=="urunler")
				                	{
				                		$menukategori=$VT->VeriGetir("kategoriler","WHERE durum=? AND tablo=?",array(1,$kategoriler[0]["seflink"]),"ORDER BY sirano ASC");

				                	}
				                	else{
				                		$menukategori=$VT->VeriGetir("kategoriler","WHERE durum=? AND tablo=?",array(1,$kategoriler[0]["tablo"]),"ORDER BY sirano ASC");
				                	}

				                	if($menukategori!=false)
				                	{
				                		for ($e=0; $e <count($menukategori) ; $e++) {

				                		$urunsay=$VT->VeriGetir("urunler","WHERE durum=? AND kategori=?",array(1,$menukategori[$e]["ID"]));
				                		if($urunsay!=false){$sayac=count($urunsay);}else{$sayac=0;} 

				                			?>
				                			 <li>
				                			 	<a href="<?=SITE?>kategori/<?=$menukategori[$e]["seflink"]?>">
				                        <label class="container_check"><?=stripslashes($menukategori[$e]["baslik"])?> <small><?=$sayac?></small>
				                        </label>
				                    </a>
				                    </li>
				                			<?php
				                		}
				                	}
				                	?>
				                   
				                </ul>
				            </div>
				            <!-- /filter_type -->
				        </div>
				        <!-- /filter_type -->
				      
				        <!-- /filter_type -->
				        <div class="filter_type version_2">
				            <h4><a href="#filter_4" data-toggle="collapse" class="closed">Fiyat Aralığı</a></h4>
				            <div class="collapse" id="filter_4">
				            	<?php
				            	if(!empty($_GET["view"]) && $_GET["view"]=="list")
				            	{
				            		?>
				            		<input type="hidden" name="view" value="list">
				            		<?php
				            	}
				            	?>
				                <ul>
				                    <li>
				                        <label class="container_check">0 TL — 100 TL
				                            <input type="radio" checked="checked" name="fiyat" value="100">
				                            <span class="checkmark"></span>
				                        </label>
				                    </li>
				                    <li>
				                        <label class="container_check">100 TL — 500 TL
				                            <input type="radio"  name="fiyat" value="500">
				                            <span class="checkmark"></span>
				                        </label>
				                    </li>
				                    <li>
				                        <label class="container_check">500 TL — 1000 TL
				                            <input type="radio" name="fiyat" value="1000">
				                            <span class="checkmark"></span>
				                        </label>
				                    </li>
				                    <li>
				                        <label class="container_check">1000 TL — 5000 TL
				                            <input type="radio" name="fiyat" value="5000">
				                            <span class="checkmark"></span>
				                        </label>
				                    </li>
				                    <li>
				                        <label class="container_check">5000 TL üzeri
				                            <input type="radio" name="fiyat" value="5001">
				                            <span class="checkmark"></span>
				                        </label>
				                    </li>
				                </ul>
				            </div>
				        </div>
				        <!-- /filter_type -->
				        <div class="buttons">
				            <input type="submit" class="btn_1" value="Arama Yap">
				        </div>
				    </form>
				    </div>
				</aside>
				<!-- /col -->
				<div class="col-lg-9">
					
						<?php
						if(!empty($_GET["view"]) && $_GET["view"]=="list")
						{
							$gorunum="liste";
							?>
							<div class="listegorunum">
							<?php
						}
						else
						{
							$gorunum="kutu";
							?>
							<div class="row small-gutters">
							<?php
						}
						$tablo=$kategoriler[0]["tablo"];
						if($tablo=="urunler")
						{
							$altkategoriler=$VT->VeriGetir("kategoriler","WHERE durum=? AND tablo=?",array(1,$kategoriler[0]["seflink"]),"ORDER BY ID ASC");
							if($altkategoriler!=false)
							{
								for ($i=0; $i <count($altkategoriler) ; $i++) { 
									
									if(!empty($_GET["fiyat"]) && ctype_digit($_GET["fiyat"]))
									{
										$gelenfiyat=$VT->filter($_GET["fiyat"]);
										$baslamatutar=0;
										$bitistutar=0;
										if($gelenfiyat==100){$baslamatutar=0; $bitistutar=100;}
										if($gelenfiyat==500){$baslamatutar=100; $bitistutar=500;}
										if($gelenfiyat==1000){$baslamatutar=500; $bitistutar=1000;}
										if($gelenfiyat==5000){$baslamatutar=1000; $bitistutar=5000;}
										if($gelenfiyat==5001){$baslamatutar=5000; $bitistutar=100000;}

										$urunler=$VT->VeriGetir("urunler","WHERE durum=? AND kategori=? AND (fiyat BETWEEN ? AND ?)",array(1,$altkategoriler[$i]["ID"],$baslamatutar,$bitistutar),"ORDER BY sirano ASC");

									}
									else
									{
										$urunler=$VT->VeriGetir("urunler","WHERE durum=? AND kategori=?",array(1,$altkategoriler[$i]["ID"]),"ORDER BY sirano ASC");
									}
									
									if($urunler!=false)
									{
										for ($x=0; $x <count($urunler) ; $x++) { 

											if($gorunum=="liste")
											{
												?>
												  <div class="row row_item">
	                    <div class="col-sm-4">
	                        <figure class="ozelyukseklik">
	                           <?php
	                           if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$indirimlifiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								$hesapla=(($indirimlifiyat/$normalfiyat)*100);
								$indirimorani=round(100-$hesapla); 
								/*indirim oranı hesaplama*/
								?>
								<span class="ribbon off">%<?=$indirimorani?> İndirim</span>
								<?php
							}
	                           ?>
	                            <a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
	                                <img class="img-fluid lazy" src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" data-src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" alt="">
	                            </a>
	                           
	                        </figure>
	                    </div>
	                    <div class="col-sm-8">
	                        
	                        <a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
	                            <h3><?=stripslashes($urunler[$x]["baslik"])?></h3>
	                        </a>
	                        <p><?=mb_substr(strip_tags(stripslashes($urunler[$x]["metin"])),0,260,"UTF-8")?>...</p>
	                        <div class="price_box">
	                           <?php
							if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$fiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
								$normalfiyat=($normalfiyat/$oran);
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
							<span class="old_price"><?=number_format($normalfiyat,2,",",".")?> TL</span>
								<?php
							}
							else
							{
								$fiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
								<?php
							}
							?>
	                        </div>
	                        <ul>
	                            <li><a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>" class="btn_1">Ürünü İncele</a></li>
	                            <li><a onclick="favoriyeEkle('<?=SITE?>','<?=$urunler[$x]["ID"]?>','<?=md5(sha1($urunler[$x]["ID"]))?>');" class="btn_1 gray tooltip-1" data-toggle="tooltip" data-placement="top" title="Favoriye Ekle"><i class="ti-heart"></i><span>Favoriye Ekle</span></a></li>
	                            
	                        </ul>
	                    </div>
	                </div>
	                <!-- /row_item -->
												<?php
											}
											else
											{
												?>

											<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure class="ozelyukseklik">
							<?php
							if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$indirimlifiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								$hesapla=(($indirimlifiyat/$normalfiyat)*100);
								$indirimorani=round(100-$hesapla); 
								/*indirim oranı hesaplama*/
								?>
								<span class="ribbon off">%<?=$indirimorani?> İndirim</span>
								<?php
							}
							?>
							<a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
								<img class="img-fluid lazy" src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" data-src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" alt="<?=stripslashes($urunler[$x]["baslik"])?>">
								
							</a>
						</figure>
						
						<a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
							<h3><?=stripslashes($urunler[$x]["baslik"])?></h3>
						</a>
						<div class="price_box">
							<?php
							if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$fiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
								$normalfiyat=($normalfiyat/$oran);
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
							<span class="old_price"><?=number_format($normalfiyat,2,",",".")?> TL</span>
								<?php
							}
							else
							{
								$fiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
								<?php
							}
							?>
							
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Favoriye Ekle"><i class="ti-heart"></i><span>Favoriye Ekle</span></a></li>
							
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->
											<?php
											}
											
										}
									}

								}
							}
							else
							{
								/*kategori*/
								if(!empty($_GET["fiyat"]) && ctype_digit($_GET["fiyat"]))
									{
										$gelenfiyat=$VT->filter($_GET["fiyat"]);
										$baslamatutar=0;
										$bitistutar=0;
										if($gelenfiyat==100){$baslamatutar=0; $bitistutar=100;}
										if($gelenfiyat==500){$baslamatutar=100; $bitistutar=500;}
										if($gelenfiyat==1000){$baslamatutar=500; $bitistutar=1000;}
										if($gelenfiyat==5000){$baslamatutar=1000; $bitistutar=5000;}
										if($gelenfiyat==5001){$baslamatutar=5000; $bitistutar=100000;}

										$urunler=$VT->VeriGetir("urunler","WHERE durum=? AND kategori=? AND (fiyat BETWEEN ? AND ?)",array(1,$kategoriler[0]["ID"],$baslamatutar,$bitistutar),"ORDER BY sirano ASC");

									}
									else
									{
										$urunler=$VT->VeriGetir("urunler","WHERE durum=? AND kategori=?",array(1,$kategoriler[0]["ID"]),"ORDER BY sirano ASC");
									}
							
									if($urunler!=false)
									{
										for ($x=0; $x <count($urunler) ; $x++) { 
											if($gorunum=="liste")
											{
												?>
												  <div class="row row_item">
	                    <div class="col-sm-4">
	                        <figure class="ozelyukseklik">
	                           <?php
	                           if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$indirimlifiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								$hesapla=(($indirimlifiyat/$normalfiyat)*100);
								$indirimorani=round(100-$hesapla); 
								/*indirim oranı hesaplama*/
								?>
								<span class="ribbon off">%<?=$indirimorani?> İndirim</span>
								<?php
							}
	                           ?>
	                            <a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
	                                <img class="img-fluid lazy" src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" data-src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" alt="">
	                            </a>
	                           
	                        </figure>
	                    </div>
	                    <div class="col-sm-8">
	                       
	                        <a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
	                            <h3><?=stripslashes($urunler[$x]["baslik"])?></h3>
	                        </a>
	                        <p><?=mb_substr(strip_tags(stripslashes($urunler[$x]["metin"])),0,260,"UTF-8")?>...</p>
	                        <div class="price_box">
	                           <?php
							if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$fiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
								$normalfiyat=($normalfiyat/$oran);
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
							<span class="old_price"><?=number_format($normalfiyat,2,",",".")?> TL</span>
								<?php
							}
							else
							{
								$fiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
								<?php
							}
							?>
	                        </div>
	                        <ul>
	                            <li><a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>" class="btn_1">Ürünü İncele</a></li>
	                            <li><a onclick="favoriyeEkle('<?=SITE?>','<?=$urunler[$x]["ID"]?>','<?=md5(sha1($urunler[$x]["ID"]))?>');" class="btn_1 gray tooltip-1" data-toggle="tooltip" data-placement="top" title="Favoriye Ekle"><i class="ti-heart"></i><span>Favoriye Ekle</span></a></li>
	                            
	                        </ul>
	                    </div>
	                </div>
	                <!-- /row_item -->
												<?php
											}
											else
											{
											?>
											<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure class="ozelyukseklik">
							<?php
							if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$indirimlifiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								$hesapla=(($indirimlifiyat/$normalfiyat)*100);
								$indirimorani=round(100-$hesapla); 
								/*indirim oranı hesaplama*/
								?>
								<span class="ribbon off">%<?=$indirimorani?> İndirim</span>
								<?php
							}
							?>
							<a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
								<img class="img-fluid lazy" src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" data-src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" alt="<?=stripslashes($urunler[$x]["baslik"])?>">
								
							</a>
						</figure>
						
						<a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
							<h3><?=stripslashes($urunler[$x]["baslik"])?></h3>
						</a>
						<div class="price_box">
							<?php
							if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$fiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
								$normalfiyat=($normalfiyat/$oran);
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
							<span class="old_price"><?=number_format($normalfiyat,2,",",".")?> TL</span>
								<?php
							}
							else
							{
								$fiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
								<?php
							}
							?>
							
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Favoriye Ekle"><i class="ti-heart"></i><span>Favoriye Ekle</span></a></li>
							
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->
											<?php
										}
										}
									}
							}
						}
						else
						{
							if(!empty($_GET["fiyat"]) && ctype_digit($_GET["fiyat"]))
									{
										$gelenfiyat=$VT->filter($_GET["fiyat"]);
										$baslamatutar=0;
										$bitistutar=0;
										if($gelenfiyat==100){$baslamatutar=0; $bitistutar=100;}
										if($gelenfiyat==500){$baslamatutar=100; $bitistutar=500;}
										if($gelenfiyat==1000){$baslamatutar=500; $bitistutar=1000;}
										if($gelenfiyat==5000){$baslamatutar=1000; $bitistutar=5000;}
										if($gelenfiyat==5001){$baslamatutar=5000; $bitistutar=100000;}

										$urunler=$VT->VeriGetir("urunler","WHERE durum=? AND kategori=? AND (fiyat BETWEEN ? AND ?)",array(1,$kategoriler[0]["ID"],$baslamatutar,$bitistutar),"ORDER BY sirano ASC");

									}
									else
									{
										$urunler=$VT->VeriGetir("urunler","WHERE durum=? AND kategori=?",array(1,$kategoriler[0]["ID"]),"ORDER BY sirano ASC");
									}
							
									if($urunler!=false)
									{
										for ($x=0; $x <count($urunler) ; $x++) { 
											if($gorunum=="liste")
											{
												?>
												  <div class="row row_item">
	                    <div class="col-sm-4">
	                        <figure class="ozelyukseklik">
	                           <?php
	                           if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$indirimlifiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								$hesapla=(($indirimlifiyat/$normalfiyat)*100);
								$indirimorani=round(100-$hesapla); 
								/*indirim oranı hesaplama*/
								?>
								<span class="ribbon off">%<?=$indirimorani?> İndirim</span>
								<?php
							}
	                           ?>
	                            <a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
	                                <img class="img-fluid lazy" src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" data-src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" alt="">
	                            </a>
	                           
	                        </figure>
	                    </div>
	                    <div class="col-sm-8">
	                       
					
	                        <a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
	                            <h3><?=stripslashes($urunler[$x]["baslik"])?></h3>
	                        </a>
	                        <p><?=mb_substr(strip_tags(stripslashes($urunler[$x]["metin"])),0,260,"UTF-8")?>...</p>
	                        <div class="price_box">
	                           <?php
							if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$fiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
								$normalfiyat=($normalfiyat/$oran);
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
							<span class="old_price"><?=number_format($normalfiyat,2,",",".")?> TL</span>
								<?php
							}
							else
							{
								$fiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
								<?php
							}
							?>
	                        </div>
	                        <ul>
	                            <li><a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>" class="btn_1">Ürünü İncele</a></li>
	                            <li><a onclick="favoriyeEkle('<?=SITE?>','<?=$urunler[$x]["ID"]?>','<?=md5(sha1($urunler[$x]["ID"]))?>');" class="btn_1 gray tooltip-1" data-toggle="tooltip" data-placement="top" title="Favoriye Ekle"><i class="ti-heart"></i><span>Favoriye Ekle</span></a></li>
	                            
	                        </ul>
	                    </div>
	                </div>
	                <!-- /row_item -->
												<?php
											}
											else
											{
											?>
											<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure class="ozelyukseklik">
							<?php
							if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$indirimlifiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								$hesapla=(($indirimlifiyat/$normalfiyat)*100);
								$indirimorani=round(100-$hesapla); 
								/*indirim oranı hesaplama*/
								?>
								<span class="ribbon off">%<?=$indirimorani?> İndirim</span>
								<?php
							}
							?>
							<a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
								<img class="img-fluid lazy" src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" data-src="<?=SITE?>images/urunler/<?=$urunler[$x]["resim"]?>" alt="<?=stripslashes($urunler[$x]["baslik"])?>">
								
							</a>
						</figure>
						
						<a href="<?=SITE?>urun/<?=$urunler[$x]["seflink"]?>">
							<h3><?=stripslashes($urunler[$x]["baslik"])?></h3>
						</a>
						<div class="price_box">
							<?php
							if(!empty($urunler[$x]["indirimlifiyat"]))
							{
								$fiyat=$urunler[$x]["indirimlifiyat"].".".$urunler[$x]["indirimlikurus"];
								$normalfiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
								$normalfiyat=($normalfiyat/$oran);
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
							<span class="old_price"><?=number_format($normalfiyat,2,",",".")?> TL</span>
								<?php
							}
							else
							{
								$fiyat=$urunler[$x]["fiyat"].".".$urunler[$x]["kurus"];
								if($urunler[$x]["kdvdurum"]==1)
							{
								if($urunler[$x]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$x]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$x]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
							}
								?>
								<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
								<?php
							}
							?>
							
						</div>
						<ul>
							<li><a onclick="favoriyeEkle('<?=SITE?>','<?=$urunler[$x]["ID"]?>','<?=md5(sha1($urunler[$x]["ID"]))?>');" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Favoriye Ekle"><i class="ti-heart"></i><span>Favoriye Ekle</span></a></li>
							
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->
											<?php
										}
										}
									}
						}
						?>
							
						
					</div>
					<!-- /row -->
					<div class="pagination__wrapper">
						<ul class="pagination">
							<li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
							<li>
								<a href="#0" class="active">1</a>
							</li>
							<li>
								<a href="#0">2</a>
							</li>
							<li>
								<a href="#0">3</a>
							</li>
							<li>
								<a href="#0">4</a>
							</li>
							<li><a href="#0" class="next" title="next page">&#10095;</a></li>
						</ul>
					</div>
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->			
				
		</div>
		<!-- /container -->
	</main>

	<?php
	}
}
	?>
<link href="<?=SITE?>css/cart.css" rel="stylesheet">
<?php
if(!empty($_SESSION["sepet"]) && !empty($_SESSION["odemetipi"]) && $_SESSION["odemetipi"]>0 && $_SESSION["odemetipi"]<4)
{
	$odemetipi=$VT->filter($_SESSION["odemetipi"]);
	if(!empty($_SESSION["uyeID"]))
{
	$uyeID=$VT->filter($_SESSION["uyeID"]);
	$uyebilgisi=$VT->VeriGetir("uyeler","WHERE ID=? AND durum=?",array($uyeID,1),"ORDER BY ID ASC",1);
	if($uyebilgisi!=false)
	{
 
		$sepetkdvharictutar=0;
		$sepetkdvtutar18=0;
		$sepetkdvtutar8=0;
		$sepetkdvtutar6=0;
		$sepetkdvtutar1=0;
		$sepetTutar=0;
		$siparisID=$VT->IDGetir("siparisurunler");
		$sipariskodu=$_SESSION["siparisKodu"];
		
			
								foreach ($_SESSION["sepet"] as $urunID => $bilgi) {
									$urunbilgisi=$VT->VeriGetir("urunler","WHERE durum=? AND ID=?",array(1,$urunID),"ORDER BY ID ASC",1);
									if($urunbilgisi!=false)
									{
 
										if($bilgi["varyasyondurumu"]!=false)
										{
					if(!empty($_SESSION["sepetVaryasyon"]))
					{
						foreach ($_SESSION["sepetVaryasyon"][$urunbilgisi[0]["ID"]] as $secenekID => $secenekAdet) {
 
							$stokTablo=$VT->VeriGetir("urunvaryasyonstoklari","WHERE ID=? AND urunID=?",array($secenekID,$urunbilgisi[0]["ID"]),"ORDER BY ID ASC",1);
							if($stokTablo!=false)
							{
								$varyasyonOzellikleri="";
								$varyasyonID=$stokTablo[0]["varyasyonID"];
								$secimID=$stokTablo[0]["secenekID"];
 
								if(!empty($urunbilgisi[0]["indirimlifiyat"]))
							{
								$fiyat=$urunbilgisi[0]["indirimlifiyat"].".".$urunbilgisi[0]["indirimlikurus"];
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
									$kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
								}
								else
								{
									$kdvsizBirimfiyat=$fiyat;
								}
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
									$kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
								}
								else
								{
									$kdvsizBirimfiyat=$fiyat;
								}
							}
								$toplamFiyat=($kdvsizBirimfiyat*$secenekAdet["adet"]);
								$siparisurunEkle=$VT->SorguCalistir("INSERT INTO siparisurunler","SET uyeID=?, siparisID=?, urunID=?, varyasyonID=?, uruntutar=?, adet=?, kdvdurum=?, kdvoran=?, toplamtutar=?, tarih=?",array($uyebilgisi[0]["ID"],$siparisID,$urunbilgisi[0]["ID"],$stokTablo[0]["ID"],number_format($kdvsizBirimfiyat,2,".",""),$secenekAdet["adet"],2,$urunbilgisi[0]["kdvoran"],number_format($toplamFiyat,2,".",""),date("Y-m-d")));
								$siparisguncelleme=$VT->SorguCalistir("UPDATE siparisurunler SET siparisID = ID");
								$varyasyonStokDusme=$VT->SorguCalistir("UPDATE urunvaryasyonstoklari","SET stok=? WHERE ID=?",array(($stokTablo[0]["stok"]-$secenekAdet["adet"]),$stokTablo[0]["ID"]),1);
								$urunStokDusme=$VT->SorguCalistir("UPDATE urunler","SET stok=? WHERE ID=?",array(($urunbilgisi[0]["stok"]-$secenekAdet["adet"]),$urunbilgisi[0]["ID"]),1);
								
									$toplamtutar=($fiyat*$secenekAdet["adet"]);
							
								
							if($urunbilgisi[0]["kdvdurum"]==1)
							{
								/*KDV li fiyat*/
								
								if($urunbilgisi[0]["kdvoran"]>9)
								{
									$oran="1.".$urunbilgisi[0]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunbilgisi[0]["kdvoran"];
								}
								$kdvlifiyat=$toplamtutar;
								$kdvsizfiyat=($toplamtutar/$oran);/*kdvsiz hali*/
								$kdvtutari=($toplamtutar-$kdvsizfiyat);/*KDV Fiyatı*/
								if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
								$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
								$sepetTutar=($sepetTutar+$kdvlifiyat);
							}
							else
							{
								/*KDV Hariç Fiyat*/
								$oran=$urunbilgisi[0]["kdvoran"];
								$kdvsizfiyat=$toplamtutar;
								$kdvtutari=(($kdvsizfiyat*$oran)/100);
								$kdvlifiyat=($kdvsizfiyat+$kdvtutari);
								if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
								$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
								$sepetTutar=($sepetTutar+$kdvlifiyat);
							}
 
							}
 
							
						}
					}
										}
										else
										{
 
							if(!empty($urunbilgisi[0]["indirimlifiyat"]))
							{
								$fiyat=$urunbilgisi[0]["indirimlifiyat"].".".$urunbilgisi[0]["indirimlikurus"];
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
									$kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
								}
								else
								{
									$kdvsizBirimfiyat=$fiyat;
								}
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
									$kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
								}
								else
								{
									$kdvsizBirimfiyat=$fiyat;
								}
							}
							
								$toplamFiyat=($kdvsizBirimfiyat*$bilgi["adet"]);
					$siparisurunEkle=$VT->SorguCalistir("INSERT INTO siparisurunler","SET uyeID=?, siparisID=?, urunID=?, uruntutar=?, adet=?, kdvdurum=?, kdvoran=?, toplamtutar=?, tarih=?",array($uyebilgisi[0]["ID"],$siparisID,$urunbilgisi[0]["ID"],number_format($kdvsizBirimfiyat,2,".",""),$bilgi["adet"],2,$urunbilgisi[0]["kdvoran"],number_format($toplamFiyat,2,".",""),date("Y-m-d")));
 
						$siparisguncelleme=$VT->SorguCalistir("UPDATE siparisurunler SET siparisID = ID");
								$urunStokDusme=$VT->SorguCalistir("UPDATE urunler","SET stok=? WHERE ID=?",array(($urunbilgisi[0]["stok"]-$bilgi["adet"]),$urunbilgisi[0]["ID"]),1);
 
 
							$toplamtutar=($fiyat*$bilgi["adet"]);
 
 
							if($urunbilgisi[0]["kdvdurum"]==1)
							{
								/*KDV li fiyat*/
								if($urunbilgisi[0]["kdvoran"]>9)
								{
									$oran="1.".$urunbilgisi[0]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunbilgisi[0]["kdvoran"];
								}
								$kdvlifiyat=$toplamtutar;
								$kdvsizfiyat=($toplamtutar/$oran);/*kdvsiz hali*/
								$kdvtutari=($toplamtutar-$kdvsizfiyat);/*KDV Fiyatı*/
								if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
								$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
								$sepetTutar=($sepetTutar+$kdvlifiyat);
							}
							else
							{
								/*KDV Hariç Fiyat*/
								$oran=$urunbilgisi[0]["kdvoran"];
								$kdvsizfiyat=$toplamtutar;
								$kdvtutari=(($kdvsizfiyat*$oran)/100);
								$kdvlifiyat=($kdvsizfiyat+$kdvtutari);
								if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
								$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
								$sepetTutar=($sepetTutar+$kdvlifiyat);
							}
 
										}
 
									
									}
								}
 
		$genelKDVTutar=0;
				if($sepetkdvtutar1>0)
				{
					$genelKDVTutar=($genelKDVTutar+$sepetkdvtutar1);
					
				}
				if($sepetkdvtutar6>0)
				{
					$genelKDVTutar=($genelKDVTutar+$sepetkdvtutar6);
				}
				if($sepetkdvtutar8>0)
				{
					$genelKDVTutar=($genelKDVTutar+$sepetkdvtutar8);
				}
				if($sepetkdvtutar18>0)
				{
					$genelKDVTutar=($genelKDVTutar+$sepetkdvtutar18);
				}
			$ekle=$VT->SorguCalistir("INSERT INTO siparisler","SET uyeID=?, sipariskodu=?, kdvharictutar=?, kdvtutar=?, odenentutar=?, odemetipi=?, durum=?, tarih=?",array($uyebilgisi[0]["ID"],$sipariskodu,number_format($sepetkdvharictutar,2,".",""),number_format($genelKDVTutar,2,".",""),number_format($sepetTutar,2,".",""),1,1,date("Y-m-d")));
			
			if(!empty($_SESSION["sepetVaryasyon"]))
			{
				unset($_SESSION["sepetVaryasyon"]);
			}
 
			unset($_SESSION["sepet"]);
			?>

			
			<meta http-equiv="refresh" content="0;url=<?=SITE?>odeme-sonuc">
			<?php
		
		?>
		
					<!-- /cart_actions -->
				
		
	<!--/main-->
	<?php
}
else
{
?>
<meta http-equiv="refresh" content="0;url=<?=SITE?>uyelik">
<?php
}
}
else
{
	?>
<meta http-equiv="refresh" content="0;url=<?=SITE?>uyelik">
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
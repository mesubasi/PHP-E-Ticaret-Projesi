<?php
if(!empty($_GET["ID"]))
{
	$ID=$VT->filter($_GET["ID"]);
		$veri=$VT->VeriGetir("urunler","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
		if($veri!=false) //resim var ise
		{
            $resim=$veri[0]["resim"]; //resim alanını getir
            if(file_exists("../images/urunler/".$resim)) //resmin yolunu kontrol et var ise
            {
                unlink("../images/urunler/".$resim); //resmi kaldır
            }
			$sil=$VT->SorguCalistir("DELETE FROM urunler","WHERE ID=?",array($ID),1); //veritabanından sil
			$kontrol1=$VT->VeriGetir("urunvaryasyonlari","WHERE urunID=?",array($ID),"ORDER BY ID ASC",1);
            $kontrol2=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE urunID=?",array($ID),"ORDER BY ID ASC",1);
            $kontrol3=$VT->VeriGetir("urunvaryasyonstoklari","WHERE urunID=?",array($ID),"ORDER BY ID ASC",1);
            
            if ($kontrol1!=false)
            {
                $sil=$VT->SorguCalistir("DELETE FROM urunvaryasyonlari","WHERE urunID=?",array($ID)); //veritabanından sil
            }
            if ($kontrol2!=false)
            {
                $sil=$VT->SorguCalistir("DELETE FROM urunvaryasyonsecenekleri","WHERE urunID=?",array($ID)); //veritabanından sil
            }
            if ($kontrol3!=false)
            {
                $sil=$VT->SorguCalistir("DELETE FROM urunvaryasyonstoklari","WHERE urunID=?",array($ID)); //veritabanından sil
            }
            
            
            ?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>urun-liste"> //Ürün-liste sayfasına dön
        <?php
		}
		else
		{
			?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>urun-liste">
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
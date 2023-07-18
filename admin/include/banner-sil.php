<?php
if(!empty($_GET["ID"]))
{
	$ID=$VT->filter($_GET["ID"]);
		$veri=$VT->VeriGetir("banner","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
		if($veri!=false) //resim var ise
		{
            $resim=$veri[0]["resim"]; //resim alanını getir
            if(file_exists("../images/banner/".$resim)) //resmin yolunu kontrol et var ise
            {
                unlink("../images/banner/".$resim); //resmi kaldır
            }
			$sil=$VT->SorguCalistir("DELETE FROM banner","WHERE ID=?",array($ID),1); //veritabanından sil
			?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>banner-liste"> //banner-liste sayfasına dön
        <?php
		}
		else
		{
			?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>banner-liste">
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
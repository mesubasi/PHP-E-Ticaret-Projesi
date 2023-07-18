<?php
if(!empty($_GET["silinecekID"]))
{
	$ID=$VT->filter($_GET["silinecekID"]);
	
	
		$veri=$VT->VeriGetir("resimler","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
		if($veri!=false)
		{
			$resim=$veri[0]["resim"];
			if(file_exists("../images/resimler/".$resim))
			{
				unlink("../images/resimler/".$resim);
			}
			$sil=$VT->SorguCalistir("DELETE FROM resimler","WHERE ID=?",array($ID),1);
			?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>resimler/<?=$_GET["tablo"]?>/<?=$_GET["ID"]?>">
        <?php
		}
		else
		{
			?>
       <meta http-equiv="refresh" content="0;url=<?=SITE?>resimler/<?=$_GET["tablo"]?>/<?=$_GET["ID"]?>">
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
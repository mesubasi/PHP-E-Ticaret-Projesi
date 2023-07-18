<?php
include_once(SINIF."class.phpmailer.php");
include_once(SINIF . "VT.php");
$VT=new VT();
$sitebilgileri = $VT->VeriGetir("ayarlar", "WHERE ID=?", array(1), "ORDER BY ID ASC", 1);

if ($sitebilgileri != false) {
	$sitebaslik = stripcslashes($sitebilgileri[0]["baslik"]);
	$siteanahtar = stripcslashes($sitebilgileri[0]["anahtar"]);
	$sitedescription = stripcslashes($sitebilgileri[0]["aciklama"]);
	$siteurl = stripcslashes($sitebilgileri[0]["url"]);
} else {
	echo "Lütfen Bağlantı Bilgilerinizi Kontrol Edin!";
	exit();
}

?>
<?php
@session_destroy(); /*Bütün oturumları sonlandır */
@ob_end_flush(); /* Tampon belleklerini sonlandır */
?>
<!--Çıkış yapınca yönlendirilecek sayfa-->
<meta http-equiv="refresh" content="0;url=<?=SITE?>hesabim">  
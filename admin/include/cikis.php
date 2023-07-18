<?php
@session_destroy();
@ob_end_flush();
?>
<meta http-equiv="refresh" content="0;url=<?=SITE?>giris-yap" />
<?php
exit();
?>
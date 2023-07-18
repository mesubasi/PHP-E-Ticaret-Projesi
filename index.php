<?php
@session_start();
@ob_start();
define("DATA", "data/");
define("SAYFA", "include/");
define("SINIF", "admin/class/");
include_once(DATA . "baglanti.php");
define("SITE", $siteurl);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
		<?= $sitebaslik ?>
	</title>
	<meta name="description" content="<?= $sitedescription ?>">
	<meta name="keywords" content="<?= $siteanahtar ?>">
	<meta name="author" content="eticaret projesi">


	<!-- Favicons-->
	<link rel="shortcut icon" href="<?=SITE?>img/m.png" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?= SITE ?>img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
		href="<?= SITE ?>img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
		href="<?= SITE ?>img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
		href="<?= SITE ?>img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="<?= SITE ?>css/bootstrap.custom.min.css" rel="stylesheet">
	<link href="<?= SITE ?>css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
	<link href="<?= SITE ?>css/home_1.css" rel="stylesheet">
	<link href="<?= SITE ?>css/listing.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="<?= SITE ?>css/custom.css" rel="stylesheet">

</head>

<body>

	<div id="page">

		<?php
		include_once(DATA . "ust.php");


		if ($_GET && !empty($_GET["sayfa"])) {
			$sayfa = $_GET["sayfa"] . ".php";
			if (file_exists(SAYFA . $sayfa)) {
				include_once(SAYFA . $sayfa);
			} else {
				include_once(SAYFA . "home.php");
			}

		} else {
			include_once(SAYFA . "home.php");
		}


		include_once(DATA . "footer.php");
		?>





	</div>
	<!-- page -->

	<div id="toTop"></div><!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="<?= SITE ?>js/common_scripts.min.js"></script>
	<script src="<?= SITE ?>js/main.js"></script>
	<script src="<?= SITE ?>js/sistem.js"></script>

	<!-- SPECIFIC SCRIPTS -->
	<script src="<?= SITE ?>js/carousel-home.min.js"></script>
	<script  src="<?=SITE?>js/carousel_with_thumbs.js"></script>
	


	<script>
    	// Client type Panel
		$('input[name="client_type"]').on("click", function() {
		    var inputValue = $(this).attr("value");
		    var targetBox = $("." + inputValue);
		    $(".box").not(targetBox).hide();
		    $(targetBox).show();
		});
	</script>

</body>

</html>
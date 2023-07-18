<main>
	
	<!-- /container -->
	<div class="bg_gray">



		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Markasıon Blog</h2>
				<p>Merak ettiğiniz her şey burada!</p>
			</div>
			<div class="row">
				<?php

				$bloglar = $VT->VeriGetir("bloglar", "WHERE durum=?", array(1), "ORDER BY sirano ASC");
				if ($bloglar != false) {
					for ($i = 0; $i < count($bloglar); $i++) {
						if (!empty($bloglar[$i]["resim"])) {
							$resim = $bloglar[$i]["resim"];
						} else {
							$resim = "varsayilan.png";
						}

						?>
						<div class="col-lg-6">
							<a class="box_news" href="<?= SITE ?>blog-detay/<?= $bloglar[$i]["seflink"] ?>">
								<figure>
									<img src="<?= SITE ?>images/bloglar/<?= $resim ?>"
										data-src="<?= SITE ?>images/bloglar/<?= $resim ?>"
										alt="<?= stripslashes($bloglar[$i]["baslik"]) ?>" width="400" height="266" class="lazy">

								</figure>
								<ul>

									<li>
										<?= date("d.m.Y", strtotime($bloglar[$i]["tarih"])) ?>
									</li>
								</ul>
								<h4>
									<?= stripslashes($bloglar[$i]["baslik"]) ?>
								</h4>
								<p><?= mb_substr(strip_tags(stripslashes($bloglar[$i]["metin"])), 0, 160, "UTF-8") ?>...</p>
							</a>
						</div>
						<?php
					}
				}
				?>
				<!-- /box_news -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</main>
<!-- /main -->
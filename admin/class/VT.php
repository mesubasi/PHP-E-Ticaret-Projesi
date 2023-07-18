<?php
class VT
{

	var $sunucu = "localhost";
	var $user = "root";
	var $password = "";
	var $dbname = "eticaret";
	var $baglanti;

	function __construct()
	{
		try {

			$this->baglanti = new PDO("mysql:host=" . $this->sunucu . ";dbname=" . $this->dbname . ";charset=utf8;", $this->user, $this->password);

		} catch (PDOException $error) {

			echo $error->getMessage();
			exit();
		}
	}

	public function VeriGetir($tablo, $wherealanlar = "", $wherearraydeger = "", $ordeby = "ORDER BY ID ASC", $limit = "")
	{
		$this->baglanti->query("SET CHARACTER SET utf8");
		$sql = "SELECT * FROM " . $tablo; /*SELECT * FROM ayarlar*/
		if (!empty($wherealanlar) && !empty($wherearraydeger)) {
			$sql .= " " . $wherealanlar; /*SELECT * FROM ayarlarWHERE */
			if (!empty($ordeby)) {
				$sql .= " " . $ordeby;
			}
			if (!empty($limit)) {
				$sql .= " LIMIT " . $limit;
			}
			$calistir = $this->baglanti->prepare($sql);
			$sonuc = $calistir->execute($wherearraydeger);
			$veri = $calistir->fetchAll(PDO::FETCH_ASSOC);
		} else {
			if (!empty($ordeby)) {
				$sql .= " " . $ordeby;
			}
			if (!empty($limit)) {
				$sql .= " LIMIT " . $limit;
			}
			$veri = $this->baglanti->query($sql, PDO::FETCH_ASSOC);
		}

		if ($veri != false && !empty($veri)) {
			$datalar = array();
			foreach ($veri as $bilgiler) {
				$datalar[] = $bilgiler;
			}
			return $datalar;
		} else {
			return false;
		}

	}

	public function SorguCalistir($tablo, $alanlar = "", $degerlerarray = "", $limit = "")
	{
		$this->baglanti->query("SET CHARACTER SET utf8");
		if (!empty($alanlar) && !empty($degerlerarray)) {
			$sql = $tablo . " " . $alanlar;
			if (!empty($limit)) {
				$sql .= " LIMIT " . $limit;
			}
			$calistir = $this->baglanti->prepare($sql);
			$sonuc = $calistir->execute($degerlerarray);
		} else {
			$sql = $tablo;
			if (!empty($limit)) {
				$sql .= " LIMIT " . $limit;
			}
			$sonuc = $this->baglanti->exec($sql);
		}

		if ($sonuc != false) {
			return true;
		} else {
			return false;
		}
		$this->baglanti->query("SET CHARACTER SET utf8");
	}

	public function seflink($val)
	{
		$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#', '?', '*', '!', '.', '(', ')');
		$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp', '', '', '', '', '', '');
		$string = strtolower(str_replace($find, $replace, $val));
		$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
		$string = trim(preg_replace('/\s+/', ' ', $string));
		$string = str_replace(' ', '-', $string);
		return $string;
	}

	public function uploadMulti($nesnename, $tablo = 'nan', $KID = 1, $yuklenecekyer = 'images/', $tur = 'img', $w = '', $h = '', $resimyazisi = '')
	{
		if ($tur == "img") {
			if (!empty($_FILES[$nesnename]["name"][0])) {
				$dosyanizinadi = $_FILES[$nesnename]["name"][0];
				$tmp_name = $_FILES[$nesnename]["tmp_name"][0];
				$uzanti = $this->uzanti($dosyanizinadi);
				if ($uzanti == "png" || $uzanti == "jpg" || $uzanti == "jpeg" || $uzanti == "gif") {
					$resimler = array();
					foreach ($_FILES[$nesnename] as $k => $l) {
						foreach ($l as $i => $v) {
							if (!array_key_exists($i, $resimler))
								$resimler[$i] = array();
							$resimler[$i][$k] = $v;
						}
					}

					foreach ($resimler as $resim) {
						$uzanti = $this->uzanti($resim["name"]);
						if ($uzanti == "png" || $uzanti == "jpg" || $uzanti == "jpeg" || $uzanti == "gif") {
							$handle = new Upload($resim);
							if ($handle->uploaded) {

								/* Resmi Yeniden Adlandır */
								$rand = uniqid(true);
								$handle->file_new_name_body = $rand;

								/* Resmi Yeniden Boyutlandır */
								if (!empty($w)) {
									if (!empty($h)) {

										$handle->image_resize = true;
										$handle->image_x = $w;
										$handle->image_y = $h;

									} else {
										if ($handle->image_src_x > $w) {
											$handle->image_resize = true;
											$handle->image_x = $w;
											$handle->image_ratio_y = true;
										}
									}
								} else if (!empty($h)) {
									if ($handle->image_src_h > $h) {
										$handle->image_resize = true;
										$handle->image_y = $h;
										$handle->image_ratio_x = true;
									}
								}

								//üzerine yazı yazdırma
								if (!empty($resimyazisi)) {
									$handle->image_text = $resimyazisi;
									$handle->image_text_color = '#FFFFFF';
									$handle->image_text_opacity = 80;
									//$handle->image_text_background = '#FFFFFF';
									$handle->image_text_background_opacity = 70;
									$handle->image_text_font = 5;
									$handle->image_text_padding = 1;
								}


								/* Resim Yükleme İzni */
								$handle->allowed = array('image/*');

								/* Resmi İşle */
								//$handle->Process(realpath("../")."/upload/resim/");
								$handle->Process($yuklenecekyer);
								if ($handle->processed) {
									$yukleme = $rand . "." . $handle->image_src_type;
									if (!empty($yukleme)) {
										//$yuklemekontrol=$fnk->DKontrol("../images/resimler/".$yukleme);
										$sira = $this->IDGetir("resimler");

										$sql = $this->SorguCalistir("INSERT INTO resimler", "SET tablo=?, KID=?, resim=?, tarih=?", array($tablo, $KID, $yukleme, date("Y-m-d")));


									} else {
										return false;
									}

								} else {
									return false;
								}

								$handle->Clean();

							} else {
								return false;
							}


						}
					}
					return true;


				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}




	public function ModulEkle()
	{
		if (!empty($_POST["baslik"])) {
			$baslik = $_POST["baslik"];
			if (!empty($_POST["durum"])) {
				$durum = 1;
			} else {
				$durum = 2;
			}
			$tablo = str_replace("-", "", $this->seflink($baslik));
			$kontrol = $this->VeriGetir("moduller", "WHERE tablo=?", array($tablo), "ORDER BY ID ASC", 1);
			if ($kontrol != false) {
				return false;
			} else {
				$tabloOlustur = $this->SorguCalistir('CREATE TABLE IF NOT EXISTS `' . $tablo . '` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `seflink` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `metin` text COLLATE utf8_turkish_ci,
  `resim` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `anahtar` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` int(5) DEFAULT NULL,
  `sirano` int(11) DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;');
				$modulekle = $this->SorguCalistir("INSERT INTO moduller", "SET baslik=?, tablo=?, durum=?, tarih=?", array($baslik, $tablo, $durum, date("Y-m-d")));
				$kategoriekle = $this->SorguCalistir("INSERT INTO kategoriler", "SET baslik=?, seflink=?, tablo=?, durum=?, tarih=?", array($baslik, $tablo, 'modul', 1, date("Y-m-d")));
				if ($modulekle != false) {
					return true;
				} else {
					return false;
				}
			}

		} else {
			return false;
		}
	}

	public function filter($val, $tf = false)
	{
		if ($tf == false) {
			$val = strip_tags($val);
		}
		$val = addslashes(trim($val));
		return $val;
	}

	public function uzanti($dosyaadi)
	{
		$parca = explode(".", $dosyaadi);
		$uzanti = end($parca);
		$donustur = strtolower($uzanti);
		return $donustur;
	}

	public function upload($nesnename, $yuklenecekyer = 'images/', $tur = 'img', $w = '', $h = '', $resimyazisi = '')
	{
		if ($tur == "img") {
			if (!empty($_FILES[$nesnename]["name"])) {
				$dosyanizinadi = $_FILES[$nesnename]["name"];
				$tmp_name = $_FILES[$nesnename]["tmp_name"];
				$uzanti = $this->uzanti($dosyanizinadi);
				if ($uzanti == "png" || $uzanti == "jpg" || $uzanti == "jpeg" || $uzanti == "gif") {
					$classIMG = new upload($_FILES[$nesnename]);
					if ($classIMG->uploaded) {
						if (!empty($w)) {
							if (!empty($h)) {
								$classIMG->image_resize = true;
								$classIMG->image_x = $w;
								$classIMG->image_y = $h;
							} else {
								if ($classIMG->image_src_x > $w) {
									$classIMG->image_resize = true;
									$classIMG->image_ratio_y = true;
									$classIMG->image_x = $w;
								}
							}
						} else if (!empty($h)) {
							if ($classIMG->image_src_h > $h) {
								$classIMG->image_resize = true;
								$classIMG->image_ratio_x = true;
								$classIMG->image_y = $h;
							}
						}

						if (!empty($resimyazisi)) {
							$classIMG->image_text = $resimyazisi;

							$classIMG->image_text_direction = 'v';

							$classIMG->image_text_color = '#FFFFFF';

							$classIMG->image_text_position = 'BL';
						}
						$rand = uniqid(true);
						$classIMG->file_new_name_body = $rand;
						$classIMG->Process($yuklenecekyer);
						if ($classIMG->processed) {
							$resimadi = $rand . "." . $uzanti;
							return $resimadi;
						} else {
							return false;
						}
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else if ($tur == "ds") {

			if (!empty($_FILES[$nesnename]["name"])) {

				$dosyanizinadi = $_FILES[$nesnename]["name"];
				$tmp_name = $_FILES[$nesnename]["tmp_name"];
				$uzanti = $this->uzanti($dosyanizinadi);
				if ($uzanti == "doc" || $uzanti == "docx" || $uzanti == "pdf" || $uzanti == "xlsx" || $uzanti == "xls" || $uzanti == "ppt" || $uzanti == "xml" || $uzanti == "mp4" || $uzanti == "avi" || $uzanti == "mov") {

					$classIMG = new upload($_FILES[$nesnename]);
					if ($classIMG->uploaded) {
						$rand = uniqid(true);
						$classIMG->file_new_name_body = $rand;
						$classIMG->Process($yuklenecekyer);
						if ($classIMG->processed) {
							$dokuman = $rand . "." . $uzanti;
							return $dokuman;
						} else {
							return false;
						}
					}
				}
			}
		} else {
			return false;
		}
	}

	public function kategoriGetir($tablo, $secID = "", $uz = -1)
	{
		$uz++;
		$kategori = $this->VeriGetir("kategoriler", "WHERE tablo=?", array($tablo), "ORDER BY ID ASC");
		if ($kategori != false) {
			for ($q = 0; $q < count($kategori); $q++) {
				$kategoriseflink = $kategori[$q]["seflink"];
				$kategoriID = $kategori[$q]["ID"];
				if ($secID == $kategoriID) {
					echo '<option value="' . $kategoriID . '" selected="selected">' . str_repeat("&nbsp;&nbsp;&nbsp;", $uz) . stripslashes($kategori[$q]["baslik"]) . '</option>';
				} else {
					echo '<option value="' . $kategoriID . '">' . str_repeat("&nbsp;&nbsp;&nbsp;", $uz) . stripslashes($kategori[$q]["baslik"]) . '</option>';
				}
				if ($kategoriseflink == $tablo) {
					break;
				}
				$this->kategoriGetir($kategoriseflink, $secID, $uz);
			}
		} else {
			return false;
		}
	}

	public function tekKategori($tablo, $secID = "", $uz = -1)
	{
		$uz++;
		$kategori = $this->VeriGetir("kategoriler", "WHERE seflink=? AND tablo=?", array($tablo, "modul"), "ORDER BY ID ASC");
		if ($kategori != false) {
			for ($q = 0; $q < count($kategori); $q++) {
				$kategoriseflink = $kategori[$q]["seflink"];
				$kategoriID = $kategori[$q]["ID"];
				if ($secID == $kategoriID) {
					echo '<option value="' . $kategoriID . '" selected="selected">' . str_repeat("&nbsp;&nbsp;&nbsp;", $uz) . stripslashes($kategori[$q]["baslik"]) . '</option>';
				} else {
					echo '<option value="' . $kategoriID . '">' . str_repeat("&nbsp;&nbsp;&nbsp;", $uz) . stripslashes($kategori[$q]["baslik"]) . '</option>';
				}

			}
		} else {
			return false;
		}
	}


	//Kategori İşlemleri
	public function kategoriGetir2($tablo, $sef = "", $secID = "", $uz = -1)
	{
		$USTKATID = false;

		if (!empty($secID)) //Id boş değilse
		{
			$okuma = $this->VeriGetir("kategoriler", "WHERE ID=?", array($secID), "ORDER BY ID ASC", 1);
			if ($okuma != false) //Okuma değeri false değilse 
			{
				$tablodakiAdi = $okuma[0]["tablo"];
				if ($tablodakiAdi != "modul") {
					$kontrol = $this->VeriGetir("kategoriler", "WHERE seflink=?", array($tablodakiAdi), "ORDER BY ID ASC", 1);
					if ($kontrol != false) {
						$USTKATID = $kontrol[0]["ID"];
					}
				}
			}
		}

		$uz++;
		$kategoriler = $this->VeriGetir("kategoriler", "WHERE tablo=?", array($tablo), "ORDER BY sirano ASC");
		if ($kategoriler != false) //kategorilere false değeri gelmemişse if şartını çalıştır
		{
			for ($x = 0; $x < count($kategoriler); $x++) {
				$kategoriseflink = $kategoriler[$x]["seflink"]; //Kategori seflink ve ID bilgisini al
				$kategoriID = $kategoriler[$x]["ID"];
				if ($USTKATID != false && $USTKATID == $kategoriID) //USTKATID false eşit değilse
				{
					$seciliyap = ' selected="selected"';
				} else {
					$seciliyap = '';
				}
				if ($sef == "modul") {
					echo '<option value="' . $kategoriseflink . '"' . $seciliyap . '>' . str_repeat("&nbsp;&nbsp;&nbsp;", $uz) . ' ' . stripcslashes($kategoriler[$x]["baslik"]) . '</option>';
				} else {
					echo '<option value="' . $kategoriseflink . '"' . $seciliyap . '>' . str_repeat("&nbsp;&nbsp;&nbsp;", $uz) . ' ' . stripcslashes($kategoriler[$x]["baslik"]) . '</option>';
				}

				if ($kategoriseflink == $tablo) {
					break;
				}
				$this->kategoriGetir2($kategoriseflink, $kategoriseflink, $secID = "", $uz = -1);


			}
		} else //Sorun oluşmuş ise geri döndür
		{
			return false;
		}



	}

	/*Ektra Bonus Fonksiyonlar*/
	/*
	 * Sitenize gelen ziyaretçilerin rapoarlarını kaydedebilir ve hangi tarayıcıdan kaç ziyaretçinin sitenizi ziyaret ettiğini görebilirsiniz.
	 * Buradaki fonksiyonlar eğitim serimizin 2. Etebında kurumsal firma ve e-ticaret siteleri oluşturulurken kullanılacaktır.
	 */
	public function TekilCogul()
	{
		date_default_timezone_set('Europe/Istanbul');
		$tarih = date("Y-m-d");
		$IP = $this->ipGetir();
		$TARAYICI = $this->tarayiciGetir();
		$tarayicistatistic = $this->VeriGetir("ziyarettarayici", "", "", "ORDER BY ID ASC");

		$konts = $this->VeriGetir("ziyaretciler", "WHERE tarih=? AND IP=?", array($tarih, $IP), "ORDER BY ID ASC", 1);
		if (count($konts) > 0 && $konts != false) {
			$c = ($konts[0]["cogul"] + 1);
			$ID = $konts[0]["ID"];
			$gunc = $this->SorguCalistir("UPDATE ziyaretciler", "SET cogul=? WHERE ID=?", array($c, $ID), 1);
		} else {
			if (!empty($_COOKIE["siteSettingsUse"])) {
			} else {
				$eks = $this->SorguCalistir("INSERT INTO ziyaretciler", "SET IP=?, tarayici=?, tekil=?, cogul=?, xr=?, tarih=?", array($IP, $TARAYICI, 1, 1, 1, $tarih));
				@setcookie("siteSettingsUse", md5(rand(1, 99999)), time() + (60 * 60 * 8));
				if ($TARAYICI == "Google Chrome") {
					$tbl = ($tarayicistatistic[0]["ziyaret"] + 1);
					$tiid = $tarayicistatistic[0]["ID"];
					$ersa = $this->SorguCalistir("UPDATE ziyarettarayici", "SET ziyaret=? WHERE ID=?", array($tbl, $tiid), 1);
				} else if ($TARAYICI == "İnternet Explorer") {
					$tbl = ($tarayicistatistic[1]["ziyaret"] + 1);
					$tiid = $tarayicistatistic[1]["ID"];
					$ersa = $this->SorguCalistir("UPDATE ziyarettarayici", "SET ziyaret=? WHERE ID=?", array($tbl, $tiid), 1);
				} else if ($TARAYICI == "Firefox") {
					$tbl = ($tarayicistatistic[2]["ziyaret"] + 1);
					$tiid = $tarayicistatistic[2]["ID"];
					$ersa = $this->SorguCalistir("UPDATE ziyarettarayici", "SET ziyaret=? WHERE ID=?", array($tbl, $tiid), 1);
				} else {
					$tbl = ($tarayicistatistic[3]["ziyaret"] + 1);
					$tiid = $tarayicistatistic[3]["ID"];
					$ersa = $this->SorguCalistir("UPDATE ziyarettarayici", "SET ziyaret=? WHERE ID=?", array($tbl, $tiid), 1);
				}
			}
		}

		/*sayfa hızı hesaplama*/
		$start = microtime(true);
		$end = microtime(true);
		$time = mb_substr(($end - $start), 0, 4);
		$tarah = $this->SorguCalistir("UPDATE ziyarettarayici", "SET hiz=? WHERE ID=?", array($time, 5), 1);
	}
	public function tarayiciGetir()
	{
		$tarayiciBul = $_SERVER["HTTP_USER_AGENT"];
		$msie = strpos($tarayiciBul, 'MSIE') ? true : false;
		$firefox = strpos($tarayiciBul, 'Firefox') ? true : false;
		$chrome = strpos($tarayiciBul, 'Chrome') ? true : false;
		if (!empty($msie) && $msie != false) {
			$tarayici = "İnternet Explorer";
		} else if (!empty($firefox) && $firefox != false) {
			$tarayici = "Firefox";
		} else if (!empty($chrome) && $chrome != false) {
			$tarayici = "Google Chrome";
		} else {
			$tarayici = "Diğer";
		}
		return $tarayici;
	}
	public function ipGetir()
	{
		if (getenv("HTTP_CLIENT_IP")) {
			$ip = getenv("HTTP_CLIENT_IP");
		} elseif (getenv("HTTP_X_FORWARDED_FOR")) {
			$ip = getenv("HTTP_X_FORWARDED_FOR");
			if (strstr($ip, ',')) {
				$tmp = explode(',', $ip);
				$ip = trim($tmp[0]);
			}
		} else {
			$ip = getenv("REMOTE_ADDR");
		}
		return $ip;
	}

	public function IDGetir($tablo)
	{
		$sql = $this->baglanti->query("SHOW TABLE STATUS FROM `" . $this->dbname . "` LIKE '" . $tablo . "'");
		if ($sql != false) {
			foreach ($sql as $sonuc) {

				$IDbilgisi = $sonuc["Auto_increment"];
				return $IDbilgisi;
				break;
			}
		} else {
			return false;
		}
	}

	public function MailGonder($mail, $konu = "", $mesaj)
	{
		$posta = new PHPMailer();
		$posta->CharSet = "UTF-8";
		$posta->IsSMTP(true); // send via SMTP
		$posta->Host = "smtp.gmail.com"; // SMTP servers
		$posta->SMTPAuth = true;
		$posta->SMTPSecure = "none"; // turn on SMTP authentication
		$posta->Username = "mailadresi@gmail.com"; // SMTP username
		$posta->Password = "password"; // SMTP password
		$posta->SMTPSecure = "ssl"; //yada tls
		$posta->Port = 465;
		$posta->From = "mailadresi@gmail.com"; // smtp kullanýcý adýnýz ile ayný olmalý
		$posta->Fromname = "Admin";
		$posta->AddAddress($mail, "mailadresi@gmail.com");
		$posta->Subject = $konu;
		$posta->Body = $mesaj;

		if (!$posta->Send()) {
			echo '<!--' . $posta->ErrorInfo . '-->';
			return false;
		} else {
			return true;
		}
	}


}



?>
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 18 Tem 2023, 09:48:41
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(160) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `anahtar` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `aciklama` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `telefon` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `url` varchar(120) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`ID`, `baslik`, `anahtar`, `aciklama`, `telefon`, `mail`, `adres`, `fax`, `url`) VALUES
(1, 'Proje', 'eticaret, proje, eticaretproje', 'PHP Tabanlı E-Ticaret Projesidir', '0224 232 2134', 'admin@admin.com.tr', 'mahalle cadde', '5454545554548', 'http://localhost/eticaret/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `aciklama` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `resim` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `durum` int DEFAULT NULL,
  `sirano` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `banner`
--

INSERT INTO `banner` (`ID`, `baslik`, `aciklama`, `url`, `resim`, `durum`, `sirano`, `tarih`) VALUES
(4, 'Elektronik Fırsatlarını Kaçırmayın!', 'Elektronik ürünlerde %50\\\'ye varan indirimler', '', '1646403d7d7ea5.jpg', 1, 4, '2023-05-16'),
(5, 'Kuponlar, kampanyalar, avantajlı ürünler', 've çok daha fazlası', '', '1646404531e5ec.jpeg', 1, 5, '2023-05-16'),
(6, 'Kozmetik & Kişisel Bakımda', 'Marka Günlerini Kaçırma', '', '1646406097174c.jpg', 1, 6, '2023-05-16'),
(7, 'Yaz Simdi Basliyor!', 'Haziran Ayina Özel ?ndirimleri Kaçirmayin!', '', '16489e05baaa11.jpg', 1, 7, '2023-06-14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bloglar`
--

DROP TABLE IF EXISTS `bloglar`;
CREATE TABLE IF NOT EXISTS `bloglar` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `seflink` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `metin` mediumtext COLLATE utf8mb4_turkish_ci,
  `resim` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `anahtar` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `durum` int DEFAULT NULL,
  `sirano` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `bloglar`
--

INSERT INTO `bloglar` (`ID`, `baslik`, `seflink`, `kategori`, `metin`, `resim`, `anahtar`, `description`, `durum`, `sirano`, `tarih`) VALUES
(1, 'Alışveriş Yaparken Güvenliğinizi Sağlamanın 5 Temel Yolu', 'alisveris-yaparken-guvenliginizi-saglamanin-5-temel-yolu', 17, '<p class=\\\"MsoNormal\\\">Teknolojinin hızlı ilerlemesiyle birlikte çevrimiçi\r\nalışveriş, günümüzde popüler hale geldi. İnternetin sunduğu kolaylık ve\r\nerişilebilirlik sayesinde, evinizden çıkmadan ihtiyaçlarınızı karşılamak artık\r\nmümkün. Ancak, çevrimiçi alışveriş yaparken güvenlik endişeleri de beraberinde\r\ngelir. Kimlik hırsızlığı, kredi kartı dolandırıcılığı ve sahte web siteleri gibi\r\ntehlikeler, bu konuda dikkatli olmanızı gerektirir. Neyse ki, alışveriş\r\nyaparken güvenliğinizi sağlamak için birkaç basit önlem alabilirsiniz. İşte\r\nalışveriş yaparken güvenliğinizi sağlamanın 5 temel yolu:<o:p></o:p></p>\r\n\r\n<ol style=\\\"margin-top:0cm\\\" start=\\\"1\\\" type=\\\"1\\\">\r\n <li class=\\\"MsoNormal\\\">Güvenilir\r\n     ve Güncel Bir Cihaz Kullanın: Alışveriş yaparken kullandığınız cihazın\r\n     güncel bir işletim sistemine ve antivirüs yazılımına sahip olduğundan emin\r\n     olun. Güncellemeler, güvenlik açıklarını giderir ve zararlı yazılımlara\r\n     karşı koruma sağlar. Ayrıca, alışveriş yapmak için sadece güvenilir Wi-Fi\r\n     ağlarına bağlanın ve kamuya açık Wi-Fi noktalarından kaçının. Kişisel\r\n     verilerinizi korumak için, sadece güvenli ve şifreli bir internet\r\n     bağlantısı kullanın.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Güvenilir\r\n     ve Tanınmış Satıcıları Tercih Edin: Çevrimiçi alışveriş yaparken,\r\n     güvenilir ve tanınmış satıcılardan alışveriş yapmaya özen gösterin. Ünlü\r\n     markalar ve güvenilir alışveriş platformları, güvenlik önlemlerini\r\n     genellikle daha iyi uygular. Ödeme işlemlerinde kredi kartı veya PayPal\r\n     gibi güvenilir ödeme yöntemlerini kullanmak, dolandırıcılık riskini azaltır.\r\n     Satıcı hakkında kullanıcı yorumlarını ve değerlendirmeleri okuyun ve\r\n     müşteri hizmetleriyle iletişime geçebileceğiniz bir iletişim kanalı\r\n     olduğundan emin olun.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Güçlü\r\n     Şifreler Kullanın ve Hesaplarınızı Güncel Tutun: Her alışveriş sitesi için\r\n     güçlü ve benzersiz şifreler kullanın. Şifreniz karmaşık olmalı, harf, sayı\r\n     ve semboller içermeli ve mümkün olduğunca uzun olmalıdır. Ayrıca,\r\n     alışveriş sitelerindeki hesaplarınızı düzenli olarak güncelleyin ve\r\n     mümkünse iki faktörlü kimlik doğrulamayı etkinleştirin. Bu, hesabınızın\r\n     güvenliğini artırır ve yetkisiz erişim girişimlerine karşı korur.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Güvenli\r\n     İnternet Tarayıcılarını Kullanın: Alışveriş yaparken güvenli bir internet\r\n     tarayıcısı kullanmanız önemlidir. Popüler tarayıcılar, kötü amaçlı\r\n     yazılımlara karşı koruma sağlamak için sürekli olarak güncellenir.\r\n     Tarayıcınızın adres çubuğunda \\\"https://\\\" ön ekini kontrol edin.\r\n     Bu, sitenin SSL (Güvenli Soket Katmanı) sertifikası ile korunduğunu ve\r\n     kişisel bilgilerinizin şifrelendiğini gösterir. Ayrıca, tarayıcınızın\r\n     gizlilik ayarlarını kontrol edin ve çerezleri düzenli olarak temizleyin.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Dikkatli\r\n     Olun ve Şüpheli Durumlarda İletişime Geçin: Alışveriş yaparken, şüpheli\r\n     e-postalara, bağlantılara veya pop-up pencerelere dikkat edin. Bilinmeyen\r\n     veya şüpheli kaynaklardan gelen mesajlara tıklamayın ve kişisel\r\n     bilgilerinizi paylaşmaktan kaçının. Web sitesinin güvenilir olduğundan\r\n     emin olmadığınız durumlarda, iletişim bilgilerini kontrol edin ve doğrudan\r\n     satıcıyla iletişime geçin. Şüpheli bir durumda veya dolandırıcılık\r\n     şüphesiyle karşılaştığınızda, hemen bankanızı veya kredi kartı şirketinizi\r\n     bilgilendirin ve durumu bildirin.</li></ol>', '16464a6d03fc3b.jpg', 'blog', 'blog', 1, 1, '2023-05-17'),
(2, 'Alışverişte Yapay Zeka: Nasıl Kullanılıyor ve Avantajları Nelerdir?', 'alisveriste-yapay-zeka-nasil-kullaniliyor-ve-avantajlari-nelerdir', 17, '<p class=\\\"MsoNormal\\\">Yapay zeka, son yıllarda alışveriş dünyasında da\r\nkullanılmaya başlandı. Peki, alışverişte yapay zeka nasıl kullanılıyor ve bu\r\nteknolojinin avantajları nelerdir? İşte bu soruların cevapları.<o:p></o:p></p>\r\n\r\n<ol style=\\\"margin-top:0cm\\\" start=\\\"1\\\" type=\\\"1\\\">\r\n <li class=\\\"MsoNormal\\\">Kişiselleştirilmiş\r\n     Öneriler Alışverişte yapay zeka, kullanıcılara kişiselleştirilmiş öneriler\r\n     sunarak alışveriş deneyimlerini geliştirmeye yardımcı olur. Bu öneriler,\r\n     kullanıcının geçmiş alışveriş deneyimlerine, beğenilerine ve arama\r\n     geçmişine dayalı olarak sunulur. Bu şekilde, kullanıcılar daha önce fark\r\n     etmedikleri ürünleri keşfedebilirler ve alışveriş deneyimleri daha keyifli\r\n     hale gelir.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Stok\r\n     Yönetimi Yapay zeka, stok yönetiminde de kullanılabilir. Bu teknoloji,\r\n     ürün taleplerini, stok seviyelerini ve satış trendlerini analiz ederek\r\n     mağaza sahiplerine stok yönetimi konusunda yardımcı olur. Bu sayede,\r\n     mağaza sahipleri stoklarını daha iyi yönetebilir ve müşterilerin\r\n     ihtiyaçlarını daha iyi karşılayabilir.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Chatbotlar\r\n     Yapay zeka, chatbotlar aracılığıyla da alışveriş deneyimlerini\r\n     geliştirmeye yardımcı olur. Chatbotlar, kullanıcılara hızlı ve etkili bir\r\n     şekilde hizmet verir. Bu teknoloji sayesinde, müşteri hizmetleri\r\n     departmanları daha hızlı ve daha etkili hizmet verebilir. Chatbotlar\r\n     ayrıca, kullanıcıların sorularını yanıtlamak ve ürün önerilerinde bulunmak\r\n     gibi görevleri de yerine getirebilir.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Dolandırıcılık\r\n     Önleme Yapay zeka, alışveriş sitelerinde dolandırıcılık önleme konusunda\r\n     da kullanılır. Bu teknoloji, alışveriş yaparken olası dolandırıcılık\r\n     girişimlerini tespit edebilir ve bu sayede kullanıcıların kişisel ve\r\n     finansal bilgilerini korur. Yapay zeka, alışveriş sitelerinin güvenlik\r\n     sistemlerinin daha akıllı hale gelmesini sağlar ve bu da kullanıcıların\r\n     güvenliğini artırır.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Ödeme\r\n     İşlemleri Yapay zeka, ödeme işlemlerinde de kullanılır. Bu teknoloji,\r\n     ödeme işlemlerinin daha hızlı ve güvenli bir şekilde gerçekleştirilmesini\r\n     sağlar. Özellikle mobil ödemelerde, yapay zeka teknolojisi sayesinde\r\n     kullanıcılar daha kolay ve daha güvenli bir şekilde ödemelerini\r\n     tamamlayabilirler.<o:p></o:p></li>\r\n</ol>\r\n\r\n<p class=\\\"MsoNormal\\\">Sonuç olarak, yapay zeka alışveriş dünyasında birçok avantaj\r\nsunar. Kişiselleştirilmiş öneriler, stok yönetimi, chatbotlar, dolandırıcılık\r\nönleme ve ödeme işlemleri gibi alanlarda kullanılan yapay zeka teknolojisi,\r\nkullanıcıların alışveriş deneyimlerini geliştirir ve işletmelerin daha verimli\r\nçalışmasına yardımcı olur. Gelecekte, yapay zeka alışveriş dünyasında daha da\r\nyaygınlaşacak ve daha farklı alanlarda kullanılacaktır.</p>', '16464ac587b685.jpg', 'yapay zeka, alışveriş', 'yapay zeka, alışveriş', 1, 2, '2023-05-17'),
(3, 'Sürdürülebilir Turizm: Doğayı Koruyarak Seyahat Etme Yolları', 'surdurulebilir-turizm-dogayi-koruyarak-seyahat-etme-yollari', 17, '<p class=\\\"MsoNormal\\\">Turizm sektörü dünya genelinde büyük bir öneme sahiptir.\r\nAncak, artan seyahat talebi ve turist sayısı doğal çevreye olumsuz etkiler\r\nyaratabilir. Bu nedenle, sürdürülebilir turizm giderek daha fazla önem\r\nkazanmaktadır. Sürdürülebilir turizm, doğal ve kültürel kaynakları koruyarak\r\nseyahat etme felsefesini benimsemektedir. Bu makalede, sürdürülebilir turizmin\r\nne olduğunu ve doğayı koruyarak seyahat etme yollarını ele alacağız.<o:p></o:p></p><ol style=\\\"margin-top:0cm\\\" start=\\\"1\\\" type=\\\"1\\\">\r\n <li class=\\\"MsoNormal\\\">Yerel\r\n     Kültür ve Ekonomiye Destek Olun: Sürdürülebilir turizm, seyahat edilen\r\n     yerlerde yerel kültür ve ekonomiye katkıda bulunmayı hedefler. Yerel\r\n     restoranları, el işi ürünlerin satıldığı yerleri tercih ederek yerel\r\n     ekonomiye destek olabilirsiniz. Aynı zamanda, yerel gelenek ve göreneklere\r\n     saygı göstererek yerel kültüre katkı sağlamış olursunuz.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Doğal\r\n     Kaynakları ve Çevreyi Koruyun: Seyahat ederken, doğal kaynakları ve\r\n     çevreyi korumak büyük önem taşır. Doğal alanlarda izin verilen yolları\r\n     kullanın ve doğaya zarar veren davranışlardan kaçının. Geri dönüşümlü\r\n     malzemelerden yapılmış ürünleri tercih ederek atık miktarını\r\n     azaltabilirsiniz. Ayrıca, enerji ve su tasarrufu yapmak için otellerde ve\r\n     konaklama birimlerinde çevreye duyarlı uygulamaları tercih edin.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Ulaşımda\r\n     Sürdürülebilir Alternatifleri Tercih Edin: Ulaşım seçenekleri\r\n     sürdürülebilir turizmde büyük bir rol oynar. Uzun mesafeli seyahatlerde,\r\n     uçak yerine tren veya otobüs gibi toplu taşıma araçlarını tercih\r\n     edebilirsiniz. Yakın mesafeli seyahatlerde ise bisiklet veya yürüyüş gibi\r\n     çevre dostu ulaşım seçeneklerini değerlendirebilirsiniz. Ayrıca, araç\r\n     paylaşımı veya elektrikli araç kiralama gibi sürdürülebilir alternatifleri\r\n     tercih edebilirsiniz.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Bilinçli\r\n     Tüketim ve Atık Yönetimine Dikkat Edin: Seyahat sırasında bilinçli tüketim\r\n     ve atık yönetimi de önemli bir konudur. Su şişeleri yerine şarj edilebilir\r\n     su mataraları kullanarak plastik atık miktarını azaltabilirsiniz. Plastik\r\n     poşetler yerine kanvas veya bez çantalar kullanabilirsiniz. Ayrıca, doğal\r\n     kaynaklardan elde edilmemiş ve yerel üreticilerden satın alınmamış\r\n     ürünlerin tüketimini en aza indirmeye çalışın.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Eğitici\r\n     ve Farkındalık Yaratıcı Faaliyetlere Katılın: Sürdürülebilir turizm\r\n     hakkında bilgi edinmek ve farkındalık yaratmak için çeşitli faaliyetlere\r\n     katılabilirsiniz. Yerel turlara katılabilir, doğal alanlarda temizlik\r\n     etkinliklerine katılabilir veya yerel sivil toplum kuruluşlarının\r\n     çalışmalarına destek verebilirsiniz. Bu tür faaliyetlerle çevre ve doğa\r\n     konularında farkındalık yaratılır ve sürdürülebilir turizme katkı\r\n     sağlanır.<o:p></o:p></li>\r\n</ol><p class=\\\"MsoNormal\\\" style=\\\"text-indent:18.0pt\\\">Sürdürülebilir turizm, doğayı\r\nkoruyarak seyahat etmeyi hedefleyen bir yaklaşımdır. Yerel kültür ve ekonomiye\r\ndestek olmak, doğal kaynakları korumak, sürdürülebilir ulaşım seçeneklerini\r\ntercih etmek, bilinçli tüketim ve atık yönetimine dikkat etmek ve farkındalık\r\nyaratıcı faaliyetlere katılmak sürdürülebilir turizmin temel prensipleridir.\r\nHer birimiz, seyahatlerimizi daha sürdürülebilir hale getirmek için bu ilkelere\r\nuyarak doğal ve kültürel çevremizi koruyabiliriz. Sürdürülebilir turizm, hem\r\nturistlerin hem de ziyaret edilen bölgelerin uzun vadede fayda sağlayabileceği\r\nbir yaklaşımdır.</p>', '16464ad102d7e1.jpg', 'turizm, doğa, seyahat', 'turizm, doğa, seyahat', 1, 3, '2023-05-17'),
(4, 'Dijital Yorgunluğu Azaltmanın 5 Etkili Yolu', 'dijital-yorgunlugu-azaltmanin-5-etkili-yolu', 17, '<p class=\\\"MsoNormal\\\">Günümüzde teknolojinin hızlı ilerlemesiyle birlikte dijital\r\ndünya hayatımızın ayrılmaz bir parçası haline geldi. Ancak, aşırı dijital\r\nkullanım ve sürekli bağlantıda olma durumu dijital yorgunluğa neden olabilir.\r\nDijital yorgunluk, enerji düşüklüğü, konsantrasyon sorunları ve stres gibi\r\nbelirtilerle kendini gösterebilir. Bu makalede, dijital yorgunluğu azaltmanın 5\r\netkili yolunu ele alacağız.<o:p></o:p></p><ol style=\\\"margin-top:0cm\\\" start=\\\"1\\\" type=\\\"1\\\">\r\n <li class=\\\"MsoNormal\\\">Dijital\r\n     Detoks Yapın: Dijital detoks, bilinçli bir şekilde dijital ortamdan\r\n     uzaklaşma sürecidir. Belirli bir süre boyunca sosyal medya, e-posta ve\r\n     diğer dijital platformlardan uzak durarak zihninizi ve bedeninizi\r\n     dinlendirebilirsiniz. Bunun için birkaç saatlik bir ara veya hafta sonu\r\n     gibi belirli bir zaman dilimi ayırabilirsiniz. Bu süre zarfında doğaya\r\n     çıkabilir, kitap okuyabilir veya sevdiklerinizle daha fazla zaman\r\n     geçirebilirsiniz.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Dijital\r\n     Sınırlamalar Belirleyin: Dijital yorgunluğu azaltmanın bir diğer etkili\r\n     yolu, dijital sınırlamalar belirlemektir. Örneğin, yatmadan önce telefonu\r\n     veya diğer cihazları bir süre öncesinden kapatmak, yemek saatlerinde\r\n     cihazları kullanmamak veya belirli saatlerde sessiz moduna geçmek gibi\r\n     sınırlamalar getirebilirsiniz. Bu şekilde, dijital dünyadan uzaklaşarak\r\n     zihinsel ve duygusal rahatlama sağlayabilirsiniz.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Aktif\r\n     Fiziksel Aktivitelerde Bulunun: Dijital dünyadan uzaklaşmak için fiziksel\r\n     aktivitelere yönelmek önemlidir. Egzersiz yapmak, doğada yürüyüşe çıkmak,\r\n     yoga veya meditasyon gibi aktiviteler hem zihni hem de bedeni rahatlatır.\r\n     Bu tür aktiviteler stresi azaltır, odaklanmayı artırır ve dijital\r\n     yorgunluğun etkilerini azaltır.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Gerçek\r\n     İnsan Bağlantıları Kurun: Teknolojinin yaygınlaşmasıyla birlikte, insanlar\r\n     arasındaki gerçek bağlantılar azalmış olabilir. Dijital yorgunluğu\r\n     azaltmanın etkili bir yolu, gerçek insan bağlantılarına daha fazla zaman\r\n     ayırmaktır. Sevdiklerinizle yüz yüze görüşmeler yapmak, sosyal\r\n     etkinliklere katılmak veya yeni hobiler edinmek gibi aktivitelerle sosyal\r\n     bağlantıları güçlendirebilirsiniz. Bu, dijital dünyanın getirdiği\r\n     yalnızlık hissini azaltır.<o:p></o:p></li>\r\n <li class=\\\"MsoNormal\\\">Dijital\r\n     Kullanımı Farkındalıkla Yönetin: Dijital yorgunluğu azaltmanın en önemli\r\n     adımlarından biri, dijital kullanımı farkındalıkla yönetmektir. Hangi\r\n     uygulamaları ve platformları ne kadar süreyle kullandığınızı gözlemlemek,\r\n     gereksiz bilgilendirme ve bildirimleri kapatmak, iş ve kişisel kullanımı\r\n     ayrı tutmak gibi adımlarla dijital dünyayı daha bilinçli bir şekilde\r\n     kullanabilirsiniz.<o:p></o:p></li>\r\n</ol><p class=\\\"MsoNormal\\\" style=\\\"text-indent:18.0pt\\\">Dijital dünyanın hızlı tempolu\r\nyaşamı ve sürekli bağlantı durumu, dijital yorgunluğa neden olabilir. Ancak,\r\ndijital yorgunluğu azaltmanın yollarını uygulayarak zihinsel ve duygusal\r\nrahatlama sağlayabiliriz. Dijital detoks yapmak, sınırlamalar belirlemek, aktif\r\nfiziksel aktivitelere yönelmek, gerçek insan bağlantıları kurmak ve dijital\r\nkullanımı farkındalıkla yönetmek dijital yorgunluğu azaltmak için etkili adımlardır.\r\nBilinçli bir şekilde dijital dünyayı kullanarak daha dengeli bir yaşam\r\nsağlayabilir ve daha fazla iç huzur elde edebilirsiniz.</p>', '16464add449b71.jpg', 'dijital, yorgunluk', 'dijital, yorgunluk', 1, 4, '2023-05-17'),
(5, 'E-Ticaret: İnternetin Gücüyle Yeni Bir İş Modeli', 'e-ticaret-internetin-gucuyle-yeni-bir-is-modeli', 17, '<p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n&quot;Times New Roman&quot;,serif\\\">E-ticaret, son yıllarda giderek artan bir popülerlik\r\nkazanan bir iş modelidir. İnternetin yaygınlaşmasıyla birlikte, insanlar\r\nalışverişlerini fiziksel mağazalar yerine çevrimiçi platformlardan yapmayı\r\ntercih etmeye başladılar. Bu nedenle, pek çok girişimci ve işletme sahibi\r\ne-ticaret üzerinden iş yapmaya başladı.<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n&quot;Times New Roman&quot;,serif\\\">E-ticaret, tüketicilerin evlerinin rahatlığından\r\nürünleri satın almalarına olanak tanır. Ayrıca, e-ticaret işletmeleri\r\ngenellikle daha düşük işletme maliyetlerine sahiptirler, çünkü fiziksel bir\r\nmağaza açmak yerine, sadece bir web sitesi veya uygulama ile işlerini\r\nyürütmektedirler.<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n&quot;Times New Roman&quot;,serif\\\">E-ticaret işletmesi kurmak için önce bir web sitesi\r\nveya uygulama tasarlamak gerekmektedir. Bunun yanı sıra, bir ödeme işlemcisi\r\nseçmek, ürün envanteri oluşturmak, tedarikçileri bulmak ve müşterilerle\r\niletişim sağlamak da gereklidir.<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n&quot;Times New Roman&quot;,serif\\\">E-ticaret işletmeleri ayrıca, tüketicilerin çevrimiçi\r\nalışveriş yaparken güvenli hissetmelerini sağlamak için önemli adımlar\r\natmalıdırlar. SSL sertifikası kullanarak web siteleri veya uygulamaları güvenli\r\nhale getirmek, müşteri verilerinin güvenliğini sağlamak ve kredi kartı\r\nbilgilerinin korunmasını garanti altına almak için gereklidir.<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n&quot;Times New Roman&quot;,serif\\\">E-ticaret işletmelerinin başarısı, müşterilere sunduğu\r\nürünlerin kalitesi, fiyatları ve müşteri hizmetleri ile doğrudan ilişkilidir.\r\nİyi bir müşteri hizmeti sunmak, müşterilerin memnuniyetini artırır ve\r\nişletmenizin itibarını olumlu yönde etkiler.<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n&quot;Times New Roman&quot;,serif\\\">Sonuç olarak, e-ticaret işletmeleri giderek daha\r\npopüler hale geliyor ve pek çok avantaj sunuyorlar. Ancak, başarılı bir\r\ne-ticaret işletmesi kurmak için dikkatli bir planlama ve hazırlık yapmak\r\ngereklidir.</span></p>', '1647c42133b96e.jpg', 'E-Ticaret: İnternetin Gücüyle Yeni Bir İş Modeli', 'E-Ticaret: İnternetin Gücüyle Yeni Bir İş Modeli', 1, 5, '2023-06-04'),
(6, 'Müşteri Memnuniyeti: E-Ticarette Başarılı Olmanın Temel Taşı', 'musteri-memnuniyeti-e-ticarette-basarili-olmanin-temel-tasi', 17, '<p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">Giriş:<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">E-ticaret, internetin\r\ngüçlü etkisiyle birlikte hızla büyüyen ve gelişen bir sektördür. İnsanlar artık\r\nürün ve hizmetleri satın almak için fiziksel mağazalara gitmek yerine online\r\nalışveriş platformlarını tercih etmektedir. Ancak, bu büyüme ve rekabet\r\nortamında, e-ticaret işletmeleri için başarı elde etmek her geçen gün daha da\r\nzorlaşmaktadır. Bu noktada, müşteri memnuniyeti kavramı, e-ticaretin temel taşı\r\nhaline gelmektedir.<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">Ana Bölüm:<o:p></o:p></span></p><ol style=\\\"margin-top:0cm\\\" start=\\\"1\\\" type=\\\"1\\\">\r\n <li class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">Müşteri\r\n     Memnuniyetinin Önemi<o:p></o:p></span></li>\r\n</ol><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">a. Müşteri sadakati ve\r\ntekrar satışlar <o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">b. Olumlu referanslar ve\r\nağız reklamı <o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">c. Rekabet avantajı<o:p></o:p></span></p><ol style=\\\"margin-top:0cm\\\" start=\\\"2\\\" type=\\\"1\\\">\r\n <li class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">Müşteri\r\n     Memnuniyetini Etkileyen Faktörler<o:p></o:p></span></li>\r\n</ol><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">a. Kolay\r\nkullanılabilirlik ve gezinme <o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">b. Hızlı ve güvenilir\r\nteslimat <o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">c. Müşteri hizmetleri ve\r\niletişim <o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">d. Ürün kalitesi ve\r\nçeşitliliği <o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">e. Geri ödeme ve iade\r\npolitikaları<o:p></o:p></span></p><ol style=\\\"margin-top:0cm\\\" start=\\\"3\\\" type=\\\"1\\\">\r\n <li class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">Müşteri\r\n     Memnuniyeti Sağlamak İçin İpuçları<o:p></o:p></span></li>\r\n</ol><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">a. Kişiselleştirilmiş\r\ndeneyim sunmak b. Hızlı ve etkili müşteri destek sağlamak c. Ürün\r\nincelemelerine ve değerlendirmelere önem vermek d. Veri analitiği kullanarak\r\nmüşteri tercihlerini anlamak e. Geri bildirimleri dikkate almak ve\r\niyileştirmeler yapmak<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">Sonuç:<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Times New Roman&quot;,serif\\\">E-ticaret sektöründe\r\nbaşarılı olmanın temel taşlarından biri müşteri memnuniyetidir. Müşterilerin\r\nmemnuniyetini sağlamak, işletmelerin rekabet avantajı elde etmelerine, müşteri\r\nsadakatini kazanmalarına ve büyümelerine yardımcı olur. E-ticaret işletmeleri,\r\nmüşterilerin beklentilerini karşılamak ve onları memnun etmek için kullanıcı\r\ndeneyimini iyileştirmeli, hızlı ve güvenilir teslimat sağlamalı, etkili müşteri\r\nhizmetleri sunmalı ve ürün kalitesine özen göstermelidir. Ayrıca, müşterilerle\r\netkileşim halinde olmalı, geri bildirimlere önem vermelidirler. Bu önlemler,\r\ne-ticaret işletmelerinin müşteri memnuniyetini sağlamalarına ve başarılı\r\nolmalarına yardımcı olacaktır.</span></p>', '1647c85193aaf4.jpg', 'Müşteri Memnuniyeti: E-Ticarette Başarılı Olmanın Temel Taşı', 'Müşteri Memnuniyeti: E-Ticarette Başarılı Olmanın Temel Taşı', 1, 6, '2023-06-04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `denememodul`
--

DROP TABLE IF EXISTS `denememodul`;
CREATE TABLE IF NOT EXISTS `denememodul` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `seflink` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `metin` mediumtext COLLATE utf8mb4_turkish_ci,
  `resim` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `anahtar` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `durum` int DEFAULT NULL,
  `sirano` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favoriler`
--

DROP TABLE IF EXISTS `favoriler`;
CREATE TABLE IF NOT EXISTS `favoriler` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `uyeID` int DEFAULT NULL,
  `urunID` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `favoriler`
--

INSERT INTO `favoriler` (`ID`, `uyeID`, `urunID`, `tarih`) VALUES
(5, 2, 29, '2023-06-10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gizlilikpolitikasi`
--

DROP TABLE IF EXISTS `gizlilikpolitikasi`;
CREATE TABLE IF NOT EXISTS `gizlilikpolitikasi` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `seflink` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `metin` mediumtext COLLATE utf8mb4_turkish_ci,
  `resim` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `anahtar` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `durum` int DEFAULT NULL,
  `sirano` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `gizlilikpolitikasi`
--

INSERT INTO `gizlilikpolitikasi` (`ID`, `baslik`, `seflink`, `kategori`, `metin`, `resim`, `anahtar`, `description`, `durum`, `sirano`, `tarih`) VALUES
(6, 'Üyelik Sözleşmesi', 'uyelik-sozlesmesi', 6, '<div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">SİTE KULLANIM ŞARTLARI</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">Lütfen sitemizi kullanmadan evvel bu ‘site kullanım şartları’nı dikkatlice okuyunuz.&nbsp;</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">Bu alışveriş sitesini kullanan ve alışveriş yapan müşterilerimiz aşağıdaki şartları kabul etmiş varsayılmaktadır:</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">Sitemizdeki web sayfaları ve ona bağlı tüm sayfalar (‘site’) ……………………… adresindeki ……………………………….firmasının (Firma) malıdır ve onun tarafından işletilir. Sizler (‘Kullanıcı’) sitede sunulan tüm hizmetleri kullanırken aşağıdaki şartlara tabi olduğunuzu, sitedeki hizmetten yararlanmakla ve kullanmaya devam etmekle; Bağlı olduğunuz yasalara göre sözleşme imzalama hakkına, yetkisine ve hukuki ehliyetine sahip ve 18 yaşın üzerinde olduğunuzu, bu sözleşmeyi okuduğunuzu, anladığınızı ve sözleşmede yazan şartlarla bağlı olduğunuzu kabul etmiş sayılırsınız.&nbsp;</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">İşbu sözleşme taraflara sözleşme konusu site ile ilgili hak ve yükümlülükler yükler ve taraflar işbu sözleşmeyi kabul ettiklerinde bahsi geçen hak ve yükümlülükleri eksiksiz, doğru, zamanında, işbu sözleşmede talep edilen şartlar dâhilinde yerine getireceklerini beyan ederler.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">1. SORUMLULUKLAR</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">a.<span class=\\\"Apple-tab-span\\\"></span>Firma, fiyatlar ve sunulan ürün ve hizmetler üzerinde değişiklik yapma hakkını her zaman saklı tutar.&nbsp;</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">b.<span class=\\\"Apple-tab-span\\\"></span>Firma, üyenin sözleşme konusu hizmetlerden, teknik arızalar dışında yararlandırılacağını kabul ve taahhüt eder.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">c.<span class=\\\"Apple-tab-span\\\"></span>Kullanıcı, sitenin kullanımında tersine mühendislik yapmayacağını ya da bunların kaynak kodunu bulmak veya elde etmek amacına yönelik herhangi bir başka işlemde bulunmayacağını aksi halde ve 3. Kişiler nezdinde doğacak zararlardan sorumlu olacağını, hakkında hukuki ve cezai işlem yapılacağını peşinen kabul eder.&nbsp;</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">d.<span class=\\\"Apple-tab-span\\\"></span>Kullanıcı, site içindeki faaliyetlerinde, sitenin herhangi bir bölümünde veya iletişimlerinde genel ahlaka ve adaba aykırı, kanuna aykırı, 3. Kişilerin haklarını zedeleyen, yanıltıcı, saldırgan, müstehcen, pornografik, kişilik haklarını zedeleyen, telif haklarına aykırı, yasa dışı faaliyetleri teşvik eden içerikler üretmeyeceğini, paylaşmayacağını kabul eder. Aksi halde oluşacak zarardan tamamen kendisi sorumludur ve bu durumda ‘Site’ yetkilileri, bu tür hesapları askıya alabilir, sona erdirebilir, yasal süreç başlatma hakkını saklı tutar. Bu sebeple yargı mercilerinden etkinlik veya kullanıcı hesapları ile ilgili bilgi talepleri gelirse paylaşma hakkını saklı tutar.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">e.<span class=\\\"Apple-tab-span\\\"></span>Sitenin üyelerinin birbirleri veya üçüncü şahıslarla olan ilişkileri kendi sorumluluğundadır.&nbsp;</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">2. &nbsp;Fikri Mülkiyet Hakları</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">2.1. İşbu Site’de yer alan ünvan, işletme adı, marka, patent, logo, tasarım, bilgi ve yöntem gibi tescilli veya tescilsiz tüm fikri mülkiyet hakları site işleteni ve sahibi firmaya veya belirtilen ilgilisine ait olup, ulusal ve uluslararası hukukun koruması altındadır. İşbu Site’nin ziyaret edilmesi veya bu Site’deki hizmetlerden yararlanılması söz konusu fikri mülkiyet hakları konusunda hiçbir hak vermez.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">2.2. Site’de yer alan bilgiler hiçbir şekilde çoğaltılamaz, yayınlanamaz, kopyalanamaz, sunulamaz ve/veya aktarılamaz. Site’nin bütünü veya bir kısmı diğer bir internet sitesinde izinsiz olarak kullanılamaz.&nbsp;</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">3. Gizli Bilgi</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">3.1. Firma, site üzerinden kullanıcıların ilettiği kişisel bilgileri 3. Kişilere açıklamayacaktır. Bu kişisel bilgiler; kişi adı-soyadı, adresi, telefon numarası, cep telefonu, e-posta adresi gibi Kullanıcı’yı tanımlamaya yönelik her türlü diğer bilgiyi içermekte olup, kısaca ‘Gizli Bilgiler’ olarak anılacaktır.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">3.2. Kullanıcı, sadece tanıtım, reklam, kampanya, promosyon, duyuru vb. pazarlama faaliyetleri kapsamında kullanılması ile sınırlı olmak üzere, Site’nin sahibi olan firmanın kendisine ait iletişim, portföy durumu ve demografik bilgilerini iştirakleri ya da bağlı bulunduğu grup şirketleri ile paylaşmasına muvafakat ettiğini kabul ve beyan eder. Bu kişisel bilgiler firma bünyesinde müşteri profili belirlemek, müşteri profiline uygun promosyon ve kampanyalar sunmak ve istatistiksel çalışmalar yapmak amacıyla kullanılabilecektir.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">3.3. Gizli Bilgiler, ancak resmi makamlarca usulü dairesinde bu bilgilerin talep edilmesi halinde ve yürürlükteki emredici mevzuat hükümleri gereğince resmi makamlara açıklama yapılmasının zorunlu olduğu durumlarda resmi makamlara açıklanabilecektir.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">4. Garanti Vermeme: İŞBU SÖZLEŞME MADDESİ UYGULANABİLİR KANUNUN İZİN VERDİĞİ AZAMİ ÖLÇÜDE GEÇERLİ OLACAKTIR. FİRMA TARAFINDAN SUNULAN HİZMETLER \\\"OLDUĞU GİBİ” VE \\\"MÜMKÜN OLDUĞU” TEMELDE SUNULMAKTA VE PAZARLANABİLİRLİK, BELİRLİ BİR AMACA UYGUNLUK VEYA İHLAL ETMEME KONUSUNDA TÜM ZIMNİ GARANTİLER DE DÂHİL OLMAK ÜZERE HİZMETLER VEYA UYGULAMA İLE İLGİLİ OLARAK (BUNLARDA YER ALAN TÜM BİLGİLER DÂHİL) SARİH VEYA ZIMNİ, KANUNİ VEYA BAŞKA BİR NİTELİKTE HİÇBİR GARANTİDE BULUNMAMAKTADIR.&nbsp;</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">5. Kayıt ve Güvenlik&nbsp;</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">Kullanıcı, doğru, eksiksiz ve güncel kayıt bilgilerini vermek zorundadır. Aksi halde bu Sözleşme ihlal edilmiş sayılacak ve Kullanıcı bilgilendirilmeksizin hesap kapatılabilecektir.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">Kullanıcı, site ve üçüncü taraf sitelerdeki şifre ve hesap güvenliğinden kendisi sorumludur. Aksi halde oluşacak veri kayıplarından ve güvenlik ihlallerinden veya donanım ve cihazların zarar görmesinden Firma sorumlu tutulamaz.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">6. Mücbir Sebep</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">Tarafların kontrolünde olmayan; tabii afetler, yangın, patlamalar, iç savaşlar, savaşlar, ayaklanmalar, halk hareketleri, seferberlik ilanı, grev, lokavt ve salgın hastalıklar, altyapı ve internet arızaları, elektrik kesintisi gibi sebeplerden (aşağıda birlikte \\\"Mücbir Sebep” olarak anılacaktır.) dolayı sözleşmeden doğan yükümlülükler taraflarca ifa edilemez hale gelirse, taraflar bundan sorumlu değildir. Bu sürede Taraflar’ın işbu Sözleşme’den doğan hak ve yükümlülükleri askıya alınır.&nbsp;</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">7. Sözleşmenin Bütünlüğü ve Uygulanabilirlik</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">İşbu sözleşme şartlarından biri, kısmen veya tamamen geçersiz hale gelirse, sözleşmenin geri kalanı geçerliliğini korumaya devam eder.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">8. Sözleşmede Yapılacak Değişiklikler</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">Firma, dilediği zaman sitede sunulan hizmetleri ve işbu sözleşme şartlarını kısmen veya tamamen değiştirebilir. Değişiklikler sitede yayınlandığı tarihten itibaren geçerli olacaktır. Değişiklikleri takip etmek Kullanıcı’nın sorumluluğundadır. Kullanıcı, sunulan hizmetlerden yararlanmaya devam etmekle bu değişiklikleri de kabul etmiş sayılır.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">9. Tebligat</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">İşbu Sözleşme ile ilgili taraflara gönderilecek olan tüm bildirimler, Firma’nın bilinen e.posta adresi ve kullanıcının üyelik formunda belirttiği e.posta adresi vasıtasıyla yapılacaktır. Kullanıcı, üye olurken belirttiği adresin geçerli tebligat adresi olduğunu, değişmesi durumunda 5 gün içinde yazılı olarak diğer tarafa bildireceğini, aksi halde bu adrese yapılacak tebligatların geçerli sayılacağını kabul eder.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">10. Delil Sözleşmesi</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">Taraflar arasında işbu sözleşme ile ilgili işlemler için çıkabilecek her türlü uyuşmazlıklarda Taraflar’ın defter, kayıt ve belgeleri ile ve bilgisayar kayıtları ve faks kayıtları 6100 sayılı Hukuk Muhakemeleri Kanunu uyarınca delil olarak kabul edilecek olup, kullanıcı bu kayıtlara itiraz etmeyeceğini kabul eder.</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\"><br></div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">11. Uyuşmazlıkların Çözümü</div><div style=\\\"color: rgb(35, 56, 68); font-family: Rubik, Helvetica, Arial, sans-serif; font-size: 15.2px;\\\">İşbu Sözleşme’nin uygulanmasından veya yorumlanmasından doğacak her türlü uyuşmazlığın çözümünde İstanbul (Merkez) Adliyesi Mahkemeleri ve İcra Daireleri yetkilidir.</div>', NULL, 'Üyelik Sözleşmesi', 'Üyelik Sözleşmesi', 1, 5, '2023-05-27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iadeler`
--

DROP TABLE IF EXISTS `iadeler`;
CREATE TABLE IF NOT EXISTS `iadeler` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `uyeID` int DEFAULT NULL,
  `siparisID` int DEFAULT NULL,
  `iadekodu` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `metin` mediumtext COLLATE utf8mb4_turkish_ci,
  `cevap` mediumtext COLLATE utf8mb4_turkish_ci,
  `durum` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iadeurunler`
--

DROP TABLE IF EXISTS `iadeurunler`;
CREATE TABLE IF NOT EXISTS `iadeurunler` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `uyeID` int DEFAULT NULL,
  `iadeID` int DEFAULT NULL,
  `siparisurunID` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `il`
--

DROP TABLE IF EXISTS `il`;
CREATE TABLE IF NOT EXISTS `il` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ADI` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `il`
--

INSERT INTO `il` (`ID`, `ADI`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyon'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elazığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkari'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'İçel'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'Kahramanmaraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `seflink` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tablo` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `resim` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `anahtar` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `durum` int DEFAULT NULL,
  `sirano` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`ID`, `baslik`, `seflink`, `tablo`, `resim`, `anahtar`, `description`, `durum`, `sirano`, `tarih`) VALUES
(1, 'Kurumsal', 'kurumsal', 'modul', NULL, NULL, NULL, 1, NULL, '2023-04-20'),
(6, 'Gizlilik Politikası', 'gizlilikpolitikasi', 'modul', NULL, NULL, NULL, 1, NULL, '2023-05-04'),
(7, 'Ürünler', 'urunler', 'modul', NULL, 'Ürünler', 'Ürünler', 1, 1, '2023-04-20'),
(8, 'Ev ve Yaşam', 'ev-ve-yasam', 'urunler', '164646867e25a8.jpg', 'Ev ve Yaşam', 'Ev ve Yaşam', 1, 1, '2023-06-14'),
(11, 'Giyim ve Moda', 'giyim-ve-moda', 'urunler', '164646aa1de689.jpg', 'Giyim ve Moda', 'Giyim ve Moda', 1, 2, '2023-05-17'),
(12, 'Elektronik', 'elektronik', 'urunler', '16464697773766.png', 'Elektronik', 'Elektronik', 1, 4, '2023-05-17'),
(13, 'Kozmetik ve Kişisel Bakım', 'kozmetik-ve-kisisel-bakim', 'urunler', '1646469195efd9.png', 'Kozmetik ve Kişisel Bakım', 'Kozmetik ve Kişisel Bakım', 1, 5, '2023-05-17'),
(14, 'Cep Telefonu', 'cep-telefonu', 'elektronik', NULL, 'Telefon', 'Telefon', 1, 14, '2023-05-16'),
(15, 'Ev Dekorasyon', 'ev-dekorasyon', 'ev-ve-yasam', NULL, 'Ev Dekorasyon', 'Ev Dekorasyon', 1, 14, '2023-05-16'),
(17, 'Bloglar', 'bloglar', 'modul', NULL, NULL, NULL, 1, NULL, '2023-05-17'),
(18, 'Tişört', 'tisort', 'giyim-ve-moda', NULL, 'Tişört', 'Tişört', 1, 14, '2023-05-17'),
(19, 'Ayakkabı', 'ayakkabi', 'giyim-ve-moda', NULL, 'Ayakkabı', 'Ayakkabı', 1, 14, '2023-05-17'),
(20, 'Kulaklık', 'kulaklik', 'elektronik', NULL, 'Kulaklık', 'Kulaklık', 1, 20, '2023-05-22'),
(21, 'Bilgisayar', 'bilgisayar', 'elektronik', NULL, 'Bilgisayar', 'Bilgisayar', 1, 21, '2023-05-29'),
(23, 'Mouse', 'mouse', 'elektronik', NULL, 'Mouse', 'Mouse', 1, 23, '2023-06-10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `adsoyad` varchar(120) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `kullanici` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `sifre` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `mail` varchar(120) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`ID`, `adsoyad`, `kullanici`, `sifre`, `mail`, `tarih`) VALUES
(1, 'Admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'test@hotmail.com', '2023-05-17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kurumsal`
--

DROP TABLE IF EXISTS `kurumsal`;
CREATE TABLE IF NOT EXISTS `kurumsal` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `seflink` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `metin` mediumtext COLLATE utf8mb4_turkish_ci,
  `resim` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `anahtar` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `durum` int DEFAULT NULL,
  `sirano` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kurumsal`
--

INSERT INTO `kurumsal` (`ID`, `baslik`, `seflink`, `kategori`, `metin`, `resim`, `anahtar`, `description`, `durum`, `sirano`, `tarih`) VALUES
(1, 'Hakkımızda', 'hakkimizda', 1, '<p class=\\\"MsoNormal\\\" style=\\\"mso-margin-bottom-alt:auto;line-height:normal\\\"><span style=\\\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\\\">MARKASION, 2023 yılında kurulan bir e-ticaret\r\nprojesidir. Amacımız, müşterilerimize en iyi alışveriş deneyimini sunmak ve\r\nonların beklentilerini aşan hizmetler sunmaktır.</span><span style=\\\"font-size: 12pt; font-family: &quot;Source Sans Pro&quot;, sans-serif;\\\"><o:p></o:p></span></p><p class=\\\"MsoNormal\\\" style=\\\"mso-margin-bottom-alt:auto;line-height:normal\\\"><span style=\\\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\\\">Marka adımız, \\\"marka\\\" ve \\\"kasyon\\\"\r\nkelimelerinin birleşimiyle oluşmuştur. Bu isim, marka değerini yükseltmek ve\r\nmüşterilerimize sunacağımız ürün ve hizmetlerdeki kaliteyi vurgulamak için\r\nseçilmiştir.</span><span style=\\\"font-size: 12pt; font-family: &quot;Source Sans Pro&quot;, sans-serif;\\\"><o:p></o:p></span></p><p class=\\\"MsoNormal\\\" style=\\\"mso-margin-bottom-alt:auto;line-height:normal\\\"><span style=\\\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\\\">Markasion olarak, geniş bir ürün yelpazesine sahibiz\r\nve müşterilerimize çeşitli kategorilerde kaliteli ürünler sunmaktayız. Giyim,\r\nelektronik, ev dekorasyonu, spor malzemeleri, güzellik ürünleri ve daha birçok\r\nkategoride geniş bir ürün portföyümüz bulunmaktadır. En son trendleri takip\r\nederken aynı zamanda müşteri geri bildirimlerine de önem vererek ürün\r\nseçimimizi yapmaktayız.</span><span style=\\\"font-size: 12pt; font-family: &quot;Source Sans Pro&quot;, sans-serif;\\\"><o:p></o:p></span></p><p class=\\\"MsoNormal\\\" style=\\\"mso-margin-bottom-alt:auto;line-height:normal\\\"><span style=\\\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\\\">Markasion olarak, müşteri memnuniyetini en üst düzeyde\r\ntutmaya özen gösteriyoruz. Müşterilerimizin güvenini kazanmak için güvenli ve\r\nkolay bir alışveriş ortamı sunuyoruz. Aynı zamanda hızlı teslimat, rekabetçi\r\nfiyatlar ve güvenilir müşteri hizmetleri sağlamak için sürekli olarak\r\nçalışıyoruz. Müşterilerimize destek olmak ve sorularını yanıtlamak için uzman\r\nbir müşteri hizmetleri ekibimiz bulunmaktadır.</span><span style=\\\"font-size: 12pt; font-family: &quot;Source Sans Pro&quot;, sans-serif;\\\"><o:p></o:p></span></p><p class=\\\"MsoNormal\\\" style=\\\"mso-margin-bottom-alt:auto;line-height:normal\\\"><span style=\\\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\\\">Markasion olarak sürdürülebilirlik konusuna da büyük\r\nönem veriyoruz. Çevreye duyarlı ürünleri destekliyor ve tedarik zincirimizi\r\nsürdürülebilirlik ilkelerine göre yönetmeye çalışıyoruz. Bu sayede,\r\nmüşterilerimize hem kaliteli ürünler sunarken hem de doğal kaynakların\r\nkorunmasına katkıda bulunuyoruz.</span><span style=\\\"font-size: 12pt; font-family: &quot;Source Sans Pro&quot;, sans-serif;\\\"><o:p></o:p></span></p><p class=\\\"MsoNormal\\\" style=\\\"mso-margin-bottom-alt:auto;line-height:normal\\\"><span style=\\\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\\\">MARKASION olarak, her müşterimizin bireysel\r\ntercihlerine değer veriyor ve onları memnun etmek için elimizden gelenin en\r\niyisini yapmaya çalışıyoruz. Müşteri odaklı bir yaklaşım benimsiyor ve sürekli\r\nolarak kendimizi geliştirerek müşterilerimize daha iyi hizmet verebilmek için\r\nçalışıyoruz.</span><span style=\\\"font-size: 12pt; font-family: &quot;Source Sans Pro&quot;, sans-serif;\\\"><o:p></o:p></span></p><p class=\\\"MsoNormal\\\" style=\\\"mso-margin-bottom-alt:auto;line-height:normal\\\"><span style=\\\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\\\">Bize güvendikleri için müşterilerimize teşekkür\r\nediyoruz. MARKASION olarak, onların beklentilerini karşılamak ve aşmak için\r\ndaha da ileriye gitmeye devam edeceğiz. İyi alışveriş deneyimleri sunmak için\r\nmüşterilerimizle birlikte büyümek ve gelişmek için sabırsızlanıyoruz.</span><span style=\\\"font-size: 12pt; font-family: &quot;Source Sans Pro&quot;, sans-serif;\\\"><o:p></o:p></span></p><p class=\\\"MsoNormal\\\" style=\\\"mso-margin-bottom-alt:auto;line-height:normal\\\"><span style=\\\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif;\\\">Siz de MARKASION ailesine katılarak, kaliteli\r\nürünlerimizden ve hizmetlerimizden faydalanabilirsiniz.</span></p>', NULL, 'Hakkımızda', 'Hakkımızda', 1, 1, '2023-05-27'),
(2, 'Misyonumuz', 'misyonumuz', 1, '<p class=\\\"MsoNormal\\\"><span style=\\\"font-size: 12pt;\\\">MARKASION olarak misyonumuz, müşterilerimize en iyi\r\nalışveriş deneyimini sunmak ve onların hayatını kolaylaştırmaktır. Müşteri\r\nmemnuniyetini en üst düzeyde tutmak için çalışırken aynı zamanda\r\nsürdürülebilirlik ilkesini de benimsemekteyiz.</span><br></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n\\\" times=\\\"\\\" new=\\\"\\\" roman\\\",serif\\\"=\\\"\\\">Müşteri odaklı bir yaklaşım benimsiyoruz.\r\nMüşterilerimizin ihtiyaçlarını anlamak, beklentilerini karşılamak ve onlara\r\nuygun çözümler sunmak için sürekli olarak kendimizi geliştiriyoruz.\r\nMüşterilerimizin geri bildirimlerini dikkate alarak ürün ve hizmetlerimizi\r\nsürekli olarak iyileştiriyoruz.<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n\\\" times=\\\"\\\" new=\\\"\\\" roman\\\",serif\\\"=\\\"\\\">Hizmetlerimizin ve ürünlerimizin kalitesine büyük önem\r\nveriyoruz. En son trendleri takip ederken aynı zamanda kalite standartlarına\r\nuygun ürünler sunmayı hedefliyoruz. Tedarikçilerimizle yakın işbirliği içinde\r\nçalışarak, müşterilerimize yüksek kaliteli ürünler sunmak için sürekli olarak\r\nürün seçimimizi gözden geçiriyoruz.<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n\\\" times=\\\"\\\" new=\\\"\\\" roman\\\",serif\\\"=\\\"\\\">Sürdürülebilirlik, iş yapma şeklimizin temel bir\r\nunsuru olarak benimsediğimiz bir ilkedir. Çevreye duyarlı ürünlerin\r\nkullanılmasına ve sürdürülebilir tedarik zinciri yönetimine önem veriyoruz.\r\nDoğal kaynakları korumak ve çevresel etkileri en aza indirmek için sürekli\r\nolarak iyileştirme çabalarında bulunuyoruz.<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n\\\" times=\\\"\\\" new=\\\"\\\" roman\\\",serif\\\"=\\\"\\\">E-ticaret sektöründe güvenilirlik ve güven önemli bir\r\nfaktördür. Müşterilerimizin güvenini kazanmak için güvenli bir alışveriş ortamı\r\nsağlamak ve müşteri verilerinin gizliliğini korumak için gerekli önlemleri\r\nalıyoruz. Aynı zamanda şeffaf iletişim ve dürüst ticaret anlayışıyla\r\nmüşterilerimize güven veriyoruz.<o:p></o:p></span></p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n\\\" times=\\\"\\\" new=\\\"\\\" roman\\\",serif\\\"=\\\"\\\">MARKASION olarak, topluma katkıda bulunmayı da\r\nönemsiyoruz. Sosyal sorumluluk projelerine destek veriyor ve toplumun daha iyi\r\nbir yer haline gelmesi için çaba harcıyoruz. Müşterilerimizin ve\r\nçalışanlarımızın mutluluğunu ve refahını da gözetiyoruz.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\\\"MsoNormal\\\"><span style=\\\"font-size:12.0pt;line-height:107%;font-family:\r\n\\\" times=\\\"\\\" new=\\\"\\\" roman\\\",serif\\\"=\\\"\\\">Misyonumuz, sürekli olarak müşterilerimizin\r\nbeklentilerini aşmak ve onlara en iyi alışveriş deneyimini sunmak üzerine\r\nodaklanmaktadır. Müşterilerimizin memnuniyetini sağlamak için sürekli olarak\r\nkendimizi geliştiriyor ve yenilikçi çözümler sunmayı hedefliyoruz. MARKASION\r\nolarak, müşterilerimizin hayatını kolaylaştırmak ve onlara değer katmak için\r\nçalışmaktan büyük bir mutluluk duyuyoruz.<o:p></o:p></span></p>', NULL, 'Misyonumuz', 'Misyonumuz', 1, 2, '2023-05-27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `moduller`
--

DROP TABLE IF EXISTS `moduller`;
CREATE TABLE IF NOT EXISTS `moduller` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tablo` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `durum` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `moduller`
--

INSERT INTO `moduller` (`ID`, `baslik`, `tablo`, `durum`, `tarih`) VALUES
(1, 'Kurumsal', 'kurumsal', 1, '2020-01-04'),
(6, 'Gizlilik Politikası', 'gizlilikpolitikasi', 1, '2023-05-04'),
(7, 'Bloglar', 'bloglar', 1, '2023-05-17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimler`
--

DROP TABLE IF EXISTS `resimler`;
CREATE TABLE IF NOT EXISTS `resimler` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `tablo` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `KID` int DEFAULT NULL,
  `resim` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `resimler`
--

INSERT INTO `resimler` (`ID`, `tablo`, `KID`, `resim`, `tarih`) VALUES
(4, 'gizlilikpolitikasi', 5, '164638806e6812.jpg', '2023-05-16'),
(8, 'urunler', 2, '16463ed49a9285.jpg', '2023-05-16'),
(9, 'urunler', 2, '16463ed49aac47.jpg', '2023-05-16'),
(10, 'urunler', 4, '16463ef9fa156c.jpg', '2023-05-16'),
(15, 'urunler', 8, '16464ea4bdbc06.jpg', '2023-05-17'),
(16, 'urunler', 8, '16464ea4bddc42.jpg', '2023-05-17'),
(17, 'urunler', 8, '16464ea4be1e0c.jpg', '2023-05-17'),
(18, 'urunler', 8, '16464ea4be3674.jpg', '2023-05-17'),
(19, 'urunler', 9, '1646bbe40422ce.jpg', '2023-05-22'),
(20, 'urunler', 9, '1646bbe404491e.jpg', '2023-05-22'),
(21, 'urunler', 9, '1646bbe4049a3a.jpg', '2023-05-22'),
(22, 'urunler', 7, '1646e3879c010d.jpg', '2023-05-24'),
(23, 'urunler', 7, '1646e3879c2394.jpg', '2023-05-24'),
(24, 'urunler', 7, '1646e3879ce2a0.jpg', '2023-05-24'),
(25, 'urunler', 7, '1646e3898de20d.jpg', '2023-05-24'),
(26, 'urunler', 7, '1646e3898e0308.jpg', '2023-05-24'),
(27, 'urunler', 7, '1646e3898e59b1.jpg', '2023-05-24'),
(28, 'urunler', 10, '16474f8b3299ad.jpg', '2023-05-29'),
(29, 'urunler', 10, '16474f8b32b5f0.jpg', '2023-05-29'),
(30, 'urunler', 10, '16474f8b330f7e.jpg', '2023-05-29'),
(31, 'urunler', 10, '16474f8b332ed6.jpg', '2023-05-29'),
(32, 'urunler', 11, '16475093bd5fe1.jpg', '2023-05-29'),
(33, 'urunler', 11, '16475093bd8391.jpg', '2023-05-29'),
(34, 'urunler', 11, '16475093bdec2c.jpg', '2023-05-29'),
(35, 'urunler', 12, '164766a4457059.jpg', '2023-05-30'),
(36, 'urunler', 12, '164766a445ad89.jpg', '2023-05-30'),
(37, 'urunler', 12, '164766a4461be5.jpg', '2023-05-30'),
(38, 'urunler', 12, '164766a44637fd.jpg', '2023-05-30'),
(39, 'urunler', 12, '164766a446de27.jpg', '2023-05-30'),
(43, 'urunler', 59, '164845cb3d3e63.jpg', '2023-06-10'),
(44, 'urunler', 59, '164845cb3d65ea.jpg', '2023-06-10'),
(45, 'urunler', 59, '164845cb407611.jpg', '2023-06-10'),
(46, 'urunler', 59, '164845cb407fb4.jpg', '2023-06-10'),
(47, 'urunler', 59, '164845cb426f4f.jpg', '2023-06-10'),
(48, 'urunler', 59, '164845cb42782d.jpg', '2023-06-10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

DROP TABLE IF EXISTS `siparisler`;
CREATE TABLE IF NOT EXISTS `siparisler` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `uyeID` int DEFAULT NULL,
  `sipariskodu` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `kdvharictutar` double DEFAULT NULL,
  `kdvtutar` double DEFAULT NULL,
  `odenentutar` double DEFAULT NULL,
  `odemetipi` int DEFAULT NULL,
  `durum` int DEFAULT NULL,
  `kargoadi` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `takipno` varchar(150) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisurunler`
--

DROP TABLE IF EXISTS `siparisurunler`;
CREATE TABLE IF NOT EXISTS `siparisurunler` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `uyeID` int DEFAULT NULL,
  `siparisID` int DEFAULT NULL,
  `urunID` int DEFAULT NULL,
  `varyasyonID` int DEFAULT NULL,
  `uruntutar` double DEFAULT NULL,
  `adet` int DEFAULT NULL,
  `kdvdurum` int DEFAULT NULL,
  `kdvoran` int DEFAULT NULL,
  `toplamtutar` double DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

DROP TABLE IF EXISTS `urunler`;
CREATE TABLE IF NOT EXISTS `urunler` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `seflink` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `urunkodu` varchar(120) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `metin` mediumtext COLLATE utf8mb4_turkish_ci,
  `resim` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `fiyat` double DEFAULT NULL,
  `kurus` int DEFAULT NULL,
  `indirimlifiyat` double DEFAULT NULL,
  `indirimlikurus` int DEFAULT NULL,
  `kdvoran` int DEFAULT NULL,
  `kdvdurum` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `vitrindurum` int DEFAULT NULL,
  `anahtar` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `sirano` int DEFAULT NULL,
  `durum` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`ID`, `baslik`, `seflink`, `urunkodu`, `kategori`, `metin`, `resim`, `fiyat`, `kurus`, `indirimlifiyat`, `indirimlikurus`, `kdvoran`, `kdvdurum`, `stok`, `vitrindurum`, `anahtar`, `description`, `sirano`, `durum`, `tarih`) VALUES
(4, 'Nike Ayakkabı', 'nike-ayakkabi', '23134', 19, '<p>sadmskaldsaj dsadjsajjkd sak dsajdjksadjsa </p>', '16463ef9a5f046.jpg', 1200, 0, 600, 0, 18, 1, 40, 1, 'Nike Ayakkabı', 'Nike Ayakkabı', 4, 1, '2023-05-17'),
(5, 'Kapşon', 'kapson', '43512', 11, '<p>sadasd asda sdsadsa</p>', '16463f0b32aa75.jpg', 250, 0, NULL, NULL, 18, 1, 1, 1, 'Kapşon', 'Kapşon', 4, 1, '2023-05-16'),
(6, 'Erkek Ince Çizgili Paris Baskılı Oversize Bisiklet Yaka Tişört', 'erkek-ince-cizgili-paris-baskili-oversize-bisiklet-yaka-tisort', '412351', 18, '<p>dsadsad sadsadsada dsadsadsadsa</p>', '164649ea273488.jpg', 114, 99, 97, 7, 18, 1, 17, 1, 'Erkek Ince Çizgili Paris Baskılı Oversize Bisiklet Yaka Tişört', 'Erkek Ince Çizgili Paris Baskılı Oversize Bisiklet Yaka Tişört', 4, 1, '2023-05-17'),
(7, 'iPhone 13 128 GB', 'iphone-13-128-gb', '63414', 14, '', '16464d17a8f935.jpeg', 28370, 0, NULL, NULL, 18, 1, 6, 1, 'iPhone 13 128 GB', 'iPhone 13 128 GB', 5, 1, '2023-05-24'),
(8, 'Samsung Galaxy S23 Ultra 256 GB 8 GB Ram', 'samsung-galaxy-s23-ultra-256-gb-8-gb-ram', '21451', 14, '<p>dsadsadsa dsadsadsa sadsadsadsa</p>', '16464ea4418142.jpg', 37499, 0, NULL, NULL, 18, 1, 17, 1, 'Samsung Galaxy S23 Ultra 256 GB 8 GB Ram', 'Samsung Galaxy S23 Ultra 256 GB 8 GB Ram', 8, 1, '2023-05-17'),
(9, 'Qcy T20 Ailypods Bluetooth 5.3 Tws Beyaz (enc) Oyun Modu', 'qcy-t20-ailypods-bluetooth-53-tws-beyaz-enc-oyun-modu', '633623', 20, '<ul class=\\\"detail-desc-list\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: source_sans_proregular; font-size: 13px;\\\"><li style=\\\"margin: 0px 0px 10px; padding: 0px; font-size: 14px; color: rgb(102, 102, 102); overflow-wrap: break-word;\\\">Bluetooth versiyon 5.3 ile ışık hızındabağlantı ve ses kalitesi 4 mikrofon ve (enc)pasif gürültüengelleme özelliği ile kristal kalitesinde konuşma özelliği Cihaz kutusu ile toplamda 20 saate varanmüzik keyfi Qcy aplikasyonu ile akıllı gelişmişözellikleri kullanım Ipx4 standardı koruması ile ter ve susıçramasına karşı koruma Dokunmatik kontrol Type – c ile şarj bağlantısı Rahat kullanım kısa gövdeli yarı kulakiçi 2,6 cm kısa gövdeli yarı kulak içi kulaklık o kadar hafiftir ki bu kulakiçikulaklıkları taktığınızda neredeyse hiçbir şey hissetmezsiniz. Her detay önemlidir koşu parkurundanilham alan yuvarlak kasa, güçlü performans sağlayan metal gravür ağı, bağımlımikrofon, led ve ayar delikleri içerir. Sizi her zaman etkiler titanyumkaplamayla, yerleşik 13 mm lcp kompozit diyafram sürücüsü, muhteşem pop ve rockmüziğin keyfini çıkarmanız için yüksek çözünürlüğü iyileştirir. 13 mm sürücü açık ses sahnesi, dengelises performansı</li></ul>', '1646bbe3829845.jpg', 418, 99, 398, 99, 18, 1, 6, 1, 'Qcy T20 Ailypods Bluetooth 5.3 Tws Beyaz (enc) Oyun Modu', 'Qcy T20 Ailypods Bluetooth 5.3 Tws Beyaz (enc) Oyun Modu', 9, 1, '2023-05-24'),
(10, 'Acer Nitro 5 AN515-45 AMD Ryzen 5 5600H 8GB 256GB SSD GTX1650 Freedos 15.6', 'acer-nitro-5-an515-45-amd-ryzen-5-5600h-8gb-256gb-ssd-gtx1650-freedos-156', '423613', 21, '<ul class=\\\"a-unordered-list a-vertical a-spacing-mini\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\\\"><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">15,6 inç FHD ekranda 144 Hz ile hıza yeni bir boyut kazandırın</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">Çift hava girişi ve dört hava çıkışlı tasarımıyla mükemmel soğutma performansı</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">NitroSense uygulamasıyla fan hızlarını, aydınlatmayı ve daha fazlasını kontrol edin</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">4 bölgeli RGB klavye ile ortama renk katın</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">DTS:X Ultra sayesinde sesler daha net</span></li></ul>', '16474f85339802.jpg', 12999, 0, NULL, NULL, 18, 1, 1, 1, 'Acer', 'Acer', 10, 1, '2023-05-29'),
(11, 'MSI KATANA 17 B12VFK-403TR Dizüstü Bilgisayar', 'msi-katana-17-b12vfk-403tr-dizustu-bilgisayar', '317341', 21, '<ul class=\\\"a-unordered-list a-vertical a-spacing-mini\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\\\"><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">İşlemci: Intel Core i7-12650H (24M Cache, up to 4.70 GHz) İşletim Sistemi: Windows 11 Home Advanced</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">Ekran: 17.3\\\" FHD (1920*1080), 144Hz Chipset: Integrated SoC Ekran Kartı: RTX4070, GDDR6 8GB Hafıza: DDR V 16GB (8GB*2, 4800MHz)</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">Hafıza yuvası: 2 Slot Maksimum Hafıza: Max 64GB HDD: 1TB NVMe SSD Depolama Kapasitesi: 2x M.2 SSD slot (NVMe PCIe Gen4)</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">Ön Kamera: HD type (30fps@720p) Klavye: 4-Zone RGB Gaming Keyboard</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">Pil: 3-Cells, 53.5 Whr Güç Adaptörü: 200W Boyutlar: 398 x 273 x 25.2 mm Ağırlık : 2.6 kg</span></li></ul>', '16475091ad91e9.jpg', 47999, 0, NULL, NULL, 18, 1, 7, 1, 'msi', 'msi', 11, 1, '2023-05-29'),
(12, 'Puma Anzarun Lite - Siyah Unisex Sneaker', 'puma-anzarun-lite---siyah-unisex-sneaker', '711284', 19, '<ul class=\\\"detail-desc-list\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; font-family: source_sans_proregular; font-size: 13px;\\\"><li style=\\\"margin: 0px 0px 10px; padding: 0px; font-size: 14px; color: rgb(102, 102, 102); overflow-wrap: break-word;\\\">Menşei: Vietnam</li><li style=\\\"margin: 0px 0px 10px; padding: 0px; font-size: 14px; color: rgb(102, 102, 102); overflow-wrap: break-word;\\\">İç Materyal: Tekstil</li><li style=\\\"margin: 0px 0px 10px; padding: 0px; font-size: 14px; color: rgb(102, 102, 102); overflow-wrap: break-word;\\\">Dış Materyal: Dokuma</li><li style=\\\"margin: 0px 0px 10px; padding: 0px; font-size: 14px; color: rgb(102, 102, 102); overflow-wrap: break-word;\\\">Taban: Phylon</li><li style=\\\"margin: 0px 0px 10px; padding: 0px; font-size: 14px; color: rgb(102, 102, 102); overflow-wrap: break-word;\\\">Kapama Şekli:Bağcıklı</li></ul>', '164766a38f395c.jpg', 922, 18, 900, 50, 18, 1, 5, 1, 'Puma Anzarun Lite - Siyah Unisex Sneaker', 'Puma Anzarun Lite - Siyah Unisex Sneaker', 12, 1, '2023-05-30'),
(16, 'Dekoratif Beton Mermer Desen Oda Kokulu Set', 'dekoratif-beton-mermer-desen-oda-kokulu-set', '435154', 15, '', '1648388c62f2cc.png', 180, 0, NULL, NULL, 18, 1, 60, 2, 'Dekoratif ,Beton Mermer Desen, Oda Kokulu Set', 'Ev ve yaşam', 16, 1, '2023-06-14'),
(17, 'Soyut Cennnet Çiçekli Kanvas Tablo', 'soyut-cennnet-cicekli-kanvas-tablo', '521532', 15, '', '1648389a3849b3.png', 120, 0, 99, 99, 18, 1, 24, 2, 'Soyut Cennnet Çiçe?i Kanvas Tablo', 'Soyut Cennnet Çiçe?i Kanvas Tablo', 17, 1, '2023-06-09'),
(18, 'Kanvas Duvar Tablosu 3\\\'lü Canvas Tablo Seti', 'kanvas-duvar-tablosu-3-lu-canvas-tablo-seti', '45121', 15, '', '1648389dc89900.png', 660, 0, 499, 99, 18, 1, 45, 2, 'Kanvas Duvar Tablosu 3\\\'lü Canvas Tablo Seti', 'Kanvas Duvar Tablosu 3\\\'lü Canvas Tablo Seti', 18, 1, '2023-06-09'),
(19, 'Pane Eskitme Modern Led Avize', 'pane-eskitme-modern-led-avize', '57425', 15, '', '164838d263c1b4.jpg', 460, 0, 399, 99, 18, 1, 45, NULL, 'Led Avize', 'Pane Eskitme Modern Led Avize Gün Işığı Salon Mutfak Oda Hol Ledli Avize Yemek Masası Led Avize', 19, 1, '2023-06-15'),
(20, 'Gardenya Beyaz Ceviz  Modern Dekoratif Lambader', 'gardenya-beyaz-ceviz-modern-dekoratif-lambader', '4651532', 15, '', '164838da47a454.png', 679, 99, NULL, NULL, 18, 1, 62, NULL, 'Lambader,Dekoratif', 'Gardenya Beyaz Ceviz 3 Kat Raflı Modern Dekoratif Ahşap Mdf Lambader', 20, 1, '2023-06-15'),
(21, 'Aplik', 'aplik', '224515', 15, '', '164838e7d9e6ac.png', 760, 0, NULL, NULL, 18, 1, 24, NULL, 'Aplik , ev ve ya?am, dekoratif', 'Aplik / 120 Cm / Antrasit Kasa / 3 Renk Yanar /Aplik120', 21, 1, '2023-06-09'),
(22, 'Sevgili Vazo', 'sevgili-vazo', '63565', 15, '', '164838fc3abafd.png', 240, 0, NULL, NULL, 18, 1, 42, NULL, 'Sevgili Vazo, Mermer Desen Dekoratif ,Ev Aksesuar', 'Sevgili Vazo Mermer Desen Dekoratif Ev Aksesuar Sevgilivazo', 22, 1, '2023-06-09'),
(23, 'Mini Pampas Kuru Çiçek Vazosu Fresh Soft Oda Kokusu', 'mini-pampas-kuru-cicek-vazosu-fresh-soft-oda-kokusu', '453136', 15, '', '164839073c0bc6.png', 70, 0, NULL, NULL, 18, 1, 3, NULL, 'Oda Kokusu,Çiçek Vazosu', 'Dekoratif Mini Pampas Kuru Çiçek Vazosu Fresh Soft Oda Kokusu', 23, 1, '2023-06-09'),
(24, 'Ayıcıklı Uçan Balonlar Sticker Seti', 'ayicikli-ucan-balonlar-sticker-seti', '52412', 15, '', '1648391c8a76dd.png', 98, 99, NULL, NULL, 18, 1, 12, NULL, 'Ayıcıklı Uçan Balonlar ,Uçan Balon, Çocuk Odası,Duvar Sticker Seti', 'Ayıcıklı Uçan Balonlar Uçan Balon Çocuk Odası Duvar Sticker Seti', 24, 1, '2023-06-15'),
(25, 'Yuvarlak Boho Çizgisel Çiçekli Dekoratif Duvar Sticker', 'yuvarlak-boho-cizgisel-cicekli-dekoratif-duvar-sticker', '344354', 15, '', '164839203c893a.png', 79, 0, NULL, NULL, 18, 1, 42, NULL, 'Boho Çizgisel, Çiçekli Dekoratif ,Duvar Sticker', 'Yuvarlak Boho Çizgisel Çiçekli Dekoratif Duvar Sticker', 25, 1, '2023-06-09'),
(26, 'CAM Baharat Haritası, Tezgah Ankastre Arkası Koruyucu', 'cam-baharat-haritasi-tezgah-ankastre-arkasi-koruyucu', '25434354', 15, '', '16483928ce8fd0.png', 400, 0, NULL, NULL, 18, 1, 46, NULL, 'CAM Baharat Haritası, Tezgah Ankastre Arkası Koruyucu', 'CAM Baharat Haritası, Tezgah Ankastre Arkası Koruyucu', 26, 1, '2023-06-14'),
(27, 'Cam Dekoratif Yuvarlak Ayna Beyaz 58 Cm', 'cam-dekoratif-yuvarlak-ayna-beyaz-58-cm', '2521', 15, '', '1648393ca10b5e.png', 300, 0, 254, 99, 18, 1, 41, 1, 'Cam Dekoratif ,Yuvarlak Ayna Beyaz ,58 Cm', 'Cam Dekoratif Yuvarlak Ayna Beyaz 58 Cm', 27, 1, '2023-06-09'),
(28, 'Pamuk Penye Oversize Van Gogh Tshirt', 'pamuk-penye-oversize-van-gogh-tshirt', '42415352', 18, '', '16483950b44bc1.png', 56, 0, NULL, NULL, 18, 1, 34, 1, 'Pamuk Penye, Kuma? ,Oversize ,Van Gogh Bask?l? Beyaz Tshirt', 'Pamuk Penye Kuma? Oversize Van Gogh Bask?l? Beyaz Tshirt', 28, 1, '2023-06-09'),
(29, 'Unisex Siyah Netherlands Oversize Bisiklet Yaka', 'unisex-siyah-netherlands-oversize-bisiklet-yaka', '53412', 18, '', '164839574195b8.png', 129, 99, NULL, NULL, 18, 1, 34, 1, 'Unisex ,Siyah ,Netherlands Bask?l? Oversize, Bisiklet Yaka, ti?ört', 'Unisex Siyah Netherlands Bask?l? Oversize Bisiklet Yaka', 29, 1, '2023-06-09'),
(30, 'Spectacular Petrol Ye?ili Oversize Salas Boyfriend Kad?n T-shirt', 'spectacular-petrol-yeili-oversize-salas-boyfriend-kadn-t-shirt', '451244', 18, '', '164839636ea4d0.png', 100, 0, NULL, NULL, 18, 1, 1, 1, 'Spectacular ,Petrol Ye?ili ,Oversize ,Salas Boyfriend Kad?n T-shirt', 'Spectacular Petrol Ye?ili Oversize Salas Boyfriend Kad?n T-shirt', 30, 1, '2023-06-09'),
(31, 'Minimal Kalp Bask?l? Oversize Tshirt', 'minimal-kalp-baskili-oversize-tshirt', '115534', 18, '', '1648396a819805.png', 115, 0, NULL, NULL, 18, 1, 6, 1, 'Minimal Kalp Bask?l?, Oversize Tshirt', 'Minimal Kalp Bask?l? Oversize Tshirt', 31, 1, '2023-06-09'),
(32, 'Minimal Kalp Bask?l? Oversize Tshirt', 'minimal-kalp-baskl-oversize-tshirt', '433546', 18, '', '16483976b3f944.png', 79, 99, NULL, NULL, 18, 1, 19, NULL, 'Minimal Kalp Bask?l?, Oversize Tshirt', 'Minimal Kalp Bask?l? Oversize Tshirt', 32, 1, '2023-06-09'),
(33, 'Kad?n Bej Kad?n Figür Bask?l? Oversize Bisiklet Yaka Tshirt', 'kadin-bej-kadin-figur-baskili-oversize-bisiklet-yaka-tshirt', '531341', 18, '', '1648397eadef11.png', 120, 0, 96, 17, 18, 1, 34, 1, 'Kad?n, Bej Kad?n Figür Bask?l?, Oversize ,Bisiklet Yaka Tshirt', 'Kad?n Bej Kad?n Figür Bask?l? Oversize Bisiklet Yaka Tshirt', 33, 1, '2023-06-09'),
(34, 'NBA Logolu Oversize T-shirt', 'nba-logolu-oversize-t-shirt', '4254553', 18, '', '16483984cee7d6.png', 69, 14, NULL, NULL, 18, 1, 19, NULL, 'NBA Logolu Oversize T-shirt', 'NBA Logolu Oversize T-shirt', 34, 1, '2023-06-15'),
(35, 'Erkek Lacivert  Oversize T-shirt', 'erkek-lacivert-oversize-t-shirt', '453843', 18, '', '16483991e2d8da.png', 250, 0, NULL, NULL, 18, 1, 45, NULL, 'Erkek Lacivert %100 Pamuk Bisiklet Yaka Arkas? Bask?l? Oversize T-shirt', 'Erkek Lacivert %100 Pamuk Bisiklet Yaka Arkas? Bask?l? Oversize T-shirt', 35, 1, '2023-06-09'),
(36, 'Erkek Siyah Oversize Dawn Bask?l? T-shirt', 'erkek-siyah-oversize-dawn-baskili-t-shirt', '424242', 18, '', '1648399e49e6a1.png', 200, 0, 140, 0, 18, 1, 44, NULL, 'Erkek Siyah Oversize Dawn Bask?l? T-shirt', 'Erkek Siyah Oversize Dawn Bask?l? T-shirt', 36, 1, '2023-06-09'),
(38, 'Tommy Jeans Erkek Classic Fit Essential Polo', 'tommy-jeans-erkek-classic-fit-essential-polo', '424584', 18, '', '164839ba0a3441.png', 68, 0, NULL, NULL, 18, 1, 16, NULL, 'Tommy Jeans Erkek Classic Fit Essential Polo', 'Tommy Jeans Erkek Classic Fit Essential Polo', 38, 1, '2023-06-15'),
(39, 'Wolfers- Siyah Ön Ve Arka Baskılı Oversize T-shirt', 'wolfers--siyah-on-ve-arka-baskili-oversize-t-shirt', '543543', 18, '', '164839c0f9afe4.png', 79, 99, NULL, NULL, 18, 1, 64, NULL, 'Wolfers- Siyah Ön Ve Arka Baskılı %100 Orjinal Pamuk Oversize T-shirt', 'Wolfers- Siyah Ön Ve Arka Baskılı %100 Orjinal Pamuk Oversize T-shirt', 39, 1, '2023-06-15'),
(40, 'Unisex Lacivert Beyaz Günlük Rahat Spor Ayakkabı Sneaker', 'unisex-lacivert-beyaz-gunluk-rahat-spor-ayakkabi-sneaker', '5438745', 19, '', '164839cd5d2ddc.png', 360, 0, NULL, NULL, 18, 1, 24, NULL, 'Unisex Lacivert Beyaz Günlük Rahat Spor Ayakkabı Sneaker', 'Unisex Lacivert Beyaz Günlük Rahat Spor Ayakkabı Sneaker', 40, 1, '2023-06-15'),
(41, 'Vn Sneaker Siyah', 'vn-sneaker-siyah', '54534', 19, '', '164839d0322209.png', 160, 0, NULL, NULL, 18, 1, 64, NULL, 'Vn Sneaker Siyah', 'Vn Sneaker Siyah', 41, 1, '2023-06-09'),
(42, 'Kadın Spor Ayakkabı', 'kadin-spor-ayakkabi', '25425', 19, '', '164839d2cf2995.png', 799, 99, NULL, NULL, 18, 1, 65, NULL, 'Kadın Spor Ayakkabı', 'Kadın Spor Ayakkabı', 42, 1, '2023-06-15'),
(44, 'LOVE Kadın Ayakkabı', 'love-kadin-ayakkabi', '545554', 19, '', '164839dfe83cfe.png', 700, 0, NULL, NULL, 18, 1, 35, NULL, 'LOVE Kadın Ayakkabı', 'LOVE Kadın Ayakkabı', 44, 1, '2023-06-15'),
(45, 'Erkek Sneaker Günlük Spor Ayakkabı', 'erkek-sneaker-gunluk-spor-ayakkabi', '425424', 19, '', '164839eb6e8507.png', 500, 0, NULL, NULL, 18, 1, 54, NULL, 'Erkek Sneaker Günlük Spor Ayakkabı', 'Erkek Sneaker Günlük Spor Ayakkabı', 45, 1, '2023-06-15'),
(46, 'Wlkpower Beyaz Erkek Günlük Spor Ayakkabı', 'wlkpower-beyaz-erkek-gunluk-spor-ayakkabi', '53435454', 19, '', '164839ef24824c.png', 400, 0, NULL, NULL, 18, 1, 52, NULL, 'Wlkpower Beyaz Erkek Günlük Spor Ayakkabı', 'Wlkpower Beyaz Erkek Günlük Spor Ayakkabı', 46, 1, '2023-06-15'),
(47, 'La Roche-posay Yağlı Ciltler İçin Dolgunlaştırıcı Cilt Bakım Seti', 'la-roche-posay-yagli-ciltler-icin-dolgunlastirici-cilt-bakim-seti', '4254', 13, '', '164839fd7e0c8b.png', 459, 90, NULL, NULL, 18, 1, 35, NULL, 'La Roche-posay Yağlı Ciltler İçin Dolgunlaştırıcı Cilt Bakım Seti', 'La Roche-posay Yağlı Ciltler İçin Dolgunlaştırıcı Cilt Bakım Seti', 47, 1, '2023-06-15'),
(48, 'La Roche-posay Güneş Bakım Seti:anthelios Uvmune Yüz Güneş Kremi 50ml&termal Su 50ml', 'la-roche-posay-gunes-bakim-seti-anthelios-uvmune-yuz-gunes-kremi-50ml-termal-su-50ml', '425455', 13, '', '16483a008ada77.png', 400, 0, 349, 99, 18, 1, 34, NULL, 'La Roche-posay Güneş Bakım Seti:anthelios Uvmune Yüz Güneş Kremi 50ml&termal Su 50ml', 'La Roche-posay Güneş Bakım Seti:anthelios Uvmune Yüz Güneş Kremi 50ml&termal Su 50ml', 48, 1, '2023-06-15'),
(49, 'Nemlendirici Canlandırıcı Peeling Etkili Serum Seti', 'nemlendirici-canlandirici-peeling-etkili-serum-seti', '54354212', 13, '', '16483a05e30a08.png', 420, 0, 374, 25, 18, 1, 35, NULL, 'Nemlendirici Canlandırıcı Peeling Etkili Serum Seti', 'Nemlendirici Canlandırıcı Peeling Etkili Serum Seti', 49, 1, '2023-06-15'),
(50, 'Instant Anti Age Eraser Kapatıcı - 01 Light', 'instant-anti-age-eraser-kapatici---01-light', '215421', 13, '', '16483a110b8a58.png', 164, 95, NULL, NULL, 18, 1, 19, NULL, 'Instant Anti Age Eraser Kapatıcı - 01 Light', 'Instant Anti Age Eraser Kapatıcı - 01 Light', 50, 1, '2023-06-15'),
(51, 'Flormar Yumuşak Dokulu Stik Kontür (Orta Ton) - Stick Contour - 002', 'flormar-yumusak-dokulu-stik-kontur-orta-ton---stick-contour---002', '2141114', 13, '', '16483a13eb702b.png', 160, 0, NULL, NULL, 18, 1, 24, NULL, 'Flormar Yumuşak Dokulu Stik Kontür (Orta Ton) - Stick Contour - 002', 'Flormar Yumuşak Dokulu Stik Kontür (Orta Ton) - Stick Contour - 002', 51, 1, '2023-06-15'),
(52, 'Lash Sensational Yelpaze Etkili Intense Black Maskara', 'lash-sensational-yelpaze-etkili-intense-black-maskara', '534121', 13, '', '16483a162c85ac.png', 140, 0, NULL, NULL, 18, 1, 52, NULL, 'Lash Sensational Yelpaze Etkili Intense Black Maskara', 'Lash Sensational Yelpaze Etkili Intense Black Maskara', 52, 1, '2023-06-09'),
(53, 'L\\\'oréal Paris Glow Paradise Balm-in-lipstick - Işıltı Veren Ruj 111 Pink Wonderland', 'l-or-al-paris-glow-paradise-balm-in-lipstick---isilti-veren-ruj-111-pink-wonderland', '543245', 13, '', '16483a18d7be74.png', 170, 0, NULL, NULL, 18, 1, 55, NULL, 'L\\\'oréal Paris Glow Paradise Balm-in-lipstick - Işıltı Veren Ruj 111 Pink Wonderland', 'L\\\'oréal Paris Glow Paradise Balm-in-lipstick - Işıltı Veren Ruj 111 Pink Wonderland', 53, 1, '2023-06-15'),
(54, 'Maybelline New York Nudes Of New York Göz Farı Nudes of New York', 'maybelline-new-york-nudes-of-new-york-goz-fari-nudes-of-new-york', '5435311', 13, '', '16483a1ae02a04.png', 190, 0, NULL, NULL, 18, 1, 35, NULL, 'Maybelline New York Nudes Of New York Göz Farı Nudes of New York', 'Maybelline New York Nudes Of New York Göz Farı Nudes of New York', 54, 1, '2023-06-14'),
(55, 'Flormar 4\\\'lü Makyaj Fırçası Seti (Allık-Fondöten-Far-Crease) - Makeup Brush Set', 'flormar-4-lu-makyaj-fircasi-seti-allik-fondoten-far-crease---makeup-brush-set', '54413', 13, '', '16483a1d087dca.png', 150, 0, NULL, NULL, 18, 1, 24, NULL, 'Flormar 4\\\'lü Makyaj Fırçası Seti (Allık-Fondöten-Far-Crease) - Makeup Brush Set', 'Flormar 4\\\'lü Makyaj Fırçası Seti (Allık-Fondöten-Far-Crease) - Makeup Brush Set', 55, 1, '2023-06-14'),
(56, 'Yves Saint Laurent Libre Edp 50 ml Kadın Parfüm', 'yves-saint-laurent-libre-edp-50-ml-kadin-parfum', '54212', 13, '', '16483a27253831.png', 1468, 0, NULL, NULL, 18, 1, 19, NULL, 'Yves Saint Laurent Libre Edp 50 ml Kadın Parfüm', 'Yves Saint Laurent Libre Edp 50 ml Kadın Parfüm', 56, 1, '2023-06-14'),
(57, 'La Vie Est Belle Hypnose Drama 2\\\'li Set', 'la-vie-est-belle-hypnose-drama-2-li-set', '2453245', 13, '', '16483a2adbe4e7.png', 1570, 0, 1449, 99, 18, 1, 28, NULL, 'La Vie Est Belle Hypnose Drama 2\\\'li Set', 'La Vie Est Belle Hypnose Drama 2\\\'li Set', 57, 1, '2023-06-09'),
(58, 'Versace Dylan Blue Edt 200 ml Erkek Parfüm', 'versace-dylan-blue-edt-200-ml-erkek-parfum', '215445312', 13, '', '16483a347deb5a.png', 1612, 0, NULL, NULL, 18, 1, 53, NULL, 'Versace Dylan Blue Edt 200 ml Erkek Parfüm', 'Versace Dylan Blue Edt 200 ml Erkek Parfüm', 58, 1, '2023-06-10'),
(59, 'Razer DeathAdder V2 mini USB oyun faresi: 8500 K DPI optik sensör, 62 g hafif tasarım, krom RGB aydınlatma, 6 programlanabilir tuş, kaymaz tutma bandı, klasik siyah', 'razer-deathadder-v2-mini-usb-oyun-faresi-8500-k-dpi-optik-sensor-62-g-hafif-tasarim-krom-rgb-aydinlatma-6-programlanabilir-tus-kaymaz-tutma-bandi-klasik-siyah', '75675', 23, '<ul class=\\\"a-unordered-list a-vertical a-spacing-mini\\\" style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \\\" amazon=\\\"\\\" ember\\\",=\\\"\\\" arial,=\\\"\\\" sans-serif;=\\\"\\\" font-size:=\\\"\\\" 14px;\\\"=\\\"\\\"><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">ABD\\\'de en çok satılan oyun çevre birimleri üreticisi: Kaynak: The NPD Group, Inc. ABD. Perakende izleme hizmeti, klavye, fare, bilgisayar kulaklığı/PC mikrofonu, oyun tasarımı, dolar satışlarına dayalı, 2017 – 2021.</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">8.500 dpi yüksek hassasiyetli optik sensör: Oyunlar ve yaratıcı çalışma için özel dpi tuşları (yeniden programlanabilir) sayesinde anında hassasiyet ayarı sağlar.</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">Geleneksel mekanik anahtarlardan 3 kat daha hızlı: Razer optik fare anahtarları ışık püskürtmesine dayalı bir çalıştırma kullanır ve düğme tuşlarını ışık hızında kaydeder.</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">Sürükleyici, özelleştirilebilir Chroma-RGB aydınlatma: Entegre önceden ayarlanmış profillerle 16,8 milyon rengi destekler; oyun ve Razer Chroma özellikli çevre birimleri ve Philips Hue ürünleri ile senkronize edilmiştir</span></li><li style=\\\"list-style: disc; overflow-wrap: break-word; margin: 0px;\\\"><span class=\\\"a-list-item\\\">6 programlanabilir tuş: Razer Synapse 3 üzerinden tuşların yeniden yerleştirilmesini ve karmaşık makro fonksiyonların atanmasını sağlar; Kablosuz benzeri performans için çekme gerektirmeyen kablo: Razer Speedflex kablosu fare kablo tutucusunu gereksiz kılar ve mutlak kontrol için ağırlık ve direnci önemli ölçüde azaltır.</span></li></ul>', '164845ca650841.jpg', 704, 78, NULL, NULL, 18, 1, 20, 1, 'Razer DeathAdder V2 mini USB oyun faresi: 8500 K DPI optik sensör, 62 g hafif tasarım, krom RGB aydınlatma, 6 programlanabilir tuş, kaymaz tutma bandı, klasik siyah', 'Razer DeathAdder V2 mini USB oyun faresi: 8500 K DPI optik sensör, 62 g hafif tasarım, krom RGB aydınlatma, 6 programlanabilir tuş, kaymaz tutma bandı, klasik siyah', 59, 1, '2023-06-14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunvaryasyonlari`
--

DROP TABLE IF EXISTS `urunvaryasyonlari`;
CREATE TABLE IF NOT EXISTS `urunvaryasyonlari` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `urunID` double DEFAULT NULL,
  `baslik` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunvaryasyonlari`
--

INSERT INTO `urunvaryasyonlari` (`ID`, `urunID`, `baslik`, `tarih`) VALUES
(1, 4, 'Numara', '2023-05-16'),
(2, 4, 'Renk', '2023-05-16'),
(3, 5, 'Beden', '2023-05-16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunvaryasyonsecenekleri`
--

DROP TABLE IF EXISTS `urunvaryasyonsecenekleri`;
CREATE TABLE IF NOT EXISTS `urunvaryasyonsecenekleri` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `urunID` double DEFAULT NULL,
  `varyasyonID` int DEFAULT NULL,
  `baslik` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunvaryasyonsecenekleri`
--

INSERT INTO `urunvaryasyonsecenekleri` (`ID`, `urunID`, `varyasyonID`, `baslik`, `tarih`) VALUES
(1, 4, NULL, '40', '2023-05-16'),
(2, 4, NULL, '41', '2023-05-16'),
(3, 4, NULL, '42', '2023-05-16'),
(4, 4, NULL, '43', '2023-05-16'),
(5, 4, NULL, 'Siyah', '2023-05-16'),
(6, 4, NULL, 'Kırmızı', '2023-05-16'),
(7, 4, NULL, 'S', '2023-05-16'),
(8, 4, NULL, 'M', '2023-05-16'),
(9, 4, NULL, 'L', '2023-05-16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunvaryasyonstoklari`
--

DROP TABLE IF EXISTS `urunvaryasyonstoklari`;
CREATE TABLE IF NOT EXISTS `urunvaryasyonstoklari` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `urunID` double DEFAULT NULL,
  `varyasyonID` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `secenekID` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunvaryasyonstoklari`
--

INSERT INTO `urunvaryasyonstoklari` (`ID`, `urunID`, `varyasyonID`, `secenekID`, `stok`, `tarih`) VALUES
(1, 4, '1', '1', 10, '2023-05-16'),
(2, 4, '1', '2', 10, '2023-05-16'),
(3, 4, '1', '3', 10, '2023-05-16'),
(4, 4, '1', '4', 10, '2023-05-16'),
(5, 4, '2@3', '5@7', 12, '2023-05-16'),
(6, 4, '2@3', '5@8', 11, '2023-05-16'),
(7, 4, '2@3', '5@9', 8, '2023-05-16'),
(8, 4, '2@3', '6@7', 13, '2023-05-16'),
(9, 4, '2@3', '6@8', 10, '2023-05-16'),
(10, 4, '2@3', '6@9', 9, '2023-05-16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ad` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `soyad` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `sifre` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `ilce` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `ilID` int DEFAULT NULL,
  `postakodu` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `telefon` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `firmaadi` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `vergidairesi` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `vergino` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tipi` int DEFAULT NULL,
  `durum` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE IF NOT EXISTS `yorumlar` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `uyeID` int DEFAULT NULL,
  `urunID` int DEFAULT NULL,
  `puan` int DEFAULT NULL,
  `metin` mediumtext COLLATE utf8mb4_turkish_ci,
  `durum` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ziyaretciler`
--

DROP TABLE IF EXISTS `ziyaretciler`;
CREATE TABLE IF NOT EXISTS `ziyaretciler` (
  `ID` double NOT NULL AUTO_INCREMENT,
  `IP` varchar(20) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tekil` int DEFAULT NULL,
  `cogul` int DEFAULT NULL,
  `tarayici` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `xr` int DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ziyarettarayici`
--

DROP TABLE IF EXISTS `ziyarettarayici`;
CREATE TABLE IF NOT EXISTS `ziyarettarayici` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `tarayici` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `ziyaret` double NOT NULL,
  `hiz` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ziyarettarayici`
--

INSERT INTO `ziyarettarayici` (`ID`, `tarayici`, `ziyaret`, `hiz`) VALUES
(1, 'chrome', 1, NULL),
(2, 'explorer', 1, NULL),
(3, 'firefox', 1, NULL),
(4, 'diger', 1, NULL),
(5, 'sayfahizi', 4, '2.86');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

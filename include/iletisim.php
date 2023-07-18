<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<body>

    <!-- Bootstrap Responsive İletişim Formu Start *** -->
    <br /> <!-- Bir satır boşluk -->
    <h1 style="text-align:center;">İletişim Formu</h1> <!-- Form başlığı -->
    <br /> <!-- Bir satır boşluk -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div> <!-- 4 sütun Sol Tarafa Boş Verdik -->
            <div class="col-md-4"> <!-- 4 Sütun Ortaladık Başlangıcı -->

                <form action="" method="post"> <!-- Form Başlangıcı -->

                    <div class="form-group"> <!-- Ad Soyad Text Alanı -->
                        <input required="required" name="AdiSoyadi" type="text" class="form-control"
                            placeholder="Adınız ve Soyadınız">
                        <small class="form-text text-muted">Lütfen adınızı ve soyadınızı girin.</small>
                    </div> <!-- Ad Soyad Text Alanı Bitti -->

                    <div class="form-group"> <!-- Mail Adresi Text Alanı -->
                        <input required="required" name="MailAdresi" type="email" class="form-control"
                            placeholder="E-Posta Adresiniz">
                        <small class="form-text text-muted">Lütfen mail adresinizi girin.</small>
                    </div> <!-- Mail Adresi Text Alanı Bitti -->

                    <div class="form-group"> <!-- Mesaj Konusu Text Alanı -->
                        <input required="required" name="MesajKonusu" type="text" class="form-control"
                            placeholder="Mesajınızın Konusu">
                        <small class="form-text text-muted">Lütfen mesajınızın konusunu girin.</small>
                    </div> <!-- Mesaj Konusu Text Alanı Bitti -->

                    <div class="form-group"> <!-- Mesaj Text Alanı -->
                        <textarea rows="6" cols="10" name="Mesaj" required="required" class="form-control"
                            placeholder="Mesajınızını Yazın"></textarea>
                    </div> <!-- Mesaj Text Alanı Bitti -->

                    <button type="reset" class="btn btn-success">Temizle</button> <!-- Form Temizleme Butonu -->
                    <button type="submit" class="btn btn-primary">Gönder</button> <!-- Form Gönderme Butonu -->

                </form> <!-- Form Bitiş -->

            </div> <!-- 6 Sütun Ortaladık Tamamlandı -->
            <div class="col-md-4"></div> <!-- 4 sütun Sol Tarafa Boş Verdik -->
        </div>
    </div>
    <!-- Bootstrap Responsive İletişim Formu End *** -->

</body>

</html>



<?php
error_reporting(0); //Hataları Gizle
//Form'dan Bütün Değerler Post Methodu ile Çekiliyor
$AdiSoyadi = trim(strip_tags($_POST['AdiSoyadi']));
$MailAdresi = trim(strip_tags($_POST['MailAdresi']));
$MesajKonusu = trim(strip_tags($_POST['MesajKonusu']));
$Mesaj = trim(strip_tags($_POST['Mesaj']));
//Form'dan Bütün Değerler Post Methodu ile Çekiliyor Tamamlandı


if($AdiSoyadi and $MailAdresi and $MesajKonusu and $Mesaj){ //Form'dan bütün değerler geliyorsa mail gönderme işlemini başlatıyoruz.

    $Mesaj = "
    Adı soyadı: $AdiSoyadi <br>
    Mail Adresi : $MailAdresi <br>
    Mail Konusu : $MesajKonusu <br>
    Mesaj : $Mesaj <br>
    ";

    //Php Smtp Mailler Sınıfını Sayfaya Dahil Ediyoruz
    include('phpmail/class.phpmailer.php');
    include('phpmail/class.smtp.php');
    //Php Smtp Mailler Sınıfını Sayfaya Dahil Ediyoruz Tamamlandı

    //Mail Bağlantı Ayarları 
    //Mail Hangi Hesaptan Gönderilecek ise onun bilgilerini yazın.
    $MailSmtpHost = "smtp.gmail.com";
    $MailUserName = "test121312@gmail.com";
    $MailPassword = "password";
    //Mail Bağlantı Ayarları Tamamlandı

    //Doldurulan Form Mail Olarak Kime Gidecek?
    $MailKimeGidecek = "test121312@gmail.com";
    //Doldurulan Form Mail Olarak Kime Gidecek Tamamlandı

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $MailSmtpHost; //Smtp Host
    $mail->SMTPSecure = 'ssl'; //yada tls
    $mail->Port = 465; //SSL kullanacaksanız portu 465 olarak değiştiriniz - TLS Portu 587
    $mail->Username = $MailUserName; //Smtp Kullanıcı Adı
    $mail->Password = $MailPassword; //Smtp Parola
    $mail->SetFrom($mail->Username, 'Admin');
    $mail->AddAddress("$MailKimeGidecek", 'Üye'); //Mailin Gideceği Adres ve Alıcı Adı
    $mail->CharSet = 'UTF-8'; //Mail Karakter Seti
    $mail->Subject = $MesajKonusu; //Mail Konu Başlığı
    $mail->MsgHTML("$Mesaj"); //Mail Mesaj İçeriği
    if ($mail->Send()) {
        echo '<script>alert("Mail gönderildi!");</script>';
        echo '<script>document.location=""</script>';
    } else {
        echo 'Mail gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
    }


} //Mail gönderme işlemi tamamlandı end.if

?>



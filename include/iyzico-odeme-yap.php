<?php
$siparisKodu=$sipariskodu;

/***********************************************/

include_once('IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("Api Key Buraya Gelecek");
        $options->setSecretKey("Secret Key Buraya Gelecek");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options;
    }
}


$ilBilgisi=$VT->VeriGetir("il","WHERE ID=?",array($uyebilgisi[0]["ilID"]),"ORDER BY ID ASC");
if($ilBilgisi!=false)
{
    $ilAdi=$ilBilgisi[0]["ADI"];
}
else{$ilAdi="Belirtilmedi";}

if($uyebilgisi[0]["tipi"]==1)
{
        /*Bireysel bir üye ise */
        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("ETC".$uyebilgisi[0]["ID"]."");
        $buyer->setName("".$uyebilgisi[0]["ad"]."");
        $buyer->setSurname("".$uyebilgisi[0]["soyad"]."");
        $buyer->setGsmNumber("+90".$uyebilgisi[0]["telefon"]."");
        $buyer->setEmail("".$uyebilgisi[0]["mail"]."");
        $buyer->setIdentityNumber("".rand(1000,9999).$uyebilgisi[0]["ID"]."");
        $buyer->setLastLoginDate(date("Y-m-d H:i:s"));
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("".$uyebilgisi[0]["adres"]." ".$uyebilgisi[0]["ilce"]."");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("".$ilAdi."");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("".$uyebilgisi[0]["postakodu"]."");


        $shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName("".$uyebilgisi[0]["ad"]." ".$uyebilgisi[0]["soyad"]."");
$shippingAddress->setCity("".$ilAdi."");
$shippingAddress->setCountry("Turkey");
$shippingAddress->setAddress("".$uyebilgisi[0]["adres"]." ".$uyebilgisi[0]["ilce"]."");
$shippingAddress->setZipCode("".$uyebilgisi[0]["postakodu"]."");


$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName("".$uyebilgisi[0]["ad"]." ".$uyebilgisi[0]["soyad"]."");
$billingAddress->setCity("".$ilAdi."");
$billingAddress->setCountry("Turkey");
$billingAddress->setAddress("".$uyebilgisi[0]["adres"]." ".$uyebilgisi[0]["ilce"]."");
$billingAddress->setZipCode("".$uyebilgisi[0]["postakodu"]."");


}
else
{
    $buyer = new \Iyzipay\Model\Buyer();
    $buyer->setId("ETC".$uyebilgisi[0]["ID"]."");
    $buyer->setName("".$uyebilgisi[0]["firmaadi"]."");
    $buyer->setSurname("".$uyebilgisi[0]["vergino"]."");
    $buyer->setGsmNumber("+90".$uyebilgisi[0]["telefon"]."");
    $buyer->setEmail("".$uyebilgisi[0]["mail"]."");
    $buyer->setIdentityNumber("".rand(1000,9999).$uyebilgisi[0]["ID"]."");
    $buyer->setLastLoginDate(date("Y-m-d H:i:s"));
    $buyer->setRegistrationDate("2013-04-21 15:12:09");
    $buyer->setRegistrationAddress("".$uyebilgisi[0]["adres"]." ".$uyebilgisi[0]["ilce"]."");
    $buyer->setIp("85.34.78.112");
    $buyer->setCity("".$ilAdi."");
    $buyer->setCountry("Turkey");
    $buyer->setZipCode("".$uyebilgisi[0]["postakodu"]."");


    $shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName("".$uyebilgisi[0]["firmaadi"]."");
$shippingAddress->setCity("".$ilAdi."");
$shippingAddress->setCountry("Turkey");
$shippingAddress->setAddress("".$uyebilgisi[0]["adres"]." ".$uyebilgisi[0]["ilce"]."");
$shippingAddress->setZipCode("".$uyebilgisi[0]["postakodu"]."");


$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName("".$uyebilgisi[0]["firmaadi"]."");
$billingAddress->setCity("".$ilAdi."");
$billingAddress->setCountry("Turkey");
$billingAddress->setAddress("".$uyebilgisi[0]["adres"]." ".$uyebilgisi[0]["ilce"]."");
$billingAddress->setZipCode("".$uyebilgisi[0]["postakodu"]."");



}


$globalsayac=0;
$basketItems = array();

$priceTutar=0;

/********************* */
foreach ($_SESSION["sepet"] as $urunID => $bilgi) {
    $urunbilgisi=$VT->VeriGetir("urunler","WHERE durum=? AND ID=?",array(1,$urunID),"ORDER BY ID ASC",1);
    if($urunbilgisi!=false)
    {

        if($bilgi["varyasyondurumu"]!=false)
        {
if(!empty($_SESSION["sepetVaryasyon"]))
{
foreach ($_SESSION["sepetVaryasyon"][$urunbilgisi[0]["ID"]] as $secenekID => $secenekAdet) {

$stokTablo=$VT->VeriGetir("urunvaryasyonstoklari","WHERE ID=? AND urunID=?",array($secenekID,$urunbilgisi[0]["ID"]),"ORDER BY ID ASC",1);
if($stokTablo!=false)
{
$varyasyonOzellikleri="";
$varyasyonID=$stokTablo[0]["varyasyonID"];
$secimID=$stokTablo[0]["secenekID"];

if(!empty($urunbilgisi[0]["indirimlifiyat"]))
{
$fiyat=$urunbilgisi[0]["indirimlifiyat"].".".$urunbilgisi[0]["indirimlikurus"];
if($urunbilgisi[0]["kdvdurum"]==1)
{
    if($urunbilgisi[0]["kdvoran"]>9)
    {
        $oran="1.".$urunbilgisi[0]["kdvoran"];
    }
    else
    {
        $oran="1.0".$urunbilgisi[0]["kdvoran"];
    }
    $kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
}
else
{
    $kdvsizBirimfiyat=$fiyat;
}
}
else
{
$fiyat=$urunbilgisi[0]["fiyat"].".".$urunbilgisi[0]["kurus"];
if($urunbilgisi[0]["kdvdurum"]==1)
{
    if($urunbilgisi[0]["kdvoran"]>9)
    {
        $oran="1.".$urunbilgisi[0]["kdvoran"];
    }
    else
    {
        $oran="1.0".$urunbilgisi[0]["kdvoran"];
    }
    $kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
}
else
{
    $kdvsizBirimfiyat=$fiyat;
}
}
$toplamFiyat=($kdvsizBirimfiyat*$secenekAdet["adet"]);


$kategoriBilgisi=$VT->VeriGetir("kategoriler","WHERE ID=?",array($urunbilgisi[0]["kategori"]),"ORDER BY ID ASC",1);

$toplamFiyat=($kdvsizBirimfiyat*$bilgi["adet"]);
$firstBasketItem = new \Iyzipay\Model\BasketItem();
$firstBasketItem->setId("".$urunbilgisi[0]["urunkodu"]."");
$firstBasketItem->setName("".$urunbilgisi[0]["baslik"]."");
$firstBasketItem->setCategory1("".$kategoriBilgisi[0]["baslik"]."");
$firstBasketItem->setCategory2("".$kategoriBilgisi[0]["baslik"]."");
$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$firstBasketItem->setPrice("".number_format($kdvsizBirimfiyat,2,".","")."");
$basketItems[$globalsayac] = $firstBasketItem;
$globalsayac++;
$priceTutar=($priceTutar+number_format($kdvsizBirimfiyat,2,".",""));

    $toplamtutar=($fiyat*$secenekAdet["adet"]);


if($urunbilgisi[0]["kdvdurum"]==1)
{
/*KDV li fiyat*/

if($urunbilgisi[0]["kdvoran"]>9)
{
    $oran="1.".$urunbilgisi[0]["kdvoran"];
}
else
{
    $oran="1.0".$urunbilgisi[0]["kdvoran"];
}
$kdvlifiyat=$toplamtutar;
$kdvsizfiyat=($toplamtutar/$oran);/*kdvsiz hali*/
$kdvtutari=($toplamtutar-$kdvsizfiyat);/*KDV Fiyatı*/
if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
$sepetTutar=($sepetTutar+$kdvlifiyat);
}
else
{
/*KDV Hariç Fiyat*/
$oran=$urunbilgisi[0]["kdvoran"];
$kdvsizfiyat=$toplamtutar;
$kdvtutari=(($kdvsizfiyat*$oran)/100);
$kdvlifiyat=($kdvsizfiyat+$kdvtutari);
if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
$sepetTutar=($sepetTutar+$kdvlifiyat);
}

}


}
}
        }
        else
        {

if(!empty($urunbilgisi[0]["indirimlifiyat"]))
{
$fiyat=$urunbilgisi[0]["indirimlifiyat"].".".$urunbilgisi[0]["indirimlikurus"];
if($urunbilgisi[0]["kdvdurum"]==1)
{
    if($urunbilgisi[0]["kdvoran"]>9)
    {
        $oran="1.".$urunbilgisi[0]["kdvoran"];
    }
    else
    {
        $oran="1.0".$urunbilgisi[0]["kdvoran"];
    }
    $kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
}
else
{
    $kdvsizBirimfiyat=$fiyat;
}
}
else
{
$fiyat=$urunbilgisi[0]["fiyat"].".".$urunbilgisi[0]["kurus"];
if($urunbilgisi[0]["kdvdurum"]==1)
{
    if($urunbilgisi[0]["kdvoran"]>9)
    {
        $oran="1.".$urunbilgisi[0]["kdvoran"];
    }
    else
    {
        $oran="1.0".$urunbilgisi[0]["kdvoran"];
    }
    $kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
}
else
{
    $kdvsizBirimfiyat=$fiyat;
}
}


$kategoriBilgisi=$VT->VeriGetir("kategoriler","WHERE ID=?",array($urunbilgisi[0]["kategori"]),"ORDER BY ID ASC",1);

$toplamFiyat=($kdvsizBirimfiyat*$bilgi["adet"]);
$firstBasketItem = new \Iyzipay\Model\BasketItem();
$firstBasketItem->setId("".$urunbilgisi[0]["urunkodu"]."");
$firstBasketItem->setName("".$urunbilgisi[0]["baslik"]."");
$firstBasketItem->setCategory1("".$kategoriBilgisi[0]["baslik"]."");
$firstBasketItem->setCategory2("".$kategoriBilgisi[0]["baslik"]."");
$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$firstBasketItem->setPrice("".number_format($kdvsizBirimfiyat,2,".","")."");
$basketItems[$globalsayac] = $firstBasketItem;
$globalsayac++;
$priceTutar=($priceTutar+number_format($kdvsizBirimfiyat,2,".",""));


$toplamtutar=($fiyat*$bilgi["adet"]);


if($urunbilgisi[0]["kdvdurum"]==1)
{
/*KDV li fiyat*/
if($urunbilgisi[0]["kdvoran"]>9)
{
    $oran="1.".$urunbilgisi[0]["kdvoran"];
}
else
{
    $oran="1.0".$urunbilgisi[0]["kdvoran"];
}
$kdvlifiyat=$toplamtutar;
$kdvsizfiyat=($toplamtutar/$oran);/*kdvsiz hali*/
$kdvtutari=($toplamtutar-$kdvsizfiyat);/*KDV Fiyatı*/
if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
$sepetTutar=($sepetTutar+$kdvlifiyat);
}
else
{
/*KDV Hariç Fiyat*/
$oran=$urunbilgisi[0]["kdvoran"];
$kdvsizfiyat=$toplamtutar;
$kdvtutari=(($kdvsizfiyat*$oran)/100);
$kdvlifiyat=($kdvsizfiyat+$kdvtutari);
if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
$sepetTutar=($sepetTutar+$kdvlifiyat);
}

        }

    
    }
}

$genelKDVTutar=0;
if($sepetkdvtutar1>0)
{
$genelKDVTutar=($genelKDVTutar+$sepetkdvtutar1);

}
if($sepetkdvtutar6>0)
{
$genelKDVTutar=($genelKDVTutar+$sepetkdvtutar6);
}
if($sepetkdvtutar8>0)
{
$genelKDVTutar=($genelKDVTutar+$sepetkdvtutar8);
}
if($sepetkdvtutar18>0)
{
$genelKDVTutar=($genelKDVTutar+$sepetkdvtutar18);
}

$_SESSION["siparisKodu"]=$sipariskodu;
/********************** */



$request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("".$siparisKodu."");
$request->setPrice("".number_format($priceTutar,2,".","").""); /*KDV siz hali */
$request->setPaidPrice("".number_format($sepetTutar,2,".","")."");/*Ödenecek Tutar */
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setBasketId("".$siparisKodu."");
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
$request->setCallbackUrl("http://localhost/eticaret/kk-odeme-sonuc");
$request->setEnabledInstallments(array(2, 3, 6, 9));
$request->setBuyer($buyer);
$request->setShippingAddress($shippingAddress);
$request->setBillingAddress($billingAddress);
$request->setBasketItems($basketItems);

$checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());
print_r($checkoutFormInitialize->getErrorMessage());
print_r($checkoutFormInitialize->getCheckoutFormContent());
?>
 <main class="bg_gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                <div id="iyzipay-checkout-form" class="responsive"></div>

                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

    </main>

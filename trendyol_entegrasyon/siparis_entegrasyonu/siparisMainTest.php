<html lang="en">
<head>
<style>
table, th, td {
border: 1px solid black;
}
</style>
<meta charset="UTF-8">
<title>Form</title>
</head>
<body>
<form action="" method="POST">
<label for="shipmentStatus">Sipariş Statüsünü Seçiniz:</label>

<select name="shipmentStatus" id="shipmentStatus">
<option value="Created">Created</option>
<option value="Invoiced">Invoiced</option>
<option value="Picking">Picking</option>
<option value="Shipped">Shipped</option>
<option value="Delivered">Delivered</option>
<option value="Returned">Returned</option>
<option value="UnDelivered">UnDelivered</option>

</select>
<button type="submit" name="sub" value="sub">Siparişleri Getir</button>
</form>
<ol>
<table style="width:85%">
<tr>
<th>SİPARİŞ KODU</th>
<th>ALICI</th>
<th>TESLİMAT ADRESİ</th>
<th>FATURA ADRESİ</th>
<th>ŞEHİR</th>
<th>KARGO TAKİP NO</th>
<th>ÜRÜN ADI</th>
<th>TOPLAM FİYAT</th>
<th>TESLİMAT TÜRÜ</th>
<th>İNDİRİM</th>
<th>KARGO FİRMASI</th>
</tr>
<?php
include("../../vendor/autoload.php");
include("../../trendyol_entegrasyon/Api.php");


$trendyol = new Trendyol();

if(isset($_POST['sub'])){
$status = $_POST['shipmentStatus'];//Created,Invoiced,Picking,Shipped,Delivered,Returned,UnDelivered
$size = 100; //max 200
$startDate = null; //bu tarihten sonraki, milisecond, long
$endDate = null; //bu tarihe kadar olan, milisecond, long
$orderByField = "PackageLastModifiedDate";//CreatedDate
$orderByDirection = "DESC"; //ASC


$getShipmentPackages = $trendyol->getShipmentPackages($status, $size, $startDate, $endDate, $orderByField, $orderByDirection);

$array = json_decode($getShipmentPackages, true);
for($i = 0; $i < count($array['content']); $i++){
echo "<tr>
<td>". $array['content'][$i]['orderNumber'] . "</td>
<td>". $array['content'][$i]['shipmentAddress']['fullName'] . "</td>
<td>". $array['content'][$i]['shipmentAddress']['fullAddress'] . "</td>
<td>". $array['content'][$i]['invoiceAddress']['fullAddress'] . "</td>
<td>". $array['content'][$i]['shipmentAddress']['city'] . "</td>
<td>". $array['content'][$i]['cargoTrackingNumber'] . "</td>
<td>";
for($j = 0; $j < count($array['content'][$i]['lines']); $j++){
echo "- " . $array['content'][$i]['lines'][$j]['productName'] ."\n";
}

echo "</td>
<td>". $array['content'][$i]['grossAmount'] . "</td>
<td>". $array['content'][$i]['totalDiscount'] . "</td>
<td>". $array['content'][$i]['grossAmount'] . "</td>
<td>". $array['content'][$i]['cargoProviderName'] . "</td>
</tr>";
}


}


?>
</table>
</ol>

</body>
</html>
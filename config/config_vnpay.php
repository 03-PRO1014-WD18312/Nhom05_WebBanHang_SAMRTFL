<?php

$vnp_TmnCode = "2G178M2F";
$vnp_HashSecret = "JHUWFGBQUZSULENSMDYXLPVWBIFLIQIX";
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/-Nhom05_WebBanHang_SAMRTFL/?module=cart&action=thank";
$vnp_apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/merchant.html";

$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

?>
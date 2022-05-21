<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v13.0/104796798912424?fields=name%2Cpicture&access_token=EAAOC2CKaNSMBAC2mY7hJtd3RE35zr8snDtHUAsr6BesZCgoYtRlu80aUyhJrTBiqfPI2wcGT2K2hkjuvd5NTH1bEcY6XteZBoS5k3jphjhYVzS7qsnYQs5oCn6aeeXiOh5HYJeiXXSPwnIdVKNRsHTP5QnZBYLmZBKBeBtAOKhR9UcAyL41S99D2P7pTvlAenfH6OxiuTwZDZD');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$result=json_decode($result);
echo '<pre>';
print r($result);
?>
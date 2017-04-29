<?php
 
/* == ID tài khoản muốn tăng share == */
$user = 'TimDz.Bro';
/* == Token tài khoản chứa page == */
$token = 'EAAAAAYsX7TsBAAaPlB4Pbg5qCr3vGZCyVL5alZBZAEd6fumCLzrKm1fkj4GxntvINBRNYF903viV48RuQpH825ffb0IZCuEXXIN14jKPOu3O2HCfP6qGy7ahcQ06e7GYZA3FmJzLcX1EMQO7eERFltL8DIGDmoKtZAX5CoQWtZAkN8DmOzPLv8ZAuZCZAUNho5pKK6uMhH12XoLgZDZD';
$accounts = json_decode(cURL('https://graph.facebook.com/me/accounts?access_token=' . $token),true);
 
$feed = json_decode(cURL('https://graph.facebook.com/' . $user . '/feed?access_token='.$token.'&limit=1'),true);
 
foreach ($accounts['data'] as $data) {
    //echo $data['access_token'] . '<br/>';
    echo cURL('https://graph.facebook.com/' . $feed['data'][0]['id'] . '/sharedposts?method=post&access_token='.$data['access_token']) . '<br/><br/><br/>';
}
 
/* == Hàm get == */
function cURL ($url) {
    $data = curl_init();
    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($data, CURLOPT_URL, $url);
    $hasil = curl_exec($data);
    curl_close($data);
    return $hasil;
}
 
?>
 
<meta http-equiv="refresh" content="0">

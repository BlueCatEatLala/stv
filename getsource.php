<?php
$id=$_GET['id'];
$url = "http://api.app.kankanews.com/kankan/v5/livePC/stream/live/?id=".$id."";
$header = array('Accept-Encoding: gzip, deflate', 'Connection: Keep-Alive', 'Host: api.app.kankanews.com','Referer: http://live.kankanews.com/huikan/');
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$content = curl_exec($ch);
curl_close($ch);
$result=base64_decode($content); 
preg_match('|pcstream":"(.*?)&rand=|i',$result,$m);
$liveurl = str_replace("\","",$m[1]);
header("Location: $liveurl"); 
/*id=上海东方卫视,id=800081
上海新闻综合,id=800084
上海星尚频道,id=800454
上海艺术人文,id=800453
上海外语频道,id=800089
上海娱乐频道,id=800090
上海纪实,id=800092
第一财*,id=800091
*/
?>

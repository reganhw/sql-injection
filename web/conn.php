<?
$server = "oracle";   // tnsnames.ora와 맞춘다.
$ora_id = "dev";      // 오라클 서버의 계정
$ora_pw = "dev";
$charset = "AL32UTF8";
$conn = @oci_connect($ora_id,$ora_pw, $server, $charset) or die('&#128546 &#128546 &#128546 &#128546 &#128546 &#128546 &#128546');
?>
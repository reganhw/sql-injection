<?
require_once('conn.php');
function login($id, $passwd)// sql 인젝션 가능
{
    global $conn;
    $sql = "select * from users
    where id = '$id' and passwd = RAWTOHEX(STANDARD_HASH('$passwd', 'SHA256'))";
    $result = oci_parse($conn, $sql);
    $re = oci_execute($result);
    $row = oci_fetch_array($result, OCI_ASSOC);   // select문 결과
    oci_free_statement($result);
    oci_close($conn);
    return [$sql, $row];
}
?>
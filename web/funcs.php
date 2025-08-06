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

/* sql 인젝션 불가능
function login($id, $passwd)
{
    global $conn;
    $sql = "select * from users
    where id = :v_id and passwd = RAWTOHEX(STANDARD_HASH(:v_passwd, 'SHA256'))";
    $result = oci_parse($conn, $sql);
    oci_bind_by_name($result, ":v_id", $id);
    oci_bind_by_name($result, ":v_passwd", $passwd);
    $re = oci_execute($result);
    $row = oci_fetch_array($result, OCI_ASSOC);
    oci_free_statement($result);
    oci_close($conn);
    return [$sql, $row];
}
*/
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?
    require_once('conn.php');
    require_once('funcs.php');
    $id = $_POST["id"];
    $passwd = $_POST["passwd"];
    [$sql, $row] = login($id, $passwd);

    if ($row) {
        $cname = $row['CNAME'];   // 별명
        $msg = $cname . "님, 환영합니다!";
    } else {
        $msg = "잘못된 로그인 정보입니다. x_x";
    }

    echo <<<EOT
    <div class="container">
        sql:<br> <span class="sql">$sql </span> <br><br>
        $msg <br><br>
        <a href=index.html>뒤로가기</a>
    </div>
    EOT;
    ?>

</body>

</html>
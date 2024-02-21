<?php
if (isset($_SESSION["user_idx"])) {
    echo "로그인 됨 <br>user_idx : ";
    echo $_SESSION["user_idx"];
} else {
    echo "로그인 안됨";
}

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>메인 페이지</title>
</head>

<body>
    <br>
    <a href="logout">로그아웃</a> <br>
    <a href="login">로그인</a>
</body>

</html>
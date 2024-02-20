<?php
echo $_SESSION["user_idx"];
if (isset($_SESSION["user_idx"])) {
    echo "로그인 됨";
} else {
    echo "로그인 안됨ㅋ";
}


function logout(){
    session_destroy();
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
    <form action="" method="post">
        <button onclick="<?php logout();?>" id="logout" name="logout" type="submit">로그아웃</button>
    </form>
    <a href="login">로그인</a>
</body>
</html>
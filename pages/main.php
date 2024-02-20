<?php
session_start();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

if (isset($_SESSION["userIdx"])) {
    $userIdx = $_SESSION["userIdx"];
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
    <title>메인 페이지</title>
</head>
<body>
    <br>
    <form action="" method="post">
        <button onclick="<?php echo logout();?>" id="logout" name="logout" type="submit">로그아웃</button>
    </form>
    <a href="login">로그인</a>
</body>
</html>
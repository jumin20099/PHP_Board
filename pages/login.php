<?php
$host = 'localhost';
$dbname = 'jumin';
$username = 'root';
$password = '';

$pdo = new mysqli($host, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT user_idx FROM users WHERE username = '$username' AND password = '$password'";
    $result = $pdo->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userIdx = $row['user_idx'];

        session_start();
        $_SESSION["userIdx"] = $userIdx;
        $_SESSION["username"] = $username;
 
        header("location: /");
        exit;
    } else {
        echo "<script>alert('로그인 실패')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href='/style.css' type='text/css'>
    <title>로그인</title>
</head>
<body>
    <div id="container">
        <h1>로그인</h1>
        <form action="" method="post">
            <input type="text" id="username" name="username" placeholder="아이디">
            <br>
            <input type="password" id="password" name="password" placeholder="비밀번호">
            <br>
            <button type="submit">로그인</button>
        </form>
        <a href="signup">회원가입</a>
    </div>
</body>
</html>

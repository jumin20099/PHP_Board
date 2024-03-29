<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // and password = :password
    $sql = "SELECT user_idx, password, username, is_admin FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":username", $username);
    // $stmt->bindParam(":password", $password);

    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && ($password == $user['password'])) {
        $_SESSION["user_idx"] = $user["user_idx"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["is_admin"] = $user["is_admin"];
        header("Location: /");
        exit;
    } else {
        echo "
        <script>
        alert('아이디 혹은 비밀번호가 틀렸습니다');
        </script>";
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
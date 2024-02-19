<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone_num = $_POST['phone_num'];
    $gender = $_POST['gender'];

    try {
        $sql = "INSERT INTO users (username, password, email, phone_num, gender) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $password, $email, $phone_num, $gender]);
        echo "회원가입 완료ㅋ";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>회원가입</title>
</head>

<body>
    <div id="container">
        <h1>회원가입</h1>
        <form action="" method="post">
            <input type="text" placeholder="아이디" name="username" id="username">
            <br>
            <input type="password" placeholder="비밀번호" name="password" id="password">
            <br>
            <input type="email" placeholder="이메일" name="email" id="email">
            <br>
            <input type="tel" placeholder="전화번호" name="phone_num" id="phone_num">

            <div id="radioDiv">
                <p>남자</p>
                <input value="man" name="gender" id="gender" type="radio">
                <p style="margin-left: 10px;">여자</p>
                <input value="woman" name="gender" id="gender" type="radio">
            </div>

            <button type="submit">회원가입</button>
        </form>
        <a href="/pages/login.php">로그인</a>
    </div>

</body>

</html>
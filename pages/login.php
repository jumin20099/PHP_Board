<?php
    // 데이터베이스 연결 정보 설정
    $host = 'localhost';
    $dbname = 'jumin';
    $username = 'root';
    $password = '';

    // 데이터베이스에 연결
	$pdo = new mysqli($host, $username, $password, $dbname);

    // 폼이 POST 방식으로 전송되었는지 확인
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 사용자로부터 입력 받은 아이디와 비밀번호 가져오기
		$username = $_POST["username"];
		$password = $_POST["password"];

        // 데이터베이스에서 입력한 아이디와 비밀번호가 일치하는지 확인하는 SQL 쿼리
		$sql = "SELECT username FROM users WHERE username = '$username' and password = '$password'";
		$result = $pdo->query($sql);

        // 일치하는 레코드가 있을 경우
		if ($result->num_rows > 0) {
            // 세션 시작 및 사용자 아이디 세션에 저장
			session_start();
			$_SESSION["username"] = $username;
            // 로그인이 성공했으므로 main.php 페이지로 리다이렉션
			header("location: main.php");
		} else {
            // 일치하는 레코드가 없을 경우 알림 메시지 출력
			echo "<script>alert('ㅗ')</script>";
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
        <a href="/pages/signup.php">회원가입</a>
    </div>

</body>
</html>
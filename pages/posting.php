<?php
if(!isset($_SESSION["user_idx"])){
    echo"
    <script>
    alert('로그인 후 이용 가능합니다');
    location.href='login'
    </script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_idx = $_SESSION["user_idx"];

    try {
        $sql = "INSERT INTO posts (title, content, user_idx) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $content, $user_idx]);
        echo "<script>alert('글쓰기 완료')</script>";
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
    <link rel=stylesheet href='/style.css' type='text/css'>
    <title>글 작성</title>
</head>

<body>
    <div id="container2">
        <h1>~글 작성~</h1>
        <div id="background">
            <form action="" method="post">
                <input type="text" id="title" name="title" placeholder="제목">
                <br>
                <textarea id="content" name="content" cols="100" rows="22"></textarea>
                <br>
                <button id="postBt" type="submit">글쓰기</button>
            </form>
        </div>
    </div>
</body>

</html>
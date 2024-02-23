<?php
if (!isset($_SESSION["user_idx"])) {
    echo "
    <script>
    alert('로그인 후 이용 가능합니다');
    location.href='login'
    </script>";
}


parse_str($path[1], $output);

$post_idx = isset($output["post_idx"]) ? $output["post_idx"] : '';
$output["post_idx"] = $post_idx;
$post_idx = $output["post_idx"];

$sql = "SELECT title, content FROM posts WHERE post_idx = :post_idx";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":post_idx", $post_idx);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    try {
        $sql = "UPDATE posts SET title = :title, content = :content WHERE post_idx = :post_idx";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":post_idx", $post_idx);
        $stmt->execute();
        
        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            echo "<script>alert('드디어성공'); location.href = 'posts';</script>";
        } else {
            echo "<script>alert('실패임ㅆ씨뺘ㅏㄹ');</script>";
        }
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
    <title>글 수정</title>
</head>

<body>
    <div id="container2">
        <h1>~글 수정~</h1>
        <div id="background">
            <form action="" method="post">
                <input type="text" id="title" name="title" placeholder="제목">
                <br>
                <textarea id="content" name="content" cols="100" rows="22"></textarea>
                <br>
                <button id="postBt" type="submit">글 수정</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php
if (!isset($_SESSION["user_idx"])) {
    echo "
    <script>
    alert('로그인 후 이용 가능합니다');
    location.href='login'
    </script>";
}

if ($_SESSION["is_admin"] == 0) {
    echo "관리자가 아닙니다";
    echo "
    <script>
    alert('관리자만 접속 가능합니다.');
    location.href='/';
    </script>";
} else {
    echo "관리자입니다";
}

$sql = "SELECT * FROM posts WHERE is_deleted = 0 ORDER BY write_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_idx = $_POST['post_idx'];
    $sql = "UPDATE posts SET is_deleted = 1 WHERE post_idx = :post_idx";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':post_idx', $post_idx, PDO::PARAM_INT);
    $stmt->execute();
    echo "
    <script>
    alert('삭제 되었습니다');
    location.href='admin'
    </script>";
}

?>

<div id="postsContainer">
    <h1 id="postsTitle">게시글 목록</h1>
    <?php
    if ($posts) {
        foreach ($posts as $post) {
            $sql = "SELECT * FROM users WHERE user_idx = :user_idx";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":user_idx", $post["user_idx"]);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            $divInnerText = "";
            $divInnerText .= "<div class='post'>";
            $divInnerText .= "<h2 class='title'>" . $post["title"] . "</h2>";
            $divInnerText .= "<p class='id'> 작성자 : " . $user["username"] . "</p>";
            $divInnerText .= "<p class='id'> 게시글 ID : " . $post["post_idx"] . "</p>";
            $divInnerText .= "<p class='id'> 작성일 : " . $post["write_date"] . "</p>";
            $divInnerText .= "<p class='content'>" . $post["content"] . "</p>";
            $divInnerText .= "<form method='post' action=''>";
            $divInnerText .= "<input type='hidden' name='post_idx' value='" . $post["post_idx"] . "'>";
            $divInnerText .= "<button type='submit'>삭제</button>";
            $divInnerText .= "</form>";
            $divInnerText .= "</div>";
            $divInnerText .= "<br>";
            echo $divInnerText;
        }
    }
    ?>
</div>
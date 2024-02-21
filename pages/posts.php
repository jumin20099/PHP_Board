<?php
$sql = "SELECT * FROM posts WHERE is_deleted = 0 ORDER BY write_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="postsContainer">
    <h1 id="postsTitle">게시글 목록</h1>
    <?php
    if($posts){
        foreach($posts as $post){
            $divInnerText = "";
            $divInnerText .= "<div class='post'>";
            $divInnerText .= "<h2 class='title'>" . $post["title"] . "</h2>";
            $divInnerText .= "<p class='id'> 작성자 ID : " . $post["user_idx"] . "</p>";
            $divInnerText .= "<p class='id'> 게시글 ID : " . $post["post_idx"] . "</p>";
            $divInnerText .= "<p class='content'>" . $post["content"] . "</p>";
            $divInnerText .= "</div>";
            $divInnerText .= "<br>";
            echo $divInnerText;
        }
    }    
    ?>
</div>
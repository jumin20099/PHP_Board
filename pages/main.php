<?php
if ($_SESSION["is_admin"] == 1) {
    echo '<a href="admin">관리자 페이지</a>';
} else {
    echo '';
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
    <a href="posting">글 작성</a>
</body>

</html>
<link rel="stylesheet" href="/style.css">
<header>
    <div id="left">
        <span><a href="/">PHP Board</a></span>
    </div>
    <div id="right">
        <ul>
            <?php
            if (isset($_SESSION["user_idx"])) {
                echo "<li><a href='logout'>로그아웃</a></li>";
            } else {
                echo "
                <li><a href='login'>로그인</a></li>
                <li><a href='signup'>회원가입</a></li>
                ";
            }
            ?>
        </ul>
    </div>
</header>
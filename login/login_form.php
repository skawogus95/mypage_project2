<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Health Community</title>
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/css/common.css">
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/login/css/login.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/login/js/login.js"></script>
    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/js/common.js" defer></script>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/header.php"; ?>
    </header>
    <section>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/main_img_bar.php"; ?>
        <div id="main_content">
            <div id="login_box">
                <div id="login_title">
                    <span>로그인</span>
                </div>
                <div id="login_form">
                    <form name="login_form" method="post" action="./login.php">
                        <ul>
                            <li><input type="text" name="id" placeholder="아이디"></li>
                            <li><input type="password" id="pass" name="pass" placeholder="비밀번호"></li> <!-- pass -->
                        </ul>
                        <div id="login_btn">
                            <a href="#"><img src="../img/login.png" onclick="check_input()"></a>
                        </div>
                    </form>
                </div> <!-- login_form -->
            </div> <!-- login_box -->
        </div> <!-- main_content -->
    </section>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/footer.php"; ?>
    </footer>
</body>

</html>
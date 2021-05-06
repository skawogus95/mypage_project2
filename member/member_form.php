<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Health Community</title>
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/css/common.css">
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/member/css/member.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/member/js/member.js" defer></script>
    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/js/common.js" defer></script>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/mypage_project2/header.php"; ?>
    </header>
    
    <section>
        <?php include $_SERVER['DOCUMENT_ROOT']."/mypage_project2/main_img_bar.php"; ?>

        <div id="main_content">
            <div id="join_box">
                <h2>회원 가입</h2>
                <form name="member_form" method="post" action="./member_insert.php">
                    <table>
                        <tr>
                            <th>사용자 ID</th>
                            <td><input type="text" name="id">
                                <input type="button" value="중복 확인" onclick="check_id()">
                            </td>
                        </tr>

                        <tr>
                            <th>비밀번호</th>
                            <td><input type="password" name="pass">
                            </td>
                        </tr>
                        
                        <tr>
                            <th>비밀번호 확인</th>
                            <td colspan="2"><input type="password" name="pass_confirm"></td>
                        </tr>

                        <tr>
                            <th>성명</th>
                            <td><input type="text" name="name">
                            </td>
                        </tr>
                        
                        <tr>
                            <th>E-mail</th>
                            <td><input type="text" name="email1">@<input type="text" name="email2">
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div>
                        <input type="submit" value="회원가입" onclick="check_input()">
                        <input type="submit" value="초기화" onclick="reset_form()">
                    </div>
                </form>
            </div> <!-- join_box -->
        </div>  <!-- main_content -->
    </section>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/mypage_project2/footer.php"; ?>
    </footer>

</body>
</html>
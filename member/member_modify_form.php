<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Health Community</title>
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/css/common.css">
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/member/css/member_modify.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/member/js/member.js" defer></script>
    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/js/common.js" defer></script>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/header.php"; ?>
    </header>
    <?php
        //반복이 되더라도 한번만 포함시킴
        include_once $_SERVER['DOCUMENT_ROOT']."/mypage_project2/db/db_connect.php";
        $sql = "select * from members where id = '$userid'";

        //쿼리문을 실행 -> 실행결과값을 레코드셋 저장
        $result = mysqli_query($con, $sql) or die('error : ' . mysqli_error($con));

        //레코드셋에서 첫번째 레코드를 연관배열저장($row)
        $row = mysqli_fetch_array($result);

        $pass = $row["pass"];
        $name = $row["name"];

        $email = explode("@", $row["email"]);
        $email1 = $email[0];
        $email2 = $email[1];

        mysqli_close($con);

    ?>

    <section>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/main_img_bar.php"; ?>
        <div id="main_content">
            <div id="join_box">

                <h2>회원 정보 수정</h2>
                <form name="member_form" method="post" action="./member_modify.php">
                    <table>
                        <tr>
                            <th>사용자 ID</th>
                            <td><?= $userid ?> <input type="hidden" name="id" value="<?=$userid?>">
                        </tr>
                        <tr>
                            <th>비밀번호</th>
                            <td><input type="password" name="pass" value="<?= $pass ?>">
                                <!--4~12자리의 영문,숫자,특수문자(!, @, $, %, ^,&,*)만 가능-->
                            </td>
                        </tr>
                        <tr>
                            <th>비밀번호 확인</th>
                            <td colspan="2"><input type="password" name="pass_confirm" value="<?= $pass ?>"></td>
                        </tr>
                        <tr>
                            <th>성명</th>
                            <td><input type="text" name="name" value="<?= $name ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>E-mail</th>
                            <td><input type="text" name="email1" value="<?= $email1 ?>">@<input type="text"
                                    name="email2" value="<?= $email2 ?>">

                            </td>
                        </tr>
                    </table>
                    <br>
                    <div>
                        <input type="button" value="수정" onclick="check_input()">
                        <input type="button" value="취소"
                        onclick="location.href='http://<?=$_SERVER['HTTP_HOST']?>/mypage0420/index.php'">
                    </div>
                </form>
            </div> <!-- join_box -->
        </div> <!-- main_content -->
    </section>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/footer.php"; ?>
    </footer>

</body>
</html>
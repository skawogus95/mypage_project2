<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Health Community</title>
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/css/common.css">
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/admin/css/admin.css">
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/header.php"; ?>
		</header>
		<section>
			<div id="admin_box">
				<h3 id="member_title">
					관리자 모드 > 회원 관리
				</h3>
				<ul id="member_list">
					<li>
						<span class="col1">번호</span>
						<span class="col2">아이디</span>
						<span class="col3">이름</span>
						<span class="col4">레벨</span>
						<span class="col5">포인트</span>
						<span class="col6">가입일</span>
						<span class="col7">수정</span>
						<span class="col8">삭제</span>
					</li>
                    <?php
                        include_once $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/db/db_connect.php";

                        if (!isset($_SESSION['userid']) && $_SESSION['userlevel']!=='1' ) {
                            echo("
						            <script>
						            alert('관리자만 접근가능합니다');
						            history.go(-1)
						            </script>
						        ");
                            exit;
                        }

                        $sql = "select * from members order by num desc";
                        $result = mysqli_query($con, $sql);
						
                        $total_record = mysqli_num_rows($result); // 전체 회원 수

                        $number = $total_record;

                        while ($row = mysqli_fetch_array($result)) {
                            $num = $row["num"];
                            $id = $row["id"];
                            $name = $row["name"];
                            $level = $row["level"];
                            $point = $row["point"];
                            $regist_day = $row["regist_day"];
                            ?>

							<li>
								<form method="post" action="./admin_member_update.php">
									<input type="hidden" name="num" value="<?= $num ?>">
									<span class="col1"><?= $number ?></span>
									<span class="col2"><?= $id ?></a></span>
									<span class="col3"><?= $name ?></span>
									<span class="col4"><input type="text" name="level" value="<?= $level ?>"></span>
									<span class="col5"><input type="text" name="point" value="<?= $point ?>"></span>
									<span class="col6"><?= $regist_day ?></span>
									<span class="col7"><button type="submit">수정</button></span>
									<span class="col8"><button type="button"
									                           onclick="location.href='admin_member_delete.php?num=<?= $num ?>'">삭제</button></span>
								</form>
							</li>

                            <?php
                            $number--;
                        } //end of while
                    ?>
				</ul>
				
			</div> <!-- admin_box -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/footer.php"; ?>
		</footer>
	</body>
</html>

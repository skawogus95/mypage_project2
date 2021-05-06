<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Health Community</title>
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/css/common.css">
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/notice/css/notice.css">
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/notice/js/notice.js"></script>
		<script src="http://<?= $_SERVER["HTTP_HOST"] ?>/mypage_project2/js/common.js" defer></script>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/header.php"; ?>
		</header>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/db/db_connect.php";
            include_once $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/db/create_table.php";
            create_table($con,'notice');?>
		<section>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/main_img_bar.php"; ?>
			<div id="notice_box">
				<h3>
					공지사항 > 목록
				</h3>
				<ul id="notice_list">
					<li>
						<span class="col1">번호</span>
						<span class="col2">제목</span>
						<span class="col3">글쓴이</span>
						<span class="col5">등록일</span>
						<span class="col6">조회</span>
					</li>
                    <?php
                        include_once $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/db/db_connect.php";
                        if (isset($_GET["page"]))
                            $page = $_GET["page"];
                        else
                            $page = 1;


                        $sql = "select * from notice order by num desc";
                        $result = mysqli_query($con, $sql);
                        $total_record = mysqli_num_rows($result); // 전체 글 수

                        $scale = 10;

                        // 전체 페이지 수($total_page) 계산
                        if ($total_record % $scale == 0)
                            $total_page = floor($total_record / $scale);
                        else
                            $total_page = floor($total_record / $scale) + 1;

                        // 표시할 페이지($page)에 따라 $start 계산
                        $start = ($page - 1) * $scale;

                        $number = $total_record - $start;

                        for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
                            mysqli_data_seek($result, $i);
                            // 가져올 레코드로 위치(포인터) 이동
                            $row = mysqli_fetch_array($result);
                            // 하나의 레코드 가져오기
                            $num = $row["num"];
                            $id = $row["id"];
                            $name = $row["name"];
                            $subject = $row["subject"];
                            $regist_day = $row["regist_day"];
                            $hit = $row["hit"];
                            ?>
							<li>
								<span class="col1"><?= $number ?></span>
								<span class="col2"><a
											href="notice_view.php?num=<?= $num ?>&page=<?= $page ?>"><?= $subject ?></a></span>
								<span class="col3"><?= $name ?></span>
								<span class="col5"><?= $regist_day ?></span>
								<span class="col6"><?= $hit ?></span>
							</li>
                            <?php
                            $number--;
                        }
                        mysqli_close($con);

                    ?>
				</ul>
				<ul id="page_num">
                    <?php
                        if ($total_page >= 2 && $page >= 2) {
                            $new_page = $page - 1;
                            echo "<li><a href='notice_list.php?page=$new_page'>◀ 이전</a> </li>";
                        } else
                            echo "<li>&nbsp;</li>";

                        // 게시판 목록 하단에 페이지 링크 번호 출력
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($page == $i)     // 현재 페이지 번호 링크 안함
                            {
                                echo "<li><b> $i </b></li>";
                            } else {
                                echo "<li><a href='notice_list.php?page=$i'> $i </a><li>";
                            }
                        }
                        if ($total_page >= 2 && $page != $total_page) {
                            $new_page = $page + 1;
                            echo "<li> <a href='notice_list.php?page=$new_page'>다음 ▶</a> </li>";
                        } else
                            echo "<li>&nbsp;</li>";
                    ?>
				</ul> <!-- page -->
				<ul class="buttons">
					<li>
						<button onclick="location.href='notice_list.php'">목록</button>
					</li>
					<li>
                        <?php
                            if ($userid) {
                                ?>
								<button onclick="location.href='notice_form.php'">글쓰기</button>
                                <?php
                            } else {
                                ?>
								<a href="javascript:alert('로그인 후 이용해 주세요!')">
									<button>글쓰기</button>
								</a>
                                <?php
                            }
                        ?>
					</li>
				</ul>
			</div> <!-- notice_box -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/footer.php"; ?>
		</footer>
	</body>
</html>

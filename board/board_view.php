<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Health Community</title>
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/css/common.css">
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/board/css/board.css">
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/board/js/board.js" defer></script>
		<script src="http://<?= $_SERVER["HTTP_HOST"] ?>/mypage_project2/js/common.js" defer></script>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/header.php"; ?>
		</header>
		<section>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/main_img_bar.php"; ?>
			<div id="board_box">
				<h3 class="title">
					게시판 > 내용보기
				</h3>
                <?php
                    if (!$userid) {
                        echo("<script>
							alert('로그인 후 이용해주세요!');
							history.go(-1);
							</script>
						");
                        exit;
                    }

                    include_once $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/db/db_connect.php";

                    $num = $_GET["num"];
                    $page = $_GET["page"];

                    $sql = "select * from board where num=$num";
                    $result = mysqli_query($con, $sql);	

                    $row = mysqli_fetch_array($result);	//리절트셋을 배열로 만들어라

                    $id = $row["id"];
                    $name = $row["name"];
                    $regist_day = $row["regist_day"];
                    $subject = $row["subject"];
                    $content = $row["content"];
                    $file_name = $row["file_name"];
                    $file_type = $row["file_type"];
                    $file_copied = $row["file_copied"];
                    $hit = $row["hit"];

                    $content = str_replace(" ", "&nbsp;", $content);	//공백으로 된거는 &nbsp 바꿔라
                    $content = str_replace("\n", "<br>", $content);		//\n으로 된거는 <br> 바꿔라

                    if ($userid !== $id) {	//로그인 한사람과 글쓰는 사람 아이디가 같나 (조회수 카운트)
                        $new_hit = $hit + 1;
                        $sql = "update board set hit=$new_hit where num=$num";	//보드라는 테이블에서 넘버라는 레코드를 찾아서 히트값을 수정해라
                        mysqli_query($con, $sql);
                    }
                ?>
				<ul id="view_content">
					<li>
						<span class="col1"><b>제목 :</b> <?= $subject ?></span>
						<span class="col2"><?= $name ?> | <?= $regist_day ?></span>
					</li>
					<li>
                        <?php
                            if ($file_name) {
                                $real_name = $file_copied;
                                $file_path = "./data/" . $real_name;
                                $file_size = filesize($file_path);  //파일사이즈를 구해주는 함수

                                echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
                            }
                        ?>
                        <?= $content ?>
					</li>
				</ul>
				<ul class="buttons">
					<li>
						<button onclick="location.href='board_list.php?page=<?= $page ?>'">목록</button>
					</li>
					<li>
						<form action="board_form.php" method="post">
							<button>수정</button>
							<input type="hidden" name="num" value=<?= $num ?>>
							<input type="hidden" name="page" value=<?= $page ?>>
							<input type="hidden" name="mode" value="modify">
						</form>
					</li>
					<li>
						<form action="dmi_board.php" method="post">
							<button>삭제</button>
							<input type="hidden" name="num" value=<?= $num ?>>
							<input type="hidden" name="page" value=<?= $page ?>>
							<input type="hidden" name="mode" value="delete">
						</form>
					</li>
					<li>
						<button onclick="location.href='board_form.php'">글쓰기</button>
					</li>
				</ul>
			</div> <!-- board_box -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/footer.php"; ?>
		</footer>
	</body>
</html>

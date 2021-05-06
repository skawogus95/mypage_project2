<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Health Community</title>
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/css/common.css">
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/notice/css/notice.css">
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/notice/js/notice.js" defer></script>
		<script src="http://<?= $_SERVER["HTTP_HOST"] ?>/mypage_project2/js/common.js" defer></script>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/header.php"; ?>
		</header>
		<section>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/main_img_bar.php"; ?>
            <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/db/db_connect.php"; ?>
			<div id="notice_box">
				<h3 id="notice_title">
					공지사항 > 수정하기
				</h3>
                <?php

                    $num = $_GET["num"];
                    $page = $_GET["page"];

                    $sql = "select * from notice where num=$num";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    $writer = $row["id"];
                    if ($userid !== $writer) {
                        echo( "
						<script>
							alert('작성자만 수정이 가능합니다!');
							history.go(-1);
						</script>
					");
                        exit;
                    }

                    $name = $row["name"];
                    $subject = $row["subject"];
                    $content = $row["content"];
                ?>
				<form name="notice_form" method="post" action="notice_modify.php?num=<?= $num ?>&page=<?= $page ?>"
				      enctype="multipart/form-data">
					<ul id="notice_form">
						<li>
							<span class="col1">이름 : </span>
							<span class="col2"><?= $name ?></span>
						</li>
						<li>
							<span class="col1">제목 : </span>
							<span class="col2"><input name="subject" type="text" value="<?= $subject ?>"></span>
						</li>
						<li id="text_area">
							<span class="col1">내용 : </span>
							<span class="col2">
	    				<textarea name="content"><?= $content ?></textarea>
	    			</span>
						</li>
					</ul>
					<ul class="buttons">
						<li>
							<button type="button" onclick="check_input()">수정하기</button>
						</li>
						<li>
							<button type="button" onclick="location.href='notice_list.php'">목록</button>
						</li>
					</ul>
				</form>
			</div> <!-- notice_box -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/footer.php"; ?>
		</footer>
	</body>
</html>

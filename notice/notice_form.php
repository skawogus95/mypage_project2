<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Health Community</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/css/common.css">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage_project2/notice/css/notice.css">
	<script src="http://<?=$_SERVER['HTTP_HOST']?>/mypage_project2/notice/js/notice.js" defer></script>
	<script src="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/js/common.js" defer></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<body>
	<header>
		<?php include  $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/header.php"; ?>
	</header>
	<?php
	if (!$userid) {
		echo ("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
	?>
	<section>
        <?php include $_SERVER['DOCUMENT_ROOT']."/mypage_project2/main_img_bar.php"; ?>
		<div id="notice_box">
			<h3 id="notice_title">
				공지사항 > 글 쓰기
			</h3>
			<form name="notice_form" method="post" action="notice_insert.php" enctype="multipart/form-data">
				<ul id="notice_form">
					<li>
						<span class="col1">이름 : </span>
						<span class="col2"><?= $username ?></span>
					</li>
					<li>
						<span class="col1">제목 : </span>
						<span class="col2"><input name="subject" type="text"></span>
					</li>
					<li id="text_area">
						<span class="col1">내용 : </span>
						<span class="col2">
							<textarea name="content"></textarea>
						</span>
					</li>

				</ul>
				<ul class="buttons">
					<li><button type="button" onclick="check_input()">완료</button></li>
					<li><button type="button" onclick="location.href='notice_list.php'">목록</button></li>
				</ul>
			</form>
		</div> <!-- notice_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/footer.php"; ?>
	</footer>
</body>

</html>
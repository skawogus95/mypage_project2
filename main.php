<?php include $_SERVER['DOCUMENT_ROOT'].'/mypage_project2/main_img_bar.php';
?>
<div id='main_content'>
    <div id='latest'>
        <h4>최근 게시글</h4>
        <ul>
            <!-- 최근 게시 글 DB에서 불러오기 -->
            <?php
                include_once "db/db_connect.php";

                $sql = "select * from board order by num desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result)
                    echo "<li><span>아직 게시글이 없습니다!</span></li>";
                else {
                    while ($row = mysqli_fetch_array($result)) {
                        $regist_day = substr($row["regist_day"], 0, 10);
                        ?>
						<li>
							<span><?= $row["subject"] ?></span>
							<span><?= $row["name"] ?></span>
							<span><?= $regist_day ?></span>
						</li>
                        <?php
                    }
                }
            ?>
		</ul>
	</div>
	<div id="point_rank">
		<h4>포인트 랭킹</h4>
		<ul>
            <?php
                $rank = 1;
                $sql = "select * from members order by point desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result)
                    echo "<li>아직 가입된 회원이 없습니다!</li>";
                else {
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row["name"];
                        $id = $row["id"];
                        $point = $row["point"];
                        $name = mb_substr($name, 0, 1) . " * " . mb_substr($name, 2, 1);
                        ?>
						<li>
							<span><?= $rank ?></span>
							<span><?= $name ?></span>
							<span><?= $id ?></span>
							<span><?= $point ?></span>
						</li>
                        <?php
                        $rank++;
                    }
                }

                mysqli_close($con);
            ?>

        </ul>
    </div>
</div>
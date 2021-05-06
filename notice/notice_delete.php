<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];

    include_once $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/db/db_connect.php";
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $sql = "select * from notice where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $writer = $row["id"];
    if ($userid !== $writer) {
        echo( "
						<script>
							alert('작성자만 삭제가 가능합니다!');
							history.go(-1);
						</script>
					");
        exit;
    }

    $sql = "delete from notice where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'notice_list.php?page=$page';
	     </script>
	   ";
?>


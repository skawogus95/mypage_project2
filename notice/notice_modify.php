<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/mypage_project2/db/db_connect.php";
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
          
    $sql = "update notice set subject='$subject', content='$content' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'notice_list.php?page=$page';
	      </script>
	  ";
?>

   

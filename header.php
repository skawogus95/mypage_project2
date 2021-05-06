<?php
session_start();
if (isset($_SESSION['userid'])) $userid = $_SESSION['userid'];
else $userid = '';
if (isset($_SESSION['username'])) $username = $_SESSION['username'];
else $username = '';
if (isset($_SESSION['userlevel'])) $userlevel = $_SESSION['userlevel'];
else $userlevel = '';
if (isset($_SESSION['userpoint'])) $userpoint = $_SESSION['userpoint'];
else $userpoint = '';
?>

<div id = 'top'>
    <article id = 'image_and_logo'>
        <a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage_project2/index.php" id = 'health_image'><img src="http://<?=$_SERVER['HTTP_HOST']?>/mypage_project2/img/health_character.jpg" alt="헬스보이 이미지"></a>
        <a href='http://<?=$_SERVER['HTTP_HOST'];?>/mypage_project2/index.php' id = 'health_logo'>Health Community</a>

        <ul id = 'top_menu'>
    <?php
if ( !$userid ) {
    ?>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage_project2/member/member_form.php">회원가입</a> </li>
        <li> | </li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage_project2/login/login_form.php">로그인</a></li>
        <?php
} else {
    $logged = "{$username} ({$userid})님[Level:{$userlevel}, Point: {$userpoint}]";
    ?>
        <li>
            <?php echo $logged ?>
        </li>
        <li> | </li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage_project2/login/logout.php">로그아웃</a> </li>
        <li> | </li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage_project2/member/member_modify_form.php">정보 수정</a></li>
        <li> | </li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage_project2/member/member_delete_form.php">회원 탈퇴</a></li>
        <?php
}
?>
        <?php
if ( $userlevel == 1 ) {
    ?>
        <li> | </li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage_project2/admin/admin.php">관리자 모드</a></li>
        <?php
}
?>       
    </ul>
</div>
    </article>
        
<div id='menu_bar'>
    <ul>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage_project2/memo/message_box.php?mode=rv">쪽지</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage_project2/board/board_list.php">게시판</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage_project2/image_board/board_list.php">이미지</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage_project2/notice/notice_list.php">공지사항</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage_project2/free/list.php">QnA</a></li>
    </ul>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/mypage_project2/db/db_connect.php';
$id = $_POST['id'];

$sql = "delete from members where id='$id'";
$value = mysqli_query( $con, $sql ) or die( 'error : ' . mysqli_error( $con ) );

if ( $value ) {
    echo "<script>
                        alert('고객님 그동안 감사했어요!');
                  </script>";
} else {
    echo "<script>
                        alert('회원탈퇴 실패 관리자 문의바람');
                        history.go(-1);
                  </script>";
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/mypage_project2/login/logout.php';
?>
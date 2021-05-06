<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/mypage_project2/db/db_connect.php';

$id = $_POST['id'];
$pass = $_POST['pass'];
$name = $_POST['name'];
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];

$email = $email1 . '@' . $email2;

$sql = "update members set pass='$pass', name='$name' , email='$email'";
$sql .= " where id='$id'";
//select => record set, update, insert, delete => true, false
$value = mysqli_query( $con, $sql ) or die( 'error : ' . mysqli_error( $con ) );
if ( $value ) {
    session_start();
    $_SESSION['username'] = $name;
} else {
    echo "<script>
                    alert('정보 수정 실패');
                    history.go(-1);
              </script>";
}

mysqli_close( $con );

echo "
	      <script>
	          alert('수정 완료');
	          location.href = 'http://{$_SERVER['HTTP_HOST']}/mypage_project2/index.php';
	      </script>
	  ";
?>
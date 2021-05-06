<?php
date_default_timezone_set( 'Asia/Seoul' );
$server_name = 'localhost';
$user_name = 'root';
$pass = 'aa12011320';
$db_name = 'health_member';

$con = mysqli_connect( $server_name, $user_name, $pass );
$query = 'create database if not exists health_member';
// $con->query( $query ) : 쿼리문 실행
// die( $con->error ) :쿼리문을 실행하고 결과값이 오류가 나면 프로그램을 멈춤, 에러메시지 출력
$result = $con->query( $query ) or die( $con->error );

// 데이타베이스 선택( health_member 선택 )
$con->select_db( $db_name ) or die( $con->error );

// 결과가 잘못 되었을경우 경고메세지를 출력하고 뒤로가기
function alert_back( $message ) {
    echo( "
			<script>
			alert('$message');
			history.go(-1)
			</script>
			" );
}

//공격성을 가진 클라이언트 방어하기 함수
function input_set( $data ) {
    $data = trim( $data );  //양쪽에 공백을 제거
    $data = stripslashes( $data );  //슬래쉬 역활을 방어한다
    $data = htmlspecialchars( $data );  //html => < => &lt;
    return $data;
}
?>
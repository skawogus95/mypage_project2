<?php
//데이타 베이스 연동  및 members 테이블 생성
include_once $_SERVER['DOCUMENT_ROOT'].'/mypage_project2/db/db_connect.php';

//*****************
//입력된 데이터 체크
//*****************
$id = input_set($_POST['id']);
$pass = input_set($_POST['pass']);
$name = input_set($_POST['name']);
$email1 = input_set($_POST['email1']);
$email2 = input_set($_POST['email2']);

$email = $email1 . '@' . $email2;

// 현재의 '년-월-일-시-분'을 저장
$regist_day = date( 'Y-m-d (H:i)' );

//*********************************
//입력된 데이터 패턴체크(이름, 이메일)
//*********************************
$pattern = "/[가-힣]+/"; // 한글 소리 마디
if (!preg_match($pattern, $name)) {
    alert_back($name."형식에 맞지 않음");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    alert_back($email."형식에 맞지 않음");
    exit;
}

//*****************
//트랜잭션 처리 시작
//*****************
$success = true;    //트랜잭션 플래그선정
$result = mysqli_query($con, "SET AUTOCOMMIT=0");       //반드시 자동커밋을 0으로 설정해야됨
$result = mysqli_query($con, "START TRANSACTION");      //트랜잭션 시작

$sql = 'insert into members(id, pass, name, email, regist_day, level, point) ';
$sql = "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

$result = mysqli_query($con, $sql); //$sql에 저장된 명령 실행

if(!$result) $success = false;  //오류발생으로 플래그값을 false 선정

if($success == false) {
    $result = mysqli_query($con,"ROLLBACK");
    alert_back("삽입중에 문제 발생");
}else {
    $result = mysqli_query($con,"COMMIT");
}
$result = mysqli_query($con,"SET AUTOCOMMIT=1");    //반드시 자동커밋을 1으로 설정 트랜잭션 처리완료

//****************
//데이터베이스 종료
//****************
mysqli_close( $con );

echo "
    <script>
            alert('회원가입을 축하합니다.');
            location.href = 'http://{$_SERVER['HTTP_HOST']}/mypage_project2/index.php';
    </script>
    ";

?>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/mypage_project2/db/db_connect.php';

// $login_flag = false;
// if ( !isset( $_POST['id'] ) || empty( $_POST['id'] ) ) {
//     $login_flag = true;
// } else if ( !isset( $_POST['pass'] ) || empty( $_POST['pass'] ) ) {
//     $login_flag = true;
// }

// if ( $login_flag == true ) {
//     echo( "
//       <script>
//         window.alert('아이디와 패스워드 정확하게 입력요청합니다.');
//         history.go(-1);
//       </script>
//     " );
// }

//전송된 post 데이터 체크
$id   = input_set($_POST['id']);
$pass = input_set($_POST['pass']);

//**************************************************
//데이터 패턴체크 (call store Procedure : ID, PASS CHECK )
//**************************************************
$sql = "call signin('$id','$pass',@resultCode)";
$result = mysqli_query($con, $sql);

$sql = "select @resultCode";
$out_result = mysqli_query( $con, $sql );

//$out_row["@resultCode"] 또는 $out_row[0] = 0, -1, -2 결과값을 가져온다
$out_row = mysqli_fetch_array($out_result);
$resultCode = $out_row[0];

if($resultCode == -1){
  alert_back("아이디 입력 오류");
  exit;
}else if($resultCode == -2){
  alert_back("패스워드 입력 오류");
  exit;
}else if($resultCode == 0) {
  $row = mysqli_fetch_array($result);

  session_start();
    $_SESSION['userid'] = $row['id'];
    $_SESSION['username'] = $row['name'];
    $_SESSION['userlevel'] = $row['level'];
    $_SESSION['userpoint'] = $row['point'];

    echo( "
          <script>
            location.href = 'http://{$_SERVER["HTTP_HOST"]}/mypage_project2/index.php';
          </script>
        " );
}


//멤버테이블에서 아이디 같은 레코드 추출-> $result
$sql = "select * from members where id='$id' and  pass='$pass'";
$result = mysqli_query( $con, $sql );
//레코드셋 추출내용 갯수 파악
$num_match = mysqli_num_rows( $result );

//추출내용이 없으면 0 => false
if ( !$num_match )
 {
    echo( "
           <script>
             window.alert('아이디와 패스워드 바르게 입력요망!');
             history.go(-1);
           </script>
         " );
} else {
    //레코드 추출에서 첫번째 레코드를 연관배열로 가져온다. $row['id']~~ $row['level']
    $row = mysqli_fetch_array( $result );

    //세션값을 할당한다.
    session_start();
    $_SESSION['userid'] = $row['id'];
    $_SESSION['username'] = $row['name'];
    $_SESSION['userlevel'] = $row['level'];
    $_SESSION['userpoint'] = $row['point'];

    mysqli_close( $con );

    echo( "
          <script>
            location.href = 'http://{$_SERVER["HTTP_HOST"]}/mypage_project2/index.php';
          </script>
        " );
}
?>
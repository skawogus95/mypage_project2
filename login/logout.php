<?php
session_start();
unset( $_SESSION['userid'] );
unset( $_SESSION['username'] );
unset( $_SESSION['userlevel'] );
unset( $_SESSION['userpoint'] );

echo( "
       <script>
          location.href = 'http://{$_SERVER['HTTP_HOST']}/mypage_project2/index.php';
         </script>
       " );
?>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/mypage_project2/db/db_connect.php';

function create_table($con, $table_name )
 {
    $flag = false;
    $query = 'show tables from health_member;';
    $result = mysqli_query( $con, $query ) or die( 'error : ' . mysqli_error( $con ) );

    //테이블명이 없으면 반복문을 전체를 돌게된다. $flag = false;
    //테이블명이 있으면 $flag = true 하고 반복문을 빠져나온다.
    while ( $row = mysqli_fetch_row( $result ) ) {
        if ( $row[0] === $table_name ) {
            $flag = true;
            break;
        }
    }

    //해당 테이블명이 없으면 해당 테이블명을 찾아서 데이블 생성 쿼리문을 작성한다.
    if ( $flag === false ) {
        switch ( $table_name ) {
            case 'message':
            $query = "CREATE TABLE `message` (
                              `num` int(11) NOT NULL AUTO_INCREMENT,
                              `send_id` char(20) NOT NULL,
                              `rv_id` char(20) NOT NULL,
                              `subject` char(200) NOT NULL,
                              `content` text NOT NULL,
                              `regist_day` char(20) DEFAULT NULL,
                              PRIMARY KEY (`num`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                    ";
            break;
            case 'board':
            $query = "CREATE TABLE `board` (
                                `num` int NOT NULL AUTO_INCREMENT,
                                `id` char(15) NOT NULL,
                                `name` char(10) NOT NULL,
                                `subject` char(200) NOT NULL,
                                `content` text NOT NULL,
                                `regist_day` char(20) NOT NULL,
                                `hit` int NOT NULL,
                                `file_name` char(40) DEFAULT NULL,
                                `file_type` char(40) DEFAULT NULL,
                                `file_copied` char(40) DEFAULT NULL,
                                PRIMARY KEY (`num`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                    ";
            break;
            case 'notice':
            $query = "CREATE TABLE `notice` (
                                  `num` int NOT NULL AUTO_INCREMENT,
                                  `id` char(15) NOT NULL,
                                  `name` char(10) NOT NULL,
                                  `subject` char(200) NOT NULL,
                                  `content` text NOT NULL,
                                  `regist_day` char(20) NOT NULL,
                                  `hit` int NOT NULL,
                                  PRIMARY KEY (`num`)
                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                    ";
            break;
            case 'image_board':
            $query = "CREATE TABLE `image_board` (
                                  `num` int NOT NULL AUTO_INCREMENT,
                                  `id` char(15) NOT NULL,
                                  `name` char(10) NOT NULL,
                                  `subject` char(200) NOT NULL,
                                  `content` text NOT NULL,
                                  `regist_day` char(20) NOT NULL,
                                  `hit` int NOT NULL, 
                                  `file_name` char(40) NOT NULL,
                                  `file_type` char(40) NOT NULL,
                                  `file_copied` char(40) NOT NULL,
                                  PRIMARY KEY (`num`)
                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                    ";
            break;
            case 'image_board_ripple':
            $query = "CREATE TABLE `image_board_ripple` (
                          `num` int(11) NOT NULL AUTO_INCREMENT,
                          `parent` int(11) NOT NULL,
                          `id` char(15) NOT NULL,
                          `name` char(10) NOT NULL,
                          `nick` char(10) NOT NULL,
                          `content` text NOT NULL,
                          `regist_day` char(20) DEFAULT NULL,
                          PRIMARY KEY (`num`)
                        ) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
                    ";
            break;
            case 'free':
            $query = "CREATE TABLE `free` (
                          `num` int(11) NOT NULL AUTO_INCREMENT,
                          `id` char(15) NOT NULL,
                          `name` char(10) NOT NULL,
                          `nick` char(10) NOT NULL,
                          `subject` varchar(100) NOT NULL,
                          `content` text NOT NULL,
                          `regist_day` char(20) DEFAULT NULL,
                          `hit` int(11) DEFAULT NULL,
                          `is_html` char(1) DEFAULT NULL,
                          `file_name_0` char(40) DEFAULT NULL,
                          `file_copied_0` char(30) DEFAULT NULL,
                          `file_type_0` char(30) DEFAULT NULL,
                          PRIMARY KEY (`num`)
                        ) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
                    ";
            break;
            case 'free_ripple':
            $query = "CREATE TABLE `free_ripple` (
                          `num` int(11) NOT NULL AUTO_INCREMENT,
                          `parent` int(11) NOT NULL,
                          `id` char(15) NOT NULL,
                          `name` char(10) NOT NULL,
                          `nick` char(10) NOT NULL,
                          `content` text NOT NULL,
                          `regist_day` char(20) DEFAULT NULL,
                          PRIMARY KEY (`num`)
                        ) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
                    ";
            break;
            case 'members':
            $query = "CREATE TABLE `members` (
                        `num` int(11) NOT NULL AUTO_INCREMENT,
                        `id` char(15) NOT NULL,
                        `pass` char(15) NOT NULL,
                        `name` char(10) NOT NULL,
                        `email` char(80) DEFAULT NULL,
                        `regist_day` char(20) DEFAULT NULL,
                        `level` int(11) DEFAULT NULL,
                        `point` int(11) DEFAULT NULL,
                        PRIMARY KEY (`num`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                  ";
            break;
            default :
            echo "<script>alert('해당 테이블명이 없습니다 . ')</script>";
            break;
        }
        if ( mysqli_query( $con, $query ) ) {
            echo "<script>alert('{$table_name} 테이블이 생성되엇습니다. ')</script>";
        } else {
            echo "<script>alert('{$table_name} 테이블 생성 실패 : '." . mysqli_error( $con ) . ')</script>';
        }
    }

}

?>
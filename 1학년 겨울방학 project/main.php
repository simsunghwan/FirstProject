<!DOCTYPE html>    <!-- 새로운 코드 최종 수정 코드 -->
<html>
<head>
<style>
        /* *{
        margin:0px; padding: 0px;
    } */
#login_box{   /*로그인,회원가입,프로필확인 박스*/
    /* overflow:hidden; */
    float:left;
    margin:0 3px;
    padding: 10px;
    border: 5px solid black;
    width:150px;
    height:200px;
}
#magic {
    margin: 0 auto;
}
/*===============================================================*/
#notice_board{  /* 공지 게시판 박스(왼쪽 위치 설정)*/
    float:left;
    margin: 0 3px;
    padding:10px;
    border: 5px solid black;
    width:150px; 
    height:300px;
    margin-top: 8px;
}

.container{  /*사이트 상 좌 공간*/
    /* margin-top:50px;
    margin-left:50px; */
    margin: 0 auto;
    width: 1080px;
    overflow:hidden;
    /* margin-bottom:8px; */
}

.top_bar {  /*상단 빈 공간 */
    background:#808080;
    /* position: fixed; */
    left: 0; top:0; right:0;
    height:50px;
}

.left_bar {  /*왼쪽 공간 박스(가늘한 선) */
    /* background:blue; */
    border:1px solid black;
    /* position:fixed; */
    float:left;
    left:0; top:50px; bottom:0;
    width: 190px;
}

.main_bar { /*자유 게시판 박스 */
    border: 5px solid black;
    /* position:fixed; */
    width:800px;
    height:800px;
    right:0; top:50px; bottom:0;
    float:right;
}

#login_button{     /*로그인 버튼 박스*/
    width: 150px;
	height: 100px;
	background-color: #DCDCDC;   /*#8b8585 */
	border: 6px solid #696969;
	border-radius: 10px;
    margin-left:-6px;
}
#inline {     /*텍스트 중앙 정렬*/
    text-align:center;
    line-height: 100px;
}
#join_button{ /*회원가입 버튼*/
    width: 100px;
    height: 30px;
    background-color: #8b8585;
    border: 6px solid black;
    border-radius: 10px;
    margin-left:-6px;
    position: relative; /* 상하좌우 위치 조절 기능 */
    top:50px;
}
#back{
    background:#cccccc;
}
/*=============================================로그인 후=========================================*/
#logout_button{ /*로그아웃 버튼*/
    width: 100px;
    height: 30px;
    background-color: #8b8585;
    border: 6px solid black;
    border-radius: 10px;
    margin-left:-6px;
    /* position: relative; 상하좌우 위치 조절 기능 */
    margin-top:5px;
}
#profile{   /*프로필 박스*/
    width: 150px;
	height: 100px;
	background-color:#F5FFFA;
	border: 6px solid #F5F5F5;
	border-radius: 10px;
    margin-left:-6px;      /*위치설정*/
}
#profile_box{   /*프로필,로그아웃,탈퇴 박스*/
    /* overflow:hidden; */
    float:left;
    margin:0 3px;
    padding: 10px;
    border: 5px solid black;
    width:150px;
    height:200px;
}
/* 반응 선택자 : 커서 시 색깔변함 */
button:hover{color:blue;}  /*사용자가 마우스 커서를 올린 태그 선택 */
</style>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<!-- <link rel="stylesheet" type="text/css" href="\source\newsrc\main_css.css"> -->
</head>
<body>
<div class="container">
    <div class="top_bar"></div>  <!--top_bar 상단 빈공간-->
<?php 
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
?>
    <!-- <div id="top">
        <h3> PHP 프로그래밍 입문 </h3>
        <ul id="top_menu"> -->
<div class="left_bar"> <!--left_bar-->
<?php
    if(!$userid) {
?>
    <div id="login_box">  <!--로그인,회원가입,프로필 박스-->
        <div id="login_button"><div id="inline"><a href="login_form.php">로그인</a></div></div>  <!--<div id="inline">--> 
        <a href="member_form.php"><div id="join_button" style="text-align:center">회원 가입</div></a>
    </div>  <!--login_box-->
<?php
    } else {
        $logged = $userid."님";
?>
        <!-- <li><?=$logged?> </li> -->
        <div id="profile_box">              <!--프로필 박스-->
        <div id="profile"><?=$logged?></div>
        <!-- <li><a href="logout.php">로그아웃</a> </li>
        <li><a href="member_delete.php">탈퇴</a> </li> -->
        <div id="logout_button"><div style="text-align:center"><a href="logout.php">로그아웃</a></div></div>
        <div id="logout_button" style="text-align:center"><a href="member_delete.php">탈퇴</div></a>
        </div>
<?php
    }
?>
<div id="notice_board"><?php include "noticeBoard_list.php";?></div> <!--공지게시판-->
</div> <!--left_bar-->
<!-- </div>  login_box -->
<!-- </div> --> <!--<h3> PHP 프로그래밍 입문 </h3>-->
<!--자유게시판 박스-->
<div class="main_bar"><?php include "board_list.php";?></div><!--자유게시판-->
</div> <!--컨테이너-->
</body>
</html>



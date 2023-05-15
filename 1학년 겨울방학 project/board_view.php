<!DOCTYPE html>  <!--자유 게시판 확인 페이지-->
<html>
<head>
<meta charset="utf-8">
<title>자유 게시판</title>
<style>
#container{  /*사이트 상 좌 공간*/
    /* margin-top:50px;
    margin-left:50px; */
    margin: 0 auto;
    width: 810px;
    overflow:hidden;
    /* margin-bottom:8px; */
}

.top_bar {  /*상단 빈 공간 */
    background:#808080;
    /* position: fixed; */
    /* left: 0; top:0; right:0; */
	margin: 0 auto;
	width:810px;
    height:50px;
}


.main_bar { /*자유 게시판 작성 박스 */
    border: 5px solid black;
    /* position:fixed; */
    width:800px;
    /* height:800px; */
	overflow:hidden;                      /*<= 중요!* 버튼,선이 내용 박스에 포함시키는 기능 */
    /* right:0; top:50px; bottom:0; */
    margin: 0 auto;
}

#block{       /* 선 디자인 */
	background-color:black;
	height:1PX;
	margin: 0 auto;
}

#block1{       /* 선 디자인 */
	background-color:gray;
	height:0.5PX;
	weight:700px;
	margin: 0 auto;
}

#block2{       /* 선 디자인 ( 버튼 아래 )*/
	background-color:blue;
	height:0.5PX;
	weight:700px;
	margin: 0 auto;
}

button{                     /*버튼 설정 */
	float:right;
	width: 100px;
    height: 40px;
    background-color: #DCDCDC;
    border-bottom: 5px solid #A9A9A9;     /*보더(테두리)밑 부분 설정 */
    border-radius: 3px;
	margin-right:5px;  /*버튼와의 간격 */
	margin-top: 10px;
	margin-bottom:10px; /*내용박스(메인박스)아래선과의 간격*/
}
/* 반응 선택자 : 커서 시 색깔변함 */
button:hover{color:blue;}  /*사용자가 마우스 커서를 올린 태그 선택 */
button:active{color:blue;} /*사용자가 마우스로 클린한 태그 선택 */


</style>
<!-- <link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css"> -->
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";	
	if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";	

	$level = $_GET["level"];

	$_SESSION["boardLevel"] =$level;

	if ( !$userid ) {
        echo("
            <script>
            alert('게시판 보기는 로그인 후 이용해 주세요!');
            history.go(-1)
            </script>
        ");
        exit;
    }
?>
</head>
<body>   
<section>
	<div id="container"> <!--컨테이너-->
	<div class="top_bar"></div>
	<div class="main_bar">
	    <h3 class="title">
		<?php 
				if ($level==1) { 
			?> 
				공지 게시판 > 내용보기
			<?php 
				} else { 
			?>
	    		자유 게시판 > 내용보기
			<?php 
			} 
			?>
	
		</h3>
<?php
	$boardNum  = $_GET["boardNum"];
	$con = mysqli_connect("localhost", "user1", "12345", "sample");
	$sql = "select * from board where boardNum=$boardNum";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	
	$id      	= $row["id"];
	$subject    = $row["subject"];
	$content    = $row["content"];
	$regist_day = $row["regist_day"];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content); 

	mysqli_query($con, $sql);
?>
<div id="block"></div>
<span class="col1"><h3><b></b><?=$subject?></h3></span> <!--제목-->
	    <ul id="view_content">
			<li>
			    <!-- <span class="col1"><b>제목 : </b><?=$subject?></span> -->
				<span class="col2"><b>작성자  &nbsp;</b><?=$id?>&nbsp;&nbsp;
				<b>작성일 &nbsp;  </b><?=$regist_day?></span>
			</li>
			<div id="block1"></div>
			<li>
				<div><b></b></div>   <!--제목-->
				<?=$content?>
			</li>		
	    </ul>
		<div id="block2"></div>
	    <div class="buttons">
				<button onclick="location.href='board_modify_form.php?boardNum=<?=$boardNum?>&id=<?=$id?>'">수정</button>
				<button onclick="location.href='board_delete.php?boardNum=<?=$boardNum?>'">삭제</button>
				<button onclick="location.href='main.php'">닫기</button>
		</div>
	</div> <!-- 메인 박스 -->	
	</div> <!-- board_box -->
	</div> <!--컨테이너-->
</section> 
</body>
<footer>
	<!-- <div class="main_bar"> -->
	<ul> 
		<?php include "comment_list.php"?>
   	 	<?php include "comment_form_new.php";?>
    </ul>
	<!-- </div> -->
</footer>
</html>

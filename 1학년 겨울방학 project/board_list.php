<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>자유게시판</title>
<!-- <link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css"> -->
<style>
#board_box {    /*자유게시판 배경색*/
	background:#DCDCDC;
	left: 0; top:0; right:0;
	margin-top:-19px;
	/* position: absolute; */
    height:50px;
}
#board_button{ /* 자유 게시판 글쓰기 버튼*/
    width: 70px;
    height: 30px;
    background-color: #8b8585;
    border: 3px solid black;
    border-radius: 10px;  /* 모서리 원 설정 */
    /* margin-left:-6px;
    position: relative; /* 상하좌우 위치 조절 기능 */
    /*top:50px; */
}
#div{                /*글쓰기 버튼 위치 설정*/
	float:right;
    width:100px;
}

#boardline{ /* 제목,날짜,댓글 안내 박스*/
	background:#778899;
	/* left: 0; top:0; right:0;
	margin-top:-19px; */
	/* position: absolute; */
    height:30px;
	border-top:3px solid #808080;
	border-bottom:3px solid #808080;
}

/* 자유게시판 목록  */

#num{  /* 번호 */
	/* weight:50px;
	height:50px; */
	margin: 20px;
	width:70px; height:30px;
	/* border: 1px solid black; */
	/* position: relative; 상하좌우 위치 조절 기능 */
}
#title{      /* 제목 */
	margin: 20px;
	width:366px; height:30px;
	/* border: 1px solid black; */
}
#id{   /*글쓴이 */
	margin: 20px;
	width:80px; height:30px;
	/* border: 1px solid black; */
}

#date{  /* 날짜(등록일) */
	margin:20px;
	width:230px; height:30px;
	/* border: 1px solid black; */
}

#comment{ /*댓글수 */
	margin: 20px;
	height:30px;
	/* border: 1px solid black; */
}
</style>
</head>
<body> 
<section>
	<div id="board_box">
	<h3 style="text-align:center"> 자유 게시판
	<div id="div">                              <!--버튼 맨 오른쪽 위치 설정-->     
	<?php 
    	if($userid) {
	?>
		<button onclick="location.href='board_form.php?level=0'" id="board_button">글쓰기</button>
	<?php
		} else {
	?>
		<a href="javascript:alert('접근 권한이 없습니다!')"><button id="board_button">글쓰기</button></a>
	<?php
		}
	?>
	</div>   
	</h3>
	</div>
	    <!-- <ul id="board_list">
			<li>
				<span class="col1">번호</span>
				<span class="col2">제목</span>
				<span class="col3">글쓴이</span>
				<span class="col4">등록일</span>
				<span class="col5">댓글수</span>
			</li> -->
	<table>
		<tr id="boardline">
			<th id="num">번호</th>
			<th id="title">제목</th>
			<th id="id">글쓴이</th>
			<th id="date">등록일</th>
			<th id="comment">댓글</th>
		</tr>
<?php
	$con = mysqli_connect("localhost", "user1", "12345", "sample");
	$sql = "select * from board where level = 0 order by boardNum desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글 수

	for ($i = $total_record; $i > 0 ; $i--) {
    	mysqli_data_seek($result, $i);

    	// 가져올 레코드로 위치(포인터) 이동
    	$row = mysqli_fetch_array($result);
    	// 하나의 레코드 가져오기

		$Num		 = $i;
    	$boardNum    = $row["boardNum"];
    	$id          = $row["id"];
    	$subject     = $row["subject"];
    	$regist_day  = $row["regist_day"];
		$con = mysqli_connect("localhost", "user1", "12345", "sample");
		$sql = "select * from comment where boardNum=$boardNum";
		$comment_result = mysqli_query($con, $sql);
		$total_comment_record = mysqli_num_rows($comment_result);

?>   
    <tr>
        <th id="num"><?=$Num?></th>
        <th id="title"><a href="board_view.php?boardNum=<?=$boardNum?>&level=0"><?=$subject?></a></th>
    	<th id="id"><?=$id?></th>
        <th id="date"><?=$regist_day?></th>
		<th id="comment"><?=$total_comment_record?></th>
    </tr>  
<?php
	}
    mysqli_close($con);
?>
</table>
</section> 
</body>
</html>

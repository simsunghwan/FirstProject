<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<style>
	#notion_button{ /* 공지 게시판 글쓰기 버튼*/
    width: 70px;
    height: 30px;
    background-color: #8b8585;
    border: 5px solid black;
    border-radius: 10px;  /* 모서리 원 설정 */
    /* margin-left:-6px;
    position: relative; /* 상하좌우 위치 조절 기능 */
    /*top:50px; */
}

#notionline{ /* 목록 박스*/
	background:#778899;
	/* left: 0; top:0; right:0;
	margin-top:-19px; */
	/* position: absolute; */
    height:30px;
	border-top:3px solid #808080;
	border-bottom:3px solid #808080;
}

/* 목록 박스 */

#num2{  /* 번호 */
	margin: 20px;
	width:50px; height:20px;
	/* border: 1px solid black; */
}
#title2{      /* 제목 */
	margin: 20px;
	width:130px; height:20px;
	/* border: 1px solid black; */
}
</style>
</head>
<body> 
<section>
	<table>
	<h5>공지 게시판        
	<?php 
    	if($userid && $userlevel==1) {
	?>
		<button onclick="location.href='board_form.php?level=1'">글쓰기</button>
	<?php
		} else {
	?>
		<a href="javascript:alert('접근 권한이 없습니다!')"><button id="notion_button">글쓰기</button></a>
	<?php
		}
	?>   
	</h4>   
	    <ul id="board_list">
			<tr id="notionline">
				<th id="num2">번호</th>
				<th id="title2">제목</th>
	        </tr>
<?php
	$con = mysqli_connect("localhost", "user1", "12345", "sample");
	$sql = "select * from board where level = 1 order by boardNum desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글 수

	for ($i=$total_record; $i>0 ; $i--) {
    	mysqli_data_seek($result, $i);

    	// 가져올 레코드로 위치(포인터) 이동
    	$row = mysqli_fetch_array($result);
    	// 하나의 레코드 가져오기

		$Num		 = $i;
    	$boardNum    = $row["boardNum"];
    	$subject     = $row["subject"];

?>   
    <tr>
        <th id="num2"><?=$Num?></th>
        <th id="title2"><a href="board_view.php?boardNum=<?=$boardNum?>&level=1"><?=$subject?></a></th>
    </tr>
<?php
	}
    mysqli_close($con);
?>
</table>
</section> 
</body>
</html>

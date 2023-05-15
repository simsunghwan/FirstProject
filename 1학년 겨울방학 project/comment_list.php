<!DOCTYPE html>  <!--댓글 목록 확인-->
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<!-- <link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css"> -->
<style>
#container1{  /*사이트 상 좌 공간*/
    /* margin-top:50px;
    margin-left:50px; */
    margin: 0 auto;
    width: 800px;
    /* margin-bottom:8px; */
}

#main_bar1 { /*댓글 목록 경계선 */
    border-top: 5px solid gray;
	/* weight: 800px; */
	margin-left: 0 auto;
	/* overflow:hidden; */
}
#line{  /*댓글 밑 경걔 선 */
	border-top: 3px solid gray;
	margin: 0 auto;
	weight:100px;
}
#button_comment{
	width: 50px;
    height: 20px;
    background-color: #DCDCDC;
    border: 1px solid black;
    border-radius: 3px;
	/* float:right;
    right:-10px; top:0px; bottom:0;
    position: relative; 상하좌우 위치 조절 기능 */
    /*top:50px;*/
}

/*===========================댓글 기능===============================*/
#num{  /*댓글 순번 */
	/* weight:50px;
	height:50px; */
	margin: 20px;
	width:70px; height:30px;
	/* border: 1px solid black; */
	/* position: relative; 상하좌우 위치 조절 기능 */
}
#comm{      /* 댓글 내용 박스 */
	margin: 20px;
	width:500px; height:30px;
	/* border: 1px solid black; */
}
#id{   /*글쓴이 */
	margin: 20px;
	width:150px; height:30px;
	/* border: 1px solid black; */
}
#butt{ /*수정 버튼 */
	margin: 20px;
	height:30px;
	/* border: 1px solid black; */
}
</style>
</head>
<body>
<section>
	<div id="container1">
	<div id="main_bar1">
	<?php
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
	else $userid = "";	
	if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
	?>
	<h3>댓글</h3>
	<div id="line"></div>
		<!-- <li>
			<span id="num">번호</span>
			<span id="num">내용</span>
			<span id="num">글쓴이</span>
		</li> -->
	<table>
		<tr>
		<th id="num">번호</th>
		<th id="comm">내용</th>
		<th id="id">글쓴이</th>
        </tr>
	<?php
	$boardNum = $_GET["boardNum"];
	$con = mysqli_connect("localhost", "user1", "12345", "sample");
	$sql = "select * from comment where boardNum=$boardNum" ;
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 게시물 총 댓글 수

 

	for ($i=0; $i<$total_record ; $i++) {
    	mysqli_data_seek($result, $i);
    	// 가져올 레코드로 위치(포인터) 이동
    	$row = mysqli_fetch_array($result);
    	// 하나의 레코드 가져오기
    	$Num  = $i+1;
		$commentNum  = $row["commentNum"];
    	$id          = $row["id"];
    	$content     = $row["content"];
?>   
    <!-- <li> ================================================================
        <span id="num"><?=$Num?></span>
        <span id="num"><?=$content?></a></span>
    	<span id="num"><?=$id?></span>
		<?php 
		if ( $userlevel==1 || $userid==$id) { 
		?>

		<button id="button_comment" onclick="location.href='comment_modify_form.php?boardNum=<?=$boardNum?>&commentNum=<?=$commentNum?>'">수정</button>

		<?php
		}
		?>
    </li>  ==================================================================  -->
	<tr>
	    <th id="num"><?=$Num?></th>
        <th id="comm"><?=$content?></a></th>
    	<th id="id"><?=$id?></th>
		<?php 
		if ( $userlevel==1 || $userid==$id) { 
		?>

		<th id="butt"><button id="button_comment" onclick="location.href='comment_modify_form.php?boardNum=<?=$boardNum?>&commentNum=<?=$commentNum?>'">수정</button></th>

		<?php
		}
		?>
		</tr>
<?php
	}
    mysqli_close($con);
?>
</table>
</div> <!-- board_box -->
</div>  <!--테두리-->
</div> <!--container-->
</section> 
</body>
</html>

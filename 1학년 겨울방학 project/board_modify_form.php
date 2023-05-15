<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
    if (!document.board_form.subject.value) {
        alert("제목을 입력하세요!");
        document.board_form.subject.focus();
        return;
    }
    if (!document.board_form.content.value) {
        alert("내용을 입력하세요!");    
        document.board_form.content.focus();
        return;
    }
    document.board_form.submit();
    }
</script>
</head>
<body> 
<section>
   	<div id="board_box">
	    <h3 id="board_title"> 작성글 수정 </h3>
	<?php
		session_start();
		$id = $_GET["id"];
		if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
		else $userid = "";	
		if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
		else $userlevel = "";

		if ( $userlevel==1 || $userid==$id) {
		$boardNum  = $_GET["boardNum"];
		$con = mysqli_connect("localhost", "user1", "12345", "sample");
		$sql = "select * from board where boardNum=$boardNum";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$subject    = $row["subject"];
		$content    = $row["content"];		
	?>
		<form  name="board_form" method="post" action="board_modify.php?boardNum=<?=$boardNum?>" enctype="multipart/form-data">
			<ul id="board_form">	
				<li>
					<span class="col1">제목 : </span>
					<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
				</li>	    	
				<li id="text_area">	
					<span class="col1">내용 : </span>
					<span class="col2">
						<textarea name="content"><?=$content?></textarea>
					</span>
				</li>
			</ul>
			<ul class="buttons">
				<button type="button" onclick="location.href='main.php'">닫기</button>
				<button type="button" onclick="check_input()">수정하기</button>
			</ul>
		</form>
	</div> <!-- board_box -->
	<?php } else 
		echo(" 
			<script> 
				alert('수정은 작성자만 가능합니다!'); 
				history.go(-1) 
			</script> "); 
		exit;?>
</section> 
</body>
</html>

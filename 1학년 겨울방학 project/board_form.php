
<!DOCTYPE html>   <!--자유게시판 작성 페이지-->
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<style>
#magic {
    margin: 0 auto;
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
    /* left: 0; top:0; right:0; */
	margin: 0 auto;
	width:810px;
    height:50px;
}


.main_bar { /*자유 게시판 작성 박스 */
    border: 5px solid black;
    /* position:fixed; */
    width:800px;
    height:800px;
    /* right:0; top:50px; bottom:0; */
    margin: 0 auto;
}

#inline {     /*텍스트 중앙 정렬*/
    text-align:center;
    line-height: 100px;
}

#ok_button{ /*작성 완료 버튼*/
    width: 100px;
    height: 40px;
    background-color: #8b8585;
    border: 6px solid black;
    border-radius: 10px;
    /* margin-left:-6px;
    position: relative; /* 상하좌우 위치 조절 기능 */
    /* top:50px; */ */
}

#no_button{ /*작성 닫기 버튼*/
    width: 100px;
    height: 40px;
    background-color: #8b8585;
    border: 6px solid black;
    border-radius: 10px;
    /* margin-left:-6px;
    position: relative; /* 상하좌우 위치 조절 기능 */
    /* top:50px; */ */
}

#div_button{ /*버튼 위치 설정 */
	float:right;
	margin-right:5px;  /*오른쪽에서 박스와 버튼의 간격 */
}

/* 포커스 설정 */
input:focus{ background-color:#DCDCDC; }    /*클릭 시, 색상변함*/
textarea:focus{ background-color:#DCDCDC; } /*클릭 시, 색상변함*/
/* 반응 선택자 : 커서 시 색깔변함 */
button:hover{color:blue;}  /*사용자가 마우스 커서를 올린 태그 선택 */
button:active{color:blue;} /*사용자가 마우스로 클린한 태그 선택 */
</style>
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
	<?php
		session_start();
		if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
		else $userid = "";
		if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
		else $userlevel = "";
		$level = $_GET["level"];
		$_SESSION["boardLevel"] = $level;
	?>
	<div class="container">  <!--컨테이너-->
	<div class="top_bar"></div> <!--상단 회색 공간-->
	<div class ="main_bar">
   	<div id="board_box">
	    <h3 id="board_title">
			<?php 
				if ($level==1) { 
			?> 
			공지 게시글 작성 
			<?php 
				} else { 
			?>
	    		자유 게시글 작성
			<?php 
			} 
			?>
		</h3>
	    <form  name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
		    <h2><ol id="board_form">
				<li>
					<span class="col1"><h5>아이디 : </span>
					<span class="col2"><?=$userid?></h5></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 </span>
	    			<span class="col2"><input name="subject" type="text" placeholder="제목 입력하기" style="width:650px;height:50px;font-size:30px;"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 </span>
					<textarea name="content" placeholder="내용 입력하기" style="width:652px;height:500px;font-size:40px;"></textarea>
	    			<span class="col2">
	    			</span>
	    		</li>
		    </ol></h2>
	    	<ul class="buttons" id="div_button">  <!-- 버튼 위치 설정-->
				<button type="button" onclick="location.href='main.php'" id="no_button">닫기</button>
				<button type="button" onclick="check_input()" id="ok_button">완료</button>
			</ul>
	    </form>
	</div> <!--자유게시판 작성 메인 박스--> 
	</div> <!-- board_box -->
	</div> <!--컨테이너-->
</section> 
</body>
</html>

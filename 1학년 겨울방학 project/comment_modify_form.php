<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    function check_input() {
        if (!document.comment_form.content.value)
        {
            alert("내용을 입력하세요!");    
            document.comment_form.content.focus();
            return;
        }
      document.comment_form.submit();
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
        $boardNum   =$_GET["boardNum"];
        $commentNum =$_GET["commentNum"];
	?>

       	<div id="comment_box">
	    <h3 id="comment_title">
	    		댓글 수정
		</h3>
	    <form  name="comment_form" method="post" action="comment_modify.php?boardNum=<?=$boardNum?>&commentNum=<?=$commentNum?>" enctype="multipart/form-data">
	    	 <ul id="comment_form">
					<span class="col1">아이디 : </span>
					<span class="col2"><?=$userid?></span>
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
				<button type="button" onclick="check_input()">완료</button>
			</ul>
	    </form>
	</div> <!-- board_box -->
    </section>
</body>
</html>
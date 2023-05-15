<!DOCTYPE html>  <!--댓글 쓰기 기능 새로 제작-->
<html lang="en">
<head>
<style>
#box {    /*댓글 공간*/
    margin: 0 auto;
    width:810px;
    height:100px;
    border-radius: 3px black;
}
#comm_box{ /*댓글작성 박스 테두리선 */
    margin: 0 auto;
    width:700;
    border: 3px solid gray;
	border-radius: 10px;
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>댓글입력</title>
    <script>
    function check_input() {
        if (!document.comment_form.content.value) {
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
    <div id="box">
    <?php
		if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
		else $userid = "";
		if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
		else $userlevel = "";
        $boradNum=$_GET["boardNum"]
	?>
		<!-- <div id="comment_box"> -->
	    <h3>댓글 작성</h3>
	    <form  name="comment_form_new" method="post" action="comment_insert.php?boardNum=<?=$boardNum?>" enctype="multipart/form-data">
	    	 <!-- <ul id="comment_form_new"> -->
                <div id="comm_box">
					<div><h5><?=$userid?></h5></div> <!--아이디-->
					<!-- <div><?=$userid?></div> -->
	    			<!-- <span class="col1">내용 : </span> -->
	    			<div>
	    				<textarea name="content" placeholder="댓글을 입력하세요" style="width:780px;height:50px;font-size:20px;border:none;"></textarea>
                    </div>
				<button type="button" onclick="check_input()">완료</button>
			<!-- </ul> -->
            </div> <!--댓글작성 테두리선-->
	    </form>
	</div> <!-- board_box -->
</div>
    </section>
</body>
</html>
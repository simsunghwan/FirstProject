<meta charset="utf-8">
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["boardLevel"])) $level = $_SESSION["boardLevel"];
    else $boardLevel = "";
    
    if ( !$userid ) {
        echo("
            <script>
            alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
            history.go(-1)
            </script>
        ");
        exit;
    }
    $content = $_POST["content"];
	$content = htmlspecialchars($content, ENT_QUOTES);
    $boardNum = $_GET["boardNum"];

	$con = mysqli_connect("localhost", "user1", "12345", "sample");

    $sql = "insert into comment (id, boardNum, content)";
	$sql .= "values('$userid', '$boardNum','$content')";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
	mysqli_close($con);                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'board_view.php?boardNum=$boardNum&level=$level';
	   </script>
	";
?>

<?php
  	session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
      else $userid = "";	
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
      else $userlevel = "";
    $boardNum   = $_GET["boardNum"];
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select id from board where boardNum = $boardNum";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $id = $row["id"];
    mysqli_close($con);
    // 작성자 or 관리자가 아니라면 돌아가기
    if ( $userlevel==1 || $userid==$id ) {
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from board where boardNum = $boardNum";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $sql = "delete from board where boardNum = $boardNum";
    mysqli_query($con, $sql);
    mysqli_close($con);
    
    echo "
    <script>
     location.href = 'main.php';
    </script>
    ";

    } else {
        echo("
            <script> 
            alert('삭제는 작성자만 가능합니다!'); 
            history.go(-1) 
        </script> ");
        exit; 
    }

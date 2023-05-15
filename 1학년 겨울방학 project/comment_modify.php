<?php
    session_start();
    if (isset($_SESSION["boardLevel"])) $level = $_SESSION["boardLevel"];
    else $boardLevel = "";
    
    $boardNum = $_GET["boardNum"];
    $commentNum = $_GET["commentNum"];
    $content = $_POST["content"];
          
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "update comment set content='$content'";
    $sql .= " where commentNum=$commentNum";
    mysqli_query($con, $sql);
    
    mysqli_close($con);     

    echo "
	    <script>
	        location.href = 'board_view.php?boardNum=$boardNum&level=$level';
	    </script>
	  ";
?>

<?php
    $boardNum = $_GET["boardNum"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
          
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "update board set subject='$subject', content='$content'";
    $sql .= " where boardNum=$boardNum";
    mysqli_query($con, $sql);
    
    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'main.php?';
	      </script>
	  ";
?>

   

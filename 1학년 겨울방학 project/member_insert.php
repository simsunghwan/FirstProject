<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    
    $con = mysqli_connect("localhost", "user1", "12345", "sample");

	$sql = "select * from members where id='$id'";
	$result = mysqli_query($con, $sql);
	$num_record = mysqli_num_rows($result);


	if ($num_record) {
		echo "
		<script>
			window.alert('중복된 아이디입니다!')
			history.go(-1)
	  	</script>
		";
	}
	else {
	$sql = "insert into members(id, pass, level) ";
	$sql .= "values('$id', '$pass', 0 )";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);     
	echo "
	      <script>
	          location.href = 'main.php';
	      </script>
	  ";
	}
?>

   

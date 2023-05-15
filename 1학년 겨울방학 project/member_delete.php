<?php
    session_start();
    
    $id = $_SESSION["userid"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "delete from members where id = $id";

    mysqli_query($con, $sql);

    
    unset($_SESSION["userid"]);
    unset($_SESSION["userlevel"]);
    unset($_SESSION["boardLevel"]);
    mysqli_close($con);
    echo "
    <script type=\"text/javascript\">
        alert(\"정상 탈퇴 되었습니다.\");
        location.href = 'main.php';
    </script>
    ";

    ?>
<!DOCTYPE html> <!--회원가입-->
<html>
<head>
<style>
#join_box{           /*마진:중앙위치 설정 / width:박스 크기 */
	position : absolute;
	margin:0 auto;
	width:500px;
	border: 3px solid black; background-color: #cccccc;
	left: 50%; top: 50%;
    margin-left: -250px;
    margin-top: -125px; 
}

#textbox_magin{ /*아이디 비번 박스 */
	/* position : absolute; <= 이거 쓰면 박스 벗어남 */
	margin-top:10px;
	margin-bottom:10px;
	width: 300px;
	/* border: 1px solid black; */
}

#join_button_box{    /*가입 버튼 위치*/
	position: absolute;
	/* float:right; */
	left: 350px;
    top: 65px;
	/* border: 1px solid black; */
}

#join_button{                     /*회원가입 버튼 */
	float:right;
	width: 120px;
    height: 100px;
    background-color: #FFFFE0; /*#DCDCDC; */
    border: 6px solid #FFFF00;     /*보더(테두리)밑 부분 설정 */
    border-radius: 5px;
	margin-right:5px;  /*버튼와의 간격 */
	margin-top: 10px;
	margin-bottom:10px; /*내용박스(메인박스)아래선과의 간격*/
}

#cancel_button{ /* 취소 버튼 */
	float:left;
	width: 80px;
	height: 40px;
	background-color: #DCDCDC; /*#DCDCDC; */
    border: 4px solid #808080;     /*보더(테두리)밑 부분 설정 */
    border-radius: 5px;
	/* margin-right:5px;  버튼와의 간격 */
	margin-top: 5px;
	margin-left: 5px;
	margin-bottom:5px;
}

#id_font {  /*회원가입 글자 폰트*/
    font-size: 27px; font-family: 'Times New Roman';
}

/* 반응 선택자 : 커서 시 색깔변함 */
button:hover{color:red;}  /*사용자가 마우스 커서를 올린 태그 선택 */
</style>
<meta charset="utf-8">
<title>회원가입</title>
<!-- <link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css"> -->
<script>
   function check_input()
   {
      if (!document.member_form.id.value) {
          alert("아이디를 입력하세요!");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value) {
          alert("비밀번호를 입력하세요!");    
          document.member_form.pass.focus();
          return;
      }

	 document.member_form.submit();
	  

	}

</script>
</head>
<body> 
	<section>
        <div id="main_content">
      		<div id="join_box">
			<h2 id="id_font" style="text-align:center">회원 가입</h2>
          	<form  name="member_form" method="post" action="member_insert.php">
			<!-- <h2 id="id_font" style="text-align:center">회원 가입</h2> -->
    		<div id="textbox_magin">
				<table>
					<tr>
						<!-- <div class="col1"> -->
				        <th><lable for="name">아이디</lable></th>
				        <!-- <div class="col2"> -->
						<th><input type="text" name="id" placeholder="아이디" style="width: 200px;height:30px;font-size:30px;"></th>
                    </tr>
						<!-- <div class="clear"></div> -->

			       	<!-- <div class="form"> -->
					<tr>
				        <th><label for="pass">비밀번호</label></th>
				        <!-- <div class="col2"> -->
						<th><input type="password" name="pass" placeholder="비밀번호" style="width:200px;height:30px;font-size:30px;"></th>                 
                    </tr>
                </table>
            </div>
			<div id="join_button_box">
			       	<!-- <div class="clear"></div> -->
			       	<!-- <div class="bottom_line"> </div>
			       	<div class="buttons"> -->
				<button type="button" onclick="check_input()" id="join_button">회원가입</button>
            </div>
			<button type="button" onclick="location.href='main.php'" id="cancel_button">닫기</button>
	           		<!-- </div> -->
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
</body>
</html>


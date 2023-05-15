<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>php에 오신걸 환영해요</title>
<style>
#login_box{           /*마진:중앙위치 설정 / width:박스 크기 */
	position : absolute;
	margin:0 auto;
	width:500px;
	border: 3px solid black; background-color: #cccccc;
	left: 50%; top: 50%;
    margin-left: -250px;
    margin-top: -125px; 
}

#id_font {  /*로그인 글자 폰트*/
    font-size: 27px; font-family: 'Times New Roman';
}

#textbox_magin{ /*아이디 비번 박스 */
	/* position : absolute; <= 이거 쓰면 박스 벗어남 */
	margin-top:10px;
	margin-bottom:10px;
	width: 300px;
	/* border: 1px solid black; */
}

#login_button_box{    /*로그인 버튼 위치*/
	position: absolute;
	/* float:right; */
	left: 350px;
    top: 65px;
	/* border: 1px solid black; */
}

#login_button{                     /*로그인 버튼 */
	float:right;
	width: 120px;
    height: 100px;
    background-color: #87CEFA; /*#DCDCDC; */
    border: 6px solid #00BFFF;     /*보더(테두리)밑 부분 설정 */
    border-radius: 5px;
	margin-right:5px;  /*버튼와의 간격 */
	margin-top: 10px;
	margin-bottom:10px; /*내용박스(메인박스)아래선과의 간격*/
}

#cancel_button{ /* 닫기 버튼 */
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
/* 반응 선택자 : 커서 시 색깔변함 */
button:hover{color:red;}  /*사용자가 마우스 커서를 올린 태그 선택 */
</style>
<!-- <link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./final_code/login_box1.css"> -->
<script>
function check_input()
{
    if (!document.login_form.id.value)
    {
        alert("아이디를 입력하세요");    
        document.login_form.id.focus();
        return;
    }

    if (!document.login_form.pass.value)
    {
        alert("비밀번호를 입력하세요");    
        document.login_form.pass.focus();
        return;
    }
    document.login_form.submit();
}
</script>
</head>
<body> 
	<section>
        <div id="main_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<h2 id="id_font" style="text-align:center">로그인</h2>
	    		</div>
				<!-- <tr><td>&nbsp;</td></tr> -->
	    		<div id="login_form">
          		<form  name="login_form" method="post" action="login.php">
				  <div id="textbox_magin">	       	
                  	<table>
					<tr>
						<th><lable for="name">아이디</label></th>
                    	<th><input type="text" name="id" placeholder="아이디" style="width: 200px;height:30px;font-size:30px;"></th>
					</tr>
					<!-- <tr>
                    </tr> -->
					<tr>
						<th><label for="pass">비밀번호</label></th>
						<th><input type="password" id="pass" name="pass" placeholder="비밀번호" style="width:200px;height:30px;font-size:30px;"></th>
					</tr>
						<!-- <td>&nbsp;&nbsp;</td>  아이디비번 텍스트 박스와 로그인 버튼 간격 -->
                    </table>
                    </div>
					<div id="login_button_box">
					<button type="button" onclick="check_input()" id="login_button">로그인</button>
					</div>
					<div id="login_btn"> <!-- <= 닫기 버튼--> <!--login_btn-->
					  	<button type="button" onclick="location.href='main.php'" id="cancel_button">닫기</button>
                  	</div>  	
           		</form>
        		</div> <!-- login_form -->
    		</div> <!-- login_box -->
        </div> <!-- main_content -->
	</section> 
</body>
</html>


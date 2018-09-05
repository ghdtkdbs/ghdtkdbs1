<? include $_SERVER["DOCUMENT_ROOT"]."/renew/include/header.php" ?>

<?php
// type : text=0, html=1, text+html=2
function mailer($from_name, $from_email, $to_email, $subject, $content, $type=1, $cc, $bcc) {
	$conf['charset'] = "euc-kr";

	//$fname   = "=?$conf[charset]?B?" . base64_encode($fname) . "?=";
	//$subject = "=?$conf[charset]?B?" . base64_encode($subject) . "?=";

	$header  = "Return-Path: <$from_email>\n";
	$header .= "From: $from_name <$from_email>\n";
	$header .= "Reply-To: <$from_email>\n";
	if ($cc)  $header .= "Cc: $cc\n";
	if ($bcc) $header .= "Bcc: $bcc\n";
	$header .= "MIME-Version: 1.0\n";

	if ($type) {
		$header .= "Content-Type: TEXT/HTML; charset=$conf[charset]\n";
		if ($type == 2) $content = nl2br($content);
	} else {
		$header .= "Content-Type: TEXT/PLAIN; charset=$conf[charset]\n";
		$content = stripslashes($content);
	}
	$header .= "Content-Transfer-Encoding: BASE64\n\n";
	$header .= chunk_split(base64_encode($content)) . "\n";

	$header .= "--$boundary--\n\n";
	@mail($to_email, $subject, "", $header);
	//@mail($to_email, $subject, "", $header,'-f'.$from_email);
}

$conf['charset'] = "euc-kr";

$mode = $_REQUEST['mode'];
$name = $_REQUEST['name'];
$hp1 = $_REQUEST['hp1'];
$hp = $hp1."-".$hp2."-".$hp3;
$email = $_REQUEST['email'];
$questype = $_REQUEST['questype'];
$content = $_REQUEST['content'];
$ip = $_SERVER['REMOTE_ADDR'];

$subject = "[soft11_홈페이지문의] $name($hp)";
$body = "";

$body .= "문의분야 : $questype<br>";

$body .= "이름 : $name<br>";
$body .= "이메일 : $email<br>";
$body .= "연락처(휴대폰) : $hp1<br>";;
$body .= "문의내용 : $content<br>";

//$admin_email = "받을 메일주소 입력";
$admin_email = "softeleven@hotmail.com";

//$bcc = "보조 이메일 주소";


if( $questype == "기술지원상담"){
	$admin_email = "support@wideline.net";
}


if($mode == "send") {
	mailer($name, $email, $admin_email, $subject, $body, $type=1, $cc="", $bcc);
	echo("<script>alert('문의메일이 발송되었습니다.');</script>");
	//echo("<script>location.href='form.php';</script>");
}

?>



	<!-- 바디 컨테이너 -->
	<div id="content" class="container">
		<h2 class="blind">문의 (폼메일)</h2>
		<!-- 고객센터 -->
		<div class="conBox contactus">
			<h3>고객지원</h3>
			<div class="csList">
				<h4>소프트일레븐</h4>
				<div class="half left">
					<h5>업무시간</h5>
					 <ul>
						<li><img src="images/contactus/ico_time.png" alt="">월요일~금요일 오전 9시~오후 6시</li>
						<li><img src="images/contactus/ico_holiday.png" alt="">토·일·공휴일 휴무</li>
						<li><img src="images/contactus/ico_breaktime.png" alt="">점심시간 12시~1시</li>
					</ul>
				</div>
				<div class="half right">
					<h5>문의</h5>
					<ul>
						<li><img src="images/contactus/ico_tel.png" alt=""><i>tel</i>031-337-6611</li>
						<li><img src="images/contactus/ico_fax.png" alt=""><i>Fax</i>031-337-5611</li>
						<li><img src="images/contactus/ico_mail.png" alt=""><i>E-mail</i><a href="mailto:softeleven@hotmail.com">softeleven@hotmail.com</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /고객센터 -->

		<!-- 폼메일 -->
		<div class="wideBox">
			<div class="conBox">
				<h3>고객문의</h3>
				<div class="mailform">
					<form name="f1" method="post">
					<input type="hidden" name="mode" value="send">
						<fieldset>
							<legend class="blind">온라인 견적 문의</legend>
							<div class="half left">
								<ul>
									<li>
										문의분야
										<span class="chkWrap">
											<input id="inq01" name="questype" type="radio" value="견적상담" /><label for="inq01">견적상담</label>
											<input id="inq02" name="questype" type="radio" value="기술지원상담" /><label for="inq02">기술지원상담</label>
											<input id="inq03" name="questype" type="radio" value="소프트웨어/솔루션 문의" /><label for="inq03">소프트웨어/솔루션 문의</label>
											<input id="inq04" name="questype" type="radio" value="기타 문의" checked /><label for="inq04">기타 문의</label>
										</span>
									</li>
									<li>
										<label>이름(상호명)</label><input name="name" type="text" class="TF" />
									</li>
									<li>
										<label>이메일주소</label><input name="email" type="text" class="TF" />
									</li>
									<li>
										<label>연락처 (숫자, '-'만 입력 가능합니다. 예: 010-1234-5678)</label>
										<input name="hp1" type="text" class="TF" />
									</li>
								</ul>
							</div>
							<div class="half right">
								<ul>
									<li>
										<label>제목</label><input name="" type="text" class="TF" />
									</li>
									<li>
										<label>문의내용</label>
										<textarea name="content" cols="" rows="" class="TA"></textarea>
									</li>
								</ul>
								<div class="buttonWrap">
									<input name="" type="button" onclick="form_Check();" value="메일 보내기" class="button dark" />
								</div>
							</div>
						</fieldset>
					</form>

				</div>
			</div>
		</div>
		<!-- /폼메일 -->



    </div>
    <!-- /바디 컨테이너 -->

		<script>
		function form_Check(){
			if(f1.name.value == ''){
				alert("이름을 입력해주십시오.");
				f1.name.focus();
				return;
			}
			if(f1.hp1.value == ''){
				alert("연락처(휴대폰)을 입력해주십시오.");
				f1.hp1.focus();
				return;
			}else{
				var regExp1 = /^\d{3}-\d{3,4}-\d{4}$/;
				if (!f1.hp1.value.match(regExp1)){
					alert("연락처(휴대폰) 형식에 맞지 않습니다.");
					f1.hp1.focus();
					return;
				}

			}
			if(f1.email.value == ''){
				alert("이메일주소를 입력해주십시오.");
				f1.email.focus();
				return;
			}else{
				var regExp2 = /[0-9a-zA-Z][_0-9a-zA-Z-]*@[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]+){1,2}$/;
				if (!f1.email.value.match(regExp2)){
					alert("이메일 형식에 맞지 않습니다.");
					f1.email.focus();
					return;
				}
			}
			if(f1.questype.value == ""){
				alert("문의종류를 선택해주십시오.");
				f1.questype[0].focus();
				return; 
			}
			/*
			if(f1.questype[0].checked == false && f1.questype[1].checked == false && f1.questype[2].checked == false){
				alert("문의종류를 선택해주십시오.");
				f1.questype[0].focus();
				return; 
			}
			*/
			if(!confirm('폼메일을 전송하겠습니까?')) return;

			f1.submit();
		}

		</script>
<? include $_SERVER["DOCUMENT_ROOT"]."/renew/include/footer.php" ?>

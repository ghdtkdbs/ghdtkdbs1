<?
	include $_SERVER["DOCUMENT_ROOT"]."/renew/include/header.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/renew/include/db.php";
?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, user-scalable=yes" />

		<title>소프트일레븐</title>

		<link rel="stylesheet" type="text/css" href="css/common.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="js/default.js"></script>
		<script type="text/javascript" src="js/jquery.bxslider.js"></script>
		<script>
			function login_chk()
			{
				var f = document.login;

				if(f.id.value == "")
				{
					alert("아이디입력해주세요");
					f.id.focus();
					return false;
				}
				if(f.pass.value == "")
				{
					alert("비밀번호입력해주세요");
					f.pass.focus();
					return false;
				}

				f.submit();
			}
		</script>
	</head>
	<body>
		<form name="login" id="login" method="post" action="check.php">
			<table border="1">
				<tr>
					<td align="center">ID</td>
					<td align="left"><input type="text" name="id" onkeypress="javascript:if(event.keyCode==13)login_chk();"></td>
				</tr>
				<tr>
					<td align="center">PWD</td>
					<td align="left"><input type="password" name="pass" onkeypress="javascript:if(event.keyCode==13)login_chk();"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="button" value="로그인" onclick="login_chk();" title="submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="취소" onclick="history.back()"></td>
				</tr>
			</table>
		</form>
	</body>
</html>



<? include $_SERVER["DOCUMENT_ROOT"]."/renew/include/footer.php" ?>
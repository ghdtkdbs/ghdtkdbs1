<? session_start();

//	session_save_path($_SERVER["DOCUMENT_ROOT"]."/session");



	require_once $_SERVER["DOCUMENT_ROOT"]."/renew/include/db.php";

	if(trim($_POST[id]) == "")
	{
	  alert("아이디입력해주세요");
	}
	if($_POST[pass] == "")
	{
	  alert("비밀번호입력해주세요");
	}

	$sql = "select * from notice_admin where adminId = '" . trim($_POST[id]) . "' and adminPwd = '" . $_POST[pass] ."'";
	$result = $conn->query($sql);
	$db = mysqli_fetch_assoc($result);

	if($db[adminId])
	{
		if($_POST[pass] == $db[adminPwd])
		{
			$_SESSION[admin_idx] = md5($db[admin_idx]);

			echo '<script>location.href="news_admin.php?div_group=0";</script>';
			EXIT;
		}
		else
		{
			?>
			<script>
				alert("아이디나 비밀번호가 다릅니다");
				location.href="login.php";
			</script>
			<?
		}
	}
	else
	{
		?>
		<script>
			alert("아이디나 비밀번호가 다릅니다");
			location.href="login.php";
		</script>
		<?
	}
?>

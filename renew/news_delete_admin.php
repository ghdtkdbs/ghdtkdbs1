<?php
	include $_SERVER["DOCUMENT_ROOT"]."/renew/login_check.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/renew/include/db.php";
	

	if(isset($_GET['idx']))
	{
		$idx = $_GET['idx'];
	}

	if(isset($idx))
	{
		$sql = 'select * from notice_board where idx = ' . $idx;
		$result = $conn -> query($sql);
		$row = $result -> fetch_assoc();

		if($row['idx'])
		{
			$sql = 'delete from notice_board where idx = ' . $idx;
		}
		else
		{
			$msg = "실패하였습니다";
?>
			<script>
				alert("<?php echo $msg?>");
				history.back();
			</script>
<?php
			exit;
		}
	}

	$result = $conn -> query($sql);

	echo $result;

	if($result)
	{
		$msg = "삭제되었습니다";
		$replaceURL = "news_admin.php?div_group=0";
	}
	else
	{
		$msg = "글을 삭제하지 못했습니다";
?>
		<script>
			alert("<?php echo $msg?>");
//			history.back();
		</script>
<?php
		exit;
	}
?>

<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>
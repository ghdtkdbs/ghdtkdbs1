<?php
	include $_SERVER["DOCUMENT_ROOT"]."/renew/login_check.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/renew/include/db.php";


	$subject = $_POST['subject'];
	$editorval = $_POST['editor'];
	$radio_ch = $_POST['view'];
	echo $radio_ch;

	$date = date('Y-m-d');

	$sql = 'insert into notice_board(idx,title,content,stamp,div_group,view_yn) values(null, "' . $subject . '", "' . $editorval . '", "' . $date . '", "' . 0 . '", "' . $radio_ch . '")';
	$result = $conn->query($sql);

	if($result)
	{
		$msg = "글이 등록되었습니다";
		$replaceURL = "news_admin.php?div_group=0";
	}
	else
	{
		$msg = "글이 등록되지 않았습니다";
?>
	<script>
		alert("<?php echo $msg?>");
		history.back();
	</script>

<?php
	}
?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>
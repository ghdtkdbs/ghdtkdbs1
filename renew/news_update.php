<?
	include $_SERVER["DOCUMENT_ROOT"]."/renew/login_check.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/renew/include/db.php";

	$idx = $_GET['idx'];
	$title = $_POST['subject'];
	$content = $_POST['editor'];
	$radio_ch = $_POST['view'];
	$date = date('Y-m-d');

	$sql = "update notice_board set title = '" . $title . "', content = '" . $content . "', stamp = '" . $date . "', div_group = '" . 0 . "', view_yn = '" . $radio_ch . "' where idx = '" . $idx . "'";
	$result = $conn -> query($sql);
?>

<script>
	alert("수정이 완료되었습니다");
	location.href="./news_view_admin.php?div_group=0&idx=<?=$idx?>"
</script>
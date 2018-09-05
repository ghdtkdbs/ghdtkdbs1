<?
	session_start();

	if(!$_SESSION[admin_idx])
	{
?>
		<script>
			location.href="main.php";
		</script>
<?
	}
?>

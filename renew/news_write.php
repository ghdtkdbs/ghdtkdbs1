<?
	include $_SERVER["DOCUMENT_ROOT"]."/renew/login_check.php";
	include $_SERVER["DOCUMENT_ROOT"]."/renew/include/header.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/renew/include/db.php";

	if(isset($_GET['idx']))
	{
		$idx = $_GET['idx'];
		$div_group = $_GET['div_group'];
		$view_yn = $_GET['view_yn'];

		$sql = "select title, content, stamp from notice_board where idx=". $idx;
		$result = $conn -> query($sql);
		$row = $result -> fetch_assoc();
	}
	$stime=date("Y-m-d",time());

	if($view_yn == "")
	{
		$view_yn = "N";
	}
?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/sample.js"></script>
<script type="text/javascript">

	window.onload=function()
	{
		CKEDITOR.replace('editor',
			{
				enterMode:'2',
				filebrowserImageUploadUrl:"ckeditorup.php?type=images"
			}
		);
		//{uiColor:'#FFFFFF'}
		CKEDITOR.instances.editor.getData();
	}

	function changeck(mode)
	{
		if(mode == "01")
		{
			if(document.change.subject.value == "")
			{
				alert("제목을 입력하세요");
				document.change.subject.focus();
				return false;
			}
			if(CKEDITOR.instances.editor.getData() == "")
			{
				alert("내용을 입력하세요");
				CKEDITOR.instances.editor.focus();
				return false;
			}
			if(document.change.view.value == "")
			{
				alert("라디오버튼을 체크해주세요");
				return false;
			}
			document.change.method="post";
			document.change.action="news_write_check.php";
			document.change.submit();
		}
		else if(mode == "02")
		{
			if(document.change.subject.value == "")
			{
				alert("제목을 입력하세요");
				document.change.subject.focus();
				return false;
			}
			if(CKEDITOR.instances.editor.getData() == "")
			{
				alert("내용을 입력하세요");
				CKEDITOR.instances.editor.focus();
				return false;
			}
			if(document.change.view.value == "")
			{
				alert("라디오버튼을 체크해주세요");
				return false;
			}
			document.change.method="post";
			document.change.action="news_update.php?div_group=<?=$div_group?>&idx=<?=$idx?>";
			document.change.submit();
		}
	}
</script>

	<!-- 바디 컨테이너 -->
	<div id="content" class="container">
		<div class="content">
			<h2 class="blind">뉴스 및 이벤트 (게시판)</h2>
			
			<!-- 뉴스 & 이벤트 -->
			<div class="conBox">
				<div class="board">
					<!-- 카테고리 -->
					<ul class="box_cate">
						<!-- .active시 이미지 _off가 _on으로 바뀌게 -->
						<li class="<?=$div_group=='0'?'active':''?>"><a href="news_admin.php?div_group=0"><img src="images/common/ico_notice_on.png"><span>notice</span></a></li>
						<li class="<?=$div_group=='1'?'active':''?>"><a href="promo_admin.php?div_group=1"><img src="images/common/ico_event_off.png"><span>Promotion</span></a></li>
					</ul>
					<!-- /카테고리 -->
					
					<!-- 게시판 출력부분 -->
					<div class="board_con">
						<!-- 게시판 -->
						<form name="change" id="change">
							<div class="tbl_basic">
								<table>
									<colgroup><col width="10%"><col width="90%"</colgroup>
									<thead>
										<tr>
											<th>
												<label>제목</label>
											</th>
											<td>
												<input name="subject" type="text" class="TF" value="<?php echo $row['title']?>" />
											</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>
												<label>내용</label>
											</th>
											<td>
												<textarea name="editor" id="editor" cols="90" rows="10"><?php echo $row['content']?></textarea>
											</td>
										</tr>
										<tr>
											<td><input type="radio" name="view" value="Y" <?if($view_yn=='Y'){echo "checked";};?>>Y</td>
											<td><input type="radio" name="view" value="N" <?if($view_yn=='N'){echo "checked";};?>>N</td>
										</tr>
									<tbody>
								</table>
							</div>
						<!-- /게시판 -->

						<!-- 버튼모음 -->
							<div class="buttonWrap">
								<a href="#" onclick="changeck('01');" class="button dark">입력</a>
								<a href="#" onclick="changeck('02');" class="button color">수정</a>
								<a href="#" onclick="javascript:history.back();" class="button">목록보기</a>
							</div>
						<!-- /버튼모음 -->
						</form>
					</div>
					<!-- 게시판 출력부분 -->
				</div>
			</div>
			<!-- /뉴스 & 이벤트 -->
		</div>
	</div>
	<!-- /바디 컨테이너 -->

<? include $_SERVER["DOCUMENT_ROOT"]."/renew/include/footer.php" ?>
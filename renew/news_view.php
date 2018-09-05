<? include $_SERVER["DOCUMENT_ROOT"]."/renew/include/header.php";
  require_once $_SERVER["DOCUMENT_ROOT"]."/renew/include/db.php";

  $idx = $_GET['idx'];
  $div_group = $_GET['div_group'];


  $sql = "select title, content, stamp from notice_board where view_yn='Y' and idx=". $idx;
  $result = $conn -> query($sql);
  $row = $result -> fetch_assoc();

  $stime=date("Y-m-d",time());
?>

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
						<li class="<?=$div_group=='0'?'active':''?>"><a href="news.php?div_group=0"><img src="images/common/ico_notice_on.png"><span>notice</span></a></li>
						<li class="<?=$div_group=='1'?'active':''?>"><a href="promo.php?div_group=1"><img src="images/common/ico_event_off.png"><span>Promotion</span></a></li>
					</ul>
					<!-- /카테고리 -->
					
					<!-- 게시판 출력부분 -->
					<div class="board_con">
						<!-- 게시판 -->
						<div class="tbl_basic">
							<table>
								<thead>
								<tr>
									<th>
										<p class="inform">
											<span class="date"><?php echo $stime?></span> / 
											<span class="name">Posted by <i>소프트일레븐<i></span>
											<!--<span class="count"><i>2<i>count</span>-->
										</p>
										<p class="title"><?php echo $row['title']?></p>
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										<?php echo $row['content']?>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
						<!-- /게시판 -->

						<!-- 버튼모음 -->
						<div class="buttonWrap">
							<!--<a href="#" class="button dark">수정</a>-->
							<a href="javascript:history.back();" class="button">목록보기</a>
						</div>
						<!-- /버튼모음 -->

					</div>
					<!-- 게시판 출력부분 -->

				</div>
			</div>
			<!-- /뉴스 & 이벤트 -->
		</div>
	</div>
	<!-- /바디 컨테이너 -->

<? include $_SERVER["DOCUMENT_ROOT"]."/renew/include/footer.php" ?>
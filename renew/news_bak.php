<? include $_SERVER["DOCUMENT_ROOT"]."/renew/include/header.php" ?>

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
						<li class="active"><a href="#"><img src="images/common/ico_notice_off.png"><span>notice</span></a></li>
						<li><a href="#"><img src="images/common/ico_event_off.png"><span>Promotion</span></a></li>
					</ul>
					<!-- /카테고리 -->
					
					<!-- 게시판 출력부분 -->
					<div class="board_con">
						<!-- 게시판 상단 검색창 -->
						<div class="brd_search">
							게시판 검색
						</div>
						<!-- /게시판 상단 검색창 -->
						
						<!-- 게시판 -->
						<div class="tbl_basic">
							<table>
								<tr>
									<td>
										<a href="news_view.php"><p class="title">타이틀</p>
										<p class="inform">
											<span class="date">날짜</span> / 
											<span class="name">Posted by <i>소프트일레븐<i></span>
											<span class="read">view →</span>
										</p></a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="#"><p class="title">타이틀</p>
										<p class="inform">
											<span class="date">날짜</span> / 
											<span class="name">Posted by <i>소프트일레븐<i></span>
											<span class="read">view →</span>
										</p></a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="#"><p class="title">타이틀</p>
										<p class="inform">
											<span class="date">날짜</span> / 
											<span class="name">Posted by <i>소프트일레븐<i></span>
											<span class="read">view →</span>
										</p></a>
									</td>
								</tr>

							</table>
						</div>
						<!-- /게시판 -->
						
						<!-- 페이지네이션 -->
						<div class="pagenation">
							<a href="#" title="첫 페이지로">←</a>
							<span class="paging">
								<a href="#" class="active">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#">4</a>
								<a href="#">5</a>
								<a href="#">6</a>
								<a href="#">7</a>
								<a href="#">8</a>
							</span>
							<a href="#" title="마지막 페이지로">→</a>
						</div>
						<!-- /페이지네이션 -->

						<!-- 버튼모음 -->
						<div class="buttonWrap">
							<a href="news_write.php" class="button dark">글쓰기</a>
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
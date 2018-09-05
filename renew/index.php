<?
	include $_SERVER["DOCUMENT_ROOT"]."/renew/include/header.php";
	require_once $_SERVER["DOCUMENT_ROOT"]."/renew/include/db.php";
?>

    <!-- 바디 컨테이너 -->
    <div id="content" class="container">
    	<!-- 롤링배너 -->
    	<div class="">
        	<ul class="bxslider">
            	<li class="img01"><img src="images/main/main_visual01.png" alt="이지키텍"></li>
                <li class="img02"><img src="images/main/main_visual02.png" alt="브이패드"></li>
                <!--li class="img03"><img src="images/main/main_visual03.png" alt="스위퍼클라우드"></li-->
            </ul>
        </div>
		<!-- 메인 텍스트 -->
        <div class="wideBox main">
        	<div class="maintext">
            	<p>기업고객을 위한<span><img src="images/main/main_text01.png" alt="Total Solution Provider"></span></p>
                <p class="en">Your creative partner</p>
            </div>
            <ul class="mainvisual">
            	<li><a href="http://softeleven.cafe24.com/renew/software.php#microsoft"><img src="images/main/main_sol01.png" alt="Microsoft"></a></li>
                <li><a href="http://softeleven.cafe24.com/renew/software.php#adobe"><img src="images/main/main_sol02.png" alt="Adobe"></a></li>
                <li><a href="http://softeleven.cafe24.com/renew/software.php#hancom"><img src="images/main/main_sol03.png" alt="한글과컴퓨터"></a></li>
            </ul>	
        </div>
        
        <!-- 게시판추출 및 고객센터 -->
        <div class="conBox">
        	<div class="layout">
                <div class="half left brd_attr">
                    <h2>Notice & News</h2>
                    <ul>

					<?php

						$sql = 'select * from notice_board' . $searchsql . ' order by idx desc' . $sqllimit . ' limit 5';
					    $all = $conn->query($sql);

						if(isset($emptydata))
		                {
				            echo $emptydata;
						}
		                else
				        {
			               	while ($row = $all->fetch_assoc())
							{	
								$movie_cut_title="60";

								if(strlen($row["title"]) > $movie_cut_title)
								{
									$tmp_title = mb_strcut($row['title'],0,$movie_cut_title,'utf-8');
									$tmp_title .= "...";
								}
								else
								{
									$tmp_title = $row['title'];
								}
							$stime=date("Y-m-d",time());
					?>
							<li>
								<a href="./news_view.php?div_group=0&idx=<?php echo $row['idx']?>"><p class="title"><?php echo $tmp_title;?></p>
									<p class="inform">
										<span class="date"><?php echo $stime?></span>
	    							</p>
								</a>
							</li>
					<?php
							}
						}
                ?>

                    </ul>
                </div>
                <div class="half right cscenter">
                    <h2>Customer Center</h2>
                    <ul>
                    	<li>031.337.6611</li>
                        <li>평일: AM 09:00 ~ PM 06:00</li>
                        <li>점심: PM 12:00 ~ PM 13:00</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- 협력업체 -->
        <div class="wideBox light">
      		<div class="conBox">
                <ul class="cooper">
                    <li><img src="images/main/coop_01.png" alt="마이크로소프트"></li>
                    <li><img src="images/main/coop_02.png" alt="한글과컴퓨터"></li>
                    <li><img src="images/main/coop_03.png" alt="Adobe"></li>
                    <li><img src="images/main/coop_04.png" alt="TechGroup"></li>
                    <li><img src="images/main/coop_05.png" alt="이스트소프트"></li>
                    <li><img src="images/main/coop_06.png" alt="안랩"></li>
                    <li><img src="images/main/coop_07.png" alt="eVolcano"></li>
                    <li><img src="images/main/coop_08.png" alt="와이드라인"></li>
                    <li><img src="images/main/coop_09.png" alt="Crossys"></li>
                    <li><img src="images/main/coop_10.png" alt="가온아이"></li>
                    <li><img src="images/main/coop_11.png" alt="하우리"></li>
                    <li><img src="images/main/coop_12.png" alt="소프트뱅크"></li>
                    <li><img src="images/main/coop_13.png" alt="포스트디"></li>
                    <li><img src="images/main/coop_14.png" alt="닥터소프트"></li>
                </ul>
            </div>
        </div>
        
    </div>
    <!-- /바디 컨테이너 -->

<? include $_SERVER["DOCUMENT_ROOT"]."/renew/include/footer.php" ?>
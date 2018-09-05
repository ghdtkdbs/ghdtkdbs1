<?php
  require_once $_SERVER["DOCUMENT_ROOT"]."/renew/include/db.php";

  if(isset($_GET['page']))
  {
    $page = $_GET['page'];
  }
  else
  {
    $page = 1;
  }

  function fnPageNav($total,$scale,$p_num,$page,$query)
  {
		  //  global $PHP_SELF;

          $total_page = ceil($total/$scale);
          if (!$page) $page = 1;
          $page_list = ceil($page/$p_num)-1;

          $navigation = "<div class='pagenation'>";
          if ($page_list>0)
		  {
                  $navigation .= "<a href='$PHP_SELF?page=1&$query'><img src='/common/img/ico_recent.png' alt='첫페이지' /></a>";
                  $prev_page = ($page_list-1)*$p_num+1;
                  $navigation .= "<a href='$PHP_SELF?page=$prev_page&query'><img src='/common/img/ico_prev.png' alt='이전페이지' /></a>";
          }

          $navigation .= "<span class='paging'>";
          $page_end=($page_list+1)*$p_num;
          if ($page_end>$total_page) $page_end=$total_page;

          for ($setpage=$page_list*$p_num+1;$setpage<=$page_end;$setpage++)
		  {
                  if ($setpage==$page)
				  {
                    $navigation .= "<a href='$PHP_SELF?page=$setpage&$query'  class='active'>$setpage</a> ";
                  }
				  else
				  {
                    $navigation .= "<a href='$PHP_SELF?page=$setpage&$query'>$setpage</a> ";
                  }
          }
          $navigation .= "</span>";
          if ($page_end<$total_page)
		  {
                  $next_page = ($page_list+1)*$p_num+1;
                  $navigation .= "<a href='$PHP_SELF?page=$next_page&$query'><img src='/common/img/ico_next.png' alt='다음페이지' /></a> ";
                  $navigation .= "<a href='$PHP_SELF?page=$total_page&$query'><img src='/common/img/ico_last.png' alt='마지막페이지' /></a> ";
          }
          $navigation .= "</div>";


          return $navigation;
  }


//검색 시작
  if(isset($_GET['searchcolumn']))
  {
    $searchcolumn = $_GET['searchcolumn'];
    $substring .= '&amp;searchcolumn=' . $searchcolumn;
  }

  if(isset($_GET['searchtext']))
  {
    $searchtext = $_GET['searchtext'];
    $substring .= '&amp;searchtext=' . $searchtext;
  }

  $searchsql=" where div_group=1 and view_yn='Y'";

  if(isset($searchcolumn) && isset($searchtext))
  {
    $searchsql .= ' and ' . $searchcolumn . ' like "%'.$searchtext.'%"';
  }
//검색 끝



  $sql = 'select count(*) as cnt from notice_board' . $searchsql;
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);



  $allpost = $row['cnt'];

  if(empty($allpost))
  {
    $emptydata = '<tr><td class="textcenter" colspan="5"> 게시물이 존재하지 않습니다.</td></tr>';
  }
  else
  {

    $onepage = 10;
    $allpage = ceil($allpost / $onepage);

    if($page < 1 && $page > $allpage)
    {
      exit;
    }

    $onesection = 10;
    $currentsection = ceil($page / $onesection);
    $allsection = ceil($allpage / $onesection);

    $firstpage = ($currentsection * $onesection) - ($onesection - 1);

    if($currentsection == $allsection)
    {
      $lastpage = $allpage;
    }
    else
    {
      $lastpage = $currentsection * $onesection;
    }

    $prevpage = (($currentsection - 1) * $onesection);
    $nextpage = (($currentsection + 1) * $onesection) - ($onesection - 1);

    $paging = '<ul>';

    if($page != 1)
    {
      $paging .= '<li class="page page_start"><a href="./test_notice.php?page=1'.$substring.'"></a></li>';
    }

    if($currentsection != 1)
    {
      $paging .= '<li class="page page_prev"><a href="./test_notice.php?page=' . $prevpage . $substring . '">이전</a></li>';
    }

    for($i = $firstpage; $i <= $lastpage; $i++)
    {
      if($i == $page)
      {
        $paging .= '<li class="page current">' . $i . '</li>';
      }
      else
      {
        $paging .= '<li class="page"><a href="./test_notice.php?page=' . $i . $substring . '">' . $i . '</a></li>';
      }
    }

    if($currentsection != $allsection)
    {
      $paging .= '<li class="page page_next"><a href="./test_notice.php?page=' . $nextpage . $substring .'">다음</a></li>';
    }

    if($page != $allpage)
    {
      $paging .= '<li class="page page_end"><a href="./test_notice.php?page=' . $allpage . $substring .'">→</a></li>';
    }
    $paging .= '</ul>';

    $currentlimit = ($onepage * $page) - $onepage;
    $sqllimit = ' limit ' . $currentlimit . ', ' . $onepage;

    $sql = 'select * from notice_board' . $searchsql . ' order by idx desc' . $sqllimit;
    $all = $conn->query($sql);

  }
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

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="wrap">
	<!-- 헤더부분 -->
	<div class="header">
    	<!-- 로고 -->
    	<h1><a href="index.php"><img src="images/common/logo.png" alt="소프트일레븐"></a>
        	<p class="toggle_btn">메뉴보기</p>
        </h1>
        <!-- 글로벌 네비게이션 -->
		<p class="skip"><a href="#content">메뉴건너뛰기</a></p>
        <div class="gnb">
        	<ul>
            	<li ><a href="company.php">Company</a></li>
                <li ><a href="software.php">Software</a></li>
                <li ><a href="solution.php">Solution</a></li>
                <li  class="active" ><a href="news.php?div_group=0">news</a> </li>
                <li ><a href="contactus.php">Contactus</a></li>
            </ul>
        </div>
    </div>
    <!-- /헤더부분 -->

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
						<li class="<?=$div_group=='0'?'active':''?>"><a href="news.php?div_group=0"><img src="images/common/ico_notice_off.png"><span>notice</span></a></li>
						<li class="<?=$div_group=='1'?'active':''?>"><a href="promo.php?div_group=1"><img src="images/common/ico_event_on.png"><span>Promotion</span></a></li>
					</ul>
					<!-- /카테고리 -->

					<!-- 게시판 출력부분 -->
					<div class="board_con">
						<!-- 게시판 상단 검색창 -->
						<div class="brd_search">
							<select name="" class="selBox">
                            	<option>제목</option>
                                <option>내용</option>
                            </select>
                            <input name="" type="text" class="STF">
                            <input name="" type="submit" value="검색" class="button small dark">
						</div>
						<!-- /게시판 상단 검색창 -->

						<!-- 게시판 -->
						<div class="tbl_basic">
							<table>
							<caption class="blind">PROMOTION</caption>

                <?php

                  if(isset($emptydata))
                  {
                    echo $emptydata;
                  }
                  else
                  {

                	while ($row = $all->fetch_assoc())
					{	
						
						$movie_cut_title="80";

						if(strlen($row["title"]) > $movie_cut_title)
						{
							$tmp_title = mb_strcut($row['title'],0,$movie_cut_title,'utf-8');
							$tmp_title .= "...";
						}
						else
						{
							$tmp_title = $row['title'];
						}
						?>
                    <tr>
    									<td>
    										<a href="./news_view.php?div_group=1&idx=<?php echo $row['idx']?>"><p class="title"><?php echo $tmp_title;?></p>
    										<p class="inform">
    											<span class="date"><?php echo $row['stamp']?></span> /
    											<span class="name">Posted by <i>소프트일레븐<i></span>
    											<span class="read">view →</span>
    										</p></a>
    									</td>
    								</tr>

                <?php
                    }
                  }
                ?>
<!--<?php echo fnPageNav($allpost,10,10,$page,$searchsql);//fnPageNav(총 갯수,표시 리스트 수,페이징 표시 수,현제 페이지,검색조건) ?>-->
							</table>
						</div>
						<!-- /게시판 -->

						<!-- 페이지네이션 -->
							<?php echo fnPageNav($allpost,10,10,$page,$searchsql);//fnPageNav(총 갯수,표시 리스트 수,페이징 표시 수,현제 페이지,검색조건) ?>
						<!-- /페이지네이션 -->

						<!-- 버튼모음 -->
						<!--<div class="buttonWrap">
							<a href="news_write.php" class="button dark">글쓰기</a>
						</div>-->
						<!-- /버튼모음 -->

					</div>
					<!-- 게시판 출력부분 -->

				</div>
			</div>
			<!-- /뉴스 & 이벤트 -->
		</div>
	</div>
	<!-- /바디 컨테이너 -->


    <!-- 푸터 -->
    <div class="footer">
    	<div class="conBox">
            <div class="utilbtn">
                <a href="#">Contact Us</a> | <a href="#">Sitemap</a>
            </div>
            <address class="address">
                <p class="addr">경기도 안양시 동안구 학의로 282 금강펜테리움 IT B타워 1827호</p>
                <p class="addr2"><span class="tel">Tel : 031)337-6611</span>  <span class="fax">Fax: 031)337-5611</span>  <span class="email">E-mail: support@soft11.com</span></p>
                <p class="copy"><copyright>Copyright© Softeleven. ALL  RIGHTS RESERVED </copyright></p>
            </address>
            <img src="images/common/footer_mspartner.png" alt="마이크로소프트" class="mspartner">
        </div>
    </div>
    <!-- /푸터 -->

	<div id="gotoTop" class="gotoTop">
		<img src="images/common/top_btn.png" alt="최상단으로">
	</div>
</div>
<script>
$(document).ready(function(){
	$('.bxslider').bxSlider();
});
</script>
</body>
</html>

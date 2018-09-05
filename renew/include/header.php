<? include $_SERVER["DOCUMENT_ROOT"]."/renew/common/common.php" ?>

<?
	 $set_className = get_CurUrl();
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
            	<li <? if($set_className == "company" ){ ?> class="active" <? } ?>><a href="company.php">Company</a></li>
                <li <? if($set_className == "software" ){ ?> class="active" <? } ?>><a href="software.php">Software</a></li>
                <li <? if($set_className == "solution" ){ ?> class="active" <? } ?>><a href="solution.php">Solution</a></li>
                <li <? if($set_className == "news" ){ ?> class="active" <? } ?>><a href="news.php?div_group=0">news</a> </li>
                <li <? if($set_className == "contactus" ){ ?> class="active" <? } ?>><a href="contactus.php">Contactus</a></li>
            </ul>
        </div>
    </div>
    <!-- /헤더부분 -->

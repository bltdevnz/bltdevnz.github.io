<?php


	include('./includes/header.inc.php');


	$vID = $_GET['vid'];
	$pName = $_GET['p'];
	$cID = $_GET['c'];
	
	$q = mysql_query ("SELECT categoryColor, categoryName FROM categories WHERE (categoryID = ".$cID.");");
	$cat = mysql_fetch_object($q);

	$qa = mysql_query ("SELECT videoTitle, videoUrl FROM videos WHERE (videoId = ".$vID.");");
	$ret = mysql_fetch_object($qa);

	
	mysql_free_result($qa);

	mysql_free_result($q);




	$color = $cat->categoryColor;
	$title = $cat->categoryName;
	$vidTitle = $ret->videoTitle;
	$vidUrl = $ret->videoUrl;
	



	echo ("
				<p>
					<big id=\"title\" style=\"box-shadow: inset 0px 0px 15px ".$color." !important;\">".$title."</big>
					<big id=\"subtitle\" style=\"box-shadow: inset 0px 0px 15px ".$color." !important;\">".$vidTitle."</big>
					<iframe width=\"100%\" height=\"480\" src=\"".$vidUrl."\" frameborder=\"0\" allowfullscreen></iframe>
					<a href=\"javascript:window.history.back();\">< Back</a>
				</p>
				
	");

	include('./includes/footer.inc.php');


?>
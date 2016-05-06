<!DOCTYPE html>

<html lang="en-US">
	<head>
		<title><?php echo $title; ?></title>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv ="content-type" content ="text/html" charset ="utf-8" />
		<meta name='author' content='Adam Carlson' />
		<meta name ='description' content ='Here, you can find all your website needs for your business or personal use.' />
		<meta name ='keywords' content = 'websites, html, css, business' />
		<link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lobster|Droid+Serif|Audiowide' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>  
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script> <!--jQuery libraries-->
	</head>
	<body>
		
		<header>	
			<div id="logo_strip">
				<img src="logo.png" alt="Web Wizdom"/>
				<h1>Web Wizdom</h1>
				<a href="https://twitter.com/web_wizdom"><img src="Twitter-icon.png" alt="Twitter" /></a>
				<a href="https://www.facebook.com/webwizdom101"><img src="Facebook_icon.png" alt="Facebook" /></a>
			</div>
			<div id="nav_strip">
				<nav>
					<ul>
						<li class="<?php if ($section == "home") { echo "underline";} ?>"><a href="index.php"><span>Home</span></a></li><li class="<?php if ($section == "options") { echo "underline";} ?>"><a href="options.php"><span>Website Options</span></li><li class="<?php if ($section == "tech") { echo "underline";} ?>"><a href="tech.php"><span>Tech Help</span></a></li>
					</ul>
				</nav>
			</div>
		</header>
	

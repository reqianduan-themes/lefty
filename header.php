<!DOCTYPE html>
<!--
******开发者信息******
Name: Jason Xiang
Mail: info@xiguabaobao.com
Site: http://xiguabaobao.com
Date: 2014-07-12
-->
<html>
<head>
	<meta charset="utf-8">
	<title><?php wp_title('-', true, 'right'); echo get_option('blogname'); if (is_home ()) echo "-", get_option('blogdescription'); if ($paged > 1) echo '-Page ', $paged; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="generator" content="西瓜宝宝 1.0">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/base.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">

	<!--[if lte IE 8]>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/grids-responsive-old-ie-min.css">
	<style>
		.content{margin-left: 25%;padding: 2em 3em 0;}
		.header{margin: 80% 2em 0;text-align: right;}
		.sidebar{position: fixed;top: 0;bottom: 0;}
	</style>
	<![endif]-->

	<!--[if gt IE 8]>
	<!-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/grids-responsive-min.css">
	<!--<![endif]-->
</head>
<body>
	<div id="layout" class="pure-g">
		<div class="sidebar pure-u-1 pure-u-md-1-5">
			<div class="header">
				<hgroup>
					<h1 class="brand-title">A Sample Blog</h1>
					<h2 class="brand-tagline">Creating a blog layout using Pure</h2>
				</hgroup>

				<nav class="nav">
					<ul class="nav-list">
						<li class="nav-item">
							<a class="pure-button" href="http://purecss.io">Pure</a>
						</li>
						<li class="nav-item">
							<a class="pure-button" href="http://yuilibrary.com">YUI Library</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
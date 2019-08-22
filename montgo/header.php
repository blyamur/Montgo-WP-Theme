<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '–', true, 'right'); ?> <?php bloginfo( 'name' ); ?></title>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=<?php echo time(); ?>1">
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/favicon.png">
	<link href='https://fonts.googleapis.com/css?family=Fira+Mono:400,700' rel='stylesheet' type='text/css'> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap&subset=cyrillic" rel="stylesheet">
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php bloginfo('template_url'); ?>/img/open-graph-default.png" />
	<?php wp_head(); ?>
</head>
<body>
	<section class="container">
        <header class="masthead">
		    <div class="menu_ico" onclick="change('dpdmenu')">
			 <svg width="18" height="18" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" class="menu_icon">
	    		 <g transform="matrix(1.20031,0,0,1,-6.66041,-2.83703)">
		    	   <rect x="5.549" y="9.179" width="53.319" height="10.263" />
	    		 </g>
	    		 <g transform="matrix(1.20031,0,0,1,-6.66041,38.2164)">
		    	   <rect x="5.549" y="9.179" width="53.319" height="10.263" />
	    		 </g>
	    		 <g transform="matrix(1.20031,0,0,1,-6.66041,17.6897)">
		    	   <rect x="5.549" y="9.179" width="53.319" height="10.263" />
	    		 </g>
			 </svg>
			</div>	
            <div class="logo">
                <a href="<?php bloginfo('url'); ?>" class="site_title" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
            </div>
            <div class="bio">
               <?php if ( is_user_logged_in() ) {
							echo '<a href="/wp-admin/">Profile</a> | ';
							echo wp_loginout($_SERVER['REQUEST_URI']);
							} else {
							echo '<a href="/wp-login.php?action=register">Registration</a> | 
							     <a href="/wp-login.php">Enter</a> 
							';
							}?>	
            </div>
			
        </header>
		<div id="dpdmenu" class="dpdmenu" style="display:none">
		 
		<a href="<?php bloginfo('url'); ?>">main</a>
		<a href="*">about me</a>
		<a href="*">gallery</a>
		<a href="#" onclick="change('srchf')">поиск </a>
		<a href="*">feedback</a>
	
		</div>
	
		<div id="srchf" style="display:none">
		
		<form method="get" class="nav__search" action="<?php bloginfo('url'); ?>">
				<input type="text"  value="" placeholder="Поиск блогу" name="s" > 
				<input type="submit" class="go" value="">
		</form>
		</div>
		<div class="clear"></div>  
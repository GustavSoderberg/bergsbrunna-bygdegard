<!DOCTYPE HTML>
	<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<title><?php bloginfo( 'name' ); ?></title>
			<script src="https://www.google.com/recaptcha/api.js" async defer></script>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<?php wp_head() ?>
		</head>
		<body <?php body_class(); ?>>
			<header id="header">
				<a href="<?php echo home_url(); ?>"><h1 id="bygdelogo"></h1>
				<h1 id="logo">Bergsbrunna Bygdegård</a></h1>
				<nav id="nav">
					<?php //wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
					<?php 
					if ( has_nav_menu( 'header-menu' ) ) {   
    					$defaults = array(
        					'theme_location'  => 'header-menu',
        					'menu'            => 'header-menu',
        					'container'       => '',
        					'container_class' => '',
        					'container_id'    => '',
        					'menu_class'      => '',
        					'menu_id'         => '',
        					'echo'            => true,
        					'fallback_cb'     => 'header-menu',
        					'before'          => '',
        					'after'           => '',
        					'link_before'     => '',
       						'link_after'      => '',
        					'items_wrap'      => '<ul>%3$s</ul>',
        					'depth'           => 0,
        					'walker'          => ''
    					);
						
     					wp_nav_menu( $defaults );
					}
					?>
				</nav>
			</header>
			<?php if ( is_page( array( 'startsida', 'medlemskap' ) ) ) : ?>
			<?php elseif ( is_home() || is_single() ) : ?>
			<section id="work" class="main style3 center primary">
				<div class="content container">
			<?php else : ?>
			<section id="work" class="main style3 primary">
				<div class="content container">
			<?php endif; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
    <meta name="author" content="">
    
	<title><?php
	
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'mv2021' ), max( $paged, $page ) );

	?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>" />
	    <!-- Bootstrap core CSS -->
	<link href="<?php echo get_template_directory_uri(); ?>/dist/css/cfc.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/dist/css/bootstrap.min.css" rel="stylesheet">
	
    <!-- Custom styles for this template -->
    <link href="<?php echo get_template_directory_uri(); ?>/dist/css/carousel.css" rel="stylesheet">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
	
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/html5.js"></script>
	<![endif]-->
	

<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

</head>

<body>

    <header <?php body_class(); ?>>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <span class="navbar-brand"><img style="width:50%" src="<?php echo get_template_directory_uri(); ?>/images/mvcog_logo_white.png" alt="Mountain Valley Church of God"></span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'navbarCollapse',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>

<?php if ((date("w") == 3) && (date("Hi")>1300) && (date("Hi")<1500)) {?>
    <a href="//domain.com/live" class="btn btn_transparent">Live</a>
<?php } ?>

      </nav>
    </header>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title>
			<?php wp_title('');
			if( wp_title('', false) ) {
				echo ' | ';
			}
			bloginfo('name'); ?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<meta property="og:title" content="<?php echo wp_title() ?>">
		<meta property="og:description" content="<?php
		if ( is_front_page() || !has_excerpt() ) :
			bloginfo( 'description');
		else :
			the_excerpt();
		endif;
		?>">
		<meta property="og:image" content="">
		<meta property="og:url" content="<?php echo get_the_permalink(); ?>">
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:site" content>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
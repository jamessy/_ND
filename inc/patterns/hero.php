<?php
/**
 * Hero Block Pattern
 *
 * @package ND
 */

register_block_pattern(
	'nd/hero',
	array(
		'title'       => esc_html__( 'Hero Section', 'nd' ),
		'description' => esc_html__( 'A hero section with heading, text, and call-to-action button using Group block.', 'nd' ),
		'categories'  => array( 'nd' ),
		'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"},"blockGap":"var:preset|spacing|lg"}},"backgroundColor":"primary","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl)"><!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xxl"} -->
<h1 class="has-text-align-center has-xxl-font-size">Welcome to Our Site</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size">This is a hero section that showcases your main message with a clear call to action.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"primary"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background wp-element-button">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
	)
);

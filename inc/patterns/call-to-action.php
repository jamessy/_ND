<?php
/**
 * Call to Action Block Pattern
 *
 * @package ND
 */

register_block_pattern(
	'nd/call-to-action',
	array(
		'title'       => esc_html__( 'Call to Action', 'nd' ),
		'description' => esc_html__( 'A centered call-to-action section with heading, text, and buttons.', 'nd' ),
		'categories'  => array( 'nd' ),
		'content'     => '<!-- wp:group {"align":"wide","backgroundColor":"light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-light-background-color has-background"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="has-text-align-center">Ready to Get Started?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Join thousands of satisfied customers and experience the difference today.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button">Sign Up Now</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"primary","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-primary-color has-text-color wp-element-button">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
	)
);

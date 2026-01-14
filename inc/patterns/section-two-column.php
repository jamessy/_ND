<?php
/**
 * Section Two Column Pattern
 *
 * @package ND
 */

register_block_pattern(
	'nd/section-two-column',
	array(
		'title'       => esc_html__( 'Section Two Column', 'nd' ),
		'description' => esc_html__( 'A two-column layout using Group and Columns blocks.', 'nd' ),
		'categories'  => array( 'nd' ),
		'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:heading {"level":2} -->
<h2>Two Column Section</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Column One</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is the first column. You can add any content blocks here.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Column Two</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is the second column. Columns automatically stack on mobile devices.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
	)
);

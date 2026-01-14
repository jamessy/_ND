<?php
/**
 * Multi Column Content Block Pattern
 *
 * @package ND
 */

register_block_pattern(
	'nd/multi-column-content',
	array(
		'title'       => esc_html__( 'Multi Column Content', 'nd' ),
		'description' => esc_html__( 'A three-column layout with headings and content using Group and Columns blocks.', 'nd' ),
		'categories'  => array( 'nd' ),
		'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Feature One</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is the first column of content. You can add any blocks here to create rich, engaging content.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Feature Two</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is the second column. Use columns to create balanced layouts and organize your content effectively.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Feature Three</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is the third column. Columns automatically stack on mobile devices for responsive design.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
	)
);

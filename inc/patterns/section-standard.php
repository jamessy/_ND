<?php
/**
 * Section Standard Pattern
 *
 * @package ND
 */

register_block_pattern(
	'nd/section-standard',
	array(
		'title'       => esc_html__( 'Section Standard', 'nd' ),
		'description' => esc_html__( 'A standard content section using Group block.', 'nd' ),
		'categories'  => array( 'nd' ),
		'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:heading {"level":2} -->
<h2>Section Heading</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is a standard content section. Use the Group block to create consistent sections with controlled spacing.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>You can add multiple paragraphs, headings, and other content blocks within the Group block.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->',
	)
);

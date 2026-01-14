<?php
/**
 * Content + Image Block Pattern
 *
 * @package ND
 */

register_block_pattern(
	'nd/content-image',
	array(
		'title'       => esc_html__( 'Content Plus Image', 'nd' ),
		'description' => esc_html__( 'A two-column layout with content on one side and an image on the other using Columns block.', 'nd' ),
		'categories'  => array( 'nd' ),
		'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2} -->
<h2>Content Plus Image</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This pattern demonstrates a content and image layout using the Columns block. You can easily swap the column order or adjust the content.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Perfect for showcasing features, telling stories, or presenting information in an engaging way.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://via.placeholder.com/600x400" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
	)
);

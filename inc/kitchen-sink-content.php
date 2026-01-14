<?php
/**
 * Kitchen Sink Page Content
 *
 * This file contains the content for the Kitchen Sink page,
 * displaying all styled core Gutenberg blocks and patterns.
 * Uses ONLY Group, Columns, Headings, Paragraphs, and Buttons for layout.
 *
 * @package ND
 */

/**
 * Get Kitchen Sink page content.
 *
 * @return string HTML content for Kitchen Sink page.
 */
function nd_get_kitchen_sink_content() {
	$content = '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:paragraph -->
<p>This is the Kitchen Sink page. It displays all styled core Gutenberg blocks, block patterns, typography scale, and spacing examples for visual QA and editor reference.</p>
<!-- /wp:paragraph -->

<!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":1} -->
<h1>Typography Scale</h1>
<!-- /wp:heading -->

<!-- wp:heading {"level":2} -->
<h2>Heading Level 2</h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3} -->
<h3>Heading Level 3</h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":4} -->
<h4>Heading Level 4</h4>
<!-- /wp:heading -->

<!-- wp:heading {"level":5} -->
<h5>Heading Level 5</h5>
<!-- /wp:heading -->

<!-- wp:heading {"level":6} -->
<h6>Heading Level 6</h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Small font size (0.875rem)</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"base"} -->
<p class="has-base-font-size">Base font size (1rem)</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size">Medium font size (1.25rem)</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">Large font size (1.5rem)</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"xl"} -->
<p class="has-xl-font-size">XL font size (2rem)</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"xxl"} -->
<p class="has-xxl-font-size">XXL font size (2.5rem)</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2>Text Blocks</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is a regular paragraph. It contains <strong>bold text</strong>, <em>italic text</em>, and <a href="#">a link</a>. You can also use <code>inline code</code> and <mark>highlighted text</mark>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This is another paragraph with more content to demonstrate line height and spacing between paragraphs.</p>
<!-- /wp:paragraph -->

<!-- wp:quote -->
<blockquote class="wp-block-quote"><!-- wp:paragraph -->
<p>This is a blockquote. It can contain multiple paragraphs and is great for highlighting important quotes or testimonials.</p>
<!-- /wp:paragraph --><cite>— Quote Attribution</cite></blockquote>
<!-- /wp:quote -->

<!-- wp:preformatted -->
<pre class="wp-block-preformatted">This is preformatted text.
It preserves whitespace and line breaks.
Perfect for code examples.</pre>
<!-- /wp:preformatted -->

<!-- wp:code -->
<pre class="wp-block-code"><code>function example() {
    return "This is code";
}</code></pre>
<!-- /wp:code --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2>Lists</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><!-- wp:list-item -->
<li>Unordered list item one</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Unordered list item two</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Unordered list item three
<!-- wp:list -->
<ul><!-- wp:list-item -->
<li>Nested list item</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:list {"ordered":true} -->
<ol><!-- wp:list-item -->
<li>Ordered list item one</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Ordered list item two</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Ordered list item three</li>
<!-- /wp:list-item --></ol>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2>Buttons</h2>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Primary Button</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Outline Button</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2>Spacing Examples</h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","right":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs"},"margin":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}},"backgroundColor":"light"} -->
<div class="wp-block-group has-light-background-color has-background" style="margin-top:var(--wp--preset--spacing--sm);margin-bottom:var(--wp--preset--spacing--sm);padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><!-- wp:paragraph -->
<p><strong>XS Spacing (0.5rem)</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","right":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm"},"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"backgroundColor":"light"} -->
<div class="wp-block-group has-light-background-color has-background" style="margin-top:var(--wp--preset--spacing--md);margin-bottom:var(--wp--preset--spacing--md);padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)"><!-- wp:paragraph -->
<p><strong>SM Spacing (1rem)</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","right":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md"},"margin":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"light"} -->
<div class="wp-block-group has-light-background-color has-background" style="margin-top:var(--wp--preset--spacing--lg);margin-bottom:var(--wp--preset--spacing--lg);padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)"><!-- wp:paragraph -->
<p><strong>MD Spacing (1.5rem)</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","right":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|lg"},"margin":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"light"} -->
<div class="wp-block-group has-light-background-color has-background" style="margin-top:var(--wp--preset--spacing--xl);margin-bottom:var(--wp--preset--spacing--xl);padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)"><!-- wp:paragraph -->
<p><strong>LG Spacing (2rem)</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2>Columns Layout</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Column One</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is the first column demonstrating the Columns block layout.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Column Two</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is the second column. Columns automatically stack on mobile devices.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>Column Three</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is the third column showing multi-column layouts.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2>Block Patterns</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The following sections demonstrate the registered block patterns using Group and Columns blocks:</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->';

	return $content;
}

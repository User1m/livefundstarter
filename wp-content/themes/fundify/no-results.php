<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fundify
 * @since Fundify 1.0
 */
?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
	<?php if ( is_search() ) : ?>
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'fundify' ); ?></h1>
	<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_search() ) : ?>
			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fundify' ); ?></p>
		<?php else : ?>
			<p><?php _e( 'Oops, I screwed up and you discovered my fatal flaw. Well, we are not all perfect, but we try.' ); ?></p>
			<p><?php _e( 'Maybe visit our <a title="Home" href="/index.php">Home Page</a> to start fresh and find a cause or celebrity to get behind.' ) ?></p>
			<p><?php _e( '<a href="/contact">Contact us</a> with details of how you got here and we promise we will do better next time.' ); ?></p>
			<p><?php _e( 'Or Perhaps searching can help.', 'fundify' ); ?></p>
		<?php endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 .post .no-results .not-found -->

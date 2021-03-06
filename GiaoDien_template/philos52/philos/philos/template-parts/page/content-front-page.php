<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'nileforest-panel ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'nileforest-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content">
		<?php $page_title = get_post_meta( get_the_ID(), 'meta-box-page-title', true ); ?>
		<?php if($page_title !="hide"): ?>
			<div class="container">
				<div class="row">
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			
						<?php nileforest_edit_link( get_the_ID() ); ?>
			
					</header><!-- .entry-header -->
				</div><!-- .row -->
			</div><!-- .container -->
		<?php endif; ?>		

		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'philos' ),
					get_the_title()
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .panel-content -->
</article><!-- #post-## -->
<?php
	/**
	 * The template for displaying all single posts.
	 *
	 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	 *
	 * @package cranleigh-2016
	 */

	get_header();

?>
	<div class="container">
		<div class="row">
			<div id="primary" class="col-sm-8 content-area">
				<main id="main" class="site-main" role="main">

					<?php
						cranleigh_breadcrumbs();

						while (have_posts()) : the_post();
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<header class="post-meta">
									<?php

										the_title('<h1 class="entry-title">', '</h1>');

									?>
								</header><!-- .entry-header -->
								<?php cs_quickJump(); ?>
								<div class="entry-content">
									<div class="person-meta alignright">
									<?php
										if (has_post_thumbnail()) {
											$fullsizeurl = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
											echo '<a href="' . $fullsizeurl . '">';
											the_post_thumbnail( 'medium', array('class'=>'img-responsive') );
											echo '</a>';
										}
										?>

										<dl>
											<dt>Job Title</dt>
											<dd><?php echo get_post_meta(get_the_ID(), 'dedcomm_jobtitle', true); ?></dd>
											<?php if (get_post_meta(get_the_ID(), 'dedcomm_startdate', true)) { ?>
												<dt>Joined Cranleigh</dt>
												<dd><?php echo \FredBradley\CranleighDedicatedCommunity\Template::yearFromDate(); ?></dd>
											<?php } ?>
											<?php if (get_post_meta(get_the_ID(), 'dedcomm_enddate', true)) { ?>
												<dt>Departed Cranleigh</dt>
												<dd><?php echo \FredBradley\CranleighDedicatedCommunity\Template::yearFromDate('end') ?></dd>
											<?php } ?>
										</dl>
									</div>
										<?php


										the_content( sprintf(
										/* translators: %s: Name of current post. */
											wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'cranleigh-2016' ), array( 'span' => array( 'class' => array() ) ) ),
											the_title( '<span class="screen-reader-text">"', '"</span>', false )
										) );

										wp_link_pages(array(
											'before' => '<div class="page-links">' . esc_html__('Pages:', 'cranleigh-2016'),
											'after'  => '</div>',
										));
									?>
								</div><!-- .entry-content -->

								<footer class="entry-footer">
									<?php cranleigh_2016_entry_footer(); ?>
								</footer><!-- .entry-footer -->
							</article><!-- #post-## -->
							<div class="clear clearfix">&nbsp;</div>
							<?php
							cranleigh_2016_keep_reading();

							// If comments are open or we have at least one comment, load up the comment template.
							if (comments_open() || get_comments_number()) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar('page-sidebar'); ?>
		</div>
	</div>
<?php
	get_footer();


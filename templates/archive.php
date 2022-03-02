<?php declare(strict_types=1);
/**
     * The template for displaying archive pages.
     *
     * @see    https://codex.wordpress.org/Template_Hierarchy
     */
    get_header(); ?>
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-12 content-area">
                <main id="main" class="site-main" role="main">

                    <?php
                        cranleigh_breadcrumbs();

                    if (have_posts()) { ?>
                            <header class="page-header">
                                <h1 class="page-title">EPQ Showcase</h1>
								<nav>
									<ul class="list-inline quick-jump">
										<li>
											<a href="https://www.cranleigh.org/our-school/academics/curriculum-overview/the-extended-project-qualification-epq/">EPQ Information</a>
										</li>
									</ul>
								</nav>
								<?php echo apply_filters( 'the_content', wp_kses_post( \FredBradley\CranleighEPQShowcase\Settings::get( 'blurb_from_jlt_0' ) ) ); ?>
							</header><!-- .page-header -->
                            <div class="entry-content">

                                <?php
                                // Start the Loop
                                echo '<div class="sport-cards">';
                                while (have_posts()) {
                                    the_post(); ?>
                                            <div class="card">
                                                <div class="card-image card-photo">
                                                    <a href="<?php the_permalink(); ?>" style="user-select: none;">
                                                    <?php the_post_thumbnail('medium'); ?><!-- test -->
                                                    </a>
                                                </div>
                                                <div class="card-text">
                                                    <h3 class="text-center"><a href="<?php the_permalink(); ?>"
                                                           style="user-select: none;"><?php the_title(); ?></a></h3>
                                                </div>
                                            </div>

                                        <?php


                                }
                                echo '</div>';
                                ?>

                            </div>
                            <?php

                            the_posts_navigation();
                    } else {
                        get_template_part('template-parts/content', 'none');
                    }
                        wp_reset_postdata(); ?>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>

<?php
    get_footer();

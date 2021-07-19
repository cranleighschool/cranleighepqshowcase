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
                                <h1 class="page-title">A Dedicated Community</h1>
                            </header><!-- .page-header -->
                            <div class="entry-content">

                                <?php
                                // Start the Loop
                                echo '<div class="isotope-cards">';
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
                                                    <p class="text-center"><?php echo esc_html(get_post_meta(get_the_ID(), 'dedcomm_jobtitle', true)); ?></p>
                                                </div>
                                            </div>

                                        <?php

                                        ++$i;
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

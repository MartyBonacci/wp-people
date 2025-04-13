<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<div class="person-archive">
    <h1><?php _e( 'People Directory', 'marty-wp-people' ); ?></h1>

    <?php if ( have_posts() ) : ?>
        <div class="person-list">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="person-item">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="person-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'medium' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="person-details">
                        <h2 class="person-name">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo esc_html( get_post_meta( get_the_ID(), '_person_full_name', true ) ); ?>
                            </a>
                        </h2>
                        <div class="person-bio">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p><?php _e( 'No people found.', 'marty-wp-people' ); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
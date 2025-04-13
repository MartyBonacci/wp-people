<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<div class="person-single">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="person-details">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="person-image">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>

            <h1 class="person-name">
                <?php echo esc_html( get_post_meta( get_the_ID(), '_person_full_name', true ) ); ?>
            </h1>

            <ul class="person-contact">
                <li><strong><?php _e( 'Email:', 'marty-wp-people' ); ?></strong>
                    <a href="mailto:<?php echo esc_attr( get_post_meta( get_the_ID(), '_person_email', true ) ); ?>">
                        <?php echo esc_html( get_post_meta( get_the_ID(), '_person_email', true ) ); ?>
                    </a>
                </li>
                <li><strong><?php _e( 'Phone:', 'marty-wp-people' ); ?></strong>
                    <?php echo esc_html( get_post_meta( get_the_ID(), '_person_phone', true ) ); ?>
                </li>
                <li><strong><?php _e( 'Job Position:', 'marty-wp-people' ); ?></strong>
                    <?php echo esc_html( get_post_meta( get_the_ID(), '_person_job_position', true ) ); ?>
                </li>
            </ul>

            <div class="person-bio">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; else : ?>
        <p><?php _e( 'No person found.', 'marty-wp-people' ); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
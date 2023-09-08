<?php get_header(); ?>

<section class="main_banner">
    <div class="container">
        <h1 class="title_banner">
            <?php if( get_field('main_title') ): ?>
                <?php the_field('main_title'); ?>
            <?php endif; ?>
        </h1>
        <div class="banner_description">
            <?php if( get_field('main_description') ): ?>
                <?php the_field('main_description'); ?>
            <?php endif; ?>       
        </div>
    </div>
    <img class="image_frame" src="<?php echo get_template_directory_uri(); ?>/img/Frame.svg" alt="frame">

</section>

<section class="main_posts">
    <div class="container">
        <div class="header_wrapper">
            <h2>Публікації</h2>
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">усі публікіції</a>
        </div>

        <div class="posts_wrapper">
            <div class="once_post">
                <?php 
                    $args = array(
                        'post_type' => 'post',
                        'post_per_page' => 1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'publication-type',
                                'field' => 'slug',
                                'terms' => 'anons'
                            )
                        )
                    );

                    $loop = new WP_Query($args);

                    while ( $loop->have_posts() ) : $loop->the_post(); 

                        get_template_part( 'template-parts/content', 'anons' );

                        wp_reset_postdata();
                    endwhile; 
                ?>
            </div>

            <div class="other_posts">
                 <?php 
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'publication-type',
                                'field' => 'slug',
                                'terms' => 'anons',
                                'operator' => 'NOT IN',
                            )
                        )
                    );

                    $loop = new WP_Query($args);

                    while ( $loop->have_posts() ) : $loop->the_post(); 
                        
                        get_template_part( 'template-parts/content', 'default' );

                    endwhile; 
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
<?php get_header(); ?>

<section class="main_banner">
    <div class="container">
        <h1 class="title_banner">
            Єднання заради дії
        </h1>
        <div class="banner_description">
            Cприяння стабілізації України шляхом сприяння інтеграції ВПО в Україні відповідно до стратегії інтеграції ВПО та зменшення вразливості ВПО до експлуатації.
        </div>
    </div>
    <img class="image_frame" src="<?php echo get_template_directory_uri(); ?>/img/Frame.svg" alt="frame">

</section>

<section class="main_posts">
    <div class="container">
        <div class="header_wrapper">
            <h2>Публікації</h2>
            <a href="http://">усі публікіції</a>
        </div>

        
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

        while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <hr>
            <?php the_content(); ?>

            <?php wp_reset_postdata();
        endwhile; ?>
    </div>
</section>
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
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">усі публікіції</a>
        </div>

        <div class="posts_wrapper">
            <div class="anons_post">
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

                        <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'big', array( 'class' => 'card__image' ) );
                        } else {
                            echo '<img class="card__thumbn" src="' . get_template_directory_uri() . '/img/blur-post.jpg" alt="blur-post-image">';
                        } ?>
                        <div class="post_term">
                            <?php 
                                $terms = get_the_terms( $post->ID, 'publication-type' );
                                
                                if ( $terms && ! is_wp_error( $terms ) ) {
                                    foreach ( $terms as $term ) {
                                        $term_link = get_term_link( $term );
                                        echo '<a href=" ' . esc_url($term_link) . ' ">' . $term->name . '</a>';
                                    }
                                }
                            ?>
                        </div>
                       
                        <div class="content">
                            <time datetime="2011-04-01">04/01/11</time>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <div class="description">
                                <?php the_content(); ?>
                            </div>  
                            <div class="topic">
                                <?php 
                                    // Получаем текущий термин
                                    $topics = get_the_terms( $post->ID, 'publication-topic' );
                                    
                                    if ( $topics && ! is_wp_error( $topics ) ) {
                                        foreach ( $topics as $topic ) {
                                            $topic_link = get_term_link( $topic );
                                            echo '<a href=" ' . esc_url($topic_link) . '">' . $topic->name . '</a>'; // Выводим только имя термина
                                        }
                                    }
                                ?>
                            </div>
                        </div>

                        <?php wp_reset_postdata();
                    endwhile; 
                ?>
            </div>






            <div class="other_posts">


            
                 <?php 
                    $args = array(
                        'post_type' => 'post',
                        'post_per_page' => 2,
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

                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="small_post">
                                <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'small', array( 'class' => 'card__image' ) );
                                } else {
                                    echo '<img class="card__thumbn" src="' . get_template_directory_uri() . '/img/blur-post.jpg" alt="blur-post-image">';
                                } ?>

                            <div class="content">
                                <div class="post_header">
                                    <div class="post_term">
                                        <?php 
                                            $terms = get_the_terms( $post->ID, 'publication-type' );
                                            
                                            if ( $terms && ! is_wp_error( $terms ) ) {
                                                foreach ( $terms as $term ) {
                                                    $term_link = get_term_link( $term );
                                                    echo '<a href=" ' . esc_url($term_link) . ' ">' . $term->name . '</a>';
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                    <time datetime="2011-04-01">04/01/11</time>
                                </div>
                                

                                <div class="description">
                                    <?php the_content(); ?>
                                </div>  
                                <div class="topic">
                                    <?php 
                                        $topics = get_the_terms( $post->ID, 'publication-topic' );
                                        
                                        if ( $topics && ! is_wp_error( $topics ) ) {
                                            foreach ( $topics as $topic ) {
                                                $topic_link = get_term_link( $topic );
                                                echo '<a href=" ' . esc_url($topic_link) . '">' . $topic->name . '</a>';
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                       

                        <?php 
                    endwhile; 
                ?>
            </div>
        </div>
   
    </div>
</section>
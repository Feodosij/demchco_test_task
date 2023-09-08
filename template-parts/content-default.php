

    <div class="small_post" onclick="document.location='<?php the_permalink(); ?>'">

        <?php if (get_field('post_image')) : ?>
            <img src="<?php the_field('post_image'); ?>" alt="post-image"> 
        <?php else : ?>
            <img class="card__thumbn" src="<?php echo esc_url(get_template_directory_uri() . '/img/blur-post.jpg'); ?>" alt="blur-post-image">
        <?php endif; ?>
        

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
                <time datetime="<?php echo get_the_date('d.m.Y'); ?>"><?php echo get_the_date('d.m.Y'); ?></time>
            </div>
            

            <div class="description">
                <?php if( get_field('post_description') ): ?>
                    <p><?php the_field('post_description'); ?></p>
                <?php endif; ?>
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


 
    <div class="anons_post" style="background-image: url(<?php the_field('post_image'); ?>)" onclick="document.location='<?php the_permalink(); ?>'">
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
                <div class="date">20 грудня, 16:00–18:00</div>
                
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
<?php get_header();

echo 'blog home php';
?>
<div class="card_wrapper">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="card">
        <div class="card__thumbn">
            <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'medium', array( 'class' => 'card__image' ) );
            } else {
                echo '<img class="card__thumbn" src="' . get_template_directory_uri() . '/img/blur-post.jpg" alt="blur-post-image">';
            } ?>
        </div>
        <div class="card__body">
            <div class="tag"><span>новини</span></div><time><?php the_time('j F Y'); ?></time>
            <a href="<?php echo get_the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p><?php the_excerpt(); ?></p>

            
        </div>
    </div>
    <?php endwhile; else: ?>
        Записей нет.
    <?php endif; ?>
</div>
    


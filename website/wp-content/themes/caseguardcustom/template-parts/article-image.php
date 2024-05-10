<li class="splide__slide">
    <?php if(has_post_thumbnail()): ?>
    <a href="<?php the_permalink(); ?>"><img data-name="<?php the_title(); ?>" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>"></a>
    
    <?php else: ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-image.jpg" alt="Default Image">
    <?php endif; ?>
</li>
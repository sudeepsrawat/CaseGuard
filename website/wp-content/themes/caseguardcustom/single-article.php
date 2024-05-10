<?php get_header(); ?>

<section id="single-article">
  <div class="container">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <header class="article-header">
      <h1><?php the_title(); ?></h1>
      <?php if ( has_post_thumbnail() ) : ?>
      <div class="featured-image">
        <?php the_post_thumbnail('large'); ?>
      </div>
      <?php endif; ?>
    </header>

    <!-- Article Content -->
    <div class="article-content">
      <?php the_content(); ?>
    </div>

    <div class="article-footer">

      <?php 
        $colors_list = get_the_terms($post->ID, 'color');
        $seasons_list = get_the_terms($post->ID, 'season');
        
        if ($colors_list || $seasons_list) {
            echo "<span>Category: ";
            if ($colors_list) echo "Color";
            elseif ($seasons_list) echo "Season";
            echo "</span><br>";

            echo "<span>Type: ";
            if ($colors_list) {
                $colors_array = [];
                foreach ($colors_list as $color) {
                    $colors_array[] = $color->name;
                }
                echo implode(', ', $colors_array);
            } elseif ($seasons_list) {
                $seasons_array = [];
                foreach ($seasons_list as $season) {
                    $seasons_array[] = $season->name;
                }
                echo implode(', ', $seasons_array);
            } else {
                echo "None";
            }
            echo "</span>";
        } else {
            echo "<span>Category: None</span><br>";
            echo "<span>Type: None</span>";
        }
      ?>

    </div>

    <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no articles found.' ); ?></p>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
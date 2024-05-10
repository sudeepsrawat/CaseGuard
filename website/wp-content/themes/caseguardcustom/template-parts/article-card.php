  <!-- Article Card -->
<div class="article-card">
  <div class="article-image">
    <?php if(has_post_thumbnail()): ?>
    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
    <?php else: ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-image.jpg" alt="Default Image">
    <?php endif; ?>
  </div>

  <div class="article-card-section">
    <div class="article-title">
      <?php the_title(); ?>
    </div>

    <?php
    $colors = get_the_terms(get_the_ID(), 'color');
    $seasons = get_the_terms(get_the_ID(), 'season');
    $categories = [];
    if ($colors) {
        $categories = array_merge($categories, $colors);
    }
    if ($seasons) {
        $categories = array_merge($categories, $seasons);
    }
?>

    <div class="article-category">
      <span class="article-category-label">Category</span>
      <span class="article-category-value">:
        <?php 
            echo $categories  ? ucfirst($categories [0]->taxonomy) : 'None'; 
        ?>
      </span>
    </div>

    <div class="article-type">
      <span class="article-type-label">Type</span>
      <span class="article-type-value">:
        <?php 
            if ($categories) {
                $names = array();
                foreach($categories as $term) {
                    $names[] = ucfirst($term->name);
                }
                echo implode(', ', $names);
            } else {
                echo 'None';
            }
        ?>
      </span>
    </div>

    <a class="btn btn-tertiary-style" href="<?php the_permalink(); ?>">Read</a>
  </div>
</div>
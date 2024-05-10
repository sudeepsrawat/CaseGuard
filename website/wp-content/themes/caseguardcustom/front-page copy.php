<?php get_header(); ?>

<!-- Section 1 - Heading -->
<section id="heading-section">
  <div class="video-container">
    <video autoplay muted loop>
      <source src="<?php echo get_template_directory_uri(); ?>/assets/video/Header_Video.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    <div class="heading-container">
      
      <!-- Heading and Text -->
      <div class="heading-tag">
        <button type="button" class="btn btn-secondary">Tag Title</button>
      </div>
      <div class="heading-text">
        <h1>
          <span>Section 1</span>
          <div class="message">
            <div class="word1">Alpha</div>
            <div class="word2">Bravo</div>
            <div class="word3">Charlie</div>
            <div class="word4">Delta</div>
            <div class="word5">Echo</div>
            <div class="word6">Foxtrot</div>
          </div>
        </h1>
        <p class="heading-para"><span style="font-weight: 900;">Lorem ipsum</span> dolor sit amet, consectetur adipiscing elit. Cras tortor nibh, vestibulum id elit at, eleifend condimentum mi. Nunc suscipit ullamcorper dolor, et suscipit leo consequat nec. Sed sit amet neque sollicitudin, semper urna et, rutrum massa. Suspendisse nec euismod ex. Pellentesque nunc metus, rhoncus sed scelerisque ut, porta non eros.</p>
      </div>
      
      <!-- Buttons -->
      <div class="buttons">
        <button type="button" class="header-btn btn btn-primary" style="background-color:#00F3FF;color:black;">Button 1 ></button>
        <button type="button" class="header-btn btn btn-secondary no-bg-color">Button 2 ></button>
      </div>
    </div>
  </div>
</section>


<!-- Section 2 - Image Slider -->
<section id="image-slider-section">
  <div class="image-slider-container">
    <div class="image-slider-texts"></div>
    <div class="image-slider-inputs"></div>
    <div class="image-slider-images"></div>
    <div class="image-slider-show"></div>
    <div class="image-slider-scroller"></div>
  </div>
</section>

<!-- Section 2 - Images -->
<section id="image-section">
  <div class="container">
    <div class="image-show">
      <img class="first" src="<?php echo get_template_directory_uri(); ?>/assets/imgs/picture1.jpg" alt="Pic1">
      <img class="second" src="<?php echo get_template_directory_uri(); ?>/assets/imgs/picture2.jpg" alt="Pic2">
    </div>
  </div>
</section>

<!-- Section 3 - Articles -->

<section id="articles-section">
  <div class="articles">
    <!-- Heading -->
    <div class="article-heading">
      <h2>Articles Area</h2>
      <div class="article-text">
        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit volutpat gravida malesuada quam commodo id integer
          nam.
        </p>
      </div>
    </div>
    <!-- Filtering Options -->
    <div class="main-container">
      <div class="filtering-options">
        <!-- Search Bar -->
        <div class="search-bar">
          <input class="form-control" type="text" id="article-search" placeholder="Search">
        </div>
        <!-- Colors Filter -->
        <div class="filter colors-filter">
          <p class="filter-text">Colors</p>
          <?php
          $colors = get_terms(array('taxonomy' => 'color', 'hide_empty' => false));
          foreach ($colors as $color) {
            echo '<label class="filter-checkbox"><input type="checkbox" name="color" value="' . $color->term_id . '"> ' . $color->name . '</label><br>';
          }
          ?>
        </div>

        <!-- Seasons Filter -->
        <div class="filter seasons-filter">
          <p class="filter-text">Seasons</p>
          <?php
          $seasons = get_terms(array('taxonomy' => 'season', 'hide_empty' => false));
          foreach ($seasons as $season) {
            echo '<label class="filter-checkbox"><input type="checkbox" name="season" value="' . $season->term_id . '"> ' . $season->name . '</label><br>';
          }
          ?>
        </div>
        <!-- Reset Button -->
        <button class="btn btn-primary-style" id="reset-filters">Reset</button>

      </div>

      <div class="separator"></div>


      <!-- Articles Display -->
      <div id="articles-grid" class="row">
        <!-- Articles will be loaded here via AJAX -->
      </div>
    </div>
  </div>
</section>

<div class="clearfix"></div>

<?php get_footer(); ?>